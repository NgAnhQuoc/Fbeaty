<?php


namespace App\Repositories\DanhMuc;
use App\Repositories\RepositoryInterface;
interface DanhMucRepositoryInterface extends RepositoryInterface
{
     /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function findDanhMucByIdLoai($idLoai);

    public function getDanhMucLimit($limit);
    public function getAllDanhMucDichVu();
}
