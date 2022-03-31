<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModel extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'sdt',
        'idcoso',
        'email',
        'password',
        'idgoogle',
        'active',
        'img',
        'trangthai',
        'randomkey',
        'remember_token',
        'exp'
    ];
}
