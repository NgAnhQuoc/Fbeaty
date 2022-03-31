@extends('Site.layout')

@section('title')
    Thông tin tài khoản
@endsection

@section('main')
    <?php
    use app\Http\Controllers\Site\HomeController;
    use app\Http\Controllers\Controller;
    ?>
    <div class="fa-profile-user">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="profile-user box-shadow-1">
                        <div class="row w-100 m-0">
                            <div class="col-xl-2">
                                <div class="list-control">
                                    <div class="header">
                                        <img src="{{ asset('Site/images') }}/xddn35VlCA.jpg" alt="">
                                        <div>
                                            <h5 class="sdt">+84965286066</h5>
                                            <button><i class="far fa-edit"></i> Sửa hồ sơ</button>
                                        </div>
                                    </div>
                                    <div class="body mt-3">
                                        <ul class="nav nav-tabs profile-tab-control-ul" id="myTab-1" role="tablist">
                                            <li class="profile-tab-control-li mt-0" role="presentation">
                                                <a class="nav-link profile-tab-control-a active" id="profile-tab"
                                                   data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                   aria-selected="true">
                                                    <i class="far fa-user"></i>
                                                    Thông tin của bạn
                                                </a>
                                            </li>
                                            <li class="profile-tab-control-li" role="presentation">
                                                <a class="nav-link profile-tab-control-a" id="donhang-tab"
                                                   data-toggle="tab" href="#donhang" role="tab" aria-controls="donhang"
                                                   aria-selected="false">
                                                    <i class="far fa-list-alt"></i>
                                                    Đơn hàng
                                                </a>
                                            </li>
                                            <li class="profile-tab-control-li" role="presentation">
                                                <a class="nav-link profile-tab-control-a" id="lieutrinh-tab"
                                                   data-toggle="tab" href="#lieutrinh" role="tab"
                                                   aria-controls="lieutrinh" aria-selected="false">
                                                    <i class="fas fa-clipboard-list"></i>
                                                    Liệu trình điều trị
                                                </a>
                                            </li>
                                            <li class="profile-tab-control-li" role="presentation">
                                                <a class="nav-link profile-tab-control-a" id="lichhen-tab"
                                                   data-toggle="tab" href="#lichhen" role="tab" aria-controls="lichhen"
                                                   aria-selected="false">
                                                    <i class="far fa-calendar-alt"></i>
                                                    Lịch hẹn
                                                </a>
                                            </li>
                                            <li class="profile-tab-control-li" role="presentation">
                                                <a class="nav-link profile-tab-control-a" id="yeuthich-tab"
                                                   data-toggle="tab" href="#yeuthich" role="tab"
                                                   aria-controls="yeuthich" aria-selected="false">
                                                    <i class='fas fa-heart text-danger'></i>
                                                    Sản phẩm yêu thích
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="list-tabs">
                                    <div class="tab-content" id="">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                            <div class="profile-user-tab">
                                                <div class="header-tab">
                                                    <div class="title-3 color-main uppercase">Hồ Sơ Của Tôi</div>
                                                    <div class="text-10">Quản lý thông tin hồ sơ để bảo mật tài khoản
                                                    </div>
                                                </div>

                                                <div class="body-tab">
                                                    <form action="{{URL::to("/updateprofile")}}" id="form_prof"
                                                          class="mt-4 thongtintaikhoan" method="post"
                                                          enctype="multipart/form-data">
                                                        <div class="row">

                                                            <div class="col-xl-8">
                                                                @csrf
                                                                <div class="form-group form-control-custom">
                                                                    <div class="left">Số điện thoại</div>
                                                                    <div class="right">
                                                                        <span>+84{{substr(session()->get("khachHang")->sdt, 1)}}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-control-custom mt-0">
                                                                    <div class="left">Họ & tên</div>
                                                                    <div class="right">
                                                                        <input type="text"
                                                                               class="form-control form-custom"
                                                                               name="username" placeholder="Họ và tên"
                                                                               id="username"
                                                                               value="<?php echo (session()->get("khachHang")->name != "") ? session()->get("khachHang")->name : "";?>">
                                                                        @error('username')
                                                                        <span
                                                                            class='badge badge-danger'>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-control-custom">
                                                                    <div class="left">Email</div>
                                                                    <div class="right">
                                                                        <input type="email"
                                                                               class="form-control form-custom"
                                                                               value="<?php echo (session()->get("khachHang")->email != "") ? session()->get("khachHang")->email : "";?>"
                                                                               name="email" placeholder="Email của bạn"
                                                                               id="email">
                                                                        @error('email')
                                                                        <span
                                                                            class='badge badge-danger'>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-control-custom">
                                                                    <div class="left">Mức độ thân thiết</div>
                                                                    <div class="right">
                                                                        <div class="row align-items-center">
                                                                            @if(session()->has('khachHang') && session('khachHang') != '')
                                                                                @if((int)session()->get('khachHang')->exp <= 5000000)
                                                                                    <div class="col-6">
                                                                                        <div class="progress"
                                                                                             style="height: 7px;">
                                                                                            <div
                                                                                                class="progress-bar progress-level"
                                                                                                role="progressbar"
                                                                                                price-value="5000000"
                                                                                                style="width: <?php echo ((int)session()->get('khachHang')->exp / 5000000) * 100;?>%;"
                                                                                                aria-valuenow="50"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span>LV 1</span>
                                                                                    </div>
                                                                                @elseif((int)session()->get('khachHang')->exp <= 10000000)
                                                                                    <div class="col-6">
                                                                                        <div class="progress"
                                                                                             style="height: 7px;">
                                                                                            <div
                                                                                                class="progress-bar progress-level"
                                                                                                role="progressbar"
                                                                                                price-value="10000000"
                                                                                                style="width: <?php echo ((int)session()->get('khachHang')->exp / 10000000) * 100;?>%;"
                                                                                                aria-valuenow="50"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span>LV 2</span>
                                                                                    </div>

                                                                                @elseif((int)session()->get('khachHang')->exp <= 50000000)
                                                                                    <div class="col-6">
                                                                                        <div class="progress"
                                                                                             style="height: 7px;">
                                                                                            <div
                                                                                                class="progress-bar progress-level"
                                                                                                role="progressbar"
                                                                                                price-value="50000000"
                                                                                                style="width: <?php echo ((int)session()->get('khachHang')->exp / 50000000) * 100;?>%;"
                                                                                                aria-valuenow="50"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span>LV 3</span>
                                                                                    </div>
                                                                                @elseif((int)session()->get('khachHang')->exp <= 100000000)
                                                                                    <div class="col-6">
                                                                                        <div class="progress"
                                                                                             style="height: 7px;">
                                                                                            <div
                                                                                                class="progress-bar progress-level"
                                                                                                role="progressbar"
                                                                                                price-value="100000"
                                                                                                style="width: <?php echo ((int)session()->get('khachHang')->exp / 100000000) * 100;?>%;"
                                                                                                aria-valuenow="50"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span>LV 4</span>
                                                                                    </div>
                                                                                @elseif((int)session()->get('khachHang')->exp >= 100000000)
                                                                                    <div class="col-6">
                                                                                        <div class="progress"
                                                                                             style="height: 7px;">
                                                                                            <div
                                                                                                class="progress-bar progress-level"
                                                                                                role="progressbar"
                                                                                                price-value="100000"
                                                                                                style="width: 100%;"
                                                                                                aria-valuenow="50"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            class="text-warning font-weight-bold">VIP <i
                                                                                                class='fas fa-crown'></i></span>
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-control-custom">
                                                                    <div class="left"></div>
                                                                    <div class="right">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="box-mota-level">
                                                                                    <div class="d-flex">
                                                                                        <div class="fw-500">Chi tiêu
                                                                                        </div>
                                                                                        <div
                                                                                            class="box-label-custom ml-auto"
                                                                                            data-toggle="modal"
                                                                                            data-target="#uudai-khachhang">
                                                                                            Xem ưu đãi
                                                                                        </div>
                                                                                        <div class="modal fade"
                                                                                             id="uudai-khachhang"
                                                                                             tabindex="-1"
                                                                                             aria-labelledby="uudai-khachhangLabel"
                                                                                             aria-hidden="true">
                                                                                            <div class="modal-dialog ">
                                                                                                <div
                                                                                                    class="modal-content border-radius-3px">
                                                                                                    <div
                                                                                                        class="modal-header">
                                                                                                        <h5 class="modal-title"
                                                                                                            id="uudai-khachhangLabel">
                                                                                                            Ưu đãi -
                                                                                                            khách hàng
                                                                                                            thân
                                                                                                            thiết</h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal"
                                                                                                            aria-label="Close">
                                                                                                            <span
                                                                                                                aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body noidung-uu-dai">
                                                                                                        <nav
                                                                                                            class="fa-link-tabs">
                                                                                                            <div
                                                                                                                class="nav nav-tabs"
                                                                                                                id="nav-tab"
                                                                                                                role="tablist">
                                                                                                                <a class="nav-link active"
                                                                                                                   id="nav-home-tab"
                                                                                                                   data-toggle="tab"
                                                                                                                   href="#nav-home"
                                                                                                                   role="tab"
                                                                                                                   aria-controls="nav-home"
                                                                                                                   aria-selected="true">Level
                                                                                                                    1 |
                                                                                                                    5.000.000
                                                                                                                    đ</a>
                                                                                                                <a class="nav-link"
                                                                                                                   id="nav-profile-tab"
                                                                                                                   data-toggle="tab"
                                                                                                                   href="#nav-profile"
                                                                                                                   role="tab"
                                                                                                                   aria-controls="nav-profile"
                                                                                                                   aria-selected="false">Level
                                                                                                                    2 |
                                                                                                                    10.000.000
                                                                                                                    đ</a>
                                                                                                                <a class="nav-link"
                                                                                                                   id="nav-contact-tab"
                                                                                                                   data-toggle="tab"
                                                                                                                   href="#nav-contact"
                                                                                                                   role="tab"
                                                                                                                   aria-controls="nav-contact"
                                                                                                                   aria-selected="false">Level
                                                                                                                    3 |
                                                                                                                    50.000.000
                                                                                                                    đ</a>
                                                                                                                <a class="nav-link"
                                                                                                                   id="nav-contact-tab"
                                                                                                                   data-toggle="tab"
                                                                                                                   href="#nav-contact1"
                                                                                                                   role="tab"
                                                                                                                   aria-controls="nav-contact1"
                                                                                                                   aria-selected="false">Level
                                                                                                                    4 |
                                                                                                                    100.000.000
                                                                                                                    đ</a>
                                                                                                                <a class="nav-link text-warning font-weight-bold"
                                                                                                                   id="nav-contact-tab"
                                                                                                                   data-toggle="tab"
                                                                                                                   href="#nav-contact2"
                                                                                                                   role="tab"
                                                                                                                   aria-controls="nav-contact2"
                                                                                                                   aria-selected="false">VIP<i
                                                                                                                        class='fas fa-crown'></i>
                                                                                                                    |
                                                                                                                    (Hơn)
                                                                                                                    100.000.000
                                                                                                                    đ</a>
                                                                                                            </div>
                                                                                                        </nav>
                                                                                                        <div
                                                                                                            class="tab-content"
                                                                                                            id="nav-tabContent">
                                                                                                            <div
                                                                                                                class="tab-pane fade show active"
                                                                                                                id="nav-home"
                                                                                                                role="tabpanel"
                                                                                                                aria-labelledby="nav-home-tab">
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/massage-1.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Giảm
                                                                                                                            giá
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Giảm
                                                                                                                            5%
                                                                                                                            tổng
                                                                                                                            hóa
                                                                                                                            đơn
                                                                                                                            khi
                                                                                                                            sử
                                                                                                                            dụng
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            spa
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/confetti.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            1
                                                                                                                            x
                                                                                                                            Voucher
                                                                                                                            mua
                                                                                                                            hàng
                                                                                                                            100k
                                                                                                                            vào
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="tab-pane fade"
                                                                                                                id="nav-profile"
                                                                                                                role="tabpanel"
                                                                                                                aria-labelledby="nav-profile-tab">
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/massage-1.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Giảm
                                                                                                                            giá
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Giảm
                                                                                                                            5%
                                                                                                                            tổng
                                                                                                                            hóa
                                                                                                                            đơn
                                                                                                                            khi
                                                                                                                            sử
                                                                                                                            dụng
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            spa
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/confetti.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            khách
                                                                                                                            hàng
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            1
                                                                                                                            x
                                                                                                                            Voucher
                                                                                                                            500k
                                                                                                                            vào
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            áp
                                                                                                                            dụng
                                                                                                                            cho
                                                                                                                            cả
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            và
                                                                                                                            mỹ
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/vip.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Ngày
                                                                                                                            hội
                                                                                                                            thành
                                                                                                                            viên
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            15
                                                                                                                            hàng
                                                                                                                            tháng,
                                                                                                                            voucher
                                                                                                                            hạng
                                                                                                                            2
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="tab-pane fade"
                                                                                                                id="nav-contact"
                                                                                                                role="tabpanel"
                                                                                                                aria-labelledby="nav-contact-tab">
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/massage-1.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Giảm
                                                                                                                            giá
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Giảm
                                                                                                                            10%
                                                                                                                            tổng
                                                                                                                            hóa
                                                                                                                            đơn
                                                                                                                            khi
                                                                                                                            sử
                                                                                                                            dụng
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            spa
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/confetti.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            1
                                                                                                                            x
                                                                                                                            Voucher
                                                                                                                            1
                                                                                                                            triệu
                                                                                                                            đồng
                                                                                                                            vào
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            áp
                                                                                                                            dụng
                                                                                                                            cho
                                                                                                                            cả
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            và
                                                                                                                            mỹ
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/vip.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Ngày
                                                                                                                            hội
                                                                                                                            thành
                                                                                                                            viên
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            15
                                                                                                                            hàng
                                                                                                                            tháng,
                                                                                                                            voucher
                                                                                                                            hạng
                                                                                                                            3
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="tab-pane fade"
                                                                                                                id="nav-contact1"
                                                                                                                role="tabpanel"
                                                                                                                aria-labelledby="nav-contact-tab">
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/massage-1.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Giảm
                                                                                                                            giá
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Giảm
                                                                                                                            25%
                                                                                                                            tổng
                                                                                                                            hóa
                                                                                                                            đơn
                                                                                                                            khi
                                                                                                                            sử
                                                                                                                            dụng
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            spa
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/confetti.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            khách
                                                                                                                            hàng
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            1
                                                                                                                            x
                                                                                                                            Voucher
                                                                                                                            5
                                                                                                                            triệu
                                                                                                                            đồng
                                                                                                                            vào
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            áp
                                                                                                                            dụng
                                                                                                                            cho
                                                                                                                            cả
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            và
                                                                                                                            mỹ
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/vip.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Ngày
                                                                                                                            hội
                                                                                                                            thành
                                                                                                                            viên
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            15
                                                                                                                            hàng
                                                                                                                            tháng,
                                                                                                                            voucher
                                                                                                                            hạng
                                                                                                                            4
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/gifft.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sản
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Bộ
                                                                                                                            sản
                                                                                                                            phẩm
                                                                                                                            làm
                                                                                                                            đẹp
                                                                                                                            trị
                                                                                                                            giá
                                                                                                                            10
                                                                                                                            triệu
                                                                                                                            đồng
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="tab-pane fade"
                                                                                                                id="nav-contact2"
                                                                                                                role="tabpanel"
                                                                                                                aria-labelledby="nav-contact-tab">
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/massage-1.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Giảm
                                                                                                                            giá
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Giảm
                                                                                                                            30%
                                                                                                                            tổng
                                                                                                                            hóa
                                                                                                                            đơn
                                                                                                                            khi
                                                                                                                            sử
                                                                                                                            dụng
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            spa
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/confetti.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            1
                                                                                                                            x
                                                                                                                            Voucher
                                                                                                                            10
                                                                                                                            triệu
                                                                                                                            đồng
                                                                                                                            vào
                                                                                                                            sinh
                                                                                                                            nhật
                                                                                                                            áp
                                                                                                                            dụng
                                                                                                                            cho
                                                                                                                            cả
                                                                                                                            dịch
                                                                                                                            vụ
                                                                                                                            và
                                                                                                                            mỹ
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/vip.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Ngày
                                                                                                                            hội
                                                                                                                            thành
                                                                                                                            viên
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            15
                                                                                                                            hàng
                                                                                                                            tháng,
                                                                                                                            voucher
                                                                                                                            hạng
                                                                                                                            VIP
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="uudai-content-item">
                                                                                                                    <div
                                                                                                                        class="icon">
                                                                                                                        <img
                                                                                                                            src="{{ asset('Site/images/icon') }}/gifft.png"
                                                                                                                            alt="">
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text">
                                                                                                                        <div
                                                                                                                            class="title">
                                                                                                                            Quà
                                                                                                                            tặng
                                                                                                                            sản
                                                                                                                            phẩm
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="text-gray">
                                                                                                                            Bộ
                                                                                                                            sản
                                                                                                                            phẩm
                                                                                                                            làm
                                                                                                                            đẹp
                                                                                                                            trị
                                                                                                                            giá
                                                                                                                            15
                                                                                                                            triệu
                                                                                                                            đồng
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-secondary"
                                                                                                            data-dismiss="modal">
                                                                                                            Đóng
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @if(session()->has('khachHang') && session('khachHang') != '')
                                                                                        @if((int)session()->get('khachHang')->exp <= 5000000)
                                                                                            <div class="money-progress">
                                                                                                <span
                                                                                                    class="current-money">{{str_replace(",", ".", number_format(session()->get('khachHang')->exp))}} đ</span>
                                                                                                / 5tr đ
                                                                                            </div>
                                                                                            <small>Mua thêm
                                                                                                <b>{{str_replace(",", ".", number_format(5000000 - (int)session()->get('khachHang')->exp))}}
                                                                                                    đ </b>để đạt LV
                                                                                                2</small>
                                                                                        @elseif((int)session()->get('khachHang')->exp <= 10000000)
                                                                                            <div class="money-progress">
                                                                                                <span
                                                                                                    class="current-money">{{str_replace(",", ".", number_format(session()->get('khachHang')->exp))}} đ</span>
                                                                                                / 10tr đ
                                                                                            </div>
                                                                                            <small>Mua thêm
                                                                                                <b>{{str_replace(",", ".", number_format(10000000 - (int)session()->get('khachHang')->exp))}}
                                                                                                    đ </b>để đạt LV
                                                                                                3</small>

                                                                                        @elseif((int)session()->get('khachHang')->exp <= 50000000)
                                                                                            <div class="money-progress">
                                                                                                <span
                                                                                                    class="current-money">{{str_replace(",", ".", number_format(session()->get('khachHang')->exp))}} đ</span>
                                                                                                / 50tr đ
                                                                                            </div>
                                                                                            <small>Mua thêm
                                                                                                <b>{{str_replace(",", ".", number_format(50000000 - (int)session()->get('khachHang')->exp))}}
                                                                                                    đ </b>để đạt LV
                                                                                                4</small>
                                                                                        @elseif((int)session()->get('khachHang')->exp <= 100000000)
                                                                                            <div class="money-progress">
                                                                                                <span
                                                                                                    class="current-money">{{str_replace(",", ".", number_format(session()->get('khachHang')->exp))}} đ</span>
                                                                                                / 100tr đ
                                                                                            </div>
                                                                                            <small>Mua thêm
                                                                                                <b>{{str_replace(",", ".", number_format(100000000 - (int)session()->get('khachHang')->exp))}}
                                                                                                    đ </b>để đạt
                                                                                                VIP</small>
                                                                                        @elseif((int)session()->get('khachHang')->exp >= 100000000)
                                                                                            <div class="money-progress">
                                                                                                <span
                                                                                                    class="current-money">{{str_replace(",", ".", number_format(session()->get('khachHang')->exp))}} đ</span>
                                                                                                / (Hơn)100tr đ
                                                                                            </div>
                                                                                            <span
                                                                                                class="text-warning font-weight-bold">Tài khoản VIP</span>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group form-control-custom">
                                                                    <div class="left"></div>
                                                                    <div class="right">
                                                                        <a href="javascript:void(0)">
                                                                            <button type="submit" class="btn-6 ml-0">
                                                                                Lưu
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="change-avt-box mt-4">
                                                                    <img
                                                                        style="width: 100%; height: 150px; object-fit: contain;"
                                                                        id="imageA"
                                                                        src="{{ asset('uploads/khachhang') }}/<?php echo (session()->get('khachHang')->img != "") ? session()->get('khachHang')->img : "photo-1637427933.jpg";?>"
                                                                        alt="">
                                                                    <div class="form-group-image">
                                                                        <label for="ip-avt"
                                                                               class="form-control form-custom">Chọn
                                                                            ảnh</label>
                                                                        <input type="file" name="urlHinh" id="ip-avt">
                                                                    </div>
                                                                    <div class="quydinh d-flex flex-column">
                                                                        <span
                                                                            class="text-gray">Định dạng:.JPEG, .PNG </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="donhang" role="tabpanel"
                                             aria-labelledby="donhang-tab">
                                            <div class="donmua-tab">
                                                <div class="fa-nav">
                                                    <ul class="nav nav-tabs" id="" role="tablist">
                                                        <li class="nav-item pl-0" role="presentation">
                                                            <a class="nav-link active" id="alldonhang-tab"
                                                               data-toggle="tab" href="#alldonhang" role="tab"
                                                               aria-controls="alldonhang" aria-selected="true">Tất
                                                                cả</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="cholayhang-tab" data-toggle="tab"
                                                               href="#xacnhan" role="tab" aria-controls="xacnhan"
                                                               aria-selected="false">Chờ xác nhận</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="cholayhang-tab" data-toggle="tab"
                                                               href="#cholayhang" role="tab" aria-controls="cholayhang"
                                                               aria-selected="false">Đang giao</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="danggiao-tab" data-toggle="tab"
                                                               href="#danggiao" role="tab" aria-controls="danggiao"
                                                               aria-selected="false">Đã giao</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="dagiao-tab" data-toggle="tab"
                                                               href="#dagiao" role="tab" aria-controls="dagiao"
                                                               aria-selected="false">Đã hủy</a>
                                                        </li>
                                                        <li class="nav-item pr-0" role="presentation">
                                                            <a class="nav-link" id="dahuy-tab" data-toggle="tab"
                                                               href="#dahuy" role="tab" aria-controls="dahuy"
                                                               aria-selected="false">Trả hàng</a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="tab-content" id="">
                                                    <div class="tab-pane fade show active" id="alldonhang"
                                                         role="tabpanel" aria-labelledby="alldonhang-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi as $indexstt =>$donhangofme)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme->ghichucuakhachhang != null) ? $donhangofme->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_CHOXACNHAN)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DANGGIAO)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAGIAO)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DONHANGLOI)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_TRAHANG)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAHUY)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                            ->where("iddonhang", $donhangofme->id)
                                                                            ->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0 "
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia ">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        @endif

                                                    </div>
                                                    <div class="tab-pane fade" id="xacnhan" role="tabpanel"
                                                         aria-labelledby="cholayhang-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi1 as $indexstt =>$donhangofme1)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt."a"}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt."a"}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme1->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme1->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme1->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme1->ghichucuakhachhang != null) ? $donhangofme1->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_CHOXACNHAN)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DANGGIAO)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAGIAO)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DONHANGLOI)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_TRAHANG)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAHUY)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")->where("iddonhang", $donhangofme1->id)->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme1->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia ">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme1->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme1->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme1->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme1->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme1->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme1->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme1->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme1->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme1->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme1->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme1->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        @endif
                                                    </div>

                                                    <div class="tab-pane fade" id="cholayhang" role="tabpanel"
                                                         aria-labelledby="cholayhang-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi2 as $indexstt =>$donhangofme)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt."b"}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt."b"}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme->ghichucuakhachhang != null) ? $donhangofme->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_CHOXACNHAN)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DANGGIAO)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAGIAO)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DONHANGLOI)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_TRAHANG)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAHUY)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")->where("iddonhang", $donhangofme->id)->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia ">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme1->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        @endif
                                                    </div>
                                                    <div class="tab-pane fade" id="danggiao" role="tabpanel"
                                                         aria-labelledby="danggiao-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi3 as $indexstt =>$donhangofme)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt."c"}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt."c"}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme->ghichucuakhachhang != null) ? $donhangofme->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_CHOXACNHAN)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DANGGIAO)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAGIAO)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DONHANGLOI)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_TRAHANG)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAHUY)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")->where("iddonhang", $donhangofme->id)->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia ">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        @endif
                                                    </div>
                                                    <div class="tab-pane fade" id="dagiao" role="tabpanel"
                                                         aria-labelledby="dagiao-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi4 as $indexstt =>$donhangofme)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt."d"}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt."d"}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme->ghichucuakhachhang != null) ? $donhangofme->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_CHOXACNHAN)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DANGGIAO)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAGIAO)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DONHANGLOI)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_TRAHANG)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai == \App\Http\Controllers\Controller::DONHANG_DAHUY)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")->where("iddonhang", $donhangofme->id)->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia ">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane fade" id="dahuy" role="tabpanel"
                                                         aria-labelledby="dahuy-tab">
                                                        @if(session()->has('khachHang') && session('khachHang') != '')

                                                            @foreach($donhangcuatoi5 as $indexstt =>$donhangofme)
                                                                <div class="box-donhang profile-minibox mt-4">
                                                                    <div class="header">
                                                                        <div class="item">
                                                                            <button type="button" class="button-none"
                                                                                    data-toggle="modal"
                                                                                    data-target="#infonguoinhan-{{$indexstt."e"}}">
                                                                                <span class="mr-1 btn btn-dark">Thông tin đơn hàng</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>

                                                                            <div class="modal fade"
                                                                                 id="infonguoinhan-{{$indexstt."e"}}"
                                                                                 tabindex="-1"
                                                                                 aria-labelledby="infonguoinhan-1Label"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="infonguoinhan-1Label">
                                                                                                Thông tin người
                                                                                                nhận</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span
                                                                                                    aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="" class="">
                                                                                                <div
                                                                                                    class="form-group form-control-custom mt-0 align-items-start">
                                                                                                    <div class="left">
                                                                                                        Tên người nhận
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->tennguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">Số
                                                                                                        điện thoại
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->sdtnguoinhan}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Địa chỉ giao
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                                        <span>{{$donhangofme->diachikhachhang}}</span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div
                                                                                                    class="form-group form-control-custom align-items-start">
                                                                                                    <div class="left">
                                                                                                        Ghi chú khách
                                                                                                        hàng
                                                                                                    </div>
                                                                                                    <div class="right">
                                                                                            <textarea disabled
                                                                                                      class="form-control form-custom"
                                                                                                      cols="10"
                                                                                                      rows="8">
                                                                                                <?php echo ($donhangofme->ghichucuakhachhang != null) ? $donhangofme->ghichucuakhachhang : "";?>
                                                                                            </textarea>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Đóng
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($donhangofme->trangthai == 0)
                                                                            <div class="item"
                                                                                 id="huydonhang{{$donhangofme->id}}">
                                                                                <span class="ml-1 btn btn-success">Chờ xác nhận</span>
                                                                                <span
                                                                                    onclick="HuyDatHang({{$donhangofme->id}})"
                                                                                    class="ml-1 btn btn-danger">Hủy đơn</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai ==1)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-primary">Đang giao hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai ==2)
                                                                            <div class="item">
                                                                                <i class="fas fa-truck-moving uk-text-success"></i>
                                                                                <span class="ml-1 uk-text-success">Giao hàng thành công</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai ==3)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Đơn hàng lỗi</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai ==4)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-warning">Trả hàng</span>
                                                                            </div>
                                                                        @elseif($donhangofme->trangthai ==5)
                                                                            <div class="item">
                                                                                <span class="ml-1 btn btn-danger">Đã hủy đơn</span>
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                    <div class="giohang-body">
                                                                        <?php
                                                                        $checkdhct = \Illuminate\Support\Facades\DB::table("donhangchitiet")->where("iddonhang", $donhangofme->id)->doesntExist();
                                                                        ?>
                                                                        @if($checkdhct==false)
                                                                            <?php
                                                                            $donhangchitiet = \Illuminate\Support\Facades\DB::table("donhangchitiet")
                                                                                ->select("donhangchitiet.*")
                                                                                ->where("donhangchitiet.iddonhang", $donhangofme->id)
                                                                                ->get();
                                                                            ?>
                                                                            @foreach($donhangchitiet as $indexct =>$dhcts)
                                                                                <?php
                                                                                $tensanpham = \Illuminate\Support\Facades\DB::table("sanphamchitiet")
                                                                                    ->select("sanphamchitiet.*", "sanpham.name")
                                                                                    ->join("sanpham", "sanphamchitiet.idsanpham", "=", "sanpham.id")
                                                                                    ->where("sanphamchitiet.id", $dhcts->idsanphamchitiet)
                                                                                    ->get();
                                                                                ?>
                                                                                <div
                                                                                    class="row shadow-2 align-items-center giohang-item">
                                                                                    <div
                                                                                        class="col-xl-2 d-flex  align-items-center">
                                                                                        <div class="body-text d-flex">
                                                                                            <img
                                                                                                src="{{ asset('/uploads')}}/{{$dhcts->img}}"
                                                                                                class="img-sanpham img-fluid m-0"
                                                                                                alt="...">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-3">
                                                                                        <div
                                                                                            class="body-text text-left">
                                                                                            <?php if (strlen($tensanpham[0]->name) <= 45) {
                                                                                                echo $tensanpham[0]->name;
                                                                                            } else {
                                                                                                echo substr($tensanpham[0]->name, 0, 45) . '...';
                                                                                            }?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-4">
                                                                                        <div class="body-text">
                                                                                            <div class="box-gia">
                                                                                                @if((int)$dhcts->dongiatruocgiamgia != (int)$dhcts->dongiasaugiamgia)
                                                                                                    <span
                                                                                                        class="giagiam">{{str_replace(',', '.',number_format($dhcts->dongiatruocgiamgia)), ""}} đ </span>
                                                                                                    <span
                                                                                                        class="gia left-bar">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @else
                                                                                                    <span class="gia">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia)), ""}} đ </span>
                                                                                                @endif
                                                                                                <span
                                                                                                    class="left-bar dungtich"> {{$tensanpham[0]->ml}}ml</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-1">
                                                                                        <div class="body-text">
                                                                                            <div
                                                                                                class="input-group inline-group">
                                                                                                <input
                                                                                                    class="form-control form-custom text-center quantity"
                                                                                                    min="1"
                                                                                                    name="quantity"
                                                                                                    value="{{$dhcts->soluong}}"
                                                                                                    disabled
                                                                                                    type="number">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-2">
                                                                                        <div
                                                                                            class="body-text text-right">
                                                                                            <span class="tongtien">{{str_replace(',', '.',number_format($dhcts->dongiasaugiamgia*$dhcts->soluong)), ""}} đ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div
                                                                                class="row shadow-2 align-items-center giohang-item">
                                                                                Không có sản phẩm nào
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="foot">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phương
                                                                                    thức giao hàng: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucthanhtoan}}
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền hàng (2 sản phẩm): </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtientruocgiamgia - App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Đơn vị
                                                                                    vận chuyển: </label>
                                                                                <div class="ml-2">
                                                                                    {{$donhangofme->phuongthucgiaohang}}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Mã giảm
                                                                                    giá: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->idgiamgia !="")
                                                                                        <?php
                                                                                        $tengiamgia = \Illuminate\Support\Facades\DB::table("giamgia")
                                                                                            ->select("*")
                                                                                            ->where("id", $donhangofme->idgiamgia)
                                                                                            ->get();
                                                                                        ?>
                                                                                        {{$tengiamgia[0]->name}}
                                                                                    @else
                                                                                        <span>Không có</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Trạng
                                                                                    thái thanh toán: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->trangthaithanhtoan == 0)
                                                                                        <span
                                                                                            class="">Chưa thanh toán</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="">Đã thanh toán</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Phí ship
                                                                                    : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.', number_format(App\Http\Controllers\Controller::PHI_SHIP_HANG)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Ngày đặt
                                                                                    hàng: </label>
                                                                                <div class="ml-2">
                                                                                    @if($donhangofme->created_at != "")
                                                                                        <span class="">{{date_format(date_create($donhangofme->created_at), "d/m/Y")}} Lúc {{date_format(date_create($donhangofme->created_at), "H:i:s")}}</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    tiền sau giảm : </label>
                                                                                <div class="ml-2">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-1">
                                                                            <div
                                                                                class="col-xl-6 d-flex justify-content-between"></div>
                                                                            <div
                                                                                class="col-xl-6 mt-2 tongthanhtoan d-flex justify-content-between">
                                                                                <label for="" class="text-gray">Tổng
                                                                                    thanh toán : </label>
                                                                                <div
                                                                                    class="ml-2 color-main price-total">
                                                                                    {{str_replace(',', '.',number_format($donhangofme->tongtiensaugiamgia)), ""}}
                                                                                    đ
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="lieutrinh" role="tabpanel"
                                             aria-labelledby="lieutrinh-tab">
                                            <div class="donmua-tab">
                                                <div class="fa-nav">
                                                    <ul class="nav nav-tabs" id="" role="tablist">
                                                        <li class="nav-item pl-0" role="presentation">
                                                            <a class="nav-link active" id="alllieutrinh-tab"
                                                               data-toggle="tab" href="#alllieutrinh" role="tab"
                                                               aria-controls="alllieutrinh" aria-selected="true">Tất
                                                                cả</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="lieutrinh-hoanthanh-tab"
                                                               data-toggle="tab" href="#lieutrinh-hoanthanh" role="tab"
                                                               aria-controls="lieutrinh-hoanthanh"
                                                               aria-selected="false">Hoàn thành</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="lieutrinh-dangdieutri-tab"
                                                               data-toggle="tab" href="#lieutrinh-dangdieutri"
                                                               role="tab" aria-controls="lieutrinh-dangdieutri"
                                                               aria-selected="false">Đang điều trị</a>
                                                        </li>
                                                        <li class="nav-item pr-0" role="presentation">
                                                            <a class="nav-link" id="lieutrinh-dahuy-tab"
                                                               data-toggle="tab" href="#lieutrinh-dahuy" role="tab"
                                                               aria-controls="lieutrinh-dahuy" aria-selected="false">Đã
                                                                hủy</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                {{-- modal  --}}
                                                <div class="header">
                                                    <div class="item">
                                                        <div class="modal fade" id="lieutrinh-id" tabindex="-1"
                                                             aria-labelledby="lieutrinh-id-Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content border-radius-modal">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tenbacsi">Liệu Trình
                                                                            Chi Tiết</h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="thongtinlieutrinh">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-4 date-lieutrinh start">
                                                                                    <label for="">Ngày bắt đầu</label>
                                                                                    <span
                                                                                        id="ngaybatdau">15 - 7 - 2021</span>
                                                                                </div>
                                                                                <div class="col-4 line-date bg-primary
                                                                        ">

                                                                                </div>
                                                                                <div class="col-4 date-lieutrinh end">
                                                                                    <label for="">Dự kiến kết
                                                                                        thúc</label>
                                                                                    <span id="dukienketthuc">15 - 10 - 2021</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="progress-circle"
                                                                             progress-lieutrinh-id="lieutrinh-id">
                                                                            <div class="circular-progress"
                                                                                 id="circular-progress"
                                                                                 circular-progress-id="lieutrinh-id">
                                                                                <div
                                                                                    class="value-container value-progress-circle"
                                                                                    id="progress"
                                                                                    value-container-id="lieutrinh-id"
                                                                                    data-progress="75">0%
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-container"
                                                                             style="padding: 40px 10px;">
                                                                            <div class="uk-timeline"
                                                                                 id="bodylieutrinhchitiet">
                                                                                {{-- body liệu trình --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                                onclick="return huyLieuTrinh()"
                                                                                data-dismiss="modal">Huỷ Liệu Trình
                                                                        </button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Đóng
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="tab-content" id="">
                                                    <div class="tab-pane fade show active" id="alllieutrinh"
                                                         role="tabpanel" aria-labelledby="alllieutrinh-tab">
                                                        @if (count($dataLieuTrinh)>0)
                                                            @foreach ($dataLieuTrinh as $item)
                                                                <div class="profile-minibox mt-4"
                                                                     onclick="showLieuTrinhDetail({{$item->idlieutrinh}})">

                                                                    <div class="body">
                                                                        <button type="button"
                                                                                class="button-none show-progress-lieutrinh">
                                                                            <span class="mr-1">Thông tin chi tiết</span>
                                                                            <i class="far fa-question-circle"></i>
                                                                        </button>
                                                                        <div class="box-datlich-history mt-2">
                                                                            <div class="left">
                                                                                <div class="date">
                                                                                    <small>Từ: {{date('d-m-Y',$item->ngaybatdau)}}
                                                                                        <br>Đến: {{date('d-m-Y',$item->dukienketthuc)}}
                                                                                    </small></div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        <div class="list-group">
                                                                                            <label class="">Dịch vụ sử
                                                                                                dụng</label>
                                                                                            @if (HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh) === null)
                                                                                                Chưa có liệu trình
                                                                                            @else
                                                                                                {{HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh)}}
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            @if ($item->trangthai === 0)
                                                                                                <i class="far fa-check-circle uk-text-primary"></i>
                                                                                                <span
                                                                                                    class="ml-1 uk-text-primary">Đang Tiến Hành</span>
                                                                                            @elseif($item->trangthai === 1)
                                                                                                <i class="far fa-check-circle uk-text-success"></i>
                                                                                                <span
                                                                                                    class="ml-1 uk-text-success">Hoàn thành</span>
                                                                                            @elseif($item->trangthai === 2)
                                                                                                <i class="far fa-check-circle uk-text-danger"></i>
                                                                                                <span
                                                                                                    class="ml-1 uk-text-danger">Đã Huỷ</span>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-start">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            BS. {{$item->tennv}}
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray">
                                                                                            <i class="far fa-clipboard"></i>
                                                                                        </label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            {{substr($item->ghichu,0,150)}}
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="box-donhang profile-minibox mt-4">
                                                                Không có liệu trình nào!
                                                            </div>
                                                        @endif


                                                    </div>
                                                    {{-- end tab tất cả --}}
                                                    <div class="tab-pane fade" id="lieutrinh-hoanthanh" role="tabpanel"
                                                         aria-labelledby="lieutrinh-hoanthanh-tab">
                                                        @if (count($dataLieuTrinh)>0)
                                                            @foreach ($dataLieuTrinh as $item)
                                                                @if ($item->trangthai === 1)
                                                                    <div class="profile-minibox mt-4"
                                                                         onclick="showLieuTrinhDetail({{$item->idlieutrinh}})">
                                                                        <div class="body">
                                                                            <button type="button"
                                                                                    class="button-none show-progress-lieutrinh">
                                                                                <span
                                                                                    class="mr-1">Thông tin chi tiết</span>
                                                                                <i class="far fa-question-circle"></i>
                                                                            </button>
                                                                            <div class="box-datlich-history mt-2">
                                                                                <div class="left">
                                                                                    <div class="date">
                                                                                        <small>Từ: {{date('d-m-Y',$item->ngaybatdau)}}
                                                                                            <br>Đến: {{date('d-m-Y',$item->dukienketthuc)}}
                                                                                        </small></div>
                                                                                </div>

                                                                                <div class="right">
                                                                                    <div
                                                                                        class="row d-flex justify-content-between">
                                                                                        <div class="col-8">
                                                                                            <div class="list-group">
                                                                                                <label class="">Dịch vụ
                                                                                                    sử dụng</label>
                                                                                                @if (HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh) === null)
                                                                                                    Chưa có liệu trình
                                                                                                @else
                                                                                                    {{HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh)}}
                                                                                                @endif

                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-4 justify-content-end">
                                                                                            <div
                                                                                                class="item ml-4 text-right">
                                                                                                <i class="far fa-check-circle uk-text-success"></i>
                                                                                                <span
                                                                                                    class="ml-1 uk-text-success">Hoàn thành</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="row mt-3 justify-content-start">
                                                                                        <div class="col-xl-4 d-flex">
                                                                                            <label for=""
                                                                                                   class="text-gray"><i
                                                                                                    class="fas fa-user-shield"></i></label>
                                                                                            <div
                                                                                                class="ml-2 limit-text-row-1">
                                                                                                BS. {{$item->tennv}}
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-xl-4 d-flex text-center">
                                                                                            <label for=""
                                                                                                   class="text-gray">
                                                                                                <i class="far fa-clipboard"></i>
                                                                                            </label>
                                                                                            <div
                                                                                                class="ml-2 limit-text-row-1">
                                                                                                {{substr($item->ghichu,0,150)}}
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="box-donhang profile-minibox mt-4">
                                                                Không có liệu trình nào!
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane fade" id="lieutrinh-dangdieutri"
                                                         role="tabpanel" aria-labelledby="lieutrinh-dangdieutri-tab">


                                                        @foreach ($dataLieuTrinh as $item)
                                                            @if ($item->trangthai === 0)

                                                                <div class="profile-minibox mt-4"
                                                                     onclick="showLieuTrinhDetail({{$item->idlieutrinh}})">
                                                                    <div class="body">
                                                                        <button type="button"
                                                                                class="button-none show-progress-lieutrinh">
                                                                            <span class="mr-1">Thông tin chi tiết</span>
                                                                            <i class="far fa-question-circle"></i>
                                                                        </button>
                                                                        <div class="box-datlich-history mt-2">
                                                                            <div class="left">
                                                                                <div class="date">
                                                                                    <small>Từ: {{date('d-m-Y',$item->ngaybatdau)}}
                                                                                        <br>Đến: {{date('d-m-Y',$item->dukienketthuc)}}
                                                                                    </small></div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        <div class="list-group">
                                                                                            <label class="">Dịch vụ sử
                                                                                                dụng</label>
                                                                                            @if (HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh) === null)
                                                                                                Chưa có liệu trình
                                                                                            @else
                                                                                                {{HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh)}}
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <i class="far fa-check-circle uk-text-primary"></i>
                                                                                            <span
                                                                                                class="ml-1 uk-text-primary">Đang Tiến Hành</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-start">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            BS. {{$item->tennv}}
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray">
                                                                                            <i class="far fa-clipboard"></i>
                                                                                        </label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            {{substr($item->ghichu,0,150)}}
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    <div class="tab-pane fade" id="lieutrinh-dahuy" role="tabpanel"
                                                         aria-labelledby="lieutrinh-dahuy-tab">

                                                        @foreach ($dataLieuTrinh as $item)

                                                            @if ($item->trangthai === 2)

                                                                <div class="profile-minibox mt-4"
                                                                     onclick="showLieuTrinhDetail({{$item->idlieutrinh}})">
                                                                    <div class="body">
                                                                        <button type="button"
                                                                                class="button-none show-progress-lieutrinh">
                                                                            <span class="mr-1">Thông tin chi tiết</span>
                                                                            <i class="far fa-question-circle"></i>
                                                                        </button>
                                                                        <div class="box-datlich-history mt-2">
                                                                            <div class="left">
                                                                                <div class="date">
                                                                                    <small>Từ: {{date('d-m-Y',$item->ngaybatdau)}}
                                                                                        <br>Đến: {{date('d-m-Y',$item->dukienketthuc)}}
                                                                                    </small></div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        <div class="list-group">
                                                                                            <label class="">Dịch vụ sử
                                                                                                dụng</label>
                                                                                            @if (HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh) === null)
                                                                                                Chưa có liệu trình
                                                                                            @else
                                                                                                {{HomeController::findNameDichVuByIdLieuTrinh($item->idlieutrinh)}}
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <i class="far fa-check-circle uk-text-danger"></i>
                                                                                            <span
                                                                                                class="ml-1 uk-text-danger">Đã Huỷ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-start">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            BS. {{$item->tennv}}
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray">
                                                                                            <i class="far fa-clipboard"></i>
                                                                                        </label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            {{substr($item->ghichu,0,150)}}
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="lichhen" role="tabpanel"
                                             aria-labelledby="lichhen-tab">
                                            <div class="donmua-tab">
                                                <div class="fa-nav">
                                                    <ul class="nav nav-tabs" id="" role="tablist">
                                                        <li class="nav-item pl-0" role="presentation">
                                                            <a class="nav-link active" id="alllichdat-tab"
                                                               data-toggle="tab" href="#alllichdat" role="tab"
                                                               aria-controls="alllichdat" aria-selected="true">Tất
                                                                cả</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="lichhoanthanh-tab" data-toggle="tab"
                                                               href="#lichhoanthanh" role="tab"
                                                               aria-controls="lichhoanthanh" aria-selected="false">Hoàn
                                                                thành</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="lichchuaden-tab" data-toggle="tab"
                                                               href="#lichchuaden" role="tab"
                                                               aria-controls="lichchuaden" aria-selected="false">Chưa
                                                                đến</a>
                                                        </li>
                                                        <li class="nav-item pr-0" role="presentation">
                                                            <a class="nav-link" id="lichdat-dahuy-tab" data-toggle="tab"
                                                               href="#lichdat-dahuy" role="tab"
                                                               aria-controls="lichdat-dahuy" aria-selected="false">Đã
                                                                hủy</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content" id="">
                                                    <div class="tab-pane fade show active" id="alllichdat"
                                                         role="tabpanel" aria-labelledby="alllichdat-tab">
                                                        @foreach ($lichSuDatLich as $datLich)
                                                            <div class="profile-minibox mt-4">
                                                                <div class="header">
                                                                    <div class="item">
                                                                        <button type="button" class="button-none">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                            <span class="ml-1">{{ $datLich['year'] }} ({{count($datLich['arrayDatLich'])}})</span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div class="body order-overflow1">
                                                                    @foreach ($datLich['arrayDatLich'] as $item)

                                                                        <div
                                                                            class="box-datlich-history @if ($loop->index == 0) mt-0 @endif">
                                                                            <div class="left">
                                                                                <div class="time">
                                                                                    {{date('H:i',$item->thoigiandat)}}
                                                                                </div>
                                                                                <div
                                                                                    class="date">{{date('d-m-Y',$item->thoigiandat)}}
                                                                                </div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        <div style="color: var(--main-color)"><strong>Dịch Vụ: </strong>{{Controller::findNameDVByIds($item->iddichvu)}}</div>
                                                                                        <div class="diachi"><strong>Địa Chỉ: </strong>{{$item->diachicoso}}</div>
                                                                                    </div>

                                                                                    <div class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <?php
                                                                                            if($item->trangthai == 0)
                                                                                            {
                                                                                            ?>

                                                                                            <span
                                                                                                class="ml-1 uk-text-primary">
                                                                                                @php
                                                                                                    $now = strtotime(date('Y-m-d H:i:s'));
                                                                                                @endphp
                                                                                                @if (Controller::minusDate($now,$item->thoigiandat))
                                                                                                    <i class="far fa-calendar uk-text-primary"></i>
                                                                                                    {{ Controller::minusDate($now,$item->thoigiandat)}}
                                                                                                @else
                                                                                                    <i class="fa fa-close uk-text-danger"></i>
                                                                                                    <span
                                                                                                        class="ml-1 uk-text-danger">Bạn đã trễ lịch</span>
                                                                                                @endif

                                                                                            </span>
                                                                                            <?php
                                                                                            }elseif($item->trangthai == 1)
                                                                                            {
                                                                                            ?>
                                                                                            <i class="far fa-check-circle uk-text-success"></i>
                                                                                            <span
                                                                                                class="ml-1 uk-text-success">Hoàn thành</span>
                                                                                            <?php
                                                                                            }else{
                                                                                            ?>
                                                                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                                                                            <span
                                                                                                class="ml-1 text-danger">Đã hủy</span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-between">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 tennv limit-text-row-1">


                                                                                            @if ($item->idnhanvien == 0)
                                                                                                Spa chọn nhân viên giúp
                                                                                                bạn
                                                                                            @else
                                                                                                Nhân viên
                                                                                                : {{Controller::findNameKhById($item->idnhanvien)}}
                                                                                            @endif


                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-clipboard-check"></i></label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            @if ($item->iddichvu == [0])
                                                                                                Muốn tư vấn
                                                                                            @else
                                                                                                Đặt lịch hẹn
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-4 text-right">
                                                                                       
                                                                                        @if ($item->trangthai==0 && $item->thoigiandat> strtotime ( '-30 minute' , strtotime (date('Y-m-d H:i:s'))))
                                                                                            <a onclick="checkCancel('{{URL::to('/huyprofile/'.$item->id)}}')">
                                                                                                <button
                                                                                                    class="button-href-basic ml-0">
                                                                                                    Huỷ lịch
                                                                                                </button>
                                                                                            </a>

                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                        
                                                    </div>
                                                    <div class="tab-pane fade" id="lichhoanthanh" role="tabpanel"
                                                         aria-labelledby="lichhoanthanh-tab">
                                                        @foreach ($lichSuDatLich1 as $datLich)
                                                            <div class="profile-minibox mt-4">
                                                                <div class="header">
                                                                    <div class="item">
                                                                        <button type="button" class="button-none">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                            <span class="ml-1">{{ $datLich['year'] }} ({{count($datLich['arrayDatLich'])}})</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="body order-overflow1">
                                                                    @foreach ($datLich['arrayDatLich'] as $item)
                                                                        <div
                                                                            class="box-datlich-history  @if ($loop->index == 0) mt-0 @endif">
                                                                            <div class="left">
                                                                                <div class="time">
                                                                                    {{date('H:i',$item->thoigiandat)}}
                                                                                </div>
                                                                                <div
                                                                                    class="date">{{date('d-m-Y',$item->thoigiandat)}}
                                                                                </div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">

                                                                                        <div style="color: var(--main-color)"><strong>Dịch Vụ: </strong>{{Controller::findNameDVByIds($item->iddichvu)}}</div>
                                                                                        <div class="diachi"><strong>Địa Chỉ: </strong>{{$item->diachicoso}}</div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <i class="far fa-check-circle uk-text-success"></i>
                                                                                            <span
                                                                                                class="ml-1 uk-text-success">Hoàn thành</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-between">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 tennv limit-text-row-1">
                                                                                            @if ($item->idnhanvien == 0)
                                                                                                Spa chọn nhân viên giúp
                                                                                                bạn
                                                                                            @else
                                                                                                Nhân viên
                                                                                                : {{$item->namenhanvien}}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-clipboard-check"></i></label>
                                                                                        <div
                                                                                            class="ml-2 limit-text-row-1">
                                                                                            @if ($item->iddichvu == [0])
                                                                                                Muốn tư vấn
                                                                                            @else
                                                                                                Đặt lịch hẹn
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-4 text-right">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                      
                                                    </div>
                                                    <div class="tab-pane fade" id="lichchuaden" role="tabpanel"
                                                         aria-labelledby="lichchuaden-tab">
                                                        <div class="profile-minibox mt-4">
                                                            @foreach ($lichSuDatLich2 as $datLich)
                                                                <div class="header">
                                                                    <div class="item">
                                                                        <button type="button" class="button-none">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                            <span class="ml-1">{{ $datLich['year'] }} ({{count($datLich['arrayDatLich'])}})</span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div class="body order-overflow1">
                                                                    @foreach ($datLich['arrayDatLich'] as $item)
                                                                        <div
                                                                            class="box-datlich-history @if ($loop->index == 0) mt-0 @endif">
                                                                            <div class="left">
                                                                                <div class="time">
                                                                                    {{date('H:i',$item->thoigiandat)}}
                                                                                </div>
                                                                                <div
                                                                                    class="date">{{date('d-m-Y',$item->thoigiandat)}}
                                                                                </div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        
                                                                                        <div style="color: var(--main-color)"><strong>Dịch Vụ: </strong>{{Controller::findNameDVByIds($item->iddichvu)}}</div>
                                                                                        <div class="diachi"><strong>Địa Chỉ: </strong>{{$item->diachicoso}}</div>
                                                                                    </div>

                                                                                    <div class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <?php
                                                                                            if($item->trangthai == 0)
                                                                                            {
                                                                                            ?>

                                                                                            <span
                                                                                                class="ml-1 uk-text-primary">
                                                                                                @php
                                                                                                    $now = strtotime(date('Y-m-d H:i:s'));
                                                                                                @endphp
                                                                                                @if (Controller::minusDate($now,$item->thoigiandat))
                                                                                                    <i class="far fa-calendar uk-text-primary"></i>
                                                                                                    {{ Controller::minusDate($now,$item->thoigiandat)}}
                                                                                                @else
                                                                                                    <i class="fa fa-close uk-text-danger"></i>
                                                                                                    <span
                                                                                                        class="ml-1 uk-text-danger">Bạn đã trễ lịch</span>
                                                                                                @endif

                                                                                            </span>
                                                                                            <?php
                                                                                            }elseif($item->trangthai == 1)
                                                                                            {
                                                                                            ?>
                                                                                            <i class="far fa-check-circle uk-text-success"></i>
                                                                                            <span
                                                                                                class="ml-1 uk-text-success">Hoàn thành</span>
                                                                                            <?php
                                                                                            }else{
                                                                                            ?>
                                                                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                                                                            <span
                                                                                                class="ml-1 text-danger">Đã hủy</span>
                                                                                            <?php
                                                                                            }
                                                                                            ?>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-between">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 tennv limit-text-row-1">
                                                                                            @if ($item->idnhanvien == 0)
                                                                                                Spa chọn nhân viên giúp
                                                                                                bạn
                                                                                            @else
                                                                                                Nhân viên
                                                                                                : {{$item->namenhanvien}}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-clipboard-check"></i></label>
                                                                                        <div class="ml-2 tennv limit-text-row-1">
                                                                                            @if ($item->iddichvu == [0])
                                                                                                Muốn tư vấn
                                                                                            @else
                                                                                                Đặt lịch hẹn
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-4 text-right">
                                                                                       @if ($item->trangthai==0 && $item->thoigiandat> strtotime ( '-30 minute' , strtotime (date('Y-m-d H:i:s'))))
                                                                                            <a onclick="checkCancel('{{URL::to('/huyprofile/'.$item->id)}}')">
                                                                                                <button
                                                                                                    class="button-href-basic ml-0">
                                                                                                    Huỷ lịch
                                                                                                </button>
                                                                                            </a>

                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="lichdat-dahuy" role="tabpanel"
                                                         aria-labelledby="lichdat-dahuy-tab">
                                                        <div class="profile-minibox mt-4">
                                                            @foreach ($lichSuDatLich3 as $datLich)
                                                                <div class="header">
                                                                    <div class="item">
                                                                        <button type="button" class="button-none">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                            <span class="ml-1">{{ $datLich['year'] }} ({{count($datLich['arrayDatLich'])}})</span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div class="body order-overflow1">
                                                                    @foreach ($datLich['arrayDatLich'] as $item)
                                                                        <div
                                                                            class="box-datlich-history @if ($loop->index == 0) mt-0 @endif">
                                                                            <div class="left">
                                                                                <div class="time">
                                                                                    {{date('H:i',$item->thoigiandat)}}
                                                                                </div>
                                                                                <div
                                                                                    class="date">{{date('d-m-Y',$item->thoigiandat)}}
                                                                                </div>
                                                                            </div>

                                                                            <div class="right">
                                                                                <div
                                                                                    class="row d-flex justify-content-between">
                                                                                    <div class="col-8">
                                                                                        <div style="color: var(--main-color)"><strong>Dịch Vụ: </strong>{{Controller::findNameDVByIds($item->iddichvu)}}</div>
                                                                                        <div class="diachi"><strong>Địa Chỉ: </strong>{{$item->diachicoso}}</div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-4 justify-content-end">
                                                                                        <div
                                                                                            class="item ml-4 text-right">
                                                                                            <i class="fas fa-exclamation-circle text-danger"></i>
                                                                                            <span
                                                                                                class="ml-1 text-danger">Đã hủy</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="row mt-3 justify-content-between">
                                                                                    <div class="col-xl-4 d-flex">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-user-shield"></i></label>
                                                                                        <div
                                                                                            class="ml-2 tennv limit-text-row-1">
                                                                                            @if ($item->idnhanvien == 0)
                                                                                                Spa chọn nhân viên giúp
                                                                                                bạn
                                                                                            @else
                                                                                                Nhân viên
                                                                                                : {{$item->namenhanvien}}
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-xl-4 d-flex text-center">
                                                                                        <label for="" class="text-gray"><i
                                                                                                class="fas fa-clipboard-check"></i></label>
                                                                                        <div  class="ml-2 limit-text-row-1">
                                                                                            @if ($item->iddichvu == [0])
                                                                                            Muốn tư vấn
                                                                                            @else
                                                                                                Đặt lịch hẹn
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xl-4 text-right">
                                                                                       
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="yeuthich" role="tabpanel"
                                             aria-labelledby="yeuthich-tab">
                                            <div class="donmua-tab">
                                                <div class="fa-nav">
                                                    <ul class="nav nav-tabs" id="" role="tablist">
                                                        <li class="nav-item pl-0" role="presentation">
                                                            <a class="nav-link active" id="allyeuthich-tab"
                                                               data-toggle="tab" href="#allyeuthich" role="tab"
                                                               aria-controls="allyeuthich" aria-selected="true"
                                                               style="font-size: 13pt;">Sản yêu thích của bạn</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content" id="">
                                                    <div class="tab-pane fade show active" id="allyeuthich"
                                                         role="tabpanel" aria-labelledby="allyeuthich-tab">
                                                        <div class="profile-minibox mt-4">
                                                            <div class="body">
                                                                <table class="table">
                                                                    <thead class=""
                                                                           style="background: var(--main-color);">
                                                                    <tr class="text-center text-white">
                                                                        <th scope="col">STT</th>
                                                                        <th scope="col">Ảnh</th>
                                                                        <th scope="col">Tên sản phẩm</th>
                                                                        <th scope="col">Xóa</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($spyeuthich as $indexyt => $yeuthich)
                                                                        <?php $anh = json_decode($yeuthich->img);?>
                                                                        <tr id="yt{{ $yeuthich->id}}">
                                                                            <th scope="row">{{$indexyt+=1}}</th>
                                                                            <td class="w-15"><a
                                                                                    href="{{URL::to("san-pham/chi-tiet", $yeuthich->slug)}}">
                                                                                    <img
                                                                                        src="{{ asset('/uploads')}}/{{$anh[0]}}"
                                                                                        class="card-img-top img-sanpham-zbar w-100"
                                                                                        style="object-fit: cover; height: 80px;"
                                                                                        alt="..."></a></td>
                                                                            <td>
                                                                                <a href="{{URL::to("san-pham/chi-tiet", $yeuthich->slug)}}"
                                                                                   class="text-dark font-weight-bold text-decoration-none">{{$yeuthich->name}}
                                                                                </a></td>
                                                                            <td width="10%" class="text-center"><span
                                                                                    onclick="XoaYeuThich({{$yeuthich->id}})"
                                                                                    class="btn btn-dark text-white"><i
                                                                                        class='fas fa-trash-alt'></i></span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3">
                @include('Site.components.box-lienhe')

                @include('Site.components.list-social')
            </div> --}}
                <script>
                    var msg = {{Session::get("alert")}};
                    var exist = {{Session::has("alert")}};
                    if (exist) {
                        alert(msg);
                    }
                </script>
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.9.2/js/uikit.min.js"></script>
    <script src="{{ asset('Site/js') }}/profile-user.js"></script>
    <script>
        $("#form_prof").validate({
            rules: {
                username: {required: true, maxlength: 45, minlength: 3},
                email: {required: true, email: true}
            },
            messages: {
                username: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập tên</span>",
                    maxlength: "<span class='badge badge-danger'>Tên dài quá, phải <25 ký tự </span>",
                    minlength: "<span class='badge badge-danger'>Tên ngắn quá, phải >3 ký tự </span>"
                },
                email: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập email</span>",
                    email: "<span class='badge badge-danger'>Không đúng định dạng email</span>"
                }
            }
        });

        document.getElementById("ip-avt").onchange = function () {

            var ListImages = document.getElementById("ip-avt").files;
            if (ListImages.length > 0) {

                var filetoload = ListImages[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var srcData = e.target.result;
                    var newIMG = document.createElement('img');
                    newIMG.src = srcData;
                    document.getElementById("imageA").src = srcData;
                };
                //
                // // read the image file as a data URL.
                reader.readAsDataURL(filetoload);
            }
        };

        function HuyDatHang(id) {
            Swal.fire({
                title: 'Bạn muốn hủy đơn hàng này chứ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#efa789',
                cancelButtonColor: '#000000',
                confirmButtonText: 'Đồng Ý',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    swal.fire(
                        {
                            title: 'Hủy thành công',
                            icon: 'success'
                        }
                    );
                    $.ajax({
                        url: domain + '/huydonhang/' + id,
                        type: 'GET',
                        dataType: 'json',
                        data: {id: id},
                        success: function (data) {
                            if (data == 0) {
                                window.location.reload();
                            }
                        }
                    });
                }
            });

        }

        function XoaYeuThich(id) {
            $.ajax({
                url: domain + '/xoayeuthich/' + id,
                type: 'GET',
                async: false,
                dataType: 'json',
                data: {id: id},
                success: function (datayeuthich) {
                    if (datayeuthich == 0) {
                        iziToast.success({
                            title: 'Xóa thành công !!!',
                            message: '',
                            position: 'bottomRight',
                            backgroundColor: 'green',
                            titleColor: 'white',
                            messageColor: 'white',
                            iconColor: 'white',
                        });
                        $("#yt" + id).css({display: "none"});
                    } else {
                        iziToast.warning({
                            title: 'Xóa thất bại!!!',
                            message: '',
                            position: 'bottomRight',
                            backgroundColor: 'oranged',
                            titleColor: 'black',
                            messageColor: 'black',
                            iconColor: 'black',
                        });
                    }
                }
            });
        }

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.9.2/css/uikit.min.css">
@endsection
