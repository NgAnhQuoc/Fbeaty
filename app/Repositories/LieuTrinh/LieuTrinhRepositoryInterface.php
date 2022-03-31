<?php


namespace App\Repositories\LieuTrinh;


use App\Repositories\RepositoryInterface;

interface LieuTrinhRepositoryInterface extends RepositoryInterface
{
    public function findLieuTrinhByIdKh($id);
}
