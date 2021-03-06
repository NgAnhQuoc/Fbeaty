<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DichVu;
use App\Http\Requests\KhachHang;
use App\Http\Requests\LieuTrinh;
use App\Models\Admin\DichVuModel;
use App\Models\Admin\HoaDonModel;
use App\Repositories\DatLich\DatLichRepository;
use App\Repositories\DonHang\DonHangRepository;
use App\Repositories\GioHang\GioHangRepository;
use App\Repositories\HoaDon\HoaDonRepository;
use App\Repositories\HoaDonChiTiet\HoaDonChiTietRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use App\Repositories\LieuTrinh\LieuTrinhRepository;
use App\Repositories\LieuTrinhChiTiet\LieuTrinhChiTietRepository;
use App\Repositories\NhanVien\NhanVienRepository;
use App\Repositories\YeuThich\YeuThichRepository;
use Illuminate\Http\Request;
class KhachHangController extends Controller
{

    private $KhachHang;
    private $LieuTrinh;
    private $HoaDonChiTiet;
    private $HoaDon;
    private $NhanVien;
    private $DatLich;
    private $LieuTrinhChiTiet;
    private $DonHang;
    private $GioHang;
    private $YeuThich;
    public function __construct(
        KhachHangRepository $KhachHang,
        LieuTrinhRepository $LieuTrinh,
        NhanVienRepository $NhanVien,
        LieuTrinhChiTietRepository $LieuTrinhChiTiet,
        HoaDonRepository $HoaDon,
        HoaDonChiTietRepository $HoaDonChiTiet,
        DatLichRepository $DatLich,
        DonHangRepository $DonHang,
        GioHangRepository $GioHang,
        YeuThichRepository $YeuThich
        )
    {
        $this->KhachHang = $KhachHang;
        $this->LieuTrinh = $LieuTrinh;
        $this->NhanVien = $NhanVien;
        $this->LieuTrinhChiTiet = $LieuTrinhChiTiet;
        $this->HoaDon = $HoaDon;
        $this->HoaDonChiTiet = $HoaDonChiTiet;
        $this->DatLich = $DatLich;
        $this->DonHang=$DonHang;
        $this->GioHang=$GioHang;
        $this->YeuThich=$YeuThich;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->KhachHang->getAllCungCoSo(session()->get('coso'));
        return view("Admin.KhachHang.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.KhachHang.create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhachHang $request)
    {
        $idCoSo = $request->session()->get('coso');
        if($this->KhachHang->CheckEmail($request->email) === false && $request->email !== null){
            return $this->handleErrorInput('Email ???? t???n t???i!');
        }

        if($this->KhachHang->CheckSdt($request->sdt) === false && $request->sdt !== null){
            return $this->handleErrorInput('S??? ??i???n tho???i ???? t???n t???i!');
        }

        $img = $this->uploadSingle($this::PATH_UPLOADS_KHACHHANG,$request->file('urlHinh'));
        if($img == null){
            $img = 'defaul.jpg';
        }
        $KhachHang = [
            'name' => $request->name,
            'email' => $request->email,
            'idcoso' =>$idCoSo,
            'password' => bcrypt($request->password),
            'sdt' => $request->sdt,
            'img' => $img,
            'active' => ($request->active) ? 1 : 0
        ];
        $res = $this->KhachHang->create($KhachHang);
        if($res){
            return redirect('quantri/khachhang')->with('thanhcong', 'Th??m nh??n vi??n th??nh c??ng');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * T???i ???nh kh??ch h??ng l??n
     * 1 show
     * 2 up
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $KhachHang = $this->KhachHang->find($id);
        return view("Admin.KhachHang.edit", ['KhachHang' => $KhachHang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(KhachHang $request, $id)
    {

        $password = $request->password;
        $passnew = "";
        if ($password == null) {
            $passnew = $request->passcu;
        } else {
            $passnew = bcrypt($password);
        }
        $KhachHang = [
            'name' => $request->name,
            'email' => $request->email,
            'idcoso' => session()->get('coso'),
            'password' => $passnew,
            'sdt' => $request->sdt,
            'active' => ($request->active) ? 1 : 0,
        ];
        if($request->urlHinh !== null){
            $img = $this->uploadSingle($this::PATH_UPLOADS_KHACHHANG,$request->file('urlHinh'));
             if($img == null){
                $img = 'defaul.jpg';
            }
            $KhachHang['img'] = $img;
        }
        $this->KhachHang->update($id, $KhachHang);
        return redirect('quantri/khachhang')->with('thanhcong', 'S???a nh??n vi??n th??nh c??ng');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CheckHoaDon = $this->HoaDon->CheckHoaDonByIdKhachHang($id);
        $CheckLieuTrinh = $this->LieuTrinh->CheckLieuTrinhByIdKhachHang($id);
        $CheckDonHang = $this->DonHang->CheckDonHangByIdKhachHang($id);
        $CheckDatLich = $this->DatLich->CheckDatLichByIdKhachHang($id);
        $CheckGioHang =$this->GioHang->CheckKhachHangInGioHang($id);
        $CheckYeuThich=$this->YeuThich->CheckKhachHangInYeuThich($id);
        if($CheckHoaDon == true && $CheckLieuTrinh == true && $CheckDonHang == true && $CheckDatLich == true && $CheckGioHang == true && $CheckYeuThich){
            $this->KhachHang->delete($id);
            $message=[
                'message'=>"X??a kh??ch h??ng th??nh c??ng.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }else{
            $message=[
                'message'=>"Kh??ch h??ng ???? t???n t???i d??? li???u kh??ng ???????c x??a.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }


    public function detailKhachHang($id){
        $KhachHang = $this->KhachHang->find($id);

        if($KhachHang->idcoso != session()->get('coso')){
            return redirect('quantri/khachhang');
        }
        $LieuTrinh =  $this->LieuTrinh->findLieuTrinhByIdKh($KhachHang->id);

        $NhanVien = $this->NhanVien->getAll();
        $countLieuTrinhChiTiet = count($LieuTrinh);
        $DichVuDaSuDung = $this->HoaDonChiTiet->findDichVuByIdKhachHang($id);
        $DatLich = $this->DatLich->findDatLichByIdKhachHangInnerJoin($KhachHang->id);

        return view('Admin.KhachHang.detail',compact('KhachHang','LieuTrinh','NhanVien','countLieuTrinhChiTiet','DichVuDaSuDung','DatLich'));
    }

    public function storeLieuTrinh(LieuTrinh $request){

        $data = [
            'idnhanvien' => $request->idnhanvien,
            'idkhachhang' => $request->id,
            'ngaybatdau' => strtotime($request->ngaybatdau),
            'dukienketthuc' => strtotime($request->dukienketthuc),
            'ghichu' => $request->ghichu,
            'trangthai' => 0,
        ];

        $res = $this->LieuTrinh->create($data);
        if($res){
           return redirect()->back();
        }else{
           return $this->handleError('C?? l???i khi th??m');
        }
    }

    public function updateLieuTrinh(Request $request,$id){

        $data = [
            'idnhanvien' => $request->idnhanvien,
            'ngaybatdau' => strtotime($request->ngaybatdau),
            'dukienketthuc' => strtotime($request->dukienketthuc),
            'ghichu' => $request->ghichu,
        ];
        $res = $this->LieuTrinh->update($id,$data);
        if($res){
            return redirect('quantri/khachhang/detail/'. $request->idkhachhang.'');
        }else{
           return $this->handleError('C?? l???i khi s???a');
        }
    }

    public function delLieuTrinh($id){

        $hasLieuTrinhChiTiet =  $this->LieuTrinhChiTiet->findLieuTrinhChiTietByIdLieuTrinh($id);
        $findHoaDon = $this->HoaDon->findHoaDonByIdLieuTrinh($id);
        if(count($hasLieuTrinhChiTiet)>0){
            return $this->handleError('Kh??ng th??? xo?? v?? ???? t???n t???i li???u tr??nh chi ti???t. Vui l??ng xo?? li???u tr??nh chi ti???t tr?????c!');
         }elseif(count($findHoaDon)){
            return $this->handleError('Kh??ng th??? xo?? v?? li???u tr??nh ???? thanh to??n!');
         }
         else{

            $res = $this->LieuTrinh->delete($id);
            return redirect()->back();
         }
    }

    public static function checkHoaDon($idLieuTrinh){
        $findHoaDon = HoaDonModel::findHoaDonByIdLieuTrinh($idLieuTrinh);
        if($findHoaDon && $findHoaDon->trangthai === 1){
            return true;
        }else{
            return false;
        }
    }

    public static function findDichVuByIds($ids){
        $ids = json_decode($ids);
        $array = [];
        for ($i=0; $i < count($ids); $i++) {
            array_push($array,DichVuModel::find($ids[$i]) ? DichVuModel::find($ids[$i])->name: '');
        }
        return implode(", ",$array);
    }



}
