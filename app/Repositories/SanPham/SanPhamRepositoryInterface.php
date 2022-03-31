<?php


namespace App\Repositories\SanPham;
use App\Repositories\RepositoryInterface;
interface SanPhamRepositoryInterface extends RepositoryInterface
{
  public function getSanPhamJoinDanhMuc();
  public function DemSanPham();
//  public function FilterByDM($soluong, $data);
}
