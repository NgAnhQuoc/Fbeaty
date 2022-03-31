<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Repositories\DatLich\DatLichRepository;
use App\Repositories\DonHang\DonHangRepository;
use App\Repositories\HoaDon\HoaDonRepository;
use App\Repositories\NhanVien\NhanVienRepository;
class ThongkeController extends Controller
{
    private $data = array();
    private $DonHang;
    private $khachHang;
    private $GiamGia;
    private $DonHangChiTiet;
    private $HoaDon;
    private $idCoSo;
    private $NhanVien;

    public function __construct(
        DonHangRepository $DonHang,
        DatLichRepository $DatLich,
        HoaDonRepository $HoaDon,
        NhanVienRepository $NhanVien
    ){
        $this->DatLich = $DatLich;
        $this->DonHang = $DonHang;
        $this->HoaDon = $HoaDon;
        $this->NhanVien = $NhanVien;
    }

    public function index()
    {
        $this->data['namePage']            = 'Thống kê';
        $this->data['breadcrumbArray']     = [
            ['link' => '/quantri', 'name' => 'Thống kê'],
            ['link' => '', 'name' => 'Danh sách'],
        ];

        $toDay = Carbon::today();

        $yesterday = Carbon::now()->subDays(1);
        $this->getDuLieuDatLichFirst($toDay, $yesterday);
        $this->getDuLieuHoaDonFirst($toDay, $yesterday);
        $this->getDuLieuNumDonHangFirst($toDay, $yesterday);
        $this->getDuLieuDonHangHoanThanhFirst($toDay, $yesterday);
        $this->data['doanhThuHoaDonToday'] = $this->getHoaDonByDay($toDay, session('coso'));
        $this->data['doanhThuHoaDonSauThangGanNhat'] = $this->getDoanhThuHoaDonSauThangGanNhat();
        $this->data['doanhThuDonHangSauThangGanNhat'] = $this->getDoanhThuHonHangSauThangGanNhat();
        $this->data['toDay'] = $toDay->toDateString();

        return view("Admin.Thongke.index", $this->data);
    }

    public function getHoaDonByDay($ngay, $idCoSo) {
        $thoigian = Controller::getThoiGianDauVaCuoiCuaNgay($ngay->toDateString());
        $hoaDonByDay = $this->HoaDon->getHoaDonByDate($thoigian['dau'], $thoigian['cuoi'], $idCoSo);
        $hoaDonByDay = $this->getNameThuNganToArrHoaDon($hoaDonByDay);
        $hoaDonByDay = $this->getNameTrangThaiHoaDon($hoaDonByDay);
        return $hoaDonByDay;
    }

    public function getNameTrangThaiHoaDon($arrHoaDon) {
        foreach ($arrHoaDon as $hoaDon) {
            if ($hoaDon->trangthai == Controller::TRANGTHAI_HOADON_CHUA_THANH_TOAN) {
                $hoaDon->nameTrangThai = 'Chưa thanh toán';
                $hoaDon->classTrangThai = 'warning';
            }

            if ($hoaDon->trangthai == Controller::TRANGTHAI_HOADON_DA_THANH_TOAN) {
                $hoaDon->nameTrangThai = 'Đã thanh toán';
                $hoaDon->classTrangThai = 'success';
            }
        }

        return $arrHoaDon;
    }

    public function getNameThuNganToArrHoaDon($arrHoaDon) {
        foreach ($arrHoaDon as $hoaDon) {
            $hoaDon['nameThuNgan'] = $this->NhanVien->getNameNhanVien($hoaDon->idthungan);
        }

        return $arrHoaDon;
    }

    public function getDuLieuDonHangHoanThanhFirst($toDay, $yesterday) {
        $this->data['doanhThuDonHangHoanThanhToday'] = $this->getDoanhThuDonHangHoanThanh($toDay, session('coso'));
        $this->data['doanhThuDonHangHoanThanhYesterday'] = $this->getDoanhThuDonHangHoanThanh($yesterday, session('coso'));
        if ($this->data['doanhThuDonHangHoanThanhToday'] > 0 && $this->data['doanhThuDonHangHoanThanhYesterday'] > 0) {
            $this->data['phanTramDoanhThuDonHangHoanThanh'] = ceil($this->data['doanhThuDonHangHoanThanhToday'] / $this->data['doanhThuDonHangHoanThanhYesterday'] * 100);
        } else {
            $this->data['phanTramDoanhThuDonHangHoanThanh'] = 0;
        }
    }

