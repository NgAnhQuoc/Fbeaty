<?php


namespace App\Repositories\GioHang;


use App\Models\Site\GioHang;
use App\Repositories\BaseRepository;

class GioHangRepository extends BaseRepository implements GioHangRepositoryInterface
{
    protected $model;
    public function getModel(){
        return GioHang::class;
    }

    public function CheckKhachHangInGioHang($id){
        return $this->model->select("*")->where('idkhachhang', $id)->doesntExist();
    }

    public function GioHangDB($id){
        return $this->model->select("*")->where('idkhachhang', $id)->get();
    }
}
