<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoDoi extends Model
{
    use HasFactory;
    protected $table = 'theodoi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email'
    ];
}
