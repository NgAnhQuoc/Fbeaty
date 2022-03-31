<?php


namespace App\Repositories\DatLich;
use App\Repositories\RepositoryInterface;
interface DatLichRepositoryInterface extends RepositoryInterface
{
    public function getModel();
    public function getAllCungCoSo($idCoSo);
    public function getAll2CungCoSo($idCoSo);
    public function getdv();
    public function findDatLichCuaNhanVienTheoThoiGian($thoiGianDat, $idNhanVien);
    public function getSoLanKhachDatByTimeStamp($thoiGianDat);
    public function getDatLichCungCoSo($idCoSo);
    public function getNumDatLichByTime($timeStampDauNgay, $timeStampCuoiNgay, $idCoSo);
    public function findDatLichByIdKhachHangInnerJoin($id);
    public function getDatLichByIdKhachHang($idKhachHang);
    public function getDatLichByIdKhachHangAndThoiGianDat($idKhachHang, $start, $end);
    public function getDatLichById($id);

}
