<?php


namespace App\Repositories\DichVu;


use App\Repositories\RepositoryInterface;

interface DichVuRepositoryInterface extends RepositoryInterface
{
    public function getDichVu();
    public function getDichVuTheoDanhMuc($iddanhmuc);
    public function search($valueSearch);
    public function dichVuInerjoinDanhMuc();
    public function findDichVuById($id);
    public function getDichVuByIdDanhMuc($idDanhMuc, $limit);
    public function getDichVuGiamGiaAndDanhMuc($take, $skip);
}
