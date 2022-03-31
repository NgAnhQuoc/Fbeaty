<?php


namespace App\Repositories\DatLich;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use App\Repositories\BaseRepository;
use App\Models\Admin\DatLichModel;
use App\Models\Admin\DichVuModel;
use App\Repositories\DatLich\DatLichRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DatLichRepository extends BaseRepository implements DatLichRepositoryInterface
{
    protected $model;
    public function getModel()
    {
        return DatLichModel::class;
    }

    public function getAllCungCoSo($idCoSo)
    {
        return $this->model->select('datlich.*', 'datlich.id','dichvu.name AS dichvu','nhanvien.name AS nhanvien','khachhang.name AS khachhang')
        // ->join('dichvu','datlich.iddichvu', '=', 'dichvu.id')
        // ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
        // ->join('khachhang','datlich.idkhachhang', '=', 'khachhang.id')
        ->where('datlich.idcoso', $idCoSo)
        ->get();
    }
    public function getAll2CungCoSo($idCoSo){
        // $getall = $this->model->s
        // elect('dichvu')->value("name")->first();
        // dd($getall)
        $date = Carbon::now('Asia/Ho_Chi_Minh');

        return $this->model->select('datlich.*', 'datlich.id','nhanvien.name as namenv','khachhang.name as namekh')

        // ->join('dichvu','datlich.iddichvu', '=', 'dichvu.id')
        ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
        ->join('khachhang','datlich.idkhachhang', '=', 'khachhang.id')
        // ->join('khachhang','datlich.idkhachhang', '=', 'khachhang.id')
        ->where('datlich.idcoso', '=',$idCoSo)
        ->whereDate('datlich.created_at','=', $date->toDateString())
        ->get();
    }

    public function getdv(){
        return DichVuModel::class;
    }
    public function active($id){
        return $this->model->select('*')
        ->where('datlich.id', $id)
        ->get();
    }

    public function findDatLichCuaNhanVienTheoThoiGian($thoiGianDat, $idNhanVien)
    {
        return $this->model::where([
            ['idnhanvien', '=', $idNhanVien],
            ['thoigiandat', '=', $thoiGianDat]
        ])->first();
    }

    public function getSoLanKhachDatByTimeStamp($thoiGianDat)
    {
        return $this->model::where([
            ['thoigiandat', '=', $thoiGianDat]
        ])->count();
    }

    public function getDatLichCungCoSo($idCoSo)
    {
        return $this->model->select('*')
        ->where('datlich.idcoso', $idCoSo)
        ->get();
    }

    public function getNumDatLichByTime($timeStampDauNgay, $timeStampCuoiNgay, $idCoSo) {
        return $this->model
        ->where('thoigiandat', '>', $timeStampDauNgay)
        ->where('thoigiandat', '<', $timeStampCuoiNgay)
        ->where('idcoso', '=', $idCoSo)
        ->count();
    }

    public function findDatLichByIdKhachHangInnerJoin($id){
        return $this->model
        ->select(
        'khachhang.name as tenkh',
        'khachhang.img',
        'datlich.thoigiandat',
        'datlich.iddichvu',
        'datlich.id as iddatlich'
        )
        ->where('idkhachhang','=',$id)
        ->join('khachhang','khachhang.id','=','datlich.idkhachhang')
        ->orderBy('datlich.id','DESC')->get();
    }

    public function getDatLichByDay($timeStampDauNgay, $timeStampCuoiNgay, $idCoSo) {
        return $this->model->select('datlich.*', 'datlich.id','khachhang.name as namekh')
        ->join('khachhang','datlich.idkhachhang', '=', 'khachhang.id')
        ->whereBetween('datlich.thoigiandat', [$timeStampDauNgay, $timeStampCuoiNgay])
        ->where('datlich.idcoso', '=', $idCoSo)
        ->get();
    }

    public function getDatLichById($id) {
        return $this->model->select('datlich.*', 'datlich.id','khachhang.name as namekh', 'khachhang.sdt')
        ->join('khachhang','datlich.idkhachhang', '=', 'khachhang.id')
        ->where('datlich.id', '=', $id)
        ->first();
    }


    public function getDatLichByIdKhachHang($idKhachHang) {
        return $this->model->where('idkhachhang', '=', $idKhachHang)->get();
    }

    // public function getDatLichByIdnhanvien($idNhanVien) {
    //     return $this->model->where('idnhanvien', '=', $idNhanVien)->get();
    // }
    // public function getDatLichByIdnhanvien($idNhanVien) {
    //     return $this->model->select('datlich.*', 'nhanvien.id as idnhanvien')
    //     ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
    //     ->where('nhanvien.id', '=', $idNhanVien)
    //     ->get();
    // }

    public function getDatLichByIdKhachHangAndThoiGianDat($idKhachHang, $start, $end) {
        return $this->model->select('datlich.*', 'datlich.id','coso.diachi as diachicoso')
        ->join('coso','datlich.idcoso', '=', 'coso.id')
        ->whereBetween('thoigiandat', [$start, $end])
        ->where('idkhachhang', '=', $idKhachHang)
        ->get();
    }
    public function getDatLichByIdKhachHangAndThoiGianDat1($idKhachHang, $start, $end) {
        return $this->model->select('datlich.*', 'datlich.id','coso.diachi as diachicoso','nhanvien.name as namenhanvien')
        ->join('coso','datlich.idcoso', '=', 'coso.id')
        ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
        ->whereBetween('thoigiandat', [$start, $end])
        ->where('idkhachhang', '=', $idKhachHang)
        ->where('datlich.trangthai', Controller::DATLICH_HOANTHANH)
        ->get();
    }
    public function getDatLichByIdKhachHangAndThoiGianDat2($idKhachHang, $start, $end) {
        return $this->model->select('datlich.*', 'datlich.id','coso.diachi as diachicoso','nhanvien.name as namenhanvien')
        ->join('coso','datlich.idcoso', '=', 'coso.id')
        ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
        ->whereBetween('thoigiandat', [$start, $end])
        ->where('idkhachhang', '=', $idKhachHang)
        ->where('datlich.trangthai', Controller::DATLICH_CHUADEN)
        ->get();
    }
    public function getDatLichByIdKhachHangAndThoiGianDat3($idKhachHang, $start, $end) {
        return $this->model->select('datlich.*', 'datlich.id','coso.diachi as diachicoso','nhanvien.name as namenhanvien')
        ->join('coso','datlich.idcoso', '=', 'coso.id')
        ->join('nhanvien','datlich.idnhanvien', '=', 'nhanvien.id')
        ->whereBetween('thoigiandat', [$start, $end])
        ->where('idkhachhang', '=', $idKhachHang)
        ->where('datlich.trangthai', Controller::DATLICH_HUY)
        ->get();
    }

    public function CheckDatLichByIdKhachHang($id){
        return  $this->model->select("*")
            ->where('idkhachhang', '=', $id)
            ->doesntExist();
    }
}
