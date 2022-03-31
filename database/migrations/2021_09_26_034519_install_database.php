<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstallDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('danhmuc');
        Schema::dropIfExists('dichvu');
        Schema::dropIfExists('blog');
        Schema::dropIfExists('coso');
        Schema::dropIfExists('khachhang');
        Schema::dropIfExists('giamgia');
        Schema::dropIfExists('lieutrinh');
        Schema::dropIfExists('lieutrinhchitiet');
        Schema::dropIfExists('hoadon');
        Schema::dropIfExists('hoadonchitiet');
        Schema::dropIfExists('datlich');
        Schema::dropIfExists('lich');
        Schema::dropIfExists('sanpham');
        Schema::dropIfExists('sanphamchitiet');
        Schema::dropIfExists('donhang');
        Schema::dropIfExists('donhangchitiet');
        Schema::dropIfExists('nhanvien');
        Schema::dropIfExists('yeuthich');
        Schema::dropIfExists('theodoi');
        Schema::dropIfExists('giohang');
        Schema::dropIfExists('giohangchitiet');
        Schema::dropIfExists('lienhe');
        Schema::dropIfExists('banner');

        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude',50)->nullable();
            $table->string('noidung',100)->nullable();
            $table->string('img',255);
            $table->boolean('AnHien')->default(0);
            $table->timestamps();
        });

        Schema::create('danhmuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('img',255)->nullable();
            $table->boolean('loai');
            $table->timestamps();
        });

        Schema::create('dichvu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('img',255);
            $table->unsignedInteger('giamgia')->nullable();
            $table->unsignedInteger('iddm');
            $table->string('motangan',255);
            $table->double('dongia',10,0);
            $table->longText('noidung');
            $table->boolean('trangthai')->default(0)->nullable();
            $table->foreign('iddm')->references('id')->on('danhmuc');
            $table->timestamps();
        });

        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('iddm');
            $table->string('img',255);
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('motangan',255);
            $table->longText('noidung');
            $table->boolean('trangthai')->default(0)->nullable();
            $table->integer('luotxem')->default(0);
            $table->foreign('iddm')->references('id')->on('danhmuc');
            $table->timestamps();
        });


        Schema::create('coso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('diachi',255);
            $table->unsignedInteger('tinh');
            $table->unsignedInteger('quan');
            $table->unsignedInteger('huyen');
            $table->timestamps();
        });

        Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->unsignedInteger('idcoso')->nullable();
            $table->string('sdt',10)->unique();
            $table->string('email',255)->unique()->nullable();
            $table->string('password',255)->nullable();
            $table->string('idgoogle',255)->nullable();
            $table->boolean('active',1);
            $table->string('img',255)->nullable();
            $table->string('randomkey',255)->nullable();
            $table->unsignedInteger('exp')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('giamgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('ma',50);
            $table->integer('number')->default(0)->nullable();
            $table->double('max',10,0)->nullable();
            $table->boolean('loai');
            $table->unsignedInteger('ngaytao');
            $table->unsignedInteger('ngayhethan');
            $table->timestamps();
        });

        Schema::create('lieutrinh', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idnhanvien');
            $table->unsignedInteger('idkhachhang');
            $table->unsignedInteger('ngaybatdau');
            $table->unsignedInteger('dukienketthuc');
            $table->string('ghichu',255)->nullable();
            $table->boolean('trangthai');
            $table->foreign('idnhanvien')->references('id')->on('nhanvien');
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
            $table->timestamps();
        });


        Schema::create('lieutrinhchitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlieutrinh');
            $table->unsignedInteger('iddichvu');
            $table->unsignedInteger('idnhanvien');
            $table->longText('ghichu');
            $table->unsignedInteger('ngay');
            $table->boolean('trangthai');
            $table->string('imgkhachhang');
            $table->foreign('idlieutrinh')->references('id')->on('lieutrinh');
            $table->foreign('idnhanvien')->references('id')->on('nhanvien');
            $table->timestamps();
        });

        Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idkhachhang');
            $table->unsignedInteger('idcoso');
            $table->unsignedInteger('idnhanvien');
            $table->unsignedInteger('idthungan');
            $table->unsignedInteger('idlieutrinh')->nullable();
            $table->unsignedInteger('idgiamgia')->nullable();
            $table->double('tongtientruocgiamgia',10,0);
            $table->double('tongtiensaugiamgia',10,0);
            $table->boolean('trangthai');
            $table->string('ghichu',255)->nullable();
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
            $table->foreign('idcoso')->references('id')->on('coso');
            $table->foreign('idnhanvien')->references('id')->on('nhanvien');
            $table->foreign('idthungan')->references('id')->on('nhanvien');
            $table->foreign('idlieutrinh')->references('id')->on('lieutrinh');
            $table->foreign('idgiamgia')->references('id')->on('giamgia');
            $table->timestamps();
        });


        Schema::create('hoadonchitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idhoadon');
            $table->unsignedInteger('idlienquan');
            $table->boolean('type');
            $table->unsignedInteger('soluong');
            $table->double('dongiatruocgiamgia',10,0);
            $table->double('dongiasaugiamgia',10,0);
            $table->foreign('idhoadon')->references('id')->on('hoadon');
            $table->timestamps();
        });

        Schema::create('datlich', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idcoso');
            $table->string('iddichvu', 55);
            $table->unsignedInteger('idkhachhang');
            $table->unsignedInteger('idnhanvien');
            $table->unsignedInteger('thoigiandat');
            $table->boolean('trangthai')->default(0)->nullable();
            $table->foreign('idcoso')->references('id')->on('coso');
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
            $table->timestamps();
        });

        Schema::create('lich', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idcoso');
            $table->unsignedInteger('thutrongtuan');
            $table->unsignedInteger('soluongkhach');
            $table->time('gio');
            $table->boolean('trangthai')->default(0)->nullable();
            $table->foreign('idcoso')->references('id')->on('coso');
            $table->timestamps();
        });

        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('iddanhmuc');
            $table->unsignedInteger('idthuonghieu');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('img',255);
            $table->string('mota',255);
            $table->longText('noidung');
            $table->unsignedInteger('giamgia')->nullable();
            $table->boolean('trangthai')->default(0)->nullable();
            $table->foreign('iddanhmuc')->references('id')->on('danhmuc');
            $table->timestamps();
        });


        Schema::create('sanphamchitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idsanpham');
            $table->string('ml',4);
            $table->unsignedInteger('soluotmua')->default(0);
            $table->unsignedInteger('tonkho');
            $table->double('dongia',10,0);
            $table->foreign('idsanpham')->references('id')->on('sanpham');
            $table->timestamps();
        });

        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idkhachhang');
            $table->unsignedInteger('idgiamgia')->nullable();
            $table->string('tennguoinhan',255);
            $table->string('diachikhachhang',255);
            $table->string('sdtnguoinhan',10);
            $table->double('tongtientruocgiamgia',10,0);
            $table->double('tongtiensaugiamgia',10,0);
            $table->string('ghichucuakhachhang',255)->nullable();
            $table->char('phuongthucthanhtoan',5);
            $table->char('phuongthucgiaohang',5);
            $table->boolean('trangthai');
            $table->boolean('trangthaithanhtoan')->default(0);
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
            $table->foreign('idgiamgia')->references('id')->on('giamgia');
            $table->timestamps();
        });

        Schema::create('donhangchitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('iddonhang');
            $table->unsignedInteger('idsanphamchitiet');
            $table->string('img',255);
            $table->unsignedInteger('soluong');
            $table->double('dongiatruocgiamgia',10,0);
            $table->double('dongiasaugiamgia',10,0);
            $table->foreign('iddonhang')->references('id')->on('donhang');
            $table->foreign('idsanphamchitiet')->references('id')->on('sanphamchitiet');
            $table->timestamps();
        });

        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idcoso');
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->boolean('role');
            $table->boolean('active');
            $table->string('name',255);
            $table->text('img')->nullable();
            $table->string('namsinh',4);
            $table->boolean('gioitinh');
            $table->string('sdt',10);
            $table->string('avatar',255);
            $table->boolean('trangthai');
            $table->foreign('idcoso')->references('id')->on('coso');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('yeuthich', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idkhachhang');
            $table->unsignedInteger('idsanphamchitiet');
            $table->timestamps();
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
            $table->foreign('idsanphamchitiet')->references('id')->on('sanpham');
        });

        Schema::create('theodoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('giohang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idkhachhang');
            $table->timestamps();
            $table->foreign('idkhachhang')->references('id')->on('khachhang');
        });

        Schema::create('giohangchitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idgiohang');
            $table->unsignedInteger('idsanphamchitiet');
            $table->unsignedInteger('soluong');
            $table->timestamps();
            $table->foreign('idgiohang')->references('id')->on('giohang');
            $table->foreign('idsanphamchitiet')->references('id')->on('sanphamchitiet');
        });

        Schema::create('lienhe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namekh',255);
            $table->string('email',255);
            $table->string('sdt',10);
            $table->string('noidung',255);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::enableForeignKeyConstraints();
    }
}
