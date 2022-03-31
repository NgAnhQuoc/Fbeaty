<?php


namespace App\Repositories\CoSo;
use App\Repositories\BaseRepository;
class CoSoRepository extends BaseRepository implements CoSoRepositoryInterface
{
    protected $model;
    public function getModel(){
        return \App\Models\Admin\CosoModel::class;
    }
    // public function modelcity(){
    //     return \App\Models\Admin\City::class;
    // }

    public function getCosoByIdSessionCoso(){
        $coSo = session()->get('coso');
        return $this->model->select("*")->where('id', '=', $coSo)->get();
    }

    public function getCosoDESCSLimit($soluong){
        return $this->model->select("*")->orderBy('id', 'ASC')->limit($soluong)->get();
    }

    public function getDiaChiById($idCoSo) {
        $coSo = $this->model::select('diachi')->find($idCoSo);
        return $coSo->diachi;
    }

}
