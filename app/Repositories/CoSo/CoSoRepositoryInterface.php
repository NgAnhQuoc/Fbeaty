<?php


namespace App\Repositories\CoSo;


interface CoSoRepositoryInterface
{
    public function getCosoByIdSessionCoso();

    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id,$attributes = []);

    public function delete($id);

    public function getDiaChiById($idCoSo);
}