    public function getDuLieuDatLichFirst($toDay, $yesterday) {
        $this->data['soDatLichToday'] = $this->getSoDatLich($toDay, session('coso'));
        $this->data['soDatLichYesterday'] = $this->getSoDatLich($yesterday, session('coso'));
        if ($this->data['soDatLichToday'] > 0 && $this->data['soDatLichYesterday'] > 0) {
            $this->data['phanTramDatLich'] = ceil($this->data['soDatLichToday'] / $this->data['soDatLichYesterday'] * 100);
        } else {
            $this->data['phanTramDatLich'] = 0;
        }
    }

    public function getDuLieuHoaDonFirst($toDay, $yesterday) {
        $this->data['tongDoanhThuHoaDonToday'] = $this->getDoanhThuHoaDon($toDay, session('coso'));
        $this->data['tongDoanhThuHoaDonYesterday'] = $this->getDoanhThuHoaDon($yesterday, session('coso'));
        if ($this->data['tongDoanhThuHoaDonToday'] > 0 && $this->data['tongDoanhThuHoaDonYesterday'] > 0) {
            $this->data['phanTramDoanhThu'] = ceil($this->data['tongDoanhThuHoaDonToday'] / $this->data['tongDoanhThuHoaDonYesterday'] * 100);
        } else {
            $this->data['phanTramDoanhThu'] = 0;
        }
    }

    public function getDuLieuNumDonHangFirst($toDay, $yesterday) {
        $this->data['numDonHangToday'] = $this->getNumDonHang($toDay);
        $this->data['numDonHangYesterday'] = $this->getNumDonHang($yesterday);
        if ($this->data['numDonHangToday'] > 0 && $this->data['numDonHangYesterday'] > 0) {
            $this->data['phanTramNumDonHang'] = ceil($this->data['numDonHangToday'] / $this->data['numDonHangYesterday'] * 100);
        } else {
            $this->data['phanTramNumDonHang'] = 0;
        }
    }

    public function getNumDonHang($ngay) {
        $thoigian = Controller::getThoiGianDauVaCuoiCuaNgay($ngay->toDateString());
        $numDonHang = $this->DonHang->getNumDonHang($thoigian['dau'], $thoigian['cuoi']);

        return $numDonHang;
    }

    public function getDoanhThuDonHangHoanThanh($ngay) {
        $thoigian = Controller::getThoiGianDauVaCuoiCuaNgay($ngay->toDateString());
        $tongDoanhThu = $this->DonHang->getDoanhThuDonHangHoanThanh($thoigian['dau'], $thoigian['cuoi']);

        return $tongDoanhThu;
    }

    public function getDoanhThuHoaDon($ngay, $idCoSo) {
        $thoigian = Controller::getThoiGianDauVaCuoiCuaNgay($ngay->toDateString());
        $tongDoanhThu = $this->HoaDon->getTongDoanhThuHoaDon($thoigian['dau'], $thoigian['cuoi'], $idCoSo);

        return $tongDoanhThu;
    }

    public function getSoDatLich($ngay, $idCoSo) {
        $thoigian = Controller::getThoiGianTimestampDauVaCuoiCuaNgay($ngay->toDateString());
        $soDatLich = $this->DatLich->getNumDatLichByTime($thoigian['dauNgayTimestamp'], $thoigian['cuoiNgayTimestamp'], $idCoSo);
        return $soDatLich;
    }

