<?php


namespace App\Repositories\YeuThich;


use App\Models\Site\YeuThich;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class YeuThichRepository extends BaseRepository implements YeuThichRepositoryInterface
{
    protected $model;
    public function getModel(){
        return YeuThich::class;
    }
    public function CheckYeuThich($id, $idsanpham){
        return $this->model->select("*")->where('idkhachhang', $id)->where('idsanphamchitiet', $idsanpham)->doesntExist();
    }

    public function DeleteYeuThich($id, $idsanpham){
        return DB::table('yeuthich')->where('idkhachhang', $id)->where('idsanphamchitiet', $idsanpham)->delete();
    }

    public function getAllYeuThich($id){
        return $this->model->select("idsanphamchitiet")->where('idkhachhang', $id)->get();
    }
    public function getYeuThichByIdKhachHang($id){
        return $this->model->select("yeuthich.*", "sanpham.name", "sanpham.img", "sanpham.slug")
            ->join('sanpham', "yeuthich.idsanphamchitiet", "=", "sanpham.id")
            ->where('idkhachhang', $id)
            ->get();
    }
    public function CheckKhachHangInYeuThich($id){
        return $this->model->select("*")->where('idkhachhang', $id)->doesntExist();
    }
    public function CheckSanPhamInYeuThich($id){
        return $this->model->select("*")->where('idsanphamchitiet', $id)->doesntExist();
    }

}
