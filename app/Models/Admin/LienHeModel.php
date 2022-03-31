<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHeModel extends Model
{
    use HasFactory;
    protected $table = 'lienhe';
    protected $primaryKey = 'id';
    protected $fillable = [
        'namekh',
        'email',
        'sdt',
        'noidung',
    ];
}
