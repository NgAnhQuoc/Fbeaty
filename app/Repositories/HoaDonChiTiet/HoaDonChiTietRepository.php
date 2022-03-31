<?php


namespace App\Repositories\HoaDonChiTiet;


use App\Http\Controllers\Controller;
use App\Models\Admin\HoaDonChiTietModel;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
class HoaDonChiTietRepository extends BaseRepository implements HoaDonChiTietRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return HoaDonChiTietModel::class;
    }

    public function getHoaDonCTByIdHoaDon($id){
        return $this->model->select("hoadonchitiet.*", "hoadon.idgiamgia")
            ->join('hoadon', 'hoadonchitiet.idhoadon', '=', 'hoadon.id')
            ->where('hoadonchitiet.idhoadon', '=', $id)
            ->get();
    }

    public function CheckSpTonTai($id, $idsp){
        return $this->model->select("*")
            ->where('hoadonchitiet.idhoadon', '=', $id)
            ->where('hoadonchitiet.idlienquan', '=', $idsp)
            ->where('hoadonchitiet.type', '=', Controller::DONHANG_TYPE_SANPHAM)
            ->doesntExist();
    }

    public function findHoaDonChiTietByIdSanPhamChiTiet($id){
        return $this->model->select("*")
            ->where('hoadonchitiet.idlienquan', '=', $id)
            ->where('hoadonchitiet.type', '=', Controller::DONHANG_TYPE_SANPHAM)
            ->doesntExist();
    }

    public function CheckDVTonTai($id, $iddv){
        return $this->model->select("*")
            ->where('hoadonchitiet.idhoadon', '=', $id)
            ->where('hoadonchitiet.idlienquan', '=', $iddv)
            ->where('hoadonchitiet.type', '=', Controller::DONHANG_TYPE_DICHVU)
            ->doesntExist();
    }

    public function getHDCT($id, $idsp){
        return $this->model->select("*")
            ->where('hoadonchitiet.idhoadon', '=', $id)
            ->where('hoadonchitiet.idlienquan', '=', $idsp)
            ->where('hoadonchitiet.type', '=', Controller::DONHANG_TYPE_SANPHAM)
            ->get();
    }

    public function getDV($id, $iddv){
        return $this->model->select("*")
            ->where('hoadonchitiet.idhoadon', '=', $id)
            ->where('hoadonchitiet.idlienquan', '=', $iddv)
            ->where('hoadonchitiet.type', '=', Controller::DONHANG_TYPE_DICHVU)
            ->get();
    }

    public function findDichVuByIdKhachHang($id){
        return $this->model->select("dichvu.name",'dichvu.img',
        'dichvu.motangan',
        'dichvu.dongia',
        'dichvu.giamgia')
        ->join('dichvu','hoadonchitiet.idlienquan','=','dichvu.id')
        ->join('hoadon','hoadon.id','=','hoadonchitiet.idhoadon')
        ->where('hoadonchitiet.type','=',Controller::DONHANG_TYPE_DICHVU)
        ->where('hoadon.idkhachhang','=',$id)
        ->get();
    }

    public function getHoaDonCTByTime($start, $end, $skip, $take) {
        return $this->model->select('idlienquan', DB::raw('COUNT(idlienquan) as count'))
        ->where('type', '=', Controller::ID_LIENQUAN_DV_)
        ->whereBetween('created_at', [$start, $end])
        ->groupBy('idlienquan')
        ->orderBy('count', 'desc')
        ->skip($skip)->take($take)
        ->get();
    }

}
