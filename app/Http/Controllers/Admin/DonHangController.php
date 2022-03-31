<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\DonHang;
use App\Http\Requests\DonHangEdit;
use App\Http\Requests\GiamGiaEdit;
use App\Http\Requests\KhachHang;
use App\Models\Admin\KhachHangModel;
use App\Repositories\DonHang\DonHangRepository;
use App\Repositories\DonHangChiTiet\DonHangChiTietRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use Carbon\Carbon;

class DonHangController extends Controller
{


    private $DonHang;
    private $khachHang;
    private $GiamGia;
    private $DonHangChiTiet;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(DonHangRepository $DonHang , KhachHangRepository $khachHang, DonHangChiTietRepository $DonHangChiTiet)
    {
        $this->DonHang = $DonHang;
        $this->KhachHang = $khachHang;
        $this->DonHangChiTiet = $DonHangChiTiet;

    }
    public function index()
    {
        $data = $this->DonHang->getAll();
        $donhangchitiet = $this->DonHangChiTiet->getAll();
        $khachHang  = $this->KhachHang->getall();
        $DonHangct  = $this->DonHang->getDonHangAndDonHangChiTietById();

        return view('Admin.DonHang.index',compact('data','khachHang','donhangchitiet'));
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
    public function store( $request)
    {
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
        $dataDHCT = $this->DonHangChiTiet->getDonHangChiTietByIdDonHang($id);
        $data  = $this->DonHang->find($id);
        $khachHang  = $this->KhachHang->find($data->idkhachhang);
        $GiamGia = $this->DonHang->getDonHangAndGiamGiaById($id);
        return view('Admin.DonHang.edit',compact('data','khachHang','dataDHCT','GiamGia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonHangEdit $request, $id)
    {

        if ($request->tongtientruocgiamgia >= $request->tongtiensaugiamgia) {
        $data = [

            'tennguoinhan'=> $request->namenguoinhan,
            'diachikhachhang'=>$request->diachi,
            'sdtnguoinhan'=>$request->sodienthoai,
            'tongtientruocgiamgia'=>$request->tongtientruocgiamgia,
            'tongtiensaugiamgia'=>$request->tongtiensaugiamgia,
            'ghichucuakhachhang'=>$request->ghichukhachhang,
            'phuongthucgiaohang'=>$request->phuongthucgiaohang,
            'trangthai'=>$request->trangthai,
            'trangthaithanhtoan'=>$request->trangthaithanhtoan,
        ];

        $this->DonHang->update($id,$data);

        return redirect(route("donhang.index"))->with('thanhcong', 'Cập nhật thông tin thành công');
        } else {
        return redirect(route("donhang.index"))->with('thatbai', 'cập nhật thất bại vui lòng kiểm tra lại giá ');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->DonHang->delete($id);
        return redirect('quantri/donhang')->with('success','Xoá thành công');
    }
}
