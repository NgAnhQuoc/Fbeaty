<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;
    protected $table = 'dichvu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'img',
        'giamgia',
        'iddm',
        'motangan',
        'dongia',
        'noidung',
        'trangthai'
    ];
    
}
