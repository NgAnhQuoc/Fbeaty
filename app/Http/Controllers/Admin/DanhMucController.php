<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\DichVu\DichVuRepository;
use App\Repositories\SanPham\SanPhamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\DanhMuc;
use App\Http\Requests\DanhMucEdit;

class DanhMucController extends Controller
{
    private $DanhMuc;
    private $Blog;
    private $SanPham;
    private $DichVu;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(DanhMucRepository $DanhMuc, BlogRepository $Blog, SanPhamRepository $SanPham, DichVuRepository $DichVu)
    {
        $this->DanhMuc = $DanhMuc;
        $this->Blog = $Blog;
        $this->SanPham = $SanPham;
        $this->DichVu = $DichVu;
    }
    public function index()
    {
        $data = $this->DanhMuc->getAll();
        return view('Admin.DanhMuc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DanhMuc $request)
    {

        $img =  $this->uploadSingle($this::PATH_UPLOADS,$request->img);
        $data = [
            'name'=> $request->name,
            'img'=> $img,
            'slug'=>Str::slug($request->name),
            'loai'=>$request->loai
        ];

        $this->DanhMuc->create($data);
        return redirect('quantri/danhmuc')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = $this->DanhMuc->find($id);
        return view('Admin.DanhMuc.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DanhMucEdit $request, $id)
    {
        $data = [
            'name'=> $request->name,
            'slug'=>Str::slug($request->name),
            'loai'=>$request->loai
        ];

        if($request->img){
            $img =  $this->uploadSingle($this::PATH_UPLOADS,$request->img);
            $data['img'] = $img;
        }

        $this->DanhMuc->update($id,$data);

        return redirect('quantri/danhmuc')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CheckDanhMucBlog=$this->Blog->getblogbyiddm($id);
        $CheckDanhMucDichVu=$this->DichVu->CheckDichVuByIdDanhMuc($id);
        $CheckDanhMucSanPham=$this->SanPham->CheckSanPhamByIdDanhMuc($id);

        if (empty($CheckDanhMucBlog) == false && empty($CheckDanhMucDichVu) == false && empty($CheckDanhMucSanPham) == false){
            $this->DanhMuc->delete($id);
            $message=[
                'message'=>"Xóa danh mục thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
        else{
            $message=[
                'message'=>"Danh mục đã tồn tại dữ liệu.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }
}
