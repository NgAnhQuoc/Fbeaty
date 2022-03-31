<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamChiTiet extends Model
{
    use HasFactory;
    protected $table = 'sanphamchitiet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idsanpham',
        'ml',
        'soluotmua',
        'tonkho',
        'dongia',
    ];

}
