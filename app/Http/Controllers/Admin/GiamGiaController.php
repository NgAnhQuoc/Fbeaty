<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\HoaDon\HoaDonRepository;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Repositories\GiamGia\GiamGiaRepository;
use App\Http\Requests\GiamGia;
use App\Repositories\DonHang\DonHangRepository;
use App\Http\Requests\GiamGiaEdit;


class GiamGiaController extends Controller
{
    private $GiamGia;
    private $DonHang;
    private $HoaDon;

    /**
     * GiamGiaController constructor.
     */
    public function __construct(GiamGiaRepository $GiamGia, DonHangRepository $DonHang, HoaDonRepository $HoaDon)
    {
        $this->GiamGia = $GiamGia;
        $this->DonHang = $DonHang;
        $this->HoaDon = $HoaDon;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->GiamGia->getAll();
        $mytime = Carbon::now();
        return view('Admin.GiamGia.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(GiamGia $request)
    {
        if ($request->ngayhethan > $request->ngaytao) {

                $data = [
                    'name' => $request->name,
                    'ma' => $request->ma,
                    'number' => $request->number,
                    'max' => $request->max,
                    'loai' => $request->loai,
                    'ngaytao' => strtotime($request->ngaytao),
                    'ngayhethan' => strtotime($request->ngayhethan)
                ];
                $data = $this->GiamGia->create($data);
        } else {
            return redirect('quantri/giamgia')->with('thatbai', 'Vui lòng kiểm tra ngày tạo phải nhỏ hơn ngày hết hạn');
        }


        return redirect('quantri/giamgia')->with('thanhcong', 'Thêm thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = $this->GiamGia->getAll();
        $mytime = Carbon::now();
        return view('Admin.GiamGia.create', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = $this->GiamGia->find($id);
        return view('Admin.GiamGia.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiamGiaEdit $request, $id)
    {
        if ($request->ngayhethan > $request->ngaytao) {
                $data = [
                    'name' => $request->name,
                    'ma' => $request->ma,
                    'number' => $request->number,
                    'max' => $request->max,
                    'loai' => $request->loai,
                    'ngaytao' => strtotime($request->ngaytao),
                    'ngayhethan' => strtotime($request->ngayhethan)
                ];
                $this->GiamGia->update($id, $data);
        } else {
            return redirect('quantri/giamgia')->with('thatbai', 'Vui lòng kiểm tra ngày tạo phải nhỏ hơn ngày hết hạn');
        }
        return redirect('quantri/giamgia')->with('thanhcong', 'Sửa giảm giá thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasChiTiet = $this->DonHang->getDonHangIdGiamGia($id);
        $CheckHoaDon = $this->HoaDon->getHoaDonBYIdGiamGia($id);
        if (count($hasChiTiet) > 0 && $CheckHoaDon == false) {
            $message=[
                'message'=>"Mã giảm giá đang tồn tại dữ liệu.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        } else {
            $this->GiamGia->delete($id);
            $message=[
                'message'=>"Xóa mã giảm giá thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
    }

    public function CheckGiamGia($name, $gia)
    {
        $checkCode = $this->GiamGia->CheckCODE($name);
        if ($checkCode == false) {
            $giamgia = $this->GiamGia->GetGiamGiaByCODE($name);
            if ($gia >= $giamgia[0]["max"]) {
                $today = date('Y-m-d');
                if (strtotime($today) < $giamgia[0]["ngayhethan"] && strtotime($today) > $giamgia[0]["ngaytao"]) {
                    return $giamgia;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function capnhatgiamgiasession($giam)
    {
        session()->get("tiengiam");
        if ($giam <= 0) {
            session()->forget("tiengiam");
        } else {
            session()->put("tiengiam", $giam);
        }
        return session()->get("tiengiam");
    }
}
