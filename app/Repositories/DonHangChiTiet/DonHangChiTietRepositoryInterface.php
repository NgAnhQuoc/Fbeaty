<?php


namespace App\Repositories\DonHangChiTiet;


interface DonHangChiTietRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id,$attributes = []);

    public function delete($id);

    public function getDonHangChiTietByIdDonHang($id);

    public function updateDetailByIdDH($id,$data);

    public function getIdTongthanhtoanByIdDonHangChiTtiet($id);

    public function getIdDonHangByIdDonHangChiTtiet($id);

    public function findDonHangChiTietByIdSanPhamChiTiet($idDonHang);

  

}
