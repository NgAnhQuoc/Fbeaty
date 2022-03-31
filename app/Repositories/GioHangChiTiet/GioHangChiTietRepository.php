<?php


namespace App\Repositories\GioHangChiTiet;


use App\Models\Site\GioHangChiTiet;
use App\Repositories\BaseRepository;

class GioHangChiTietRepository extends BaseRepository implements GioHangChiTietRepositoryInterface
{
    protected $model;
    public function getModel(){
        return GioHangChiTiet::class;
    }
    public function GioHangChiTiet($id){
        return $this->model->select("giohangchitiet.*","sanphamchitiet.*", "sanpham.name", "sanpham.img", "sanpham.giamgia")
            ->join("sanphamchitiet","giohangchitiet.idsanphamchitiet", "=", "sanphamchitiet.id")
            ->join("sanpham","sanphamchitiet.idsanpham", "=", "sanpham.id")
            ->where("giohangchitiet.idgiohang", $id)
            ->get();
    }

    public function CheckGioHangCt($idgiohang, $idsp){
        return $this->model->select("*")->where('idgiohang', $idgiohang)->where('idsanphamchitiet', $idsp)->doesntExist();
    }

    public function GetGioHangCt($idgiohang, $idsp){
        return $this->model->select("*")
            ->where('idgiohang', $idgiohang)
            ->where('idsanphamchitiet', $idsp)
            ->get();
    }

    public function findGioHangChiTietByIdSanPhamChiTiet($idsanphamchitiet){
        return $this->model->select("*")
            ->where('idsanphamchitiet', $idsanphamchitiet)
            ->get();
    }

    public function XoaSanPhamGioHang($idgiohang, $idsanphamct){
        return $this->model->select("*")
            ->where('idgiohang', $idgiohang)
            ->where('idsanphamchitiet', $idsanphamct)
            ->delete();
    }

    public function XoaAllSanPhamGioHang($id){
        return $this->model->select("*")
            ->where('idgiohang', $id)
            ->delete();
    }
}
