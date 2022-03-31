<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LieuTrinhChiTietModel extends Model
{
    use HasFactory;
    protected $table = 'lieutrinhchitiet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idlieutrinh',
        'iddichvu',
        'idnhanvien',
        'ghichu',
        'ngay',
        'trangthai',
        'imgkhachhang'
    ];
    public static function findNameDichVuByIdLieuTrinh($id){
       return LieuTrinhChiTietModel::select('dichvu.name')
       ->join('dichvu','dichvu.id','=','lieutrinhchitiet.iddichvu')
       ->where('lieutrinhchitiet.idlieutrinh','=',$id)
       ->get();
    }
}
