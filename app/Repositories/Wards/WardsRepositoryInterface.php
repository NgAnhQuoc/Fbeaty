<?php


namespace App\Repositories\Wards;


interface WardsRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id,$attributes = []);

    public function delete($id);
}
