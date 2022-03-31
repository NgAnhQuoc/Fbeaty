<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CoSo\CoSoRepository;
use App\Repositories\Lich\LichRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LichController extends Controller
{
    private $Coso;
    private $Lich;

    /**
     * CosoController constructor.
     * @param CoSoRepository $Coso
     * @param LichRepository $Lich
     */
    public function __construct(CoSoRepository $Coso, LichRepository $Lich)
    {
        $this->Coso = $Coso;
        $this->Lich = $Lich;
    }

    /**
     * Show lịch theo cơ sở
     */
    public function index()
    {
        $cs = $this->Coso->getCosoByIdSessionCoso();
        return view("Admin.Lich.index", ['coso' => $cs]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * Thêm lịch từ tạo cơ sở
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     *Show lịch bằng ajax
     */
    public function showlich($id, $idthu)
    {
        $lichlam = $this->Lich->getLich($id, $idthu);
        return $lichlam;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     *Cập nhật lịch by id
     */
    public function UpLich(Request $request, $id)
    {
        if ($request->soluong <= 1000000) {
            $lich = [
                'soluongkhach' => $request->soluong,
                'trangthai' => $request->trangthai
            ];
            $this->Lich->update($id, $lich);
            return 1;
        } else {
            return 0;
        }


    }

    /**
     *Cập nhật lịch làm việc của 1 cơ sở
     */
    public function uplichAll(Request $request, $id)
    {
        $thu = $request->thutrongtuan;
        $tt = $request->trangthai;
        $this->Lich->updateALL($id, $thu, $tt);
        return true;
    }

    /**
     *Cập nhật thời giam làm việc
     */
    public function updateTime(Request $request, $id)
    {
        if ($request->soluongkh <= 1000000) {
            $this->Lich->deleteLichByIdCoSo($id);
            $khachhang = $request->soluongkh;
            $gio = $request->giobatdau;
            $phut = 0;
            $gioketthuc = $request->gioketthuc;
            for ($j = 0; $j <= 6; $j++) {
                for ($i = 1; $i < 300; $i++) {
                    $khoanGiuaKhungGio = $request->khoangiua;
                    $toTime = sprintf('%02d:%02d', $gio, $phut);
                    //isert chổ này
                    $lich = [
                        'idcoso' => $id,
                        'thutrongtuan' => $j,
                        'soluongkhach' => $khachhang,
                        'gio' => $toTime,
                        'trangthai' => Controller::TRANGTHAI_LICH_OPEN
                    ];
                    $this->Lich->create($lich);
                    $phut += $khoanGiuaKhungGio;
                    if ($phut >= 60) {
                        $gio += 1;
                        $phut = 0;
                    }
                    if ($gio == $gioketthuc and $phut > 0) {
                        $gio = $request->giobatdau;
                        $gioketthuc = $request->gioketthuc;
                        $phut = 0;
                        break;
                    }
                }
            }
            return redirect(route('lich.index'))->with('thanhcong', 'Cập nhật lịch thành công');
        }
        return redirect(route('lich.index'))->with('thatbai', 'Số lượng khách không được quá 1000000');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
