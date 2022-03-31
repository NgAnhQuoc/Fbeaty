@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">
            <button class="d-none btn-show-modal-edit" data-toggle="modal" data-target="#editDatLich"></button>

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
                            <div class="col-lg-12">
                                <div class="card-box" style="min-height: 700px">
                                    <div class="card-head">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="datlich-day-tab" data-toggle="tab" href="#datlich-day" role="tab" aria-controls="datlich-day" aria-selected="true">Ngày</a>
                                            </li>
                                            {{-- <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                            </li> --}}
                                        </ul>

                                    </div>

                                    <div class="tab-content" id="" style="overflow: auto">
                                        <div class="tab-pane fade show active" style="
                                        overflow: auto;
                                        min-width: 1120px;" id="datlich-day" role="tabpanel" aria-labelledby="datlich-day-tab">
                                            <div class="card-box p-0">
                                                <div class="card-header bg-white">
                                                    <div class="row justify-content-between">
                                                        <div class="left-box d-flex">
                                                            <div class="form-group d-flex align-items-center bg-primary" style="padding-right: 1em; border-radius: 0.15rem;">
                                                                <input type="text" class="form-control border-none text-white ip-color-placeholder-white search-name-kh" placeholder="Tìm tên khách hàng" style="background: none;">
                                                                <i class="fas fa-search text-white"></i>
                                                            </div>
                                                            <div class="button-group datlich-control d-flex align-items-center ml-2">
                                                                {{-- <div class="checkbox checkbox-primary">
                                                                    <input id="check-select-all" type="checkbox">
                                                                    <label for="check-select-all" class="mb-0">
                                                                        Select All
                                                                    </label>
                                                                </div>
                                                                <button class="btn btn-secondary waves-effect waves-light ml-2 lock-lich-multi"><i class="fas fa-lock"></i> </button>
                                                                <button class="btn btn-secondary waves-effect waves-light ml-2 unlock-lich-multi"><i class="fas fa-unlock"></i> </button> --}}
                                                            </div>

                                                        </div>

                                                        <div class="right-box">
                                                            <div class="d-flex">
                                                                <button class="btn btn-primary waves-effect waves-light mr-2 pre-day-calendar-datlich">Trước</button>
                                                                <div class="form-group mb-0">
                                                                    <input type="date" class="form-control ip-get-datlich" onchange="getDatLichByDay(event);" placeholder="Today" value="{{ $toDay }}">
                                                                </div>
                                                                <button class="btn btn-primary waves-effect waves-light ml-2 next-day-calendar-datlich">Sau</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="line-box" style="width: 100%;background: #e0e0e0;height: 6px;border-radius: 6px;"></div>
                                                    </div>
                                                </div>

                                                <div class="card-body body-day-calendar" style="overflow: auto;max-height: 600px;">
                                                    @foreach ($duLieuCalendar as $item)
                                                        <div class="d-flex lich-item align-items-center @if ($item->trangthai == $statusLichClose) blocked @endif" fa-id-time="{{ $item->id }}">
                                                            <div class="time-item">
                                                                <span>{{ $item->gio }}</span>
                                                                <button class="ml-5 mr-3 btn-custom-success btn-unblock-lich" id-unblock-time="{{ $item->id }}"><i class="fas fa-unlock mr-1"></i>MỞ KHÓA</button>
                                                                <button class="ml-5 mr-3 btn-custom-success btn-select-lich" id-time="{{ $item->id }}"><i class="fas fa-check mr-1"></i>SELECT</button>
                                                                <div class="child-button" fa-child-button="{{ $item->id }}">
                                                                    <button class="@if ($item->gio > $timeToDay) ml-4 @else ml-5 @endif  btn-custom-success btn-cirle button-unselect" id-unselect-time="{{ $item->id }}"><i class="fas fa-minus"></i></button>
                                                                    @if ($item->gio > $timeToDay)
                                                                        <button class="ml-2 btn-custom-success btn-cirle button-add" data-toggle="modal" data-target="#addDatLich" id-add-time="{{ $item->id }}" data-time=""><i class="fas fa-plus"></i></button>
                                                                    @endif
																	<button class="ml-2 btn-custom-success btn-cirle button-block" id-block-time="{{ $item->id }}"><i class="fas fa-lock"></i></button>
																</div>
                                                            </div>

                                                            <div class="list-datlich d-flex">
                                                                @for ($i = 0; $i < $item->soluongkhach; $i++)
                                                                    <div class="datlich-item @if (isset($item->listDatLich[$i])) has-dat-lich id-datlich-{{ $item->listDatLich[$i]->id }} @if ($item->listDatLich[$i]->trangthai == 1) check-in @endif @endif">
                                                                        @if (isset($item->listDatLich))
                                                                            @if (isset($item->listDatLich[$i]))
                                                                                <div class="header-item d-flex align-items-center">
                                                                                    <div class="text-bold limit-text-row-1 mb-0 namekh namekh-{{ $item->listDatLich[$i]->id }}">{{ $item->listDatLich[$i]->namekh }}</div>
                                                                                    <button class="btn-none btn-check-in ml-auto" id-dat-lich={{ $item->listDatLich[$i]->id }}><i class="icon-status-datlich fas @if ($item->listDatLich[$i]->trangthai == 0) fa-user-minus @else fa-user-check @endif"></i></button>
                                                                                </div>

                                                                                <div class="body-item">
                                                                                    <div class="name-nhanvien">{{ $item->listDatLich[$i]->nameNhanVien }}</div>
                                                                                    <li class="limit-text-row-1 ">
                                                                                        @if($item->listDatLich[$i]->arrayDichVu[0] != null)
                                                                                            <a href="" class="cl-black">{{ $item->listDatLich[$i]->arrayDichVu[0]->name }}</a>
                                                                                            @if (count($item->listDatLich[$i]->arrayDichVu) > 1)
                                                                                                ...
                                                                                            @endif
                                                                                        @else
                                                                                            <a href="" class="cl-black">Khách muốn tư vấn</a>
                                                                                        @endif

                                                                                    </li>
                                                                                </div>

                                                                                <div class="footer-item d-flex justify-content-end align-items-center">
																					<button class="btn-none edit-datlich" edit-id="{{ $item->listDatLich[$i]->id }}">
																						<i class="fas fa-pencil-alt"></i>
																					</button>

                                                                                    <button class="btn-none">
                                                                                        <a href="/quantri/hoadon/themhoadondatlich/{{$item->listDatLich[$i]->id}}"><i class="fas fa-tag"></i></a>
                                                                                    </button>

                                                                                    <form method="post">
                                                                                        @csrf
                                                                                        {!!method_field('delete')!!}
                                                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                                        <button class="btn-none delete-btn-custom" delete-id="{{ $item->listDatLich[$i]->id }}" delete-route="datlichremake">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </button>

                                                                                    </form>

                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    </div>

                                                                @endfor
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
                                      </div>
                                </div>
                            </div>
                            {{-- <div id="full-calendar-datlich"></div> --}}

                        </div>

                    </div> <!-- container-fluid -->

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDatLich" tabindex="-1" aria-labelledby="editDatLichLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-height: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDatLichLabel">Sửa lịch hẹn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-edit-datlich" style="background:#ebeff2;max-height: 800;overflow: auto;">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary luu-lich-hen">Lưu lịch hẹn</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDatLich" tabindex="-1" aria-labelledby="addDatLichLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-height: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDatLichLabel">Tạo lịch hẹn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="background:#ebeff2;max-height: 800;overflow: auto;">
                    <div class="form-datlich-admin">
                        <div class="card card-body">
                            <div class="head">
                                Thông tin khách hàng
                            </div>
                            <div class="row align-items-center mb-2">
                                <div class="col-6">
                                    <div class="fa-select-search">
                                        <div class="select-search">
                                            <button class="button-search" data-select='khach-hang'>
                                                <span class="mr-auto box-selected" type-selected="khach-hang" id-selected="0">Tìm kiếm tên hoặc số điện thoại</span>
                                                <i class="fas fa-address-book"></i>
                                            </button>

                                            <div class="box-select-search" box-select='khach-hang'>
                                                <div class="fa-head-select form-group">
                                                    <input type="text" class="form-control search-option" data-type-option='khach-hang'>
                                                    <i class="fas fa-search"></i>
                                                </div>

                                                <div class="fa-body-select">
                                                    <div class="body-select" body-type="khach-hang">
                                                        @foreach ($listKhachHang as $khachHang)
                                                            <div class="option option-select" type-value="khach-hang"
                                                                id-option="{{ $khachHang->id }}"
                                                                data-name="{{ $khachHang->name }}"
                                                                data-sdt="{{ $khachHang->sdt }}">
                                                                {{ $khachHang->name }} ({{ $khachHang->sdt }})
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 align-items-center">
                                    <button class="btn-none remove-khachhang-selected" style="color: #949494;font-size: 1.1em;">
                                        <i class="fas fa-times"></i>
                                        <span class=""> Xóa</span>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Họ & tên</label>
                                        <input type="text" class="form-control namekh ip-namekh-0" id="">
                                        <ul class="parsley-errors-list filled" id="" aria-hidden="false">
                                            <li class="li-error error-namekh-0"></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Số điện thoại liên hệ</label>
                                        <input type="number" class="form-control sdt ip-sdt-0" id="">
                                        <ul class="parsley-errors-list filled" id="" aria-hidden="false">
                                            <li class="li-error error-sdt-0"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-body">
                            <div class="head">
                                Thời gian lịch hẹn
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Ngày</label>
                                        <input type="date" class="form-control ip-date-datlich" onchange="getDayAndNhanVienThenLoadGio()" placeholder="mm/dd/yyyy" min="{{ $toDay }}" value="{{ $toDay }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Chuyên viên</label>
                                        <div class="w-100">
                                            <div class="fa-select-search">
                                                <div class="select-search">
                                                    <button class="button-search button-nhan-vien-0" data-select='nhan-vien'>
                                                        <span class="mr-auto box-selected limit-text-row-1 text-left" type-selected="nhan-vien" id-selected="0">Spa chọn cho khách hàng</span>
                                                        <i class="fas fa-address-book"></i>
                                                    </button>

                                                    <div class="box-select-search bottome" box-select='nhan-vien'>
                                                        <div class="fa-head-select form-group">
                                                            <input type="text" class="form-control search-option" data-type-option='nhan-vien'>
                                                            <i class="fas fa-search"></i>
                                                        </div>

                                                        <div class="fa-body-select">
                                                            <div class="body-select" body-type="nhan-vien">
                                                                @foreach ($listNhanVien as $nhanVien)
                                                                    <div class="option option-select option-chuyen-vien @if ($nhanVien->trangthai != $statusNhanVienHoatDong) disabled @endif" type-value="nhan-vien"
                                                                        id-option="{{ $nhanVien->id }}"
                                                                        data-name="{{ $nhanVien->name }}"
                                                                        data-sdt="{{ $nhanVien->sdt }}">
                                                                        {{ $nhanVien->name }} ({{ $nhanVien->sdt }})
                                                                    </div>
                                                                @endforeach
                                                                <div class="option option-select" type-value="nhan-vien"
                                                                    id-option="0"
                                                                    data-name="Spa chọn cho khách hàng"
                                                                    data-sdt="">
                                                                    Spa chọn cho khách hàng
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="parsley-errors-list filled" id="" aria-hidden="false">
                                            <li class="li-error error-nhan-vien-0"></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">Giờ</label>
                                        <select class="form-control" id="select-gio">
                                            <option>Vui lòng chọn chuyên viên</option>

                                        </select>
                                      </div>
                                </div>


                            </div>
                        </div>

                        <div class="card card-body">
                            <div class="head">
                                Dịch vụ
                            </div>

                            <div class="row align-items-center">
                                <div class="col-12 mb-2">
                                    <div class="list-dichvu-selected">
                                        <div class="head-list">
                                            <div class="row">
                                                <div class="col-4">
                                                    <b>Dịch vụ</b>
                                                </div>

                                                <div class="col-4">
                                                    <b>Giá (đ)</b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="body-list body-selected-dich-vu">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="fa-select-search" style="width: 79.5%;">
                                        <div class="select-search">
                                            <button class="button-search button-dich-vu-0" data-select='dich-vu'>
                                                <span class="mr-auto box-selected" type-selected="dich-vu" id-selected="" name-selected="" dongia="" giamgia="">Tìm kiếm tên dịch vụ</span>
                                                <i class="fas fa-address-book"></i>
                                            </button>

                                            <div class="box-select-search bottome" box-select='dich-vu'>
                                                <div class="fa-body-select">
                                                    <div class="body-select " body-type="dich-vu">
                                                        @foreach ($listDichVu as $dichVu)
                                                            <div class="option option-select d-flex" type-value="dich-vu"
                                                                id-option="{{ $dichVu->id }}"
                                                                name-dichvu="{{ $dichVu->name }}"
                                                                dongia="{{ $dichVu->dongia }}"
                                                                giamgia="{{ $dichVu->giamgia }}">
                                                                <span class="mr-auto"> {{ $dichVu->name }} </span>
                                                                @if ($dichVu->giamgia > 0)
                                                                    @php
                                                                        $giaSauGiam = $dichVu->dongia - ($dichVu->dongia * $dichVu->giamgia / 100);
                                                                    @endphp
                                                                    <span class="gia-truocgiam mr-1">{{ number_format($dichVu->dongia, 0) }} đ </span>
                                                                    <span class="price-dichvu"> {{ number_format($giaSauGiam, 0) }} đ</span>
                                                                @else
                                                                    <span class="price-dichvu">{{ number_format($dichVu->dongia, 0) }} đ</span>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                        <div class="option option-select d-flex" type-value="dich-vu"
                                                            id-option="0"
                                                            name-dichvu="Đến Spa tư vấn"
                                                            dongia="0"
                                                            giamgia="">
                                                            <span class="mr-auto"> Đến Spa tư vấn </span>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="fa-head-select form-group">
                                                    <input type="text" class="form-control search-option" data-type-option='dich-vu'>
                                                    <i class="fas fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-info waves-effect waves-light ml-2 selected-dichvu" data-type="dich-vu"> <i class="far fa-check-circle mr-1"></i><span> Xác nhận</span> </button>
                                </div>

                                <div class="col-12">
                                    <ul class="parsley-errors-list filled" id="" aria-hidden="false">
                                        <li class="li-error error-dich-vu-0"></li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary update-lich-hen">Lưu lịch hẹn</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
	<style>
		.namekh span {
				background-color: #71b6f9!important;
		}

        .datepicker-years {
            display: block !important;
        }

        @media (min-width: 992px) {
            .modal-lg, .modal-xl {
                max-width: 700px !important;
            }
        }
	</style>
@endsection
@section('custom-javascript')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.css">

<script>
    var	listDichVu = <?php echo json_encode($listDichVu); ?>;
    var	listKhachHang = <?php echo json_encode($listKhachHang); ?>;
    var	duLieuCalendar = <?php echo json_encode($duLieuCalendar); ?>;
    var idCoSo = <?php echo json_encode($idCoSo); ?>;
    var listNhanVien = <?php echo json_encode($listNhanVien); ?>;
    var statusNhanVienHoatDong = <?php echo json_encode($statusNhanVienHoatDong); ?>;
</script>
<script src="{{ asset('Admin/assets') }}/js/pages/datlichremake.js"></script>

<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

<script type="text/javascript">
window.Echo.channel('laravel_database_datlich-channel')
    .listen('.DatLichEvent', (data) => {
        if (data.respon.typez == 'dat-lich') {
            checkKhungGio(data.respon);
        }
        console.log(data);

        // if (data.respon.typez == 'lich') {
        //     checkTimeStatus(data.respon);
        // }
});
</script>
@endsection
