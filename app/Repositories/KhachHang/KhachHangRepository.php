<?php


namespace App\Repositories\KhachHang;

use App\Models\Admin\KhachHangModel;
use App\Repositories\BaseRepository;

use App\Repositories\KhachHang\KhachHangRepositoryInterface;

class KhachHangRepository extends BaseRepository implements KhachHangRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return KhachHangModel::class;
    }
    public function getAllCungCoSo($idCoSo)
    {
        return $this->model->select('khachhang.*', 'khachhang.id')
        ->where('khachhang.idcoso', $idCoSo)
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function CheckEmail($email) {
        return $this->model->select('*')->where('email', '=', $email)->doesntExist();
    }

    public function CheckSdt($sdt){
        return $this->model->select('*')->where('sdt', '=', $sdt)->doesntExist();
    }

    public function getBySdt($sdt) {
        return $this->model::where('sdt', '=', $sdt)->first();
    }

    public function checkIssetUserByPhoneNumber($phoneNumber) {
        return $this->model::where([
            ['sdt', '=', $phoneNumber],
            ['password', '!=', null],
        ])->first();
    }

    public function checkLoginSite($sdt) {
        return $this->model::where([
            ['sdt', '=', $sdt],
        ])->first();
    }
}
