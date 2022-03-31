<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;
    protected $table = 'yeuthich';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idkhachhang',
        'idsanphamchitiet'
    ];

}
