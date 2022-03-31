<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGiaModel extends Model
{
    use HasFactory;
    protected $table = 'giamgia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'ma',
        'number',
        'max',
        'loai',
        'ngaytao',
        'ngayhethan'
    ];
}
