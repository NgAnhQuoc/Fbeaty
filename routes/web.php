<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CoSoController;
use App\Http\Controllers\Admin\DangNhapAdminController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;

use App\Http\Controllers\Admin\DichVuController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DonHangchitietController;
use App\Http\Controllers\Admin\GiamGiaController;
use App\Http\Controllers\Admin\HoaDonChiTietController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\LichController;
use App\Http\Controllers\Admin\LieuTrinhController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SanPhamChiTietController;
use App\Http\Controllers\Admin\TheoDoiFLController;
use App\Http\Controllers\Admin\ThongkeController;
use App\Http\Controllers\Admin\DatLichController;
use App\Http\Controllers\Admin\DatLichRemakeController;
use App\Http\Controllers\Admin\LienHeController;

use App\Http\Controllers\Site\GioHangController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\TheoDoiController;
use App\Http\Controllers\Site\YeuThichController;

use Illuminate\Support\Facades\Route;

/**
 * Backend
 *Đăng nhập
 */
Route::get('/quantri/login', [DangNhapAdminController::class, 'index']);
Route::post('/quantri/login', [DangNhapAdminController::class, 'checkin']);
Route::get('/quantri/logout', [DangNhapAdminController::class, 'logout']);
Route::group(['prefix' => 'quantri', 'middleware' => 'phanquyen'], function () {
    /**
     * Quản lý thống kê
     */
    Route::get('/getDoanhThuByDay/{day}', [ThongkeController::class, "getHoaDonByDayAjax"]);
    Route::get('/getDoanhThuHoaDonVaDonHang/{type}/{numData}/{date}', [ThongkeController::class, "getDoanhThuHoaDonVaDonHangAjax"]);
    Route::get('/', [ThongkeController::class, "index"]);
    /**
     * Quản lý danh mục
     */
    Route::resource('danhmuc', DanhMucController::class);
    /**
     * Quản lý dịch vụ
     */
    Route::resource('dichvu', DichVuController::class);
    /**
     * Quản lý khách hàng
     */
    Route::resource('khachhang', KhachHangController::class);
    /**
     * Quản lý bài viết
     */
    Route::resource('blog', BlogController::class);
    /**
     * Quản lý sản phẩm
     */
    Route::resource('sanpham', SanPhamController::class);
    Route::get('/sanpham/detail/{id}/create', [SanPhamChiTietController::class, 'createDetailProduct']);
    Route::post('/sanpham/detail/{id}/del', [SanPhamChiTietController::class, 'destroy']);
    Route::post('/sanpham/detail/{id}/store', [SanPhamChiTietController::class, 'postDetailProduct']);
    Route::get('/sanpham/detail/{id}/edit', [SanPhamChiTietController::class, 'editDetailProduct']);
    Route::post('/sanpham/detail/{id}/edit', [SanPhamChiTietController::class, 'updateDetailProduct']);
    /**
     * Quản lý nhân viên
     */
    Route::resource('nhanvien', NhanVienController::class);
    Route::get('nhanvien/kiemtraemail/{name}', [NhanVienController::class, "CheckEmailTonTai"]);
    Route::get('nhanvien/kiemtrasdt/{name}', [NhanVienController::class, "CheckSdtTonTai"]);
    /**
     * Quản lý đặt lịch
     */
    Route::resource('datlich', DatLichController::class);
    Route::resource('lich', LichController::class);
    Route::get('lich/{id}/thungay/{idthu}', [LichController::class, 'showlich']);
    Route::get('lich/uplich/{id}', [LichController::class, 'UpLich']);
    Route::get('lich/uplichAll/{id}', [LichController::class, 'uplichAll']);
    Route::post('lich/updateTime/{id}', [LichController::class, 'updateTime']);
    /**
     * Quản lý cơ sở
     */
    Route::resource('coso', CoSoController::class);
    Route::post('coso/create/select-delivery', [CoSoController::class, 'select_delivery']);
    Route::post('coso/{id}/edit/select-delivery', [CoSoController::class, 'select_delivery1']);
    Route::get('coso/changecoso/{id}', [CoSoController::class, 'changeCoSo']);
    /**
     * Quản lý đơn hàng
     */
    Route::resource('donhang', DonHangController::class);
    Route::resource('donhangchitiet', DonHangController::class);
    Route::get('/donhangchitiet/detail/{id}/edit', [DonHangchitietController::class, 'editDetailDonHang']);
    Route::post('/donhangchitiet/detail/{id}/edit', [DonHangchitietController::class, 'updateDetailDonHang']);
    /**
     * Quản lý giảm giá
     */
    Route::resource('giamgia', GiamGiaController::class);
    /**
     * Quản lý liệu trình
     */
    Route::resource('lieutrinh', LieuTrinhController::class);
    /**
     * Quản lý liên hệ
     */
    Route::resource('lienhe', LienHeController::class);
    /**
     * Quản lý liệu trình khách hàng
     */
    Route::put('editnamedv', [LieuTrinhController::class, 'editNameDv']);
    Route::post('editimglieutrinh', [LieuTrinhController::class, 'editImgLieuTrinh']);
    Route::get('khachhang/detail/{id}', [KhachHangController::class, 'detailKhachHang']);
    Route::post('khachhang/themlieutrinh/{id}/store', [KhachHangController::class, 'storeLieuTrinh']);
    Route::delete('khachhang/xoalieutrinh/{id}/delete', [KhachHangController::class, 'delLieuTrinh']);
    Route::get('khachhang/lieutrinh/{id}/edit', [LieuTrinhController::class, 'editLieuTrinhChiTiet']);
    Route::patch('khachhang/lieutrinh/{id}/update', [KhachHangController::class, 'updateLieuTrinh']);
    /**
     * Quản lý đặt lịch
     */
    Route::resource('datlichremake', DatLichRemakeController::class);
    Route::get('getDuLieuBoxDatLich/{id}', [DatLichRemakeController::class, "getDuLieuBoxDatLich"]);
    Route::get('getDuLieuDatLichDetail/{id}', [DatLichRemakeController::class, "getDuLieuDatLichDetail"]);
    Route::get('changeStatusDatLich/{id}/{status}', [DatLichRemakeController::class, "changeStatusDatLich"]);
    Route::get('getDuLieuDatLichChoCalendar/{ngay}', [DatLichRemakeController::class, "getDuLieuDatLichChoCalendar"]);
    Route::get('changeStatusTime/{id}/{status}', [DatLichRemakeController::class, "changeStatusTime"]);
    /**
     * Quản lý hóa đơn
    */
    Route::resource('hoadon', HoaDonController::class);
    Route::get('hoadon/trangthaithanhtoan/{id}', [HoaDonController::class, "trangthaithanhtoan"]);
    Route::resource('hoadonchitiet', HoaDonChiTietController::class);
    Route::get('/getDichVu', [DichVuController::class, 'getDichVuToHoaDon']);
    Route::get('/getSanPham', [SanPhamChiTietController::class, 'getSanPhamToHoaDon']);
    Route::get('hoadon/{id}/edit/getHoaDonChiTiet', [HoaDonChiTietController::class, 'getHoaDonChiTiet']);
    Route::get('hoadon/{id}/edit/sanphamchitiet/{idsp}', [SanPhamChiTietController::class, 'getSanPhamChiTietToHoaDon']);
    Route::get('hoadon/{id}/edit/dichvu/{idsp}', [DichVuController::class, 'getDichVuByIdToHoaDon']);
    Route::get('/getgiamgia/{idgiamgia}', [HoaDonController::class, 'getGiamGiaToHoaDon']);
    Route::get('hoadon/{id}/edit/discount/{name}/thanhtien/{tien}', [HoaDonController::class, 'ApDungGiamGia']);
    Route::get('hoadon/{id}/edit/capnhatgia/{tien}/tongtien/{tongtien}', [HoaDonController::class, 'CapNhatGia']);
    Route::get('hoadon/{id}/edit/xoahoadonchitiet/{idhdct}', [HoaDonController::class, 'XoaHoaDonChiTiet']);
    Route::get('hoadon/{id}/edit/themsanpham/{idsp}', [HoaDonChiTietController::class, 'ThemSanPhamVaoHoaDon']);
    Route::get('hoadon/{id}/edit/themdichvu/{iddv}', [HoaDonChiTietController::class, 'ThemDichVuVaoHoaDon']);
    Route::get('hoadon/{id}/edit/capnhatsoluong/{idhdct}/soluong/{soluong}', [HoaDonChiTietController::class, 'CapNhatSoLuong']);
    Route::get('hoadon/{id}/edit/huygiamgia/{tien}', [HoaDonChiTietController::class, 'HuyGiamGia']);
    /**
     * Thêm hóa đơn từ đặt lịch
    */
    Route::get('hoadon/themhoadondatlich/{id}', [HoaDonController::class, 'ThemHoaDonTuDatLich'])->name("hoadon.themhoadondatlich.id");
    /**
     * nhan add hoá đơn by id liệu trình
     */
    Route::get('hoadon/addhoadonbylieutrinh/{id}/store', [HoaDonController::class, 'addHoaDonByIdLieuTrinh']);
    /**
     * Banner
     */
    Route::resource('banner', BannerController::class);
    /**
     * Follower
     */
    Route::resource('theodoi', TheoDoiFLController::class);
});


