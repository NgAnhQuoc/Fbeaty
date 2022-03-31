<?php


namespace App\Repositories\HoaDon;


use App\Repositories\RepositoryInterface;

interface HoaDonRepositoryInterface extends RepositoryInterface
{
    public function ShowHoaDonByIdCoso($id);
    public function findHoaDonByIdLieuTrinh($id);
    public function getTongDoanhThuHoaDon($dau, $cuoi, $idCoSo);
    public function getHoaDonByDate($dau, $cuoi, $idCoSo);
    public function findHoaDonByIdKhachHang($id);
}