    public function getHoaDonByDayAjax(Request $request, $day) {
        try {
            if ($request->ajax()) {
                $day =  new Carbon($day);
                $hoaDon = $this->getHoaDonByDay($day, session('coso'));
                $response = Array(
                    'success' => true,
                    'day' => $day,
                    'hoaDon' => $hoaDon
                );
            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'textMess' => $e->getMessage()
            ]);
        }
    }

    public function getDoanhThuHoaDonSauThangGanNhat() {
        $arrDoanhThu = Array();
        for ($i = 1; $i <= 6; $i++) {
            $date = Carbon::now()->subMonth($i);
            $thoigian = $this->getTime('month', $date);
            $tongDoanhThu = $this->HoaDon->getTongDoanhThuHoaDon($thoigian['dau'], $thoigian['cuoi'], session('coso'));
            $arrDoanhThu[] = $tongDoanhThu;
        }

        return $arrDoanhThu;
    }

    public function getDoanhThuHonHangSauThangGanNhat() {
        $arrDoanhThu = Array();
        for ($i = 1; $i <= 6; $i++) {
            $date = Carbon::now()->subMonth($i);
            $thoigian = $this->getTime('month', $date);
            $tongDoanhThu = $this->DonHang->getDoanhThuDonHangHoanThanh($thoigian['dau'], $thoigian['cuoi']);
            $arrDoanhThu[] = $tongDoanhThu;
        }

        return $arrDoanhThu;
    }

    public function getDoanhThuHoaDonVaDonHangAjax(Request $request, $type, $numData, $date)
    {
        try {
            if ($request->ajax()) {
                $arrDoanhThuHoaDon = array();
                $arrDoanhThuDonHang = array();
                $arrThoiGian = array();
                $arrLabel = array();
                for ($i = 0; $i <= $numData; $i++) {
                    if ($type == 'day')
                    {
                        if ($date == 0) {
                            $time = Carbon::now()->subDay($i);
                        } else {
                            $time = new Carbon($date);
                            $time = $time->subDay($i);
                        }

                        if ($numData > 30) {
                            $arrLabel[] = $time->format('d-m');
                        } else {
                            $arrLabel[] = 'Ngày ' . $time->format('d');
                        }
                    } else if ($type == 'month')
                    {
                        if ($date == 0) {
                            $time = Carbon::now()->subMonthNoOverflow($i);
                        } else {
                            $time = new Carbon($date);
                            $time = $time->subMonthNoOverflow($i);
                        }
                        $arrLabel[] = 'Tháng ' . $time->format('m');
                    } else if ($type == 'year')
                    {
                        if ($date == 0) {
                            $time = Carbon::now()->subYear($i);
                        } else {
                            $time = new Carbon($date);
                            $time = $time->subYear($i);
                        }
                        $arrLabel[] = 'Năm ' . $time->format('Y');
                    }

                    $thoigian = $this->getTime($type, $time);
                    $tongDoanhThuHoaDon = $this->HoaDon->getTongDoanhThuHoaDon($thoigian['dau'], $thoigian['cuoi'], session('coso'));
                    $tongDoanhThuDonHang = $this->DonHang->getDoanhThuDonHangHoanThanh($thoigian['dau'], $thoigian['cuoi']);
                    $arrThoiGian[] = $thoigian;
                    $arrDoanhThuHoaDon[] = $tongDoanhThuHoaDon;
                    $arrDoanhThuDonHang[] = $tongDoanhThuDonHang;
                }

                $response = Array(
                    'success' => true,
                    'arrThoiGian' => $arrThoiGian,
                    'arrDoanhThuHoaDon' => $arrDoanhThuHoaDon,
                    'arrDoanhThuDonHang' => $arrDoanhThuDonHang,
                    'arrLabel' => $arrLabel
                );
            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'textMess' => $e->getMessage()
            ]);
        }
    }

    public function getTime($type, $date) {
        if ($type == 'day') {
            $day = new Carbon($date);
            $thoigian = Controller::getThoiGianDauVaCuoiCuaNgay($day->toDateString());
        } else if ($type == 'month') {
            $thoigian = $this->getThoiGiangDauVaCuoiCuaThang($date);
        } else if ($type == 'year') {
            $thoigian = $this->getThoiGiangDauVaCuoiCuaNam($date);
        }

        return $thoigian;
    }

    public function getThoiGiangDauVaCuoiCuaThang($date) {
        $day = new Carbon($date);
        $startDay = $day->startOfMonth()->toDateString();
        $endDay = $day->endOfMonth()->toDateString();
        $dau = $startDay . ' 00:00:00';
        $cuoi = $endDay . ' 23:59:59';

        return array (
            'dau' => $dau,
            'cuoi' => $cuoi
        );
    }

    public function getThoiGiangDauVaCuoiCuaNam($date) {
        $day = new Carbon($date);
        $startYear = $day->startOfYear()->toDateString();
        $endYear = $day->endOfYear()->toDateString();
        $dau = $startYear . ' 00:00:00';
        $cuoi = $endYear . ' 23:59:59';

        return array (
            'dau' => $dau,
            'cuoi' => $cuoi
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
