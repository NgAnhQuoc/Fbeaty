<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CosoModel extends Model
{
    protected $table = 'coso';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'diachi',
        'tinh',
        'quan',
        'huyen'
    ];
    public function city()
    {
      return $this->hasOne(City::class, 'matp','tinh');
    }
    public function province()
    {
      return $this->hasOne(Province::class, 'maqh','quan');
    }
    public function wards()
    {
      return $this->hasOne(Wards::class, 'xaid','huyen');
    }
    public $timestamps = false;
}
