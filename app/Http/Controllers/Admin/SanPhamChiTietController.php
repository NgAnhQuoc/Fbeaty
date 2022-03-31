<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamChiTiet;
use App\Repositories\DonHangChiTiet\DonHangChiTietRepository;
use App\Repositories\GioHangChiTiet\GioHangChiTietRepository;
use App\Repositories\HoaDonChiTiet\HoaDonChiTietRepository;
use App\Repositories\SanPhamChiTiet\SanPhamChiTietRepository;


class SanPhamChiTietController extends Controller
{
    private $SanPhamChiTiet;
    private $DonHangChiTiet;
    private $GioHangChiTiet;
    private $HoaDonChiTiet;
    public function __construct(SanPhamChiTietRepository $SanPhamChiTiet,
                                DonHangChiTietRepository $DonHangChiTiet,
                                GioHangChiTietRepository $GioHangChiTiet,
                                HoaDonChiTietRepository $HoaDonChiTiet
    )
    {
        $this->SanPhamChiTiet = $SanPhamChiTiet;
        $this->DonHangChiTiet = $DonHangChiTiet;
        $this->GioHangChiTiet = $GioHangChiTiet;
        $this->HoaDonChiTiet= $HoaDonChiTiet;
    }

    public function createDetailProduct()
    {
        return view('Admin.SanPham.createDetail');
    }

    public function postDetailProduct(SanPhamChiTiet $request)
    {
        $idsanpham = $request->route('id');
        $ml = $request->ml;
        $tonkho = $request->tonkho;
        $dongia = $request->dongia;
        if ($ml != null && $tonkho != null && $dongia != null) {
            if(strlen($ml) > 4){
                return  $this->handleError('Số ml không được lớn hơn 9999');
            }
            $data = [
                'idsanpham' => $idsanpham,
                'ml' => $ml,
                'tonkho' => $tonkho,
                'dongia' => $dongia
            ];
           $res =  $this->SanPhamChiTiet->create($data);
           if($res === false){
                return $this->handleError('Thêm dữ liệu thất bại, vui lòng thử lại');
           }else{
                $request->session()->forget('idSanPham');
                return redirect('quantri/sanpham/detail/'.$idsanpham.'/edit')->with('success', 'Thêm thành công');
           }
        } else {
            return $this->handleError('Dữ liệu không được để trống');
        }
    }


    function editDetailProduct($id)
    {

        $data = $this->SanPhamChiTiet->getSanPhamChiTietByIdSanPham($id);
        if(count($data) === 0){
            return redirect('quantri/sanpham/detail/'.$id.'/create')->with('idDetail',$id);
        }else{
            return view('Admin.SanPham.editDetail',compact('data'));
        }
    }



    function updateDetailProduct(SanPhamChiTiet $request, $idsp){

        $id = $request->id;
        $data = $this->SanPhamChiTiet->getSanPhamChiTietByIdSanPham($idsp);

        $ml = $request->ml;
        $tonkho = $request->tonkho;
        $dongia = $request->dongia;

        if ($ml[0] == null || $tonkho[0] == null || $dongia[0] == null) {
            return $this->handleError('Dữ liệu không được để trống');
        }

        if (count($data) === count($request->dongia)) {

            for ($i = 0; $i < count($ml); $i++) {

                if(strlen($ml[$i]) > 4){
                    return  $this->handleError('Số ml không được lớn hơn 9999');
                }

                $data = [
                    'ml' => $ml[$i],
                    'tonkho' => $tonkho[$i],
                    'dongia' => $dongia[$i]
                ];

                $res = $this->SanPhamChiTiet->update($id[$i],$data);
            }
            if($res) {

                return redirect('quantri/sanpham')->with('success','Sửa thành công');
            }

        }

    }

    public function destroy($id)
    {
        $hasDonHang = $this->DonHangChiTiet->findDonHangChiTietByIdSanPhamChiTiet($id);
        $hasGioHang = $this->GioHangChiTiet->findGioHangChiTietByIdSanPhamChiTiet($id);
        $hasHoaDonChiTiet = $this->HoaDonChiTiet->findHoaDonChiTietByIdSanPhamChiTiet($id);
        if(count($hasDonHang)>0 || $hasGioHang==false || $hasHoaDonChiTiet==false){
            $response = [
                'type'=>'error',
                'errorMessage'=>'Sản phẩm đã tồn tại trong đơn hàng, không thể xoá',
                'errorCode'=>401
            ];
            return response()->json($response);
        }else{
            $res = $this->SanPhamChiTiet->delete($id);
            if($res){
                $response = [
                    'type'=>'success',
                    'successMessage'=>'Đã xoá thành công!',
                    'successCode'=>201
                ];
            }else{

                $response = [
                    'type'=>'error',
                    'errorMessage'=>'Xoá thất bại, có lỗi!',
                    'errorCode'=>401
                ];
            }
            return response()->json($response);

        }
    }


        /**
     *Lấy sp đến hóa đơn
     */
    public function getSanPhamToHoaDon()
    {
        $data = $this->SanPhamChiTiet->getSanPhamChiTietToHoaDon();
        return $data;
    }

    public function getSanPhamChiTietToHoaDon($id, $idsp){
        $data= $this->SanPhamChiTiet->getSanPhamChiTiet($idsp);
        return $data;
    }
    // this is test

}
