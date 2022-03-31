<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner;
use App\Http\Requests\BannerEdit;
use App\Repositories\Banner\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $Banner;
    private $data=array();
    public function __construct(BannerRepository $Banner)
    {
        $this->Banner=$Banner;
    }

    /**
     * Show danh sách banner
     */
    public function index()
    {
        $this->data["banner"]=$this->Banner->getAll();
        return view("Admin.Banner.index", $this->data);
    }

    /**
     * chuyển hướng đến trang tạo banner
     */
    public function create()
    {
        return view("Admin.Banner.create");
    }

    /**
     * Thêm Banner
     */
    public function store(Banner $request)
    {
        $img = $request->file('urlHinh');
        $extension = $img->getClientOriginalExtension();
        if ($this->checkImgBanner($extension, $img) == true) {
            $mang=[
                'tieude'=>$request->tieude,
                'noidung'=>$request->noidung,
                'img'=>$_FILES["urlHinh"]["name"],
                'AnHien'=>$request->anhien,
            ];
            $this->Banner->create($mang);
            return redirect(route("banner.index"))->with('thanhcong', 'Thêm banner thành công');
        } else {
            return redirect(route("banner.create"))->with('thatbai', 'Ảnh không đúng định dạng');
        }
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
     * Sửa banner
     */
    public function edit($id)
    {
        $this->data['banner']=$this->Banner->find($id);
        return view("Admin.Banner.edit", $this->data);
    }

    /**
     * Cập nhật banner
     */
    public function update(BannerEdit $request, $id)
    {
        $img = $request->file('urlImg');
        if ($img!=null){
            $extension = $img->getClientOriginalExtension();
            if ($this->checkImgBanner($extension, $img) == true) {
                $mang=[
                    'tieude'=>$request->tieude,
                    'noidung'=>$request->noidung,
                    'img'=>$_FILES["urlImg"]["name"],
                    'AnHien'=>$request->anhien,
                ];
                $this->Banner->update($id,$mang);
                return redirect(route("banner.index"))->with('thanhcong', 'Cập nhật banner thành công');
            } else {
                return redirect(route("banner.edit", $id))->with('thatbai', 'Ảnh không đúng định dạng.');
            }
        }
        else{
            $mang=[
                'tieude'=>$request->tieude,
                'noidung'=>$request->noidung,
                'AnHien'=>$request->anhien,
            ];
            $this->Banner->update($id,$mang);
            return redirect(route("banner.index"))->with('thanhcong', 'Cập nhật thông tin thành công');
        }

    }

    /**
     * Xóa
     */
    public function destroy($id)
    {
        $delete=$this->Banner->delete($id);
        if ($delete){
            $message=[
                'message'=>"Xóa banner thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }else{
            $message=[
                'message'=>"Xóa banner thất bại.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }
}
