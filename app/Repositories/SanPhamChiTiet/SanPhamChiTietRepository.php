<?php


namespace App\Repositories\SanPhamChiTiet;
use App\Repositories\BaseRepository;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepositoryInterface;
class SanPhamChiTietRepository extends BaseRepository implements SanPhamChiTietRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->setModel();
    }

    public function getModel(){
        return \App\Models\Admin\SanPhamChiTiet::class;
    }

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getSanPhamChiTietByID($id){
        return $this->model->where("idsanpham","=",$id)->get();
    }
    public function CheckSanPhamChiTietByID($id){
        return $this->model->select("*")->where("idsanpham","=",$id)->doesntExist();
    }

    public function getSanPhamChiTietByIDLimit($id){
        return $this->model->where("idsanpham","=",$id)->limit(1)->get();
    }


    public function delDetailByIdSp($id){
       return $this->model->where("idsanpham","=",$id)->delete();
    }

    public function getSanPhamChiTietByIdSanPham($id){
        return $this->model->where('idsanpham',"=",$id)->get();
    }

    public function getSanPhamChiTietToHoaDon(){
        return $this->model->select('sanphamchitiet.*', 'sanpham.name', 'sanpham.giamgia')
            ->join('sanpham', 'sanphamchitiet.idsanpham', '=', 'sanpham.id')
            ->orderBy('sanphamchitiet.idsanpham', 'desc')
            ->get();
    }

    public function getSanPhamChiTiet($idsp){
        return $this->model->select('sanphamchitiet.*', 'sanpham.name', 'sanpham.giamgia', 'sanpham.img')
            ->join('sanpham', 'sanphamchitiet.idsanpham', '=', 'sanpham.id')
            ->where('sanphamchitiet.id', '=', $idsp)
            ->get();
    }


}
