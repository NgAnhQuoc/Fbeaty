<?php


namespace App\Repositories\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog;
use App\Http\Requests\BlogEdit;
use Carbon\Carbon;
use App\Models\Admin\BlogModel;
use App\Models\Admin\DanhMucModel;
use App\Repositories\BaseRepository;
use Illuminate\Cache\RateLimiting\Limit;

class BlogRepository extends BaseRepository implements BlogReponsitoryinterface
{
    protected $model;

    public function getModel()
    {
        return BlogModel::class;
    }

    public function getBlog()
    {
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function getAllBlog(){
        return $this->model->select("*")->where("trangthai",1)->get();
    }

    public function getLastWeek1()
    {
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(7);
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc','danhmuc.slug AS slugdm' )
        ->whereDate('blog.created_at','>=', $date->toDateString())
        ->whereDate('blog.created_at','<', $datenow->toDateString())
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(1)
        ->get();
    }
    public function getLastWeek2()
    {
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(7);
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc','danhmuc.slug AS slugdm' )
        ->whereDate('blog.created_at','>=', $date->toDateString())
        ->whereDate('blog.created_at','<', $datenow->toDateString())
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->offset(1)->limit(4)
        ->get();
    }
    public function getBlogmenu()
    {
        return $this->model->limit(3)->orderBy('created_at', 'DESC')
        ->where('blog.trangthai', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->get();
    }
    public function getBlog1()
    {
        return $this->model->select('blog.*','danhmuc.name AS danhmuc','danhmuc.slug AS slugdm')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->offset(3)
        ->limit(1)->orderBy('created_at', 'DESC')->get();
    }
    public function getBlognewtt()
    {
        return $this->model->select('blog.*','danhmuc.name AS danhmuc','danhmuc.slug AS slugdm')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(1)->orderBy('created_at', 'DESC')->get();
    }
    public function getBlog2()
    {
        return $this->model->select('blog.*','danhmuc.name AS danhmuc','danhmuc.slug AS slugdm')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->offset(1)->limit(4)->orderBy('created_at', 'DESC')->get();
    }
    public function getBlognew()
    {
        return $this->model->select('blog.*', 'danhmuc.name AS danhmuc' )
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->offset(1)->limit(2)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
    public function editBlog($slug)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.id AS iddmm','danhmuc.name AS danhmuc','danhmuc.slug AS slugdm')
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->where('blog.slug','=', $slug)
            ->get();
    }
    public function DanhMucBlogdetail($slug)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.id AS iddmm','danhmuc.name AS danhmuc')
            ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
            ->where('blog.slug','=', $slug)
            ->get();
    }
    public function getblogbyiddm($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$id)
        ->get();

    }
    public function getblogbyslugdm($slug)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.id AS iddm','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('danhmuc.slug', '=',$slug)->limit(9)
        ->get();
    }
    public function getblogbyslugdmbt($slug)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.id AS iddmm','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('danhmuc.slug', '=',$slug)
        ->get();
    }
    public function getblogbyiddm2($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$id)->limit(3)->orderBy('id', 'DESC')
        ->get();

    }
    public function getblogbyiddm3($id)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm','=', $id)->limit(4)
        ->get();
    }
    public function updateView($slug)
    {
        $this->model->where('slug','=',$slug)
        ->increment('luotxem');
    }

    public function getblogbyView()
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(3)->orderBy('luotxem', 'DESC')
        ->get();

    }
    public function getblogbyxuhuong()
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->limit(4)->orderBy('luotxem', 'DESC')
        ->get();

    }
    public function getBlogByIdDanhmuc($iddanhmuc, $skip, $take)
    {
        return $this->model->select('blog.*', 'blog.id','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->where('blog.iddm', '=',$iddanhmuc)->skip($skip)->take($take)->orderBy('id', 'DESC')
        ->get();
    }
    public function searchblog($valueSearch){
        return $this->model->select('blog.*','danhmuc.name as tendm')
        ->where('blog.name','LIKE','%'.$valueSearch.'%')
        ->join('danhmuc', 'blog.iddm', '=', 'danhmuc.id')
        ->get();
    }
    public function getblog5(){
        return $this->model->limit(6)
        ->where('blog.trangthai', '=', 1)
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    public function CheckBlogByIdDanhMuc($id){
        return $this->model->select("*")->where('iddm', $id)->doesntExist();
    }
}
