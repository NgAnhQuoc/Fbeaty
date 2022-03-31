<?php


namespace App\Repositories\GiamGia;


use App\Models\Admin\GiamGiaModel;
use App\Repositories\BaseRepository;

class GiamGiaRepository extends BaseRepository implements GiamGiaRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return GiamGiaModel::class;
    }
    public function CheckCODE($code){
        return $this->model->select("*")
            ->where('ma','=', $code)
            ->doesntExist();
    }

    public function GetGiamGiaByCODE($code){
        return $this->model->select("*")
            ->where('ma','=', $code)
            ->get();
    }
    public function CheckName($name) {
        return $this->model->select('*')->where('name', '=', $name)->doesntExist();
    }

    public function CheckMa($ma){
        return $this->model->select('*')->where('ma', '=', $ma)->doesntExist();
    }


}
