<?php


namespace App\Repositories\DanhMuc;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;

class DanhMucRepository extends BaseRepository implements DanhMucRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->setModel();
    }

    public function getModel(){
        return \App\Models\Admin\DanhMuc::class;
    }
    public function getAllDanhMuc(){
        return $this->model->select('danhmuc.*')->limit(5)
        ->where('danhmuc.loai', '=', 3)
        ->get();
    }
    public function getAllDanhMucchitiet($skip, $take){
        return $this->model->select('danhmuc.*')->limit(12)
        ->where('danhmuc.loai', '=', 3)
        ->skip($skip)->take($take)->orderBy('id', 'DESC')
        ->get();
    }
    public function getall(){
        return $this->model->select('danhmuc.*')
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function getalledit(){
        return $this->model->select('danhmuc.*')
        ->where('danhmuc.loai', '=', 3)
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function getalldvdm(){
        return $this->model->select('danhmuc.*')
        ->where('danhmuc.loai', '=', 1)
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function getall2danhmuc(){
        return $this->model->select('danhmuc.*')->limit(1)
        ->where('danhmuc.loai', '=', 3)
        ->get();
    }
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function findDanhMucByIdLoai($idLoai){
        return $this->model->select("*")->where("loai","=",$idLoai)->get();
    }
    public function getdanhmucshow(){
        return $this->model
        ->offset(1)->limit(3)
        ->where('danhmuc.loai', '=', 1)
        ->orderBy('id', 'DESC')

        ->get();
    }
    public function idDanhMucgetDichvu($id){
        return $this->model->select('danhmuc.*','dichvu.name as namedv','dichvu.slug as slugdv','dichvu.motangan as motangandv','dichvu.img as imgdv','dichvu.dongia as dongiadv','dichvu.img as imgdv')
        ->join('dichvu','dichvu.iddm','=','danhmuc.id')
        ->where('dichvu.trangthai', '=', 1)
        ->where('danhmuc.id', '=', $id)
        ->get();
    }
    public function idDanhMucbyslug($slug){
        return $this->model->select('danhmuc.*')
        ->where('danhmuc.slug', '=', $slug)
        ->get();
    }

    public function getDanhMucLimit($limit){
        return $this->model->select('danhmuc.*')
        ->where('loai', '=', Controller::LOAI_DANHMUC_DICHVU)
        ->limit($limit)
        ->get();
    }

    public function getAllDanhMucDichVu(){
        return $this->model->select('danhmuc.*')
        ->where('loai', '=', Controller::LOAI_DANHMUC_DICHVU)
        ->limit(9)
        ->get();
    }

    public function getDanhMucLimitBlog($limit){
        return $this->model->select('*')
        ->where('loai', '=', Controller::LOAI_DANHMUC_BLOG)
        ->limit($limit)
        ->get();
    }
}
