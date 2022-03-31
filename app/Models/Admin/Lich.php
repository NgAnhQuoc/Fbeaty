<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lich extends Model
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
