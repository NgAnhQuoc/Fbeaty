<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonChiTietModel extends Model
{
    use HasFactory;
    protected $table = 'hoadonchitiet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idhoadon',
        'idlienquan',
        'type',
        'soluong',
        'idlieutrinh',
        'idgiamgia',
        'dongiatruocgiamgia',
        'dongiasaugiamgia'
    ];
}
