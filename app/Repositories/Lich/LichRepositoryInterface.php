<?php


namespace App\Repositories\Lich;
use App\Repositories\RepositoryInterface;
interface LichRepositoryInterface extends RepositoryInterface
{
    public function getModel();
    public function getLichByThuAndCoSo($thu, $idCoSo);
    public function getLichActive($thu, $idCoSo, $gio);
    public function getLich($id, $idthu);
    public function updateALL($id, $thu, $trangthai);
    public function deleteLichByIdCoSo($id);
    public function CreateLichFromCoso($id);
}
