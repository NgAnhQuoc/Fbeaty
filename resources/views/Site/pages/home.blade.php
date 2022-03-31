@extends('Site.layout')

@section('title')
    Trang Chủ
@endsection

@section('main')
    <div class="about">
        <div class="box-about position-relative">
            <div class="background-about">
                <div class="box-images-2">
                    <div class="box-color-1"></div>
                    <div class="img-1">
                        <img class="img-fluid position-relative z-index-1"
                             src="{{ asset('Site/images') }}/about-1.png" alt="">
                    </div>
                    <div class="img-2">
                        <img class="img-small-2 float-right position-relative z-index-1"
                             src="{{ asset('Site/images') }}/coso4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-xl-6 col-lg-6 col-ml-6 col-sm-12 col-12">
                        <div class="about-content">
                            <div class="title-small line-before">
                                VỀ CHÚNG TÔI
                            </div>
                            <div class="w-100">
                                <div class="title-1">
                                    Hệ Thống Spa <br> Đẳng Cấp
                                </div>

                                <div class="text-4">
                                    Hệ Thống Spa Đẳng Cấp
                                </div>

                                <div class="text-1 mt-4 text-desk">
                                    Với 45 chi nhánh trải dài khắp cả nước, FBeauty Spa tự hào là chuỗi hệ thống thẩm mỹ
                                    viện hàng đầu Việt Nam
                                </div>

                                <div class="text-2 mt-1">
                                    Mang trong mình niềm tin về sứ mệnh đánh thức vẻ đẹp tiềm ẩn trong mỗi người, Seoul
                                    Spa luôn nỗ lực
                                    không ngừng để đem đến cho khách hàng những dịch vụ hoàn hảo nhất. Không chỉ nằm ở
                                    kết quả mà Seoul
                                    Spa còn hướng tới thẩm mỹ khỏe – đẹp – an toàn để mỗi phút giây ngắm mình trong
                                    gương là những
                                    phút giây tận hưởng hạnh phúc thật sự của mỗi khách hàng.
                                </div>
                            </div>
                            <div class="w-100 text-left mt-3 div-button">
                                <a href="{{URL::to("gioi-thieu")}}">
                                    <button class="btn-3 active black-1">Xem chi tiết</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box-service">
        <div class="service-intro position-relative">
            <div class="background-service w-100">
                <div class="service-intro-item left"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-12 "></div>
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 p-4em fa-list-danhmuc">
                            <div class="service-content position-relative z-index-1">
                                <div class="title-small line-before">
                                    Dich Vụ
                                </div>
                                <div class="w-100">
                                    <div class="text-4 w-100">
                                        Xu Hướng Làm Đẹp
                                    </div>
                                    <div class="list-danhmuc mt-4">
                                        <div class="danhmuc-item">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img src="{{ asset('Site/images/icon') }}/beauty-treatment.png"
                                                             class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Chăm sóc da mặt
                                                    </div>
                                                    <div class="text-2">
                                                        Chăm sóc da mặt là một trong các gói dịch vụ Spa cơ bản và
                                                        đông khách nhất hiện nay.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="danhmuc-item mt-5">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img src="{{ asset('Site/images/icon') }}/acne.png"
                                                             class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Điều trị mụn, sẹo
                                                    </div>
                                                    <div class="text-2">
                                                        Điều trị mụn là phương pháp hiệu quả nhất nhằm làm sạch mụn,
                                                        se khít lỗ chân lông và giảm vết sẹo thâm do mụn để lại.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="danhmuc-item mt-5">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img
                                                            src="{{ asset('Site/images/icon') }}/facial-treatment-black.png"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Dịch vụ trị nám, tàn nhang
                                                    </div>
                                                    <div class="text-2">
                                                        Để che mờ những vết nám, tàng nhang trên khuôn mặt, chị em
                                                        sẽ mất khá nhiều thời gian để trang điểm. Việc lạm dụng
                                                        trang điểm cũng gây ảnh hưởng xấu tới sức khỏe của da về
                                                        sau.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="danhmuc-item mt-5">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img src="{{ asset('Site/images/icon') }}/mesotherapy.png"
                                                             class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Làm trẻ hóa da
                                                    </div>
                                                    <div class="text-2">
                                                        Hiện nay có rất nhiều công nghệ không xâm lấn giúp làm cho
                                                        da săn chắc, xóa vết nhăn, tạo đường nét trẻ trung cho cơ
                                                        thể.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="danhmuc-item mt-5">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img src="{{ asset('Site/images/icon') }}/hot-stone.png"
                                                             class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Dịch vụ massage
                                                    </div>
                                                    <div class="text-2">
                                                        Massage foot và massage body có tác dụng giúp khách hàng
                                                        giảm đau, thư giãn, xua tan mệt mỏi và căng thẳng, tăng
                                                        cường hệ miễn dịch.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="danhmuc-item mt-5">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 fa-img">
                                                    <div class="box-icon-1">
                                                        <img src="{{ asset('Site/images/icon') }}/fitness-black.png"
                                                             class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-10 col-lg-9 pl-4 fa-text d-flex align-content-stretch flex-wrap">
                                                    <div class="text-5">
                                                        Dịch vụ giảm béo
                                                    </div>
                                                    <div class="text-2">
                                                        Tăng cân, béo phì là vấn đề mà rất nhiều chị em lo lắng,
                                                        việc chăm lo cho vóc dáng dường như đã trở thành nhu cầu
                                                        thiết yếu của con người
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 text-left mt-4">

                                    <button data-show="one" class="button btn-full btn-datlich btn-modal-main"
                                            type-modal="modal-datlich">ĐẶT LỊCH
                                        NGAY
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-service">
            <div class="container position-relative z-index-1 p-0">
                <div class="container">
                    <div class="d-flex align-items-center fa-header-service">
                        <div class="head-service-item service-title">
                            <div class="w-100 text-left">
                                <div class="title-small color-black-main">
                                    LỰA CHỌN DỊCH VỤ
                                </div>
                                <div class="title-3">
                                    Bí Quyết Khỏe Và Đẹp
                                </div>
                            </div>
                        </div>
                        <div class="head-service-item">
                            <div class="d-flex">
                                <div
                                    class="d-flex align-items-center text-2 mr-4 lg-hide head-service-item service-title"
                                    style="color: #000000;">Tìm kiếm
                                    theo
                                </div>
                                <ul class="nav nav-tabs" id="" role="tablist">
                                    <li class="nav-item pl-0" role="presentation">
                                        <a class="nav-link btn-3 active black-1"
                                           id="uachuong-tab"
                                           data-toggle="tab"
                                           href="#uachuong"
                                           role="tab"
                                           aria-controls="uachuong"
                                           aria-selected="true">Ưu đãi</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link btn-3 black-1" id="khuyenmai-tab" data-toggle="tab"
                                           href="#khuyenmai" role="tab" aria-controls="khuyenmai" aria-selected="false">Giá
                                           Ưa chuộng tháng</a>
                                    </li>
                                    <li class="nav-item pr-0" role="presentation">
                                        <a class="nav-link btn-3 black-1" id="khuyenmai-tab" href="/dich-vu">Xem
                                            Thêm</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="list-tabs mt-5">
                    <div class="tab-content" id="">
                        <div class="tab-pane fade show active" id="uachuong" role="tabpanel"
                             aria-labelledby="uachuong-tab">
                            <div class="w-100">
                                <div class="box-dichvu">
                                    <div class="box-sev">
                                        <div class="owl-carousel owl-theme slide-dichvu" id="dich-home-slide">
                                          
                                            @foreach ($listDichVuGiamGia as $dichVuGiamGia)
                                            <div class="dichvu-item">
                                                <div class="content-1">
                                                    <div class="text-7 color-main-1">
                                                        {{ $dichVuGiamGia->namedm }}
                                                    </div>

                                                    <div class="img-1 mt-4">
                                                        <img class=""
                                                             src="{{ asset('uploads/')}}/{{ $dichVuGiamGia->img }}"
                                                             alt="">
                                                    </div>

                                                    <div class="text-1 limit-text-row-1 mt-4">
                                                        {{ $dichVuGiamGia->name }}
                                                    </div>

                                                    <div class="box-gia-dichvu mt-2">
                                                        @if ($dichVuGiamGia->giamgia > 0)
                                                            @php
                                                                $giaSauGiam = $dichVuGiamGia->dongia - ($dichVuGiamGia->dongia * $dichVuGiamGia->giamgia / 100);
                                                            @endphp
                                                            <span class="giagiam">{{ number_format($dichVuGiamGia->dongia, 0) }} đ </span>
                                                            <span class="gia left-bar">
                                                            {{ number_format($giaSauGiam, 0)}} đ
                                                        </span>
                                                        @else
                                                            <span class="gia">
                                                            {{ number_format($dichVuGiamGia->dongia, 0) }} đ
                                                        </span>
                                                        @endif

                                                    </div>

                                                    <p class="text-2 limit-text-row-3 mt-1 mt-2">
                                                        {{ $dichVuGiamGia->motangan }}

                                                    </p>
                                                </div>
                                                <div class="w-100 text-center mb-4">
                                                    <button data-show="one" type-modal="modal-datlich"
                                                            class="button btn-4 btn-modal-main">Đặt lịch
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="khuyenmai" role="tabpanel" aria-labelledby="khuyenmai-tab">
                            <div class="w-100">
                                <div class="box-dichvu">
                                    <div class="box-sev">
                                        <div class="owl-carousel owl-theme slide-dichvu" id="dichvugiamgia-home-slide">
                                            @foreach ($listDichVuUaChuong as $dichVuUaChuong)
                                            @if ($dichVuUaChuong->dichvu != null)
                                                <div class="dichvu-item">
                                                    <div class="content-1">
                                                        <div class="text-7 color-main-1">
                                                            {{ $dichVuUaChuong->dichvu->namedm }}
                                                        </div>

                                                        <div class="img-1 mt-4">
                                                            <img class=""
                                                                 src="{{ asset('uploads/')}}/{{ $dichVuUaChuong->dichvu->img }}"
                                                                 alt="">
                                                        </div>

                                                        <div class="text-1 limit-text-row-1 mt-4">
                                                            {{ $dichVuUaChuong->dichvu->name }}
                                                        </div>

                                                        <div class="box-gia-dichvu mt-2">
                                                            @if ($dichVuUaChuong->dichvu->giamgia > 0)
                                                                @php
                                                                    $giaSauGiam = $dichVuUaChuong->dichvu->dongia - ($dichVuUaChuong->dichvu->dongia * $dichVuUaChuong->dichvu->giamgia / 100);
                                                                @endphp
                                                                <span class="giagiam">{{ number_format($dichVuUaChuong->dichvu->dongia, 0) }} đ </span>
                                                                <span class="gia left-bar">
                                                            {{ number_format($giaSauGiam, 0)}} đ
                                                        </span>
                                                            @else
                                                                <span class="gia">
                                                            {{ number_format($dichVuUaChuong->dichvu->dongia, 0) }} đ
                                                        </span>
                                                            @endif

                                                        </div>

                                                        <p class="text-2 limit-text-row-3 mt-1 mt-2">
                                                            {{ $dichVuUaChuong->dichvu->motangan }}

                                                        </p>
                                                    </div>
                                                    <div class="w-100 text-center mb-4">
                                                        <button data-show="one" type-modal="modal-datlich"
                                                                class="button btn-4 btn-modal-main">Đặt lịch
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                            @if (count($listDichVuUaChuong) === 0)
                                                Chưa có dịch vụ
                                            @endif
                                            
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

    <div class="box-product mb-5">
        @include('Site.components.slide-logo')
        <div class="list-product">
            <div class="container">
                <div class="w-100 text-center mb-4">
                    <div class="title-small text-center" style="margin-top: 5em !important;">
                        MỚI NHẤT
                    </div>
                    <div class="text-4">
                        Sản Phẩm Mới Nhất
                    </div>
                    {{-- <div class="line-2"></div> --}}
                </div>

                <div class="box-product-1">
                    <div class="row">
                        <div class="owl-carousel owl-theme" id="product-home-slide">
                            @foreach($spkhac as $i => $spk)
                                <?php
                                $anhk = json_decode($spk->img);
                                ?>
                                <div class="fa-card-product-item">
                                    <div class="card rounded-0 product-card child-item-sanpham box-item-sanpham zbar">
                                        <div class="card-header bg-transparent border-bottom-0">
                                            @if(session()->has('khachHang') && session('khachHang') != '')
                                                <?php $checkyeuthich1 = \Illuminate\Support\Facades\DB::table('yeuthich')
                                                    ->where('idkhachhang', session('khachHang')->id)
                                                    ->where('idsanphamchitiet', $spk->id)
                                                    ->doesntExist()?>
                                                <?php if ($checkyeuthich1 == false) {?>
                                                <div class="btn-add-wishlist btn-sticky hover-scale-1 active"
                                                     id="tym{{$spk->id}}" onclick="AddYeuThich({{$spk->id}})">
                                                    <div class="box-cicrle">
                                                        <i class="fas fa-heart heart-full"></i>
                                                        <i class="far fa-heart heart-line"></i>
                                                    </div>
                                                </div>
                                                <?php } else{?>
                                                <div class="btn-add-wishlist btn-sticky hover-scale-1"
                                                     id="tym{{$spk->id}}" onclick="AddYeuThich({{$spk->id}})">
                                                    <div class="box-cicrle">
                                                        <i class="fas fa-heart heart-full"></i>
                                                        <i class="far fa-heart heart-line"></i>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            @else
                                                <div class="btn-add-wishlist btn-sticky hover-scale-1"
                                                     id="tym{{$spk->id}}" onclick="AddYeuThich({{$spk->id}})">
                                                    <div class="box-cicrle">
                                                        <i class="fas fa-heart heart-full"></i>
                                                        <i class="far fa-heart heart-line"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($spk->giamgia !="")
                                                <div class="btn-add-discout btn-sticky hover-scale-1">
                                                    <div class="box-cicrle-giamgia p-2 rounded text-white">
                                                        <span style="font-size: 10pt;">{{$spk->giamgia}}%</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <img src="{{ asset('/uploads')}}/{{$anhk[0]}}"
                                             class="card-img-top img-sanpham-zbar" alt="...">
                                        <div class="card-body text-center">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">{{$spk->tendm}}</p>
                                                </a>
                                                <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                    <h6 class="product-name mb-1"
                                                        style="height: 40px;"><?php if (strlen($spk->name) <= 45) {
                                                            echo $spk->name;
                                                        } else {
                                                            echo substr($spk->name, 0, 45) . '...';
                                                        }?></h6>
                                                </a>
                                                <div class="d-flex align-items-center justify-content-center"
                                                     style="height: 40px;">
                                                    <div class="mb-1 product-price">
                                                        <span class="me-1 text-decoration-line-through">{{str_replace(',', '.',number_format($spk->dongia)), ""}} đ</span>
                                                        / <span>{{$spk->thetich}}ml</span>
                                                        @if($spk->giamgia !="")
                                                            <br><span style="font-size: 13pt;">Giảm còn: </span><span
                                                                class="me-1 text-decoration-line-through font-weight-bold">{{str_replace(',', '.',number_format($spk->dongia-(($spk->dongia * $spk->giamgia)/100))), ""}}đ</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2">
                                                    <div class="d-grid gap-2">
                                                        <button class="w-100 btn-sanpham btn-5"
                                                                onclick="ThemGioHang({{$spk->idspct}})"><i
                                                                class="fas fa-cart-plus"></i> Thêm giỏ hàng
                                                        </button>
                                                        <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                            <button class="w-100 btn-sanpham btn-5 mt-2"><i
                                                                    class="fas fa-search"></i> Xem chi tiết
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-100 text-center mt-3">
                    <a href="{{URL::to("san-pham")}}">
                        <button class="btn-full pl-5 pr-5">Xem tất cả</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('Site.components.gioithieulieutrinh')

    @include('Site.components.box-blog')



@endsection
@section('javascript')
    <script src="{{ asset('Site/js') }}/sanpham.js"></script>
@endsection
