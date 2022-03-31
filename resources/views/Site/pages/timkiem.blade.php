@extends('Site.layout')

@section('title')
    Dịch Vụ
@endsection

@section('main')
    @php
        use app\Http\Controllers\Controller;
    @endphp
    <div class="fa-dichvu my-5" style="margin-bottom: 5em !important;">
        <div class="container">
            <div class="w-100 text-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="head-service-item service-title">
                        <div class="w-100 text-left">
                            <div class="title-small color-black-main">
                                <form class="form-inline" action="">
                                    <div class="form-group">
                                        <input class="form-control" name="key" placeholder="Tìm Kiếm ...." required>
                                    </div>
                                    <button type="submit" class="btn btn-default"><i
                                            class="fas fa-search color-black-2"></i></button>
                                </form>
                            </div>
                            <div class="title-3 mt-3">
                                kết quả cho tìm kiếm : {{request()->key}}
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="list-tabs mb-4">
                    <div class="tab-content " id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tatca" role="tabpanel">

                            <div class="title-small color-black-main text-left">Kết quả tìm kiếm dịch vụ</div>
                            <div class="w-100">
                                <input type="hidden" id="data" value="{{$dulieu}}">
                                <div class="fa-list-dichvu mt-1" id="showdichvu">

                                </div>
                                <a id="xemthembtndv">
                                    <button class="w-25 border border-dark p-2" style="background-color: #e87c7b;"
                                            onclick="xemThemDichVu()">Xem thêm <i class="fa fa-angle-down"></i></button>
                                </a>
                            </div>
                            <hr>

                            <div class="title-small color-black-main text-left">Kết quả tìm kiếm trong sản phẩm</div>
                            <div class="w-100">
                                <div class=" mt-1">
                                    <div class="fa-list-dichvu mt-1" id="showsanpham">
                                    </div>
                                </div>
                                <a id="xemthembtnsp">
                                    <button class="w-25 border border-dark p-2" style="background-color: #e87c7b;"
                                            onclick="xemThemSanPham()">Xem thêm <i class="fa fa-angle-down"></i>
                                    </button>
                                </a>

                            </div>
                            <hr>

                            <div class="title-small color-black-main text-left">Kết quả tìm kiếm trong bài viết</div>
                            <div class="w-100">
                                <div class="fa-list-dichvu mt-1">
                                    <div class="fa-list-dichvu mt-1" id="showbaiviet">
                                    </div>

                                </div>
                                <a id="xemthembtnbv">
                                    <button class="w-25 border border-dark p-2 mb-4" style="background-color: #e87c7b;"
                                            onclick="xemThemBaiViet()">Xem thêm <i class="fa fa-angle-down"></i>
                                    </button>
                                </a>
                            </div>

                        </div>

                        @include('Site.components.gioithieulieutrinh')


                    </div>
                </div>
                    @endsection

                    @section('javascript')
                        <script src="{{ asset('Site/js') }}/sanpham.js"></script>
                        <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">
                        <script src="{{ asset('Site/js') }}/timkiem.js"></script>
@endsection
