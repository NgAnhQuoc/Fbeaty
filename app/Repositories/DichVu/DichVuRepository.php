<?php


namespace App\Repositories\DichVu;

use App\Http\Controllers\Controller;
use App\Models\Admin\DichVu;
use App\Models\Admin\DichVuModel;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DichVuRepository extends BaseRepository implements DichVuRepositoryInterface
{
    public function getModel()
    {
        return DichVu::class;
    }
    public function getDichVu()
    {

    }

    public function editDichVu($id)
    {
        return $this->model->select('dichvu.*', 'dichvu.id','danhmuc.name AS danhmuc')
            ->join('danhmuc', 'dichvu.iddm', '=', 'danhmuc.id')
            ->where('dichvu.id', $id)->limit(10)
            ->get();

    }

    public function getDichVuTheoDanhMuc($iddanhmuc)
    {
        return $this->model->where('iddm', $iddanhmuc)->get();
    }

    public function search($valueSearch){
        return $this->model->select('danhmuc.name as namedm',
        'dichvu.*')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->where('dichvu.name','LIKE','%'.$valueSearch.'%')->get();
    }

    public function dichVuInerjoinDanhMuc(){
        return $this->model->select('dichvu.*','danhmuc.name as namedm')->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function getDichVuByID($iddv){
        return $this->model->select("*")->where('id', '=', $iddv)->get();
    }
    public function getDichVu2(){
        return $this->model->select('dichvu.*','danhmuc.name as namedm')->join('danhmuc','dichvu.iddm','=','danhmuc.id')->where('dichvu.trangthai', '=', 1)->get();
    }

    public function getDichVubyGiamGia(){
        return $this->model->select('dichvu.*','danhmuc.name as namedm','danhmuc.img as icon')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->offset(1)->limit(3)
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('danhmuc.loai', '=', Controller::LOAI_DANHMUC_DICHVU)
        ->orderBy('giamgia', 'DESC')
        ->get();
    }

    public function getDichVusite(){
        return $this->model->select('dichvu.*','danhmuc.name as namedm','dichvu.img as imgdv','dichvu.dongia as dongiadv')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->offset(1)->limit(3)
        ->where('dichvu.trangthai', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    public function getDichVuall(){
        return $this->model->select('dichvu.*','danhmuc.name as namedm')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->offset(1)->limit(3)
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->orderBy('id', 'DESC')
        ->get();

    }

    public function dichvudetail($slug){
        return $this->model->select('dichvu.*','danhmuc.name as namedm')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('dichvu.slug', '=', $slug)
        ->first();
    }

    public function  getdichvujoindanhmuc($slug){
        return $this->model->select('dichvu.*','danhmuc.name as namedm')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('dichvu.slug', '=', $slug)
        ->get();
    }

    public function  getDichvuJoinDanhMucSlug($slug , $limit){
        return $this->model->select("dichvu.*", "danhmuc.name AS namedm")
            ->join("danhmuc", "dichvu.iddm", "=", "danhmuc.id")
            ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
            ->where('danhmuc.loai', '=', Controller::LOAI_DANHMUC_DICHVU)
            ->where('dichvu.iddm', '=', $slug)
            ->limit($limit)
            ->get();
    }

    public function getDichVuByIdDanhMuc($idDanhMuc, $limit){
        return $this->model->select('dichvu.*','danhmuc.name as namedm','danhmuc.id as iddanhmuc','danhmuc.slug as slugdm')
        ->join('danhmuc','dichvu.iddm','=','danhmuc.id')
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('danhmuc.loai', '=', Controller::LOAI_DANHMUC_DICHVU)
        ->where('dichvu.iddm', '=', $idDanhMuc)
        ->limit($limit)
        ->get();
    }
    public function getdichvuiddanhmuc($slug ,$limit)
    {
        return $this->model->select('dichvu.*', 'dichvu.id','danhmuc.id AS iddm','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'dichvu.iddm', '=', 'danhmuc.id')
        ->where('danhmuc.slug', '=',$slug)
        ->limit($limit)
        ->get();
    }

    public function getAllDichVu(){
        return $this->model->select("*")->where("trangthai",Controller::TRANGTHAI_DICHVU_HIEN)->get();
    }

    public function findDichVuById($id){
        return $this->model->find($id);
    }

    public function GetDichvuLienQuan($id){
        return $this->model->select('dichvu.*', 'danhmuc.name AS tendm', 'danhmuc.img as icon')
            ->join("danhmuc", "dichvu.iddm", "=", "danhmuc.id")
            ->where('dichvu.iddm', $id)
            ->where('dichvu.trangthai', Controller::TRANGTHAI_DICHVU_HIEN)
            ->limit(4)
            ->get();
    }

    public function GetDichvuLienQuanKhacIDDM($id){
            return $this->model->select('dichvu.*', 'danhmuc.name AS tendm')
            ->join("danhmuc", "dichvu.iddm", "=", "danhmuc.id")
            ->where('dichvu.iddm', '!=' , $id)
            ->where('dichvu.trangthai', Controller::TRANGTHAI_DICHVU_HIEN)
            ->limit(8)
            ->get();
    }

    public function getLastWeekdichvu()
    {
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date =  Carbon::now('Asia/Ho_Chi_Minh')->subMonths(1);
        return $this->model->select('dichvu.*', 'danhmuc.name AS danhmuc' ,'danhmuc.img as icon')
        ->whereDate('dichvu.created_at','>=', $date->toDateString())
        ->whereDate('dichvu.created_at','<', $datenow->toDateString())
        ->join('danhmuc', 'dichvu.iddm', '=', 'danhmuc.id')
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('danhmuc.loai', '=', Controller::LOAI_DANHMUC_DICHVU)
        ->orderBy('id', 'DESC')
        ->limit(3)
        ->get();
    }

    public function getDichvuAndDanhMucById($id){
        return $this->model->select("dichvu.*", "danhmuc.name AS namedm", 'danhmuc.img as icon')
            ->join("danhmuc", "dichvu.iddm", "=", "danhmuc.id")
            ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
            ->where('dichvu.id', '=', $id)
            ->first();
    }

    public function getDichVuGiamGiaAndDanhMuc($take, $skip) {
        return $this->model->select("dichvu.*", "danhmuc.name AS namedm", 'danhmuc.img as icon')
        ->join("danhmuc", "dichvu.iddm", "=", "danhmuc.id")
        ->where('dichvu.trangthai', '=', Controller::TRANGTHAI_DICHVU_HIEN)
        ->where('giamgia', '>', 0)
        ->skip($skip)->take($take)
        ->orderBy('dichvu.id')
        ->get();
    }

    public function CheckDichVuByIdDanhMuc($id)
    {
        return $this->model->select("*")->where('iddm', $id)->doesntExist();
    }

    public function getAllPagination() {
        return $this->model->paginate(6);
    }
}
