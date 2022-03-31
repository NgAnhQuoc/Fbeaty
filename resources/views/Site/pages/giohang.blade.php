@extends('Site.layout')

@section('title')
    Sản Phẩm
@endsection

@section('main')
    <div class="fa-giohang mt-4 my-5">
        <div class="container">
            <div class="giohang-header shadow-2">
                <div class="row ">
                    <div class="col-xl-1 d-flex">
                        <div class="header-text text-center w-100">Ảnh</div>
                    </div>
                    <div class="col-xl-3">
                        <div class="header-text text-left">Tên sản phẩm</div>
                    </div>
                    <div class="col-xl-4">
                        <div class="header-text">Giá sản phẩm</div>
                    </div>
                    <div class="col-xl-2">
                        <div class="header-text">Số lượng</div>
                    </div>
                    <div class="col-xl-1">
                        <div class="header-text">Tổng tiền</div>
                    </div>
                    <div class="col-xl-1"></div>
                </div>
            </div>

            <div class="giohang-body" id="giohang-body">
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 float-right "><h3 class="float-right mr-5">Tổng: <span class="font-weight-bold"
                                                                                            id="tongtiengiohang">0</span>đ
                    </h3></div>
            </div>
            <div class="giohang-footer mb-5">
                <div class="d-flex d-flex justify-content-between">
                    <a href="{{URL::to("/san-pham")}}">
                        <button class="btn-6 ml-0">
                            Tiếp tục mua hàng
                        </button>
                    </a>
                    <a href="javascript:void(0)">
                        <button class="btn-7 ml-0" onclick="XoaTatCa()" id="xoatatca">
                            Xóa tất cả
                        </button>
                    </a>

                    <a href="{{URL::to("/thanh-toan")}}" id="nextthanhtoan">
                        <button class="btn-8">
                            <span>Thanh toán</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('Site/js') }}/sanpham.js"></script>
@endsection
