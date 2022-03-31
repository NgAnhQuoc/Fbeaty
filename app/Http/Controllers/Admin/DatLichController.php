<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\DichVu\DichVuRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use App\Repositories\DatLich\DatLichRepository;
use App\Repositories\NhanVien\NhanVienRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DatLichController extends Controller
{
    private $CoSo;
    private $DatLich;
    private $DichVu;
    private $KhachHang;
    private $NhanVien;
    private $idCoSo = 1;

    public function __construct(CoSoRepository $CoSo,DatLichRepository $DatLich,DichVuRepository $DichVu,KhachHangRepository $KhachHang ,NhanVienRepository $NhanVien)
    {
        $this->CoSo = $CoSo;
        $this->DatLich = $DatLich;
        $this->DichVu = $DichVu;
        $this->KhachHang = $KhachHang;
        $this->NhanVien = $NhanVien;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = $this->DatLich->getAll2CungCoSo(1);
        $data=$this->DatLich->getdv();
        return view('Admin.DatLich.index',compact($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->DanhMuc->findDanhMucByIdLoai($this->idloai);
        return view('Admin.DatLich.create',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'iddanhmuc'=>$request->iddanhmuc,
            'name'=> $request->name,
            'mota'=>$request->mota,
            'noidung'=>$request->noidung,
            "trangthai"=>$request->trangthai
        ];

        $data= $this->DatLich->create($data);

        return redirect('/quantri/DatLich/detail/'.$data->id.'')->with('success','Thêm thành công');
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
        $data  = $this->DatLich->find($id);
        $cate  = $this->DanhMuc->getAll();
        return view("Admin.DatLich.edit",compact('data','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'iddanhmuc'=>$request->iddanhmuc,
            'name'=> $request->name,
            'slug'=>Str::slug($request->name),
            'mota'=>$request->mota,
            'noidung'=>$request->noidung,
            "trangthai"=>$request->trangthai,
        ];

        if($request->img !== null){
            $img = $this->uploadSingle($this::PATH_UPLOADS,$request->file('img'));
            $data['img'] = $img;
        }

        $this->DatLich->update($id,$data);
        return redirect('quantri/DatLich')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check sản phẩm chi tiết
        $this->DatLich->delete($id);
        return redirect('quantri/DatLich')->with('success','Xoá thành công');
    }
}
