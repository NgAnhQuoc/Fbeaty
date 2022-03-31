<?php


namespace App\Repositories\Wards;
use App\Repositories\BaseRepository;
class WardsRepository extends BaseRepository implements WardsRepositoryInterface
{
    protected $model;
    public function getModel(){
        return \App\Models\Admin\Wards::class;
    }
    // public function modelcity(){
    //     return \App\Models\Admin\City::class;
    // }
    public function getall(){
        return $this->model->select("*")
        ->orderBy('xaid', 'ASC')
        ->get();
    }

}
