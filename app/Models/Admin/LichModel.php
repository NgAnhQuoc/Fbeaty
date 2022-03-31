<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichModel extends Model
{
    use HasFactory;
    protected $table = 'lich';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idcoso',
        'thutrongtuan',
        'soluongkhach',
        'gio',
        'trangthai'
    ];
}
