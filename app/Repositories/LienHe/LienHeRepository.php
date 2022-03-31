<?php


namespace App\Repositories\LienHe;

use App\Models\Admin\LienHeModel;
use App\Repositories\BaseRepository;

use App\Repositories\LienHe\LienHeRepositoryInterface;

class LienHeRepository extends BaseRepository implements LienHeRepositoryInterface
{
    protected $model;

    function __construct()
    {
        $this->setModel();
    }

    public function getModel()
    {
        return LienHeModel::class;
    }

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

}
