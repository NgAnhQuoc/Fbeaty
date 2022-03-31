<?php


namespace App\Repositories\Province;
use App\Repositories\BaseRepository;
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
    public function getModel(){
        return \App\Models\Admin\Province::class;
    }
    // public function modelcity(){
    //     return \App\Models\Admin\City::class;
    // }
    public function getall(){
        return $this->model->select("*")
        ->orderBy('maqh', 'ASC')
        ->get();
    }

}
