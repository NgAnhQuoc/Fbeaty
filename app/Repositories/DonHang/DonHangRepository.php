<?php

namespace App\Repositories\DonHang;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class DonHangRepository extends BaseRepository implements DonHangRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return \App\Models\Admin\DonHangModel::class;
    }

    public function getDonHangChiTietByIdDonHang($id)
    {
        return $this->model->where('iddonhang', '=', $id)->get();
    }

    public function getKhachHangChiTietByIdDonHang($id)
    {
        return $this->model->where('idkhachhang', '=', $id)->get();
    }

    public function getDonHangIdGiamGia($id)
    {
        return $this->model->where('idgiamgia', "=", $id)->get();
    }

    public function getDonHangAndKhachHangById($id)
    {
        return $this->model->select('khachhang.name', 'khachhang.sdt', 'khachhang.email')
            ->join('khachhang', 'khachhang.id', '=', 'donhang.idkhachhang')->find($id);

    }
    public function getDonHangAndGiamGiaById($id)
    {
        return $this->model->select('giamgia.name as namegiamgia')
            ->join('giamgia', 'giamgia.id', '=', 'donhang.idgiamgia')->find($id);

    }
    public function getDonHangAndDonHangChiTietById()
    {
        return $this->model->select('donhangchitiet.iddonhang as iddonhang1')
            ->join('donhangchitiet', 'donhangchitiet.iddonhang', '=', 'donhang.id')->get();

    }
    public function findDonHangByIdGiamGia($idDonHang)
    {
        return $this->model->select("*")->where('id', '=', $idDonHang)->get();
    }

    public function getNumDonHang($dauNgay, $cuoiNgay)
    {
        return $this->model
            ->whereBetween('created_at', [$dauNgay, $cuoiNgay])
            ->count();
    }

    public function getDoanhThuDonHangHoanThanh($dauNgay, $cuoiNgay)
    {
        return $this->model
            ->whereBetween('created_at', [$dauNgay, $cuoiNgay])
            ->where('trangthai', '=', Controller::TRANGTHAI_DONHANG_DA_NHAN)
            ->sum('tongtiensaugiamgia');
    }

    public function DonHanCuaBan($idtrangthai)
    {
        return $this->model
            ->select("*")
            ->where("trangthai", $idtrangthai)
            ->where("idkhachhang", "=", session()->get('khachHang')->id)
            ->orderBy("id", "DESC")
            ->get();
    }

    public function DonHanCuaBanALL()
    {
        return $this->model
            ->select("*")
            ->where("idkhachhang", "=", session()->get('khachHang')->id)
            ->orderBy("id", "DESC")
            ->get();
    }

    public function CheckDonHangByIdKhachHang($id)
    {
        return $this->model->select("*")
            ->where('idkhachhang', '=', $id)
            ->doesntExist();
    }


}
