<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Fbeauty Spa - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('Admin/assets') }}/images/logo.svg">
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    {{-- Font-awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    {{-- Owl carousel --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">

    {{--Quốc nhúng--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    @yield('css')

    {{-- Custom css --}}
    <link rel="stylesheet" href="{{ asset('Site/css') }}/main.css">
    <link rel="stylesheet" href="{{ asset('Site/css') }}/custom.nhan.css">

</head>

<body>
    <input type="hidden" name="" id="server-name" value="{{env("APP_URL")}}">

    <div id="loading" class="modal-container show">
        <div class="modal-background">
            <div class="justify-content-center" id="imgload">
                <div class="spinner-border text-danger h-50" role="status">
                    <span class="visually-hidden">F</span>
                </div>
            </div>
        </div>
    </div>

    @if ($pathActive != 'trang-chu')
        @include('Site.components.header-2')
    @else
        @include('Site.components.header-1')
    @endif

    <main class="">
        @if ($pathActive != 'trang-chu')
            @include('Site.components.slide-logo')
        @endif
        @yield('main')
    </main>

    @include('Site.components.footer')
    @include('Site.components.datlich')
    @include('Site.components.modal-user')
    @include('Site.components.modal-giohang')

    <input type="hidden" name="" id="domain" value="{{URL::to('/')}}">

</body>

</html>

<script>
    var listCoSo = <?php echo json_encode($listCoSo); ?>;
    var listDanhMucDichVu = <?php echo json_encode($listDanhMucDichVu); ?>;
    var khachHangLogin = <?php echo json_encode(session('khachHang')); ?>;
</script>

{{-- Boostrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>


{{-- Sweetalert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Owl carousel --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

{{-- Moment JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

{{-- Custom js --}}
<script src="{{ asset('Site/js') }}/bientoancuc.js"></script>
<script src="{{ asset('Site/js') }}/main.js"></script>
<script src="{{ asset('Site/js') }}/datlich.js"></script>
<script src="{{ asset('Site/js') }}/authen.js"></script>

{{-- Sweetalert 2 --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--Quốc nhúng --}}
<script src="{{ asset('Site/js') }}/showgiohang.js"></script>
<script src="{{ asset('Site/js') }}/Loading.js"></script>
{{--Hết phần Quốc nhúng--}}
{{-- Quang Nhân --}}
<script src="{{ asset('Site/js') }}/lieutrinh.nhan.js"></script>
<script src="{{ asset('Site/js') }}/custom.nhan.js"></script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>
{{-- Quang Nhân --}}

<script>
    $(window).on('load', function(event) {
        $('#loading').removeClass('show');
        // $('.load').delay(1000).fadeOut('fast');
        $('#imgload').delay(500).fadeOut('fast');
    });
</script>

@include('Site.components.thongbao')
@yield('javascript')
