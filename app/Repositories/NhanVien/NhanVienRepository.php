<?php


namespace App\Repositories\NhanVien;

use App\Models\Admin\NhanVien;
use App\Repositories\BaseRepository;

use App\Repositories\NhanVien\NhanVienRepositoryInterface;

class NhanVienRepository extends BaseRepository implements NhanVienRepositoryInterface
{
    protected $model;
    public function getModel()
    {
        return NhanVien::class;
    }
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getNhanVien()
    {
        $coSo = session()->get('coso');
        return $this->model->select('nhanvien.*', 'coso.name AS coso')
            ->join('coso', 'nhanvien.idcoso', '=', 'coso.id')
            ->where("nhanvien.idcoso","=",$coSo)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function CheckEmail($email){
        return $this->model->select('*')->where('email', '=', $email)->doesntExist();
    }

    public function CheckSdt($sdt){
        return $this->model->select('*')->where('sdt', '=', $sdt)->doesntExist();
    }

    public function getNhanVienByIdCoSo($id) {
        return $this->model::where('idcoso', $id)->get();
    }

    public function findNhanVienByIdAndCoSo($id, $coSo) {
        return $this->model::where([
            ['id', $id],
            ['idcoso', $coSo],
        ])->first();
    }

    public function getNameNhanVien($idNhanVien) {
        $nhanVien = $this->model->select('name')->find($idNhanVien);

        return $nhanVien['name'];
    }
}
