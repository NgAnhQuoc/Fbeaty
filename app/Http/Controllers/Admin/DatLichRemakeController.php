<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendDatLich;
use App\Http\Controllers\Controller;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\DichVu\DichVuRepository;
use App\Repositories\KhachHang\KhachHangRepository;
use App\Repositories\DatLich\DatLichRepository;
use App\Repositories\NhanVien\NhanVienRepository;
use App\Models\Admin\DatLichModel;
use App\Repositories\Lich\LichRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Arr;

class DatLichRemakeController extends Controller
{
    private $data = array();
    private $CoSo;
    private $DatLich;
    private $DichVu;
    private $KhachHang;
    private $NhanVien;

    public function __construct(
        CoSoRepository $CoSo,
        DatLichRepository $DatLich,
        DichVuRepository $DichVu,
        KhachHangRepository $KhachHang,
        NhanVienRepository $NhanVien,
        LichRepository $Lich
        )
    {
        $this->CoSo = $CoSo;
        $this->DatLich = $DatLich;
        $this->DichVu = $DichVu;
        $this->KhachHang = $KhachHang;
        $this->NhanVien = $NhanVien;
        $this->Lich = $Lich;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['namePage']            = 'Khách Đặt Lịch';
        $this->data['breadcrumbArray']     = [
            ['link' => '/quantri/datlichremake', 'name' => 'Đặt lịch'],
            ['link' => '', 'name' => 'Danh sách'],
        ];

        $toDay = Carbon::now();
        $this->data['toDay'] = $toDay->toDateString();
        $this->data['timeToDay'] = $toDay->toTimeString();

        $this->data['listDichVu'] = $this->DichVu->getAllDichVu();
        $this->data['listKhachHang'] = $this->KhachHang->getAllCungCoSo(session('coso'));
        $this->data['listNhanVien'] = $this->NhanVien->getNhanVienByIdCoSo(session('coso'));
        $this->data['idCoSo'] = session('coso');
        $this->data['duLieuCalendar'] = $this->getDuLieuChoCalendar($toDay);
        $this->data['statusLichClose'] = Controller::TRANGTHAI_LICH_CLOSE;
        $this->data['statusNhanVienHoatDong'] = Controller::TRANGTHAI_NHANVIEN_HOATDONG;
        return view('Admin.DatLichRemake.index', $this->data);
    }

    public function getLichByDay($day, $idCoSo) {
        $newCarbon = new Carbon($day);
        $dayOfWeek = $newCarbon->dayOfWeek;
        $lich = $this->Lich->getLichByThuAndCoSo($dayOfWeek, $idCoSo);
        return $lich;
    }

    public function getDatLichByDay($ngay, $idCoSo) {
        $thoigian = Controller::getThoiGianTimestampDauVaCuoiCuaNgay($ngay->toDateString());
        $datlich = $this->DatLich->getDatLichByDay($thoigian['dauNgayTimestamp'], $thoigian['cuoiNgayTimestamp'], $idCoSo);

        foreach ($datlich as $datLichItem) {
            if ($datLichItem->idnhanvien == 0) {
                $datLichItem->nameNhanVien = 'Spa tự chọn';
            } else {
                $datLichItem->nameNhanVien = $this->NhanVien->getNameNhanVien($datLichItem->idnhanvien);
            }

            $arrayDichVu = array();
            $listIdDichVu = json_decode($datLichItem->iddichvu);

            if (count($listIdDichVu) > 0) {
                for ($i = 0; $i < count($listIdDichVu); $i++) {
                    $arrayDichVu[] = $this->DichVu->findDichVuById($listIdDichVu[$i]);
                }

                $datLichItem->arrayDichVu = $arrayDichVu;
            }
        }
        return $datlich;
    }

    public function getDuLieuChoCalendar($day) {
        $listLich = $this->getLichByDay($day, session('coso'));
        $listDatLich = $this->getDatLichByDay($day, session('coso'));
        $nullArray = array();
        foreach ($listLich as $lichItem) {
            $lichItem['listDatLich'] = [];
            $nullArray = [];

            $ngay = $day->toDateString().$lichItem->gio;

            $thoigiandat = Carbon::parse($ngay)->timestamp;

            foreach ($listDatLich as $datLichItem) {
                if ($datLichItem->thoigiandat == $thoigiandat) {
                    $nullArray[] = $datLichItem;
                } else {
                    // Tạo data mới cho trường hợp khung giờ thay đổi
                }
            }
            $lichItem['listDatLich'] = $nullArray;
        }


        return $listLich;
    }

