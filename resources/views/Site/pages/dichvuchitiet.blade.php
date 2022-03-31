@extends('Site.layout')

@section('title')
    Dịch Vụ - Tên Dịch Vụ
@endsection

@section('main')
    @if(!isset($khongcodichvu) && isset($detaildichvu))
        @php
            $dongia1 = 0;

            $dongia1 = $detaildichvu->dongia - ($detaildichvu->dongia/100 * $detaildichvu->giamgia);

        @endphp
        <div class="fa-dichvu my-5" style="margin-bottom: 5em !important;">
            <div class="container">
                <div class="fa-dichvuchitiet">
                    <div class="image w-100">
                        <img src="{{ asset('uploads/'.$detaildichvu->img) }}" class="img-fluid" alt="">
                    </div>
                    <div class="content5">
                        <div class="dichvu-content box-shadow-1 blog-body">
                            <h1 class=" font-weight-600 text-left  pt-1">{{$detaildichvu->name}}</h1>
                            <div class="box-gia">
                                <span class="giagiam">{{number_format($detaildichvu->dongia)}} đ </span>
                                <span class="gia left-bar">
                                    {{number_format($dongia1)}} đ
                                </span>
                                <span class="name-danhmuc hover-pink left-bar"> {{$detaildichvu->namedm}}</span>
                            </div>
                            <div class="noidungngan mt-4">
                                <div class="border-z border-left-z"></div>
                                <p class="m-0"> {{$detaildichvu->motangan}}</p>
                                <div class="border-z border-right-z"></div>
                            </div>

                            <div class="mota mt-4 noidung">
                                <div class="divnoidung">

                                        <?php echo $detaildichvu->noidung;?>

                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="button btn-8 btn-datlich btn-modal-main" type-modal="modal-datlich"
                                     data-show="one">
                                    ĐẶT LỊCH NGAY
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="content5">
                <div class="row mt-5">
                    <div class="danhmuc-listblog container">
                        <div class="head-blog-item blog-title">
                            <div class="w-100 text-left d-flex align-items-center">
                                <div class="title-3 mr-4">
                                    Dịch Vụ Liên Quan
                                </div>
                                <div class="line-main-color ml-auto" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="list-blog-1 mt-4">
                            <div class="row mb-30px">
                                <div class="owl-carousel owl-theme slide-dichvu" id="dich-vu-lien-quan">
                                @foreach ($dichvulienquan as $data)
                                    @if ($data != null)
                                    @php
                                        $giaSauGiam = $data->dongia - ($data->dongia * $data->giamgia / 100 );
                                    @endphp
                                    <div class="w-100">
                                        <div class="item-dichvu-2 m-3 bg-none"
                                            onclick="window.location='{{ asset('dich-vu') }}/{{$data->slug}}';">
                                            <div class="dichvu-header">
                                                <div class="box-danhmuc-small d-flex align-items-center">
                                                    <img src="{{ asset('uploads/'.$data->icon) }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="img-dichvu">
                                                    <a href="{{ asset('dich-vu') }}/{{$data->slug}}">
                                                        <img src="{{ asset('uploads/'.$data->img) }}" alt="">
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="content mt-5 px-4 pb-3 background-none">
                                                @if ($data->giamgia > 0)
                                                    <div class="box-gia">
                                                        <span class="giagiam">{{number_format($data->dongia)}} đ </span>
                                                        <span class="gia left-bar"> {{number_format($giaSauGiam)}} đ </span>
                                                    </div>
                                                @else
                                                    <div class="box-gia">
                                                        <span class="gia">{{number_format($data->dongia)}} đ </span>
                                                    </div>
                                                @endif
                                                <div class="name text-1 limit-text-row-1 px-5 mt-2">
                                                    {{$data->name}}
                                                </div>

                                                <p class="mota text-2 limit-text-row-3 mt-1 mt-2 text-center">
                                                    {{$data->motangan}}

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="row mt-5">
                        <hr>
                        <div class="row m-auto">
                            <h2 class="text-center m-auto" style="color: var(--main-color);">Không có dịch vụ này</h2>
                        </div>
                        <hr>
                    </div>
                    <div class="row mt-5">
                        <div class="danhmuc-listblog container">
                            <div class="head-blog-item blog-title">
                                <div class="w-100 text-left d-flex align-items-center">
                                    <div class="title-3 mr-4">
                                        Các Dịch Vụ Khác
                                    </div>
                                    <div class="line-main-color ml-auto" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="list-blog-1 mt-4">
                                <div class="row  mb-30px">

                                    @foreach ($dichvukhac as $itemdichvukhac)

                                        <div class="col-xl-3"
                                             onclick="window.location='{{ asset('dich-vu') }}/{{$itemdichvukhac->slug}}';">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px;">
                                                    <img class="img-fluid"
                                                         src="{{ asset('uploads') }}/{{$itemdichvukhac->img}}" alt="">
                                                </div>
                                                <div class="content-tin-3 background-white">
                                                    <div class="row">
                                                        <div
                                                            class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                            <div class="mr-3">
                                                                <a class="box-danhmuc-1">
                                                                    {{$itemdichvukhac->tendm}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-1 mb-1 mt-3">
                                                        <a href="{{ asset('dich-vu') }}/{{$itemdichvukhac->slug}}"
                                                           class="hover-pink">{{$itemdichvukhac->name}}</a>
                                                    </div>
                                                    <p class="blog-mota mb-0 limit-text-row-3">
                                                        {{$itemdichvukhac->motangan}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @include('Site.components.gioithieulieutrinh')
        </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">
@endsection
@section('javascript')

    <script src="{{ asset('Site/js') }}/dichvu.js"></script>

@endsection
