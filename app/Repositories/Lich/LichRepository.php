<?php


namespace App\Repositories\Lich;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use App\Models\Admin\LichModel;
use App\Repositories\Lich\LichRepositoryInterface;
// use App\Models\Admin\Lich;
use Illuminate\Support\Facades\DB;
class LichRepository extends BaseRepository implements LichRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return LichModel::class;
    }

    public function getLichByThuAndCoSo($thu, $idCoSo)
    {
        return $this->model::where([
            ['thutrongtuan', '=', $thu],
            ['idcoso', '=', $idCoSo],
        ])->get();
    }

    public function getLichActive($thu, $idCoSo, $gio)
    {
        return $this->model::where([
            ['thutrongtuan', '=', $thu],
            ['idcoso', '=', $idCoSo],
            ['gio', '=', $gio],
            ['trangthai', '=', Controller::TRANGTHAI_LICH_OPEN],
        ])->first();
    }

    public function getLich($id, $idthu)
    {
        return $this->model->select('*')
            ->where('idcoso', '=', $id)
            ->where('thutrongtuan', '=', $idthu)
            ->get();
    }

    public function updateALL($id, $thu, $trangthai){
        return DB::table('lich')->where('idcoso', $id)
            ->where('thutrongtuan', $thu)
            ->update(array('trangthai' => $trangthai));

    }

    public function deleteLichByIdCoSo($id){
        return DB::table('lich')->where('idcoso', '=',$id)->delete();
    }


    public function CreateLichFromCoso($id)
    {
        $soluongkhach = 4;
        $gio = 8;
        $gioketthuc = 20;
        $trangthai = 0;
        $phut = 0;
        for ($thu = 0; $thu <= 6; $thu++) {
            for ($i = 0; $i <= 300; $i++) {
                $khoanGiuaKhungGio = 30;
                $toTime = sprintf('%02d:%02d', $gio, $phut);

                DB::table('lich')->insert([
                    ['idcoso' => $id, 'thutrongtuan' => $thu , 'soluongkhach' => $soluongkhach, 'gio' => $toTime, 'trangthai' => $trangthai]
                ]);
                $phut += $khoanGiuaKhungGio;
                if ($phut >= 60) {
                    $gio += 1;
                    $phut = 0;
                }
                if ($gio == $gioketthuc and $phut > 0) {
                    $gio = 8;
                    $gioketthuc = 20;
                    $phut = 0;
                    break;
                }
            }
        }

    }

}