    public function getDuLieuDatLichChoCalendar(Request $request, $ngay) {
        try {
            if ($request->ajax()) {
                if (DateTime::createFromFormat('Y-m-d', $ngay) !== false) {
                    $day = new Carbon($ngay);
                    $duLieuCalendar = $this->getDuLieuChoCalendar($day);

                    $response = Array(
                        'success' => true,
                        'duLieuCalendar' => $duLieuCalendar,
                        'ngay' => $ngay,
                    );
                } else {
                    $response = Array(
                        'success' => false,
                        'titleMess' => 'Ngày không hợp lệ',
                        'ngay' => $ngay,
                    );
                }
            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'textMess' => $e->getMessage(),
            ]);
        }
    }

    public function changeStatusDatLich(Request $request, $idDatLich, $status) {
        try {
            if ($request->ajax()) {
                $datLich = DatLichModel::find((int)$idDatLich);

                if ($datLich != null) {
                    $toDay = Carbon::today()->format('d/m/Y');
                    $ngayDat = Carbon::parse($datLich->thoigiandat)->format('d/m/Y');

                    if ($toDay >= $ngayDat) {
                        // update trạng thái
                        $datLich->trangthai = $status;
                        $datLich->save();

                        $response = Array(
                            'success' => true,
                            'idDatLich' => $idDatLich,
                            'status' => $status,
                            'toDay' => $toDay,
                            'ngayDat' => $ngayDat,
                            'idDatLich' => (int)$idDatLich,
                        );
                    } else {
                        $response = Array(
                            'success' => false,
                            'titleMess' => 'Đã xảy ra lỗi !',
                            'textMess' => 'Thời gian đặt lịch đã qua, không thể sửa',
                            'toDay' => $toDay,
                            'ngayDat' => $ngayDat
                        );
                    }
                } else {
                    $response = Array(
                        'success' => false,
                        'titleMess' => 'Đã xảy ra lỗi !',
                        'textMess' => 'Không tìm thấy id đặt lịch',
                        'idDatLich' => $idDatLich,
                    );
                }

            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'datLich' => $datLich,
                'textMess' => $e->getMessage(),
            ]);
        }
    }

    function changeStatusTime(Request $request, $id, $status) {
        try {
            if ($request->ajax()) {
                $id = (int)$id;
                $lich = $this->Lich->find($id);

                if ($lich != null) {
                    $data = [
                        'trangthai' => $status,
                    ];

                    $lich = $this->Lich->update($id, $data);
                    $lich['typez'] = 'lich';

                    event(
                        $e = new SendDatLich($lich)
                    );

                    $response = Array(
                        'success' => true,
                        'id' => $id,
                        'status' => $status,
                        'lich' => $lich
                    );
                } else {
                    $response = Array(
                        'success' => false,
                        'titleMess' => 'Đã xảy ra lỗi !',
                        'textMess' => 'Không tìm thấy lịch',
                        'id' => $id,
                    );
                }

            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'lich' => $lich,
                'textMess' => $e->getMessage(),
            ]);
        }
    }

    public function getDatLichById($id) {
        $datLichItem = $this->DatLich->getDatLichById($id);

        if ($datLichItem->idnhanvien == 0) {
            $datLichItem->nameNhanVien = 'Spa tự chọn';
        } else {
            $datLichItem->nameNhanVien = $this->NhanVien->getNameNhanVien($datLichItem->idnhanvien);
        }

        $arrayDichVu = array();
        $listIdDichVu = json_decode($datLichItem->iddichvu);

        if (count($listIdDichVu) > 0) {
            for ($i = 0; $i < count($listIdDichVu); $i++) {
                $arrayDichVu[] = $this->DichVu->findDichVuById($listIdDichVu[$i]);
            }

            $datLichItem->arrayDichVu = $arrayDichVu;
        }


        return $datLichItem;
    }

    public function getDuLieuBoxDatLich(Request $request, $id) {
        try {
            if ($request->ajax()) {
                $duLieuDatLich = $this->getDatLichById($id);
                if ($duLieuDatLich != null) {
                    $response = Array(
                        'success' => true,
                        'id' => $id,
                        'duLieuDatLich' => $duLieuDatLich
                    );
                } else {
                    $response = Array(
                        'success' => false,
                        'titleMess' => 'Đã xảy ra lỗi !',
                        'textMess' => 'Không tìm thấy dữ liệu đặt lịch id ' . $id,
                    );
                }
            }

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'textMess' => $e->getMessage(),
            ]);
        }
    }

    // public function getDuLieuDatLichDetail(Request $request, $id) {
    //     try {
    //         if ($request->ajax()) {
    //             $duLieuDatLichDetail = $this->getDatLichDetailById($id);

    //             if ($duLieuDatLichDetail != null) {
    //                 $response = Array(
    //                     'success' => true,
    //                     'id' => $id,
    //                     'duLieuDatLich' => $duLieuDatLichDetail
    //                 );
    //             } else {
    //                 $response = Array(
    //                     'success' => false,
    //                     'titleMess' => 'Đã xảy ra lỗi !',
    //                     'textMess' => 'Không tìm thấy dữ liệu đặt lịch id ' . $id,
    //                 );
    //             }
    //         }

    //         return response()->json($response);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'titleMess' => 'Đã xảy ra lỗi !',
    //             'textMess' => $e->getMessage(),
    //         ]);
    //     }
    // }

    // public function getDatLichDetailById($id) {
    //     $datLichItem = $this->DatLich->find($id);

    //     if ($datLichItem->idnhanvien == 0) {
    //         $datLichItem->nameNhanVien = 'Spa tự chọn';
    //     } else {
    //         $datLichItem->nameNhanVien = $this->NhanVien->getNameNhanVien($datLichItem->idnhanvien);
    //     }

    //     $arrayDichVu = array();
    //     $listIdDichVu = json_decode($datLichItem->iddichvu);

    //     if (count($listIdDichVu) > 0) {
    //         for ($i = 0; $i < count($listIdDichVu); $i++) {
    //             $arrayDichVu[] = $this->DichVu->findDichVuById($listIdDichVu[$i]);
    //         }

    //         $datLichItem->arrayDichVu = $arrayDichVu;
    //     }


    //     return $datLichItem;
    // }

    public function destroy($id) {
        $datLich = $this->DatLich->find($id);

        if ($datLich == null) {
            $response = Array(
                'success' => false,
                'titleMess' => 'Đã xảy ra lỗi !',
                'textMess' => 'Không tìm thấy sự kiện',
                'datLich' => $datLich,
            );
        } else {
            $datLich->delete();

            $response = Array(
                'success' => true,
                'titleMess' => 'Thành công !',
                'textMess' => 'Xóa lịch đặt của khách thành công',
            );
        }

        return $response;
    }
}
