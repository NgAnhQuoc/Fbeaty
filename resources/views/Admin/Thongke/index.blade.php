@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="page-title">{{ $namePage }}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            @foreach ($breadcrumbArray as $breadcrumbItem)
                                                @if ($breadcrumbItem['link'] == '')
                                                    <li class="breadcrumb-item active">{{ $breadcrumbItem['name'] }}</li>
                                                @else
                                                    <li class="breadcrumb-item"><a href="{{ $breadcrumbItem['link'] }}">{{ $breadcrumbItem['name'] }}</a></li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Đặt Lịch</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            {{-- <span class="badge badge-success badge-pill float-left mt-3">{{ $phanTramDatLich }}% <i class="mdi mdi-trending-up"></i> </span> --}}
                                            <h2 class="font-weight-normal mb-1"> {{ $soDatLichToday }} <small>Khách</small>  </h2>

                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <span class="badge badge-success badge-pill float-left">{{ $phanTramDatLich }}% <i class="mdi mdi-trending-up"></i> </span>
                                                <p class="text-muted mb-0 flex-grow-1">So với hôm qua</p>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                    aria-valuenow="{{ $phanTramDatLich }}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $phanTramDatLich }}%;">
                                                <span class="sr-only">% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Doanh Thu Offline</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            <h2 class="font-weight-normal mb-1"> {{ number_format($tongDoanhThuHoaDonToday, 0) }} đ</h2>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <span class="badge badge-primary badge-pill float-left">{{ $phanTramDoanhThu }}% <i class="mdi mdi-trending-up"></i> </span>
                                                <p class="text-muted mb-0 flex-grow-1">So với hôm qua</p>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-alt-primary progress-sm">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                    aria-valuenow="{{ $phanTramDoanhThu }}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $phanTramDoanhThu }}%;">
                                                <span class="sr-only">{{ $phanTramDoanhThu }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Đơn Hàng</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            <h2 class="font-weight-normal mb-1"> {{ $numDonHangToday }} <small>Đơn hôm nay</small></h2>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <span class="badge badge-warning badge-pill float-left">{{ $phanTramNumDonHang }}% <i class="mdi mdi-trending-up"></i> </span>
                                                <p class="text-muted mb-0 flex-grow-1">So với hôm qua</p>
                                            </div>

                                        </div>


                                        <div class="progress progress-bar-alt-warning progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                    aria-valuenow="{{ $phanTramNumDonHang }}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $phanTramNumDonHang }}%;">
                                                <span class="sr-only">{{ $phanTramNumDonHang }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Doanh Thu Đơn Hàng</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            {{-- <span class="badge badge-pink badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span> --}}
                                            <h2 title="Cho đơn hoàn thành" class="font-weight-normal mb-1"> {{ number_format($doanhThuDonHangHoanThanhToday, 0) }} đ </h2>
                                            {{-- <p class="text-muted mb-3">Revenue today</p> --}}
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <span class="badge badge-pink badge-pill float-left">{{ $phanTramDoanhThuDonHangHoanThanh }}% <i class="mdi mdi-trending-up"></i> </span>
                                                <p class="text-muted mb-0 flex-grow-1">So với hôm qua</p>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-alt-pink progress-sm">
                                            <div class="progress-bar bg-pink" role="progressbar"
                                                    aria-valuenow="{{ $phanTramDoanhThuDonHangHoanThanh }}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $phanTramDoanhThuDonHangHoanThanh }}%;">
                                                <span class="sr-only">{{ $phanTramDoanhThuDonHangHoanThanh }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12 col-xl-7">
                                <div class="card-box">
                                    <div class="d-flex align-items-center mb-2">
                                        <h4 class="header-title mt-0 mb-0 flex-grow-1">Doanh Thu Ngày</h4>
                                        <div class="input-group" style="width: 30%;">
                                            <input type="date" class="form-control ip-doanh-thu-ngay" placeholder="mm/dd/yyyy" id="" value="{{ $toDay }}" onchange="getDoanhThuByDay(event);">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0 custom-table-2" id="doanhthu-ngay" style="min-width: 600px;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Khách Hàng</th>
                                                <th>Thu Ngân</th>
                                                <th class="text-center">Trước giảm</th>
                                                <th class="text-center">Tổng Thu</th>
                                                <th>Trạng Thái</th>
                                            </tr>
                                            </thead>
                                            <tbody class="custom-table-body-2 body-doanhthu-hoadon-ngay" style="min-height: 380px;">
                                                @php
                                                    $tongTienTruocGiam = 0;
                                                    $tongTienSauGiam = 0;
                                                @endphp
                                                @foreach ($doanhThuHoaDonToday as $hoaDon)
                                                @php
                                                    $tongTienTruocGiam += $hoaDon->tongtientruocgiamgia;
                                                    $tongTienSauGiam += $hoaDon->tongtiensaugiamgia;
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $hoaDon->nameKhachHang }}</td>
                                                    <td>{{ $hoaDon->nameThuNgan }}</td>
                                                    <td class="text-right">{{ number_format($hoaDon->tongtientruocgiamgia, 0) }} đ</td>
                                                    <td class="text-right">{{ number_format($hoaDon->tongtiensaugiamgia, 0) }} đ</td>
                                                    <td><span class="badge badge-{{ $hoaDon->classTrangThai }}">{{ $hoaDon->nameTrangThai }}</span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-footer-2 mt-2">
                                        <label for="">Tổng tiền: </label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-group-2 d-flex mr-3">
                                                <label for="" class="text-gray mb-0">Trước giảm: </label>
                                                <h4 class="m-0 ml-2 tong-truoc-giam">
                                                    {{ number_format($tongTienTruocGiam, 0) }} đ
                                                </h4>
                                            </div>

                                            <div class="form-group-2 d-flex">
                                                <label for="" class="text-gray mb-0">Sau giảm: </label>
                                                <h4 class="m-0 ml-2 tong-sau-giam">
                                                    {{ number_format($tongTienSauGiam, 0) }} đ
                                                </h4>
                                            </div>
                                            <button class="btn btn-dark waves-effect waves-light ml-auto exportExcelButton" id-table-download="doanhthu-ngay"><i class="fa fa-print"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-5">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="header-title mt-0">6 Tháng Gần Nhất</h4>
                                        <canvas id="chartHoaDonSixMonth"></canvas>

                                    </div>


                                </div>

                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="header-title mt-0">Doanh Thu Online 6 Tháng Gần Nhất</h4>
                                        <canvas id="chartDonHangSixMonth"></canvas>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <div class="card-head d-flex align-items-center">
                                        <h4 class="header-title mt-0 mb-0 mr-auto">Bar chart</h4>
                                        <div class="form-group mb-0 mr-2" style="width: 15%;">
                                            <select class="form-control" id="select-type-fa-time">
                                                <option value="recent">Thời gian gần nhất</option>
                                                <option value="specific">Thời gian cụ thể</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-0 mr-2" style="width: 15%;">
                                            <select class="form-control" id="select-type-time">
                                                <option value="day">Ngày</option>
                                                <option value="month">Tháng</option>
                                                <option value="year">Năm</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-0" style="width: 15%;">
                                            <div class="fa-select-time specific-time-option" style="display: none;">
                                                <div class="select-time" id="specific-day">
                                                    <input type="text" class="form-control"id="ip-specific-day">
                                                </div>

                                                <div class="select-time" id="specific-month">
                                                    <input type="month" class="form-control" id="ip-specific-month" name="" min="2018-01" value="2021-05">
                                                </div>

                                                <div class="select-time" id="specific-year">
                                                    <input class="form-control" type="text" id="ip-specific-year" placeholder="Chọn năm">
                                                </div>
                                            </div>

                                            <div class="fa-select-time recent-times show">
                                                <select class="form-control select-time" id="select-day">
                                                    <option value="7">7 Ngày</option>
                                                    <option value="15">15 Ngày</option>
                                                    <option value="30">30 Ngày</option>
                                                    <option value="90">90 Ngày</option>
                                                </select>

                                                <select class="form-control select-time" id="select-month" style="display: none;">
                                                    <option value="3">3 Tháng</option>
                                                    <option value="6">6 Tháng</option>
                                                    <option value="12">12 Tháng</option>
                                                </select>

                                                <select class="form-control select-time" id="select-year" style="display: none;">
                                                    <option value="1">1 Năm</option>
                                                    <option value="3">3 Năm</option>
                                                    <option value="5">5 Năm</option>
                                                    <option value="10">10 Năm</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button href="" class="btn btn-primary waves-effect waves-light ml-2 reload-chart">Tải chart</button>

                                        <div class="dropdown ml-3">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Đang phát triển</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="min-height: 685px;">
                                        <canvas id="main-chart-thongke"></canvas>
                                    </div>

                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group mb-0 mr-2" style="width: 15%;">
                                                <select class="form-control" id="select-type-chart">
                                                    <option value="bar">Bar</option>
                                                    <option value="line">Line</option>
                                                    <option value="radar">Radar</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-success waves-effect waves-light ml-2 download-to-png" id-canvas="main-chart-thongke">PNG</button>
                                        </div>
                                    </div>
                                    {{-- <div id="ordered-bars-chart" style="height: 320px; padding: 0px; position: relative;"><canvas class="flot-base" width="1592" height="400" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1273.68px; height: 320px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 50px; text-align: center;">0.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 167px; text-align: center;">1.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 283px; text-align: center;">2.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 400px; text-align: center;">3.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 516px; text-align: center;">4.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 633px; text-align: center;">5.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 749px; text-align: center;">6.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 865px; text-align: center;">7.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 982px; text-align: center;">8.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1098px; text-align: center;">9.0</div><div style="position: absolute; max-width: 97px; top: 305px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1211px; text-align: center;">10.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div style="position: absolute; top: 293px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 8px; text-align: right;">0</div><div style="position: absolute; top: 244px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 8px; text-align: right;">5</div><div style="position: absolute; top: 195px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1px; text-align: right;">10</div><div style="position: absolute; top: 147px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1px; text-align: right;">15</div><div style="position: absolute; top: 98px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1px; text-align: right;">20</div><div style="position: absolute; top: 49px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1px; text-align: right;">25</div><div style="position: absolute; top: 0px; font: 400 12px / 14px Roboto, sans-serif; color: rgb(152, 166, 173); left: 1px; text-align: right;">30</div></div></div><canvas class="flot-overlay" width="1592" height="400" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1273.68px; height: 320px;"></canvas><div class="legend"><div style="position: absolute; width: 332.675px; height: 30px; top: -17px; right: 12px; background-color: transparent; opacity: 0.85;"> </div><table style="position:absolute;top:-17px;right:12px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(24,138,226);overflow:hidden"></div></div></td><td class="legendLabel">Series One&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(16,196,105);overflow:hidden"></div></div></td><td class="legendLabel">Series Two&nbsp;&nbsp;</td><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(235,239,242);overflow:hidden"></div></div></td><td class="legendLabel">Series Three&nbsp;&nbsp;</td></tr></tbody></table></div></div> --}}
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .datepicker-years {
            display: block !important;
        }

        .right {
            width: 242px !important;
        }

        .cancelBtn.btn.btn-sm.btn-default {
            background: #ebebeb;
            color: #414141;
        }

        td {
            font-size: 1em;
        }
    </style>
@endsection
@section('custom-javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var arrDataHoaDonSixMonth = <?php echo json_encode($doanhThuHoaDonSauThangGanNhat); ?>;
        var arrDataDonHangSixMonth = <?php echo json_encode($doanhThuDonHangSauThangGanNhat); ?>;
    </script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('Admin/assets') }}/js/pages/thongke.js"></script>


@endsection
