<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LieutrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now()->subDays(0)->toDateTimeString();
        $lastMonth = Carbon::now()->subMonth(1)->toDateTimeString();
        $yesterday = Carbon::now()->subDays(1)->toDateTimeString();
        //DB::table('lieutrinh')->delete();
       // DB::table('lieutrinhchitiet')->delete();

        for ($i = 26; $i < 100; $i++) {
            $randomDay = Carbon::today()->subDays(rand(0, 365 * 4))->toDateString();
            //$randomDay1 = $randomDay + 7 ;
            $tongTienSauGiam = rand(100000, 50000000);
            $tongTienTruocGiam = $tongTienSauGiam + rand(100000, 1000000);
            DB::table('lieutrinh')->insert([
                ['id'=>$i,'idnhanvien'=>rand(1, 6),'idkhachhang' => rand(1, 6), 'ngaybatdau'=> strtotime($today), 'dukienketthuc'=> strtotime($yesterday), 'ghichu'=>'liệu trình đang tiến hành','trangthai'=>0],
            ]);
            DB::table('lieutrinhchitiet')->insert([
                ['id'=>$i,'idlieutrinh' => $i, 'iddichvu'=> rand(1, 36),'idnhanvien'=> rand(1, 6), 'ghichu' =>'Bước 1: Kiểm tra tình trạng da trong quy trình chăm sóc da cơ bản tại spa mà bạn nên áp dụng vào cơ sở của mình hoặc tham khảo để lựa chọn spa sử dụng dịch vụ. Giá dịch vụ cũng phụ thuộc rất nhiều vào chất lượng của từng spa nên bạn cần lựa chọn kỹ lưỡng để chăm sóc làn da của mình nhé!', 'ngay' => strtotime($randomDay),'trangthai' => 0, 'imgkhachhang'=>'khachhang1.jpg'],
            ]);
        }


    }
}
