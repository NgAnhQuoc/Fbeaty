<?php

namespace App\Http\Controllers;

use App\Models\Admin\DichVuModel;
use App\Models\Admin\NhanVien;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const BASE_URL_UPLOAD = 'Admin/assets/images/users/';
    const URL_IMG = 'uploads/';
    const BASE_URL_UPLOAD_STAFF = 'uploads/imgusers/';
    const BASE_URL_UPLOAD_CUSTOMER = 'uploads/khachhang/';
    const BASE_URL_UPLOAD_BANNER = 'Site/images/';

    const LOAI_DANHMUC_DICHVU = 1;
    const LOAI_DANHMUC_SANPHAM = 2;
    const LOAI_DANHMUC_BLOG = 3;
    const LOAI_DANHMUC_THUONG_HIEU = 4;
    const KHACHHANG_CHUA_ACTIVE = 0;
    const KHACHHANG_DA_ACTIVE = 1;
    const TRANGTHAI_LICH_OPEN = 0;
    const TRANGTHAI_LICH_CLOSE = 1;
    const TRANGTHAI_HOADON_DA_THANH_TOAN = 1;
    const TRANGTHAI_HOADON_CHUA_THANH_TOAN = 0;
    const TRANGTHAI_DONHANG_DA_NHAN = 4;
    const TRANGTHAI_DICHVU_HIEN = 1;
    const TRANGTHAI_SANPHAM = 1;//HIỆN
    const TRANGTHAI_NHANVIEN_HOATDONG = 1;
    /**
     * ID_LIENQUAN_SP=1 LÀ SẢN PHẨM
     * ID_LIENQUAN_DV=0 LÀ DỊCH VỤ
     * TRANGTHAITHANHTOAN=1 ĐÃ THANH TOÁN
     * TRANGTHAITHANHTOAN !=1 CHƯA THANH TOÁN
     */
    const ID_LIENQUAN_SP_ = 1;
    const ID_LIENQUAN_DV_ = 0;
    const TRANGTHAITHANHTOAN = 1;
    /**
     *LOAIGIAM=1 LÀ %
     * LOAIGIAM=0 LÀ tiền
     */
    const LOAIGIAM = 1;

    // path upload using for uploadSingle and uploadMultipleImg
    const PATH_UPLOADS = 'public';
    const PATH_UPLOADS_KHACHHANG = 'imgKH';
    /**
     * Trạng thái đơn hàng
     */
    const DONHANG_CHOXACNHAN = 0;
    const DONHANG_DANGGIAO = 1;
    const DONHANG_DAGIAO = 2;
    const DONHANG_DAHUY = 3;
    const DONHANG_TRAHANG = 4;
    const DONHANG_DONHANGLOI = 5;
    /**
     * End trạng thái đơn hàng
     */
    /**
     * Trạng thái đơn hàng
     */
    const DATLICH_CHUADEN = 0;
    const DATLICH_HOANTHANH = 1;
    const DATLICH_HUY = 2;
    /**
     * End trạng thái đơn hàng
     */
    /**
     * Trạng thái hóa đơn
     */
    const DONHANG_TYPE_DICHVU = 0;
    const DONHANG_TYPE_SANPHAM = 1;
    /**
     * End trạng thái hóa đơn
     */
    /**
     * Phí ship hàng
     */
    const PHI_SHIP_HANG = 30000;
    /**
     *Banner
     */
    const BANNER_HIEN = 1;
    const BANNER_AN = 0;

    /**
     *end banner
     */
    function uploadSingle($path, $file)
    {
        if ($file == null) return null;
        $filename = 'photo-' . time() . '.' . $file->getClientOriginalExtension();

        Storage::disk($path)->put($filename, file_get_contents($file));

        return $filename;
    }

    public function uploadMultipleImg($path, $photos)
    {
        $paths = [];
        foreach ($photos as $index => $photo) {
            $extension = $photo->getClientOriginalExtension();
            $filename = 'photo-' . time() . $index . '.' . $extension;
            $paths[] = $filename;
            Storage::disk($path)->put($filename, file_get_contents($photo));
        }
        return json_encode($paths);
    }

    /**
     *check định dạng ảnh và lưu vào mục users
     */
    public function checkImg($extension, $img)
    {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'JPG', 'PNG', 'jpeg', 'JPEG'];
            $check = in_array($extension, $allowedfileExtension);
            if (!$check) {
                return false;
            } else {
                $img->move(self::BASE_URL_UPLOAD_STAFF, $img->getClientOriginalName());
                return true;
            }
    }

    public function checkImgBanner($extension, $img)
    {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'JPG', 'PNG', 'jpeg', 'JPEG'];
            $check = in_array($extension, $allowedfileExtension);
            if (!$check) {
                return false;
            } else {
                $img->move(self::BASE_URL_UPLOAD_BANNER, $img->getClientOriginalName());
                return true;
            }
    }

    public function checkImgCustomer($extension, $img)
    {
            $allowedfileExtension = ['jpg', 'png', 'gif', 'JPG', 'PNG', 'jpeg', 'JPEG'];
            $check = in_array($extension, $allowedfileExtension);
            if (!$check) {
                return false;
            } else {
                $img->move(self::BASE_URL_UPLOAD_CUSTOMER, $img->getClientOriginalName());
                return true;
            }
    }

    public function handleError($error)
    {
        return Redirect::back()->withErrors($error);
    }

    public function handleErrorInput($error)
    {
        return back()->withError($error)->withInput();
    }

    public static function caculateGia($donGia, $giamGia)
    {
        $tinh = $donGia - ($donGia / 100 * $giamGia);
        $num = round($tinh, 0);
        return number_format($num, 0, ',', ',');
    }

    public function getThoiGianDauVaCuoiCuaNgay($ngay)
    {
        $dauNgay = $ngay . ' 00:00:00';
        $cuoiNgay = $ngay . ' 23:59:59';

        return array(
            'dau' => $dauNgay,
            'cuoi' => $cuoiNgay
        );
    }

    public function getThoiGianTimestampDauVaCuoiCuaNgay($ngay)
    {
        $dauNgay = $ngay . ' 00:00:00';
        $cuoiNgay = $ngay . ' 23:59:59';
        $dauNgayTimestamp = Carbon::parse($dauNgay)->timestamp;

        $cuoiNgayTimestamp = Carbon::parse($cuoiNgay)->timestamp;
        // $taoFormatCarbon = Carbon::createFromTimestamp($dauNgayTT);
        return array(
            'dauNgayTimestamp' => $dauNgayTimestamp,
            'cuoiNgayTimestamp' => $cuoiNgayTimestamp
        );
    }

    public function getThoiGianTimestampDauNamVaCuoiNam($nam)
    {
        $date = Carbon::createFromDate($nam);
        $startOfYear = $date->copy()->startOfYear();
        $endOfYear = $date->copy()->endOfYear();

        $startOfYear = Carbon::parse($startOfYear)->timestamp;
        $endOfYear = Carbon::parse($endOfYear)->timestamp;

        return array(
            'startOfYear' => $startOfYear,
            'endOfYear' => $endOfYear
        );
    }

    // function unique slug
    public function setSlugStore($model, $name)
    {

        $data = $model->getAll()->sortByDesc('id')->first();
        $slug = Str::slug($name) . '-' . $data->id + 1;

        return $slug;
    }

    public function setSlugUpdate($id, $name)
    {
        $slug = Str::slug($name) . '-' . $id;
        return $slug;
    }


    public static function findNameKhById($id)
    {
        return NhanVien::findNhanVienById($id)->name;
    }

    public static function minusDate($startTime, $endTime)
    {

        if ($endTime < $startTime) {
            return false;
        } else {
            Carbon::setLocale('vi');
            $startTime = Carbon::parse(date('Y-m-d H:i:s', $startTime));
            $endTime = Carbon::parse(date('Y-m-d H:i:s', $endTime));
            $newMinute = $endTime->diffForHumans($startTime);
            return $newMinute;
        }
    }


    public static function findNameDVByIds($ids)
    {
        $arrayData = [];
        $dataIds = json_decode($ids);;
        foreach ($dataIds as $id) {
            $findDV = DichVuModel::find($id);
            if ($findDV) {
                array_push($arrayData, $findDV->name);
            }
        }
        return implode(", ", $arrayData);

    }
}
