<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog;
use App\Http\Requests\BlogEdit;
use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private $Blog;
    private $DanhMuc;

    public function __construct(BlogRepository $Blog, DanhMucRepository $DanhMuc)
    {
        $this->Blog = $Blog;
        $this->DanhMuc = $DanhMuc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->Blog->getBlog();
        return view("Admin.Blog.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Blog = $this->Blog->getAll();
        $DanhMuc = $this->DanhMuc->getalledit();
        return view("Admin.Blog.create", ['Blog' => $Blog, 'DanhMuc' => $DanhMuc]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $request)
    {

        $img = $this->uploadSingle($this::PATH_UPLOADS,$request->file('urlHinh'));

            $Blog = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'img' => $img,
                'iddm' => $request->danhmuc,
                'motangan' => $request->motangan,
                'noidung' => $request->noidung,
                'trangthai' => $request->trangthai
            ];

            $this->Blog->create($Blog);
            return redirect('quantri/blog')->with('success', 'Thêm bài viết thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * 1 show
     * 2 up
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DanhMuc = $this->DanhMuc->getalledit();
        $Blog = $this->Blog->find($id);
        return view("Admin.Blog.edit", ['DanhMuc' => $DanhMuc, 'Blog' => $Blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogEdit $request, $id)
    {
            $Blog = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'iddm' => $request->danhmuc,
                'motangan' => $request->motangan,
                'noidung' => $request->noidung,
                'trangthai' => $request->trangthai
            ];

            if($request->urlHinh !== null){
                $img = $this->uploadSingle($this::PATH_UPLOADS,$request->file('urlHinh'));
                if($img == null){
                    $img = 'defaul.jpg';
                }
                $Blog['img'] = $img;
            }

            $this->Blog->update($id, $Blog);
            return redirect('quantri/blog')->with('thanhcong', 'Sửa bài viết thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= $this->Blog->delete($id);
        if ($delete){
            $message=[
                'message'=>"Xóa bài viết thành công",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }else{
            $message=[
                'message'=>"Xóa bài viết thất bại",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }
}
