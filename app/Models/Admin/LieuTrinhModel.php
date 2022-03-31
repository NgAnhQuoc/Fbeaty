<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuTrinhModel extends Model
{
    use HasFactory;
    protected $table = 'lieutrinh';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idnhanvien',
        'idkhachhang',
        'ngaybatdau',
        'dukienketthuc',
        'ghichu',
        'trangthai',
    ];
}
