<?php

namespace App\Repositories\DonHangChiTiet;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\DonHangChitiet;
use App\Repositories\BaseRepository;
class DonHangChiTietRepository extends BaseRepository implements DonHangChiTietRepositoryInterface
{
    protected $model;
    public function getModel(){
        return DonHangChitiet::class;
    }

    public function getDonHangChiTietByIdDonHang($id){
        return $this->model->where('iddonhang','=',$id)->get();
    }

    public function updateDetailByIdDH($id,$data){
        return $this->model->where("id","=",$id)->update($data);
    }

    // public function getDonHangChiTietByIdDonHangInnerJoin($id){
    //     return $this->model->join('donhang', 'donhang.id', '=', 'donhangchitiet.iddonhang')->where('donhang.id','=',$id)->get();

    // }
    public function getDonHangChiTietByIdDonHangInnerJoin($id){
        return $this->model->select('*', DB::raw('donhangchitiet.dongiasaugiamgia * donhangchitiet.soluong as tongtien, donhangchitiet.id as iddonhangchitiet'))
        ->join('sanphamchitiet', 'sanphamchitiet.id', '=', 'donhangchitiet.idsanphamchitiet')
        ->join('sanpham', 'sanpham.id', '=', 'sanphamchitiet.idsanpham')
        ->where('iddonhang','=',$id)->get();
    }

    public function getIdTongthanhtoanByIdDonHangChiTtiet($id) {
        return $this->model->select(DB::raw('SUM(dongiasaugiamgia * soluong) as tongtiendonhang'))
        ->where('iddonhang', '=', $id)
        ->groupBy('iddonhang')
        ->first();
    }

    public function getIdDonHangByIdDonHangChiTtiet($id) {
        return $this->model->select('iddonhang')->find($id);
    }

    public function findDonHangChiTietByIdSanPhamChiTiet($idDonHang){
        return $this->model->where('idsanphamchitiet','=',$idDonHang)->get();
    }



}
