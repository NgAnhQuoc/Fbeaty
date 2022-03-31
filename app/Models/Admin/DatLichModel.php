<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatLichModel extends Model
{
    use HasFactory;
    protected $table = 'datlich';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idcoso',
        'iddichvu',
        'idkhachhang',
        'idnhanvien',
        'thoigiandat'
    ];
}
