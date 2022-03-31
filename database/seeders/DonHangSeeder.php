<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Str;
class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::now()->subDays(0)->addDay()->toDateTimeString();
        $lastMonth = Carbon::now()->subMonth(1)->toDateTimeString();
        $yesterday = Carbon::now()->subDays(1)->toDateTimeString();
        DB::table('donhangchitiet')->delete();
        DB::table('donhang')->delete();

        DB::table('donhang')->insert([
            ['id'=>1,'idkhachhang'=>'1','idgiamgia'=>'1', 'tennguoinhan'=>'Hương','diachikhachhang'=> 'Công viên phần mềm Quang Trung , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'15000000' ,'tongtiensaugiamgia'=>'15000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $yesterday,'updated_at'=> NULL],
            ['id'=>2,'idkhachhang'=>'2','idgiamgia'=>'2', 'tennguoinhan'=>'Hùng','diachikhachhang'=> '345/3 Tổ 29 , Khu phố 2 , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737032' ,'tongtientruocgiamgia'=>'21000000' ,'tongtiensaugiamgia'=>'20000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'BE','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $yesterday,'updated_at'=> NULL],
            ['id'=>3,'idkhachhang'=>'3','idgiamgia'=>'3', 'tennguoinhan'=>'Ly Ly','diachikhachhang'=> '186 , Phường Thái Hà , Q.Đống Đa , Hà Nội','sdtnguoinhan'=>'0845737033' ,'tongtientruocgiamgia'=>'5000000' ,'tongtiensaugiamgia'=>'5500000','ghichucuakhachhang'=> 'Em sẽ nhận được đơn hàng full tuần nha ạ','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'DHL','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=>$yesterday,'updated_at'=> NULL],
            ['id'=>4,'idkhachhang'=>'4','idgiamgia'=>'2', 'tennguoinhan'=>'Thảo','diachikhachhang'=> '415 Nguyễn Trãi , Phường 7 , Q.5 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'30000000' ,'tongtiensaugiamgia'=>'28000000','ghichucuakhachhang'=> '','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $yesterday,'updated_at'=> NULL],
            ['id'=>5,'idkhachhang'=>'5','idgiamgia'=>'1', 'tennguoinhan'=>'Thảo Mai','diachikhachhang'=> 'Tầng 1, 28 Seongam-ro 13-gil, Mapo-gu, Seoul','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'35000000' ,'tongtiensaugiamgia'=>'30000000','ghichucuakhachhang'=> '주문은 이번주말에 받아볼께요 감사합니다','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'FEDEX','trangthaithanhtoan' => 1,'trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $yesterday,'updated_at'=> NULL],
            ['id'=>6,'idkhachhang'=>'1','idgiamgia'=>'1', 'tennguoinhan'=>'Hương','diachikhachhang'=> 'Công viên phần mềm Quang Trung , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'15000000' ,'tongtiensaugiamgia'=>'15000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $yesterday,'updated_at'=> NULL],
            ['id'=>7,'idkhachhang'=>'6','idgiamgia'=>'2', 'tennguoinhan'=>'Hùng','diachikhachhang'=> '345/3 Tổ 29 , Khu phố 2 , Phường Trung Mỹ Tây , Q.12 , TP.HCM','sdtnguoinhan'=>'0845737032' ,'tongtientruocgiamgia'=>'21000000' ,'tongtiensaugiamgia'=>'20000000','ghichucuakhachhang'=> 'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'BE','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $today,'updated_at'=> NULL],
            ['id'=>8,'idkhachhang'=>'6','idgiamgia'=>'3', 'tennguoinhan'=>'Ly Ly','diachikhachhang'=> '186 , Phường Thái Hà , Q.Đống Đa , Hà Nội','sdtnguoinhan'=>'0845737033' ,'tongtientruocgiamgia'=>'5000000' ,'tongtiensaugiamgia'=>'5500000','ghichucuakhachhang'=> 'Em sẽ nhận được đơn hàng full tuần nha ạ','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'DHL','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=>$today,'updated_at'=> NULL],
            ['id'=>9,'idkhachhang'=>'6','idgiamgia'=>'2', 'tennguoinhan'=>'Thảo','diachikhachhang'=> '415 Nguyễn Trãi , Phường 7 , Q.5 , TP.HCM','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'30000000' ,'tongtiensaugiamgia'=>'28000000','ghichucuakhachhang'=> '','phuongthucthanhtoan'=>'VNPAY' ,'phuongthucgiaohang'=>'GRAP','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $today,'updated_at'=> NULL],
            ['id'=>10,'idkhachhang'=>'6','idgiamgia'=>'1', 'tennguoinhan'=>'Thảo Mai','diachikhachhang'=> 'Tầng 1, 28 Seongam-ro 13-gil, Mapo-gu, Seoul','sdtnguoinhan'=>'0845737036' ,'tongtientruocgiamgia'=>'35000000' ,'tongtiensaugiamgia'=>'30000000','ghichucuakhachhang'=> '주문은 이번주말에 받아볼께요 감사합니다','phuongthucthanhtoan'=>'MOMO' ,'phuongthucgiaohang'=>'FEDEX','trangthaithanhtoan' => 1,'trangthai'=>4,'created_at'=> $today,'updated_at'=> NULL],
        ]);

        DB::table('donhangchitiet')->insert([
            ['id'=>1,'iddonhang' => 1, 'idsanphamchitiet'=> 1, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '590000','dongiasaugiamgia'=>'550000'],
            ['id'=>2,'iddonhang' => 2, 'idsanphamchitiet'=> 2, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '690000','dongiasaugiamgia'=>'650000'],
            ['id'=>3,'iddonhang' => 3, 'idsanphamchitiet'=> 3, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '890000','dongiasaugiamgia'=>'850000'],
            ['id'=>4,'iddonhang' => 4, 'idsanphamchitiet'=> 4, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1500000','dongiasaugiamgia'=>'1450000'],
            ['id'=>5,'iddonhang' => 5, 'idsanphamchitiet'=> 5, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1600000','dongiasaugiamgia'=>'155000'],
            ['id'=>6,'iddonhang' => 6, 'idsanphamchitiet'=> 6, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '1800000','dongiasaugiamgia'=>'1700000'],
            ['id'=>7,'iddonhang' => 7, 'idsanphamchitiet'=> 7, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '3600000','dongiasaugiamgia'=>'3100000'],
            ['id'=>8,'iddonhang' => 8, 'idsanphamchitiet'=> 8, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '3800000','dongiasaugiamgia'=>'375000000'],
            ['id'=>9,'iddonhang' => 9, 'idsanphamchitiet'=> 9, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '4000000','dongiasaugiamgia'=>'3900000'],
            ['id'=>10,'iddonhang' => 10, 'idsanphamchitiet'=> 1, 'img' => 'cchamsocda.jpg', 'soluong' => '5', 'dongiatruocgiamgia' => '590000','dongiasaugiamgia'=>'550000'],
        ]);

        $ho  = array("Nguyễn", "Lê", "Phan", "Đỗ", "Hồ", "Võ", "Bùi", "Hậu", "Trần");
        $lot = array("Thị", "Văn", "Đức", "Ngọc", "Hoàng", "Minh", "Kim", "Vũ", "Duy");
        $ten = array("Tâm", "Thảo", "Hải", "Hòa", "Hảo", "Thanh", "Tú", "Hậu", "Phương", "Long");

        for ($i = 11; $i < 100; $i++) {
            $ho_ = Arr::random($ho);

            $randomDay = Carbon::today()->subDays(rand(0, 365 * 4))->toDateString();
            $tongTienSauGiam_ = rand(100000, 50000000);
            $tongTienTruocGiam = $tongTienSauGiam_ + rand(100000, 1000000);
            $diachi  = rand(1, 250);
            $phuong = array("phường 1", "phường 2", "phường 3", "phường 4", "phường 5", "phường 6", "phường 7", "phường 8", "phường 9", "phường 10");
            $huyen = array("quận12", "quận 1", "quận 2", "quận 3", "quận 4 ", "quận 5 ", "quận 6 ", "quận 7", "quận 8", "quận 9");
            $tinh = array("Hồ Chí Minh", "Bình thuận ", "Hà Nội", "Hải Phòng", "Đà Nẵng", "Cần Thơ");
            $phuongthucthanhtoan = array("VNPAY", "TT");
            $sdtdaumoi = array("084", "037", "098", "094");
            $phuongthucgiaohang = array("GRAP", "BEE", "DHL", "FEDEX");
            $huyen_ = Arr::random($huyen);
            $phuong_ = Arr::random($phuong);
            $tinh_ = Arr::random($tinh);
            $phuongthucthanhtoan_ = Arr::random($phuongthucthanhtoan);
            $sdtdau = Arr::random($sdtdaumoi);
            $soluong_ = rand(1,6);
            $sdtgiua = rand(1000, 9999);
            $sdtcuoi = rand(100, 999);
            $sdt = $sdtdau . $sdtgiua . $sdtcuoi;
            $phuongthucgiaohang_ = Arr::random($phuongthucgiaohang);
            $phantramgiamgia = rand(25,100);

            $tongtientruoc = $tongTienSauGiam_ * $soluong_;
            $Tongtiensaugiamgia = $tongtientruoc * (100 - $phantramgiamgia)/100 ;

            do
            {
                $lot_ = Arr::random($lot);
                $ten_ = Arr::random($ten);
            } while ($this->checkHoTen($lot_, $ten_));
            $hoTenRandom = $ho_ . ' ' . $lot_ . ' ' . $ten_;
            $diachict = $diachi . ' ' . $phuong_ . ' ' . $huyen_. ' ' .$tinh_;

            DB::table('donhang')->insert([
                ['id'=>$i,'idkhachhang' => rand(1, 6),'idgiamgia' => rand(1, 3),'tennguoinhan' => $hoTenRandom, 'diachikhachhang'=> $diachict, 'sdtnguoinhan'=> $sdt, 'tongtientruocgiamgia' => $Tongtiensaugiamgia, 'tongtiensaugiamgia' => $tongTienSauGiam_,'ghichucuakhachhang'=>'Sản phẩm vận chuyển tới gọi em nha ạ em cảm ơn ^^','phuongthucthanhtoan'=>$phuongthucthanhtoan_,'phuongthucgiaohang'=>$phuongthucgiaohang_, 'trangthai' => rand(1, 4),'trangthaithanhtoan' => rand(0, 1), 'created_at'=>$randomDay],
            ]);
            DB::table('donhangchitiet')->insert([
                ['id'=>$i,'iddonhang'=>$i,'idsanphamchitiet'=>rand(1,9),'img' => 'cchamsocda.jpg', 'soluong'=> $soluong_, 'dongiatruocgiamgia' => $tongTienTruocGiam, 'dongiasaugiamgia' => $tongTienSauGiam_, 'created_at'=>$randomDay],
            ]);
        }
    }

    public function checkHoTen($lot_, $ten_) {
        $arrLot_ = array("Thị", "Ngọc", "Kim");
        $arrTen_ = array("Long");
        if (in_array($lot_, $arrLot_)) {
            if (in_array($ten_, $arrTen_)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
