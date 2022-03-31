<?php


namespace App\Repositories\TheoDoi;


use App\Models\Site\TheoDoi;
use App\Repositories\BaseRepository;
use App\Repositories\TheoDoi\TheoDoiRepositoryInterface;

class TheoDoiRepository extends BaseRepository implements TheoDoiRepositoryInterface
{
    protected $model;
    public function getModel(){
        return TheoDoi::class;
    }

    public function CheckEmail($email){
        return $this->model->select("*")->where('email', $email)->first();
    }
}
