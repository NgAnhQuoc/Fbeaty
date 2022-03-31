<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPham;
use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\SanPham\SanPhamRepository;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepository;
use App\Repositories\YeuThich\YeuThichRepository;
use Illuminate\Support\Str;

class SanPhamController extends Controller
{
    private $DanhMuc;
    private $SanPham;
    private $idloai = Controller::LOAI_DANHMUC_SANPHAM;
    private $idThuongHieu = Controller::LOAI_DANHMUC_THUONG_HIEU;
    private $SanPhamChiTiet;
    private $YeuThich;
    public function __construct(DanhMucRepository $DanhMuc,
    SanPhamRepository $SanPham,
    SanPhamChiTietRepository $SanPhamChiTiet,
    YeuThichRepository $YeuThich
    )
    {
        $this->DanhMuc = $DanhMuc;
        $this->SanPham = $SanPham;
        $this->SanPhamChiTiet = $SanPhamChiTiet;
        $this->YeuThich=$YeuThich;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->SanPham->getAll();
        return view('Admin.SanPham.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->DanhMuc->findDanhMucByIdLoai($this->idloai);
        $thuongHieu = $this->DanhMuc->findDanhMucByIdLoai($this->idThuongHieu);

        return view('Admin.SanPham.create',compact('cate','thuongHieu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanPham $request)
    {

        if($request->imgs === null){
            return $this->handleErrorInput('Vui lòng chọn hình ảnh');
        }

        $imgs = $this->uploadMultipleImg($this::PATH_UPLOADS,$request->file('imgs'));

        if($request->session()->get('idSanPham')){
            $idUpdate =  $request->session()->get('idSanPham');
            $data = [
                'iddanhmuc'=>$request->iddanhmuc,
                'idthuonghieu'=> $request->idthuonghieu,
                'name'=> $request->name,
                'slug'=>$this->setSlugUpdate($idUpdate,$request->name),
                "img"=>$imgs,
                'mota'=>$request->mota,
                'noidung'=>$request->noidung,
                'giamgia'=>$request->giamgia,
                "trangthai"=>($request->trangthai ) ? 1 : 0
            ];

            $data = $this->SanPham->update($idUpdate,$data);
            if($data){
                return redirect('/quantri/sanpham/detail/'.$data->id.'/create')->with('idDetail',$data->id);
            }
        }else{
            $data = [
                'iddanhmuc'=>$request->iddanhmuc,
                'idthuonghieu'=> $request->idthuonghieu,
                'name'=> $request->name,
                'slug'=>$this->setSlugStore($this->SanPham,$request->name),
                "img"=>$imgs,
                'mota'=>$request->mota,
                'noidung'=>$request->noidung,
                'giamgia'=>$request->giamgia,
                "trangthai"=>($request->trangthai ) ? 1 : 0
            ];

            $data = $this->SanPham->create($data);
            $request->session()->put('idSanPham', $data->id);
            if($data){
                return redirect('/quantri/sanpham/detail/'.$data->id.'/create')->with('idDetail',$data->id);
            }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = $this->SanPham->find($id);
        $cate  = $this->DanhMuc->getAll();
        $thuongHieu = $this->DanhMuc->findDanhMucByIdLoai($this->idThuongHieu);
        return view("Admin.SanPham.edit",compact('data','cate','thuongHieu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SanPham $request, $id)
    {


        $data = [
            'iddanhmuc'=>$request->iddanhmuc,
            'idthuonghieu'=> $request->idthuonghieu,
            'name'=> $request->name,
            'slug'=>$this->setSlugUpdate($id,$request->name),
            'mota'=>$request->mota,
            'giamgia'=>$request->giamgia,
            'noidung'=>$request->noidung,
            "trangthai"=>$request->trangthai,
        ];

        if($request->imgs !== null){
            $imgs = $this->uploadMultipleImg($this::PATH_UPLOADS,$request->file('imgs'));
            $data['img'] = $imgs;
        }

        $this->SanPham->update($id,$data);
        return redirect('quantri/sanpham')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasChiTiet = $this->SanPhamChiTiet->getSanPhamChiTietByIdSanPham($id);
        $CheckYeuThich=$this->YeuThich->CheckSanPhamInYeuThich($id);
        if(count($hasChiTiet)>0 || $CheckYeuThich==false){
            $message=[
                'message'=>"Sản phẩm đã tồn tại dữ liệu không được xóa.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }else{
            $this->SanPham->delete($id);
            $message=[
                'message'=>"Xóa sản phẩm thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
    }
}
