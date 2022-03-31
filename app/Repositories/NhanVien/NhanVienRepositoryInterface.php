<?php


namespace App\Repositories\NhanVien;


use App\Repositories\RepositoryInterface;

interface NhanVienRepositoryInterface extends RepositoryInterface
{
public function getNhanVien();
public function CheckEmail($email);
public function CheckSdt($sdt);
public function getNhanVienByIdCoSo($id);
public function findNhanVienByIdAndCoSo($id, $idCoSo);

public function getNameNhanVien($idNhanVien);
}
