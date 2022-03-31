<?php


namespace App\Repositories\LieuTrinhChiTiet;


use App\Repositories\RepositoryInterface;

interface LieuTrinhChiTietRepositoryInterface extends RepositoryInterface
{
    public function getLieuTrinhChiTietInnerJoin($id);
    public function selectDate();
    public function findLieuTrinhChiTietByIdLieuTrinh($id);
}
