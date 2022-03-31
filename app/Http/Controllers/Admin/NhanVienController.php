<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NhanVien;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\DichVu\DichVuRepository;
use App\Repositories\NhanVien\NhanVienRepository;
use Illuminate\Http\Request;
class NhanVienController extends Controller
{
    private $nhanvien;
    private $coso;
    private $dichvu;

    public function __construct(NhanVienRepository $nhanvien, CoSoRepository $coso, DichVuRepository $dichvu)
    {
        $this->nhanvien = $nhanvien;
        $this->coso = $coso;
        $this->dichvu = $dichvu;
    }

    /**
     * show danh sách nhân viên
     */
    public function index()
    {
        $data = $this->nhanvien->getNhanVien();

        return view("Admin.NhanVien.index", ['data' => $data]);
    }
    /**
     * chuyển hướng đến trang thêm nhân viên
     */
    public function create()
    {
        $coso = $this->coso->getAll();
        return view("Admin.NhanVien.create", ['coso' => $coso]);
        //
    }
    /**
     * Thêm nhân viên
     */
    public function store(NhanVien $request)
    {

        $coSo = session()->get('coso');

        $img = $request->file('urlHinh');
        $extension = $img->getClientOriginalExtension();
        $CheckEmail = $this->nhanvien->CheckEmail($request->email);
        $CheckSdt = $this->nhanvien->CheckSdt($request->sdt);
        $imgTrue = true;
        $emailTrue = true;
        $sdtTrue = true;

        if ($this->checkImg($extension, $img) == true) {
            $imgTrue = true;
        } else {
            $imgTrue = false;
        }

        if ($CheckEmail == true) {
            $emailTrue = true;
        } else {
            $emailTrue = false;
        }

        if ($CheckSdt == true) {
            $sdtTrue = true;
        } else {
            $sdtTrue = false;
        }

        if ($imgTrue == true and $emailTrue == true and $sdtTrue == true) {
            $nhanvien = [
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'sdt' => $request->sdt,
                'gioitinh' => $request->gioitinh,
                'avatar' => $_FILES["urlHinh"]["name"],
                'idcoso' => $coSo,
                'role' => $request->role,
                'active' => $request->active,
                'namsinh' => $request->namsinh,
                'trangthai' => $request->trangthai
            ];
            $this->nhanvien->create($nhanvien);
            return redirect('quantri/nhanvien')->with('thanhcong', 'Thêm nhân viên thành công');
        } else {
            return redirect()->back()->with('thatbai', 'Thêm nhân viên thất bại vui lòng kiểm tra lại ảnh nhân viên');
        }


    }
    /**
     * Check email
     */
    public function CheckEmailTonTai($email)
    {
        if ($this->nhanvien->CheckEmail($email) == false) {
            echo "<span class='badge badge-danger'> Email đã được dùng </span>";
        }

    }
    /**
     * Check sdt
     */
    public function CheckSdtTonTai($sdt)
    {
        if ($this->nhanvien->CheckSdt($sdt) == false) {
            echo "<span class='badge badge-danger'> Số điện thoại đã được dùng </span>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * Tải ảnh khách hàng lên
     * 1 show
     * 2 up
     * 3 xóa
     * 4: tất cả ảnh khách hàng
     */
    public function show($id)
    {
        $nhanvien = $this->nhanvien->find($id);
        return view("Admin.NhanVien.ImgKhachHang", ['nhanvien' => $nhanvien]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coso = $this->coso->getAll();
        $nhanvien = $this->nhanvien->find($id);
        return view("Admin.NhanVien.edit", ['coso' => $coso, 'nhanvien' => $nhanvien]);
    }

    /**
     * Cập nhật thông tin nhân viên
     */
    public function update(Request $request, $id)
    {

        $coSo = session()->get('coso');

        $img = $request->file('urlHinh');
        $password = $request->password;
        $newpass = "";
        $picture = "";
        $newpicture = "";
        $imgTrue = true;
        if ($password == null) {
            $newpass = $request->oldpassword;
        } else {
            $newpass = bcrypt($password);
        }

        if ($img == null) {
            $newpicture = $request->oldImg;
        } else {
            $picture = $img;
            $extension = $picture->getClientOriginalExtension();
            $newpicture = $picture->getClientOriginalName();
            if ($this->checkImg($extension, $picture) == true) {
                $imgTrue = true;
            } else {
                $imgTrue = false;
            }
        }

        if ($imgTrue == true) {
            $nhanvien = [
                'name' => $request->username,
                'password' => $newpass,
                'gioitinh' => $request->gioitinh,
                'avatar' => $newpicture,
                'idcoso' => $coSo,
                'role' => $request->role,
                'active' => ($request->active) ? 1 : 0,
                'namsinh' => $request->namsinh,
                'trangthai' => ($request->trangthai) ? 1 : 0
            ];
            $this->nhanvien->update($id, $nhanvien);
            return redirect('quantri/nhanvien')->with('thanhcong', 'Sửa nhân viên thành công');
        } else {
            return redirect()->back()->with('thatbai', 'Avatar không hợp lệ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