Route::group(['prefix' => '/'], function () {
    /**
     * Trang chủ
     */
    Route::get('', [HomeController::class, "index"]);
    Route::get('trang-chu', [HomeController::class, "index"]);
    /**
     * Sản phẩm
     */
    Route::get('san-pham', [HomeController::class, "viewSanPham"]);
    Route::get('san-pham/getall', [HomeController::class, "getSanPham"]);
    Route::get('san-pham/chi-tiet/{id}', [HomeController::class, "viewSanPhamChiTiet"]);
    Route::get('san-pham/checkyeuthich/{id}', [YeuThichController::class, "getSanPhamYeuThich"]);
    Route::get('getyeuthichsps', [YeuThichController::class, "getAllSPYeuThich"]);
    Route::get('addyeuthichsp/{id}', [YeuThichController::class, "AddSanPhamYeuThich"]);
    /**
     * Bài viết
     */
    Route::get('bai-viet', [HomeController::class, "viewBaiViet"]);
    Route::get('bai-viet/{id}', [HomeController::class, "viewBaiVietChiTiet"]);
    /**
     * Danh mục
     */
    Route::get('danh-muc-bai-viet/{id}', [HomeController::class, "viewDanhmucBaiViet"]);
    /**
     * Dịch vụ
     */
    Route::get('dich-vu', [HomeController::class, "viewDichVu"]);
    /**
     * Tìm kiếm
     */
    Route::get('tim-kiem', [HomeController::class, "viewTimKiem"]);
    /**
     * Liên hệ
     */
    Route::get('lien-he', [HomeController::class, "viewLienHe"]);
    /**
     * Giới thiệu
     */
    Route::get('gioi-thieu', [HomeController::class, "viewGioiThieu"]);
    /**
     * Thông tin tài khoản
     */
    Route::get('thong-tin-tai-khoan', [HomeController::class, "viewProfileUser"]);
    Route::get('dich-vu/{slug}', [HomeController::class, "viewDichVuChiTiet"]);
    Route::get('danh-muc-dich-vu/{slug}', [HomeController::class, "danhmucdichvu"]);
    Route::get('nhanviencuacoso/{id}', [HomeController::class, "getNhanVienByIdCoSo"]);
    Route::get('getDataKhungGio', [HomeController::class, "getDataKhungGio"]);
    Route::get('huyprofile/{id}', [HomeController::class, "Huyprofile"]);
    Route::post('datLich', [HomeController::class, "datLich"]);
    Route::post('site-login', [HomeController::class, "login"]);
    Route::get('site-logout', [HomeController::class, "logoutSite"]);
    Route::post('sendOTPSMS', [HomeController::class, "sendOTPSMS"]);
    Route::get('removeOTP', [HomeController::class, "removeOTP"]);
    Route::post('checkOTP', [HomeController::class, "checkOTP"]);
    Route::post('getBlogsPagi', [HomeController::class, "getBlogsPagi"]);
    Route::post('skipCreatePassword', [HomeController::class, "skipCreatePassword"]);
    Route::post('newPassword', [HomeController::class, "newPassword"]);
    Route::post('checkIssetUser', [HomeController::class, "checkIssetUser"]);
    /**
     *Gio hang
     */
    Route::get('gio-hang', [HomeController::class, "viewGioHang"]);
    Route::get('showdonhangandgiohang', [GioHangController::class, "ShowGioHang"]);
    Route::get('themsanphamgiohang/{id}', [GioHangController::class, "ThemGioHang"]);
    Route::get('xoasanphamgiohang/{id}', [GioHangController::class, "XoaSanPhamGioHang"]);
    Route::get('tangsoluong/{id}', [GioHangController::class, 'TangSoLuong']);
    Route::get('giamsoluong/{id}', [GioHangController::class, 'GiamSoLuong']);
    Route::get('idsanphamchitiet/{id}/soluong/{soluong}', [GioHangController::class, 'CapNhatSoLuong']);
    Route::get('/themsanphamgiohangchitiet/{idsanpham}/soluongsanpham/{nhapsoluong}', [GioHangController::class, 'ThemGioHangChiTiet']);
    Route::get('xoatatcasanpham', [GioHangController::class, 'xoatatcasanpham']);
    Route::get('insergiohangdatawherelogin', [GioHangController::class, 'InserGioHangDataSession']);
    Route::get('CheckGiamGia/{name}/tongthangtoan/{gia}', [GiamGiaController::class, 'CheckGiamGia']);
    Route::get('/capnhatgiasession/{gia}', [GioHangController::class, 'capnhatgiasession']);
    Route::get('/capnhatgiamgiasession/{gia}', [GiamGiaController::class, 'capnhatgiamgiasession']);
    /**
     *Thanh toán
     */
    Route::get('thanh-toan', [HomeController::class, "viewThanhToan"]);
    Route::post("/vnpay_php/vnpay_create_payment", [GioHangController::class, 'vnpayments']);
    Route::post('/thanh-toan-don-hang', [GioHangController::class, "thanhtoandonhang"]);
    Route::get("/thanh-toan-hoa-don", [GioHangController::class, 'returnPay']);

    /**
     *Liệu trình
     */
    Route::get('lieutrinhchitiet/{id}/get', [HomeController::class, 'getLieuTrinhDetailByIdLieuTrinh']);
    Route::post('lieutrinh/cancel', [HomeController::class, 'huyLieuTrinh']);
    /**
     *Hủy đơn
     */
    Route::get("huydonhang/{id}", [GioHangController::class, "HuyDonHang"]);
    /**
     *Update profile
     */
    Route::post("updateprofile", [HomeController::class, "updateprofile"]);
    /**
     *Delete yêu thích
     */
    Route::get('xoayeuthich/{id}', [YeuThichController::class, "xoayeuthich"]);
    /**
     *Email liên hệ
     */
    Route::post("emaillienhe", [TheoDoiController::class, "store"]);
    /**
     * Liên hệ
     */
    Route::post('storeLienHe', [HomeController::class, "storeLienHe"]);
});

