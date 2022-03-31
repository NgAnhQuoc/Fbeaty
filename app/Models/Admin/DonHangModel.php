<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangModel extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idkhachhang',
        'idgiamgia',
        'tennguoinhan',
        'diachikhachhang',
        'sdtnguoinhan',
        'tongtientruocgiamgia',
        'tongtiensaugiamgia',
        'ghichucuakhachhang',
        'phuongthucthanhtoan',
        'phuongthucgiaohang',
        'trangthai',
        'trangthaithanhtoan'
    ];

    public function dhchitiet(){
       return $this->hasOne(DonHangChitiet::class,'iddonhang', 'id');
    }
    public function namegiamgia(){
        return $this->hasOne(GiamGiaModel::class,'idgiamgia', 'id');
     }
}
