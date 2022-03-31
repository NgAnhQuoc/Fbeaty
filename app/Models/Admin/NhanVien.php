<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idcoso',
        'email',
        'password',
        'role',
        'active',
        'name',
        'img',
        'namsinh',
        'gioitinh',
        'sdt',
        'avatar',
        'trangthai',
        'remember_token'
    ];

    public static function findNhanVienById($id){
       return NhanVien::where('id','=',$id)->first();
    }
}
