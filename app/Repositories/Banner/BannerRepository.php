<?php


namespace App\Repositories\Banner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerReponsitoryinterface
{
    protected $model;

    public function getModel()
    {
        return Banner::class;
    }

    public function getBannerByShow($hien){
        return $this->model->select("*")
            ->where('Anhien', $hien)
            ->get();
    }

    public function getBannerHien()
    {
        return $this->model->where('AnHien', Controller::BANNER_HIEN)->get();
    }
}
