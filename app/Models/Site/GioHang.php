<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idkhachhang'
    ];
}
