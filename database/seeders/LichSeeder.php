<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lich')->delete();

        $soluongkhach = 4;

        $gio = 8;
        $gioketthuc=20;
        $trangthai = 0;
        $phut = 0;
        for ($idcoso=1; $idcoso<=2; $idcoso++) {
            for ($thu = 0; $thu <= 6; $thu++) {
                for ($i = 0; $i <= 300; $i++) {
                    $khoanGiuaKhungGio = 30;
                    $toTime = sprintf('%02d:%02d', $gio, $phut);

                    DB::table('lich')->insert([
                        ['idcoso' => $idcoso, 'thutrongtuan' => $thu, 'soluongkhach' => $soluongkhach, 'gio' => $toTime, 'trangthai' => $trangthai]
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
}
