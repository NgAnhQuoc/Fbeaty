<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\YeuThich\YeuThichRepository;
use Illuminate\Http\Request;

class YeuThichController extends Controller
{
    private $YeuThich;
    public function __construct(YeuThichRepository $YeuThich)
    {
        $this->YeuThich = $YeuThich;
    }
    /**
     *Lấy sản phẩm yêu thích by id sản phẩm
     */
    public function getSanPhamYeuThich($idsanpham)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $check = $this->YeuThich->CheckYeuThich(session('khachHang')->id, $idsanpham);
            if ($check == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
    /**
     *Thêm sản phẩm yêu thích
     */
    public function AddSanPhamYeuThich($idsanpham)
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            $check = $this->YeuThich->CheckYeuThich(session('khachHang')->id, $idsanpham);
            if ($check == true) {
                $yeuthich = [
                    'idkhachhang' => session('khachHang')->id,
                    'idsanphamchitiet' => $idsanpham
                ];
                $this->YeuThich->create($yeuthich);
                return 0;
            } else {
                $this->YeuThich->DeleteYeuThich(session('khachHang')->id, $idsanpham);
                return 1;
            }
        } else {
            return 2;
        }
    }
    /**
     *Lấy tất cả sản phẩm yêu thích
     */
    public function getAllSPYeuThich()
    {
        if (session()->has('khachHang') && session('khachHang') != '') {
            return $this->YeuThich->getAllYeuThich(session('khachHang')->id);
        } else {
            return $this->YeuThich->getAllYeuThich(00);
        }
    }
    /**
    *Xóa sản phẩm yêu thích
     */
    public function xoayeuthich($id)
    {
        $delete = $this->YeuThich->delete($id);
        if ($delete) {
            return 0;
        } else {
            return 1;
        }
    }
}
