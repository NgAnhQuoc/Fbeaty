<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmuc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'img',
        'slug',
        'loai'
    ];
    public function danhmuc()
    {
       return $this->hasOne(DichVu::class,'iddm','id');
    }
}
