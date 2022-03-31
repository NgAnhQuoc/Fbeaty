<?php


namespace App\Repositories\SanPhamChiTiet;
use App\Repositories\RepositoryInterface;
interface SanPhamChiTietRepositoryInterface extends RepositoryInterface
{
    // public function updateDetailByIdSp($id,$data);

    public function getSanPhamChiTietByID($id);

    public function delDetailByIdSp($id);

    public function getSanPhamChiTietByIdSanPham($id);

}
