<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\DichVu\DichVuRepositoryInterface;
use App\Repositories\HoaDon\HoaDonRepositoryInterface;
use App\Repositories\HoaDonChiTiet\HoaDonChiTietRepositoryInterface;
use App\Repositories\NhanVien\NhanVienRepositoryInterface;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepository;
use Illuminate\Http\Request;

class HoaDonChiTietController extends Controller
{
    private $nhanvien;
    private $dichvu;
    private $hoadon;
    private $hoadonchitiet;
    private $coso;
    private $sanphamchitiet;

    public function __construct(SanPhamChiTietRepository $sanphamchitiet, CoSoRepository $coso, HoaDonRepositoryInterface $hoadon, HoaDonChiTietRepositoryInterface $hoadonchitiet, NhanVienRepositoryInterface $nhanvien, DichVuRepositoryInterface $dichvu)
    {
        $this->nhanvien = $nhanvien;
        $this->dichvu = $dichvu;
        $this->hoadon = $hoadon;
        $this->hoadonchitiet = $hoadonchitiet;
        $this->coso = $coso;
        $this->sanphamchitiet = $sanphamchitiet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show hóa đơn chi tiết
     */
    public function show($id)
    {
        $hd = $this->hoadon->find($id);
        $coso = $this->coso->find($hd->idcoso);
        $ThuNgan = $this->nhanvien->find($hd->idthungan);
        $idlieutrinh = $hd->idlieutrinh;
        $TenNhanVien = $this->nhanvien->find($hd->idnhanvien);
        $hdct = $this->hoadonchitiet->getHoaDonCTByIdHoaDon($id);
        return view("Admin.HoaDon.chitiet", ['hoadon' => $hd, 'coso' => $coso, 'hdct' => $hdct, 'thungan' => $ThuNgan, 'TenNhanVien' => $TenNhanVien, 'idlieutrinh' => $idlieutrinh]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    /**
     *Lấy hóa đơn chi tiêt từ id hóa đơn
     */
    public function getHoaDonChiTiet($id)
    {
        $hdct = $this->hoadonchitiet->getHoaDonCTByIdHoaDon($id);
        return $hdct;
    }
    /**
     *Thêm sản phẩm vào hóa đơn chi tiết
     */
    public function ThemSanPhamVaoHoaDon($id, $idsp)
    {
        $checkSpTonTai = $this->hoadonchitiet->CheckSpTonTai($id, $idsp);
        if ($checkSpTonTai == false) {
            $hdct = $this->hoadonchitiet->getHDCT($id, $idsp);
            $soluong = [
                'soluong' => ($hdct[0]->soluong + 1)

            ];
            $this->hoadonchitiet->update($hdct[0]->id, $soluong);
            $thongbao = [
                "thongbao" => 'Thêm thành công'
            ];
            return $thongbao;
        } else {
            $sanphamct = $this->sanphamchitiet->getSanPhamChiTiet($idsp);
            if ($sanphamct[0]->giamgia!=""){
                $dongiasaugiam=($sanphamct[0]->dongia - (($sanphamct[0]->dongia * $sanphamct[0]->giamgia)/100));
            }
            else{
                $dongiasaugiam=$sanphamct[0]->dongia;
            }

            $hoadon = [
                'idhoadon' => $id,
                'idlienquan' => $sanphamct[0]->id,
                'type' => 1,
                'soluong' => 1,
                'dongiatruocgiamgia' => $sanphamct[0]->dongia,
                'dongiasaugiamgia' => $dongiasaugiam
            ];
            $this->hoadonchitiet->create($hoadon);
            $thongbao = [
                "thongbao" => 'Thêm thành công'
            ];
            return $thongbao;
        }

    }
    /**
     *Thêm dịch vụ vào hóa đơn chi tiết
     */
    public function ThemDichVuVaoHoaDon($id, $iddichvu)
    {
        $checkDVTonTai = $this->hoadonchitiet->CheckDVTonTai($id, $iddichvu);
        if ($checkDVTonTai == false) {
            $thongbao = [
                "thongbao" => 'Dịch vụ đã tồn tại !!'
            ];
            return $thongbao;
        } else {
            $dv = $this->dichvu->find($iddichvu);
            if ($dv->giamgia != "") {
                $khuyenmai = $dv->dongia - (($dv->dongia * $dv->giamgia) / 100);
            } else {
                $khuyenmai = $dv->dongia;
            }
            $hoadon = [
                'idhoadon' => $id,
                'idlienquan' => $dv->id,
                'type' => 0,
                'soluong' => 1,
                'dongiatruocgiamgia' => $dv->dongia,
                'dongiasaugiamgia' => $khuyenmai
            ];
            $this->hoadonchitiet->create($hoadon);
            $thongbao = [
                "thongbao" => 'Thêm dịch vụ thành công'
            ];
            return $thongbao;
        }
    }
    /**
     *Cập nhật số lượng sản phẩm hoặc dịch vụ trong hóa đơn chi tiết
     */
    public function CapNhatSoLuong($id, $idhdct, $soluong)
    {
        $sl = ['soluong' => $soluong];
        $this->hoadonchitiet->update($idhdct, $sl);
        return true;
    }
    /**
     *Hủy giảm giá hóa đơn
     */
    public function HuyGiamGia($id, $tien)
    {
        $tien = ['tongtiensaugiamgia' => $tien, 'idgiamgia' => null];
        $this->hoadon->update($id, $tien);
        $thongbao = [
            "thongbao" => 'Hủy giảm giá thành công'
        ];
        return $thongbao;
    }

}
