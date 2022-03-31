<?php


namespace App\Repositories\DonHang;


interface DonHangRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id,$attributes = []);

    public function delete($id);

    public function getDonHangChiTietByIdDonHang($id);

    public function getKhachHangChiTietByIdDonHang($id);

    public function getDonHangAndKhachHangById($id);

    public function findDonHangByIdGiamGia($id);
}
