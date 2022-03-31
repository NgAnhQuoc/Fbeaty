<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHangChiTiet extends Model
{
    use HasFactory;
    protected $table = 'giohangchitiet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idgiohang',
        'idsanphamchitiet',
        'soluong'
    ];
}
