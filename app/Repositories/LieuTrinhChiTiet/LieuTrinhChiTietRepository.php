<?php


namespace App\Repositories\LieuTrinhChiTiet;

use App\Models\Admin\LieuTrinhChiTietModel;
use App\Repositories\BaseRepository;

use App\Repositories\LieuTrinhChiTiet\LieuTrinhChiTietRepositoryInterface;
use Carbon\Carbon;
class LieuTrinhChiTietRepository extends BaseRepository implements LieuTrinhChiTietRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->setModel();
    }
    
    public function getModel()
    {
        return LieuTrinhChiTietModel::class;
    }
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function getLieuTrinhChiTietInnerJoin($id){
        return 
        $this->model->select("dichvu.img as imgdichvu",
        "dichvu.name as tendv",
        "nhanvien.name as tennv",
        "nhanvien.avatar as imgnv",
        "dichvu.motangan as motadv",
        "dichvu.giamgia",
        "dichvu.dongia",
        "lieutrinhchitiet.ngay",
        "lieutrinhchitiet.ghichu",
        "lieutrinhchitiet.trangthai",
        "lieutrinhchitiet.imgkhachhang",
        "lieutrinhchitiet.id as idlieutrinhchitiet",
        "lieutrinhchitiet.idlieutrinh as idlieutrinh",
        "lieutrinhchitiet.iddichvu",
        )
        ->join('dichvu', 'lieutrinhchitiet.iddichvu', '=', 'dichvu.id')
        ->join('nhanvien','lieutrinhchitiet.idnhanvien','=','nhanvien.id')
        ->where('idlieutrinh','=',$id)->get();
    }   

    public function selectDate(){
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->model->select("idlieutrinh","id")->whereDate('created_at', '=', $dt->toDateString())->get();
    }

    public function findLieuTrinhChiTietByIdLieuTrinh($id){
        return $this->model->where('idlieutrinh','=',$id)->get();
    }

    
}

