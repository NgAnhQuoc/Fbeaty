@extends('Site.layout')

@section('title')
    Sản Phẩm
@endsection

@section('main')
    <form action="{{URL::to("/thanh-toan-don-hang")}}" id="create_form" method="post">
        @csrf
        <div class="fa-giohang mt-4 my-5">
            <div class="container">
                <div class="thongtinkhachhang shadow-1">
                    <div class="title-9 mt-2 mb-2">
                        Thông Tin Người Nhận
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Tên người nhận <span class="color-red">(*)</span></label>
                                <input type="text" name="username" class="form-control form-custom" id="username"
                                       value="<?php echo (session()->has('khachHang') && session('khachHang') != '') ? session()->get('khachHang')->name : "";?>"
                                       placeholder="Tên người nhận hàng.">
                                @error('username')
                                <span class='badge badge-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Số điện thoại <span class="color-red">(*)</span></label>
                                <input type="number" name="phonenumber"
                                       value="<?php echo (session()->has('khachHang') && session('khachHang') != '') ? session('khachHang')->sdt : "";?>"
                                       class="form-control form-custom" id="phonenumber"
                                       placeholder="Số điện thoại của bạn.">
                                @error('phonenumber')
                                <span class='badge badge-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Địa chỉ giao hàng <span class="color-red">(*)</span></label>
                                <input type="text" name="diachi" class="form-control form-custom" id="diachi"
                                       value="{{old('diachi')}}" placeholder="Nhập địa chỉ nơi ở của bạn.">
                                @error('diachi')
                                <span class='badge badge-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lời nhắn: </label>
                                <textarea class="form-control form-custom" name="note" cols="10" rows="8" id=""
                                          placeholder="Lưu ý cho cửa hàng..."> </textarea>
                                <small id="" class="form-text text-muted">.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="giohang shadow-1 pb-2">
                    <div class="giohang-header mb-0">
                        <div class="row align-items-center">
                            <div class="col-xl-5">
                                <div class="header-title">
                                    Sản phẩm
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="header-text">Giá sản phẩm</div>
                            </div>
                            <div class="col-xl-1">
                                <div class="header-text">Số lượng</div>
                            </div>
                            <div class="col-xl-2">
                                <div class="header-text text-right">Tổng tiền</div>
                            </div>
                        </div>
                    </div>

                    <div class="giohang-body" id="payproduct">

                    </div>

                </div>

                <div class="collapse mb-4" id="collapseExample123">
                    <div class="card card-body">
                        <h3>THANH TOÁN QUA VNPAY</h3>
                        <div class="form-group">
                            <label for="language">Loại thanh toán </label>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value="billpayment" selected>Thanh toán hóa đơn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Số tiền</label>
                            <input class="form-control" id="amount"
                                   name="amount" type="number" disabled/>
                        </div>

                        <?php
                        $startTime = date("YmdHis");
                        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));?>
                        <input class="form-control" id="txtexpire"
                               name="txtexpire" type="hidden" value="<?php echo $expire; ?>"/>
                        <div class="form-group">
                            <label for="order_desc">Nội dung thanh toán</label>
                            <textarea class="form-control" cols="20" id="note" name="vnpay_note" rows="2"
                                      placeholder="Noi dung thanh toan">Thanh toán đơn hàng</textarea>
                        </div>
                        <div class="form-group">
                            <label for="bank_code">Ngân hàng</label>
                            <select name="bank_code" id="bank_code" class="form-control">
                                <option value="NCB" selected> Ngân hàng NCB</option>
                                <option value="AGRIBANK"> Ngân hàng Agribank</option>
                                <option value="SCB"> Ngân hàng SCB</option>
                                <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                <option value="MSBANK"> Ngân hàng MSBANK</option>
                                <option value="NAMABANK"> Ngân hàng NamABank</option>
                                <option value="VNMART"> Ngân hàng VnMart</option>
                                <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                <option value="HDBANK">Ngân hàng</option>
                                <option value="DONGABANK"> Ngân hàng Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngân hàng VPBank</option>
                                <option value="MBBANK"> Ngân hàng MBBank</option>
                                <option value="ACB"> Ngân hàng ACB</option>
                                <option value="OCB"> Ngân hàng OCB</option>
                                <option value="IVB"> Ngân hàng IVB</option>
                                <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="language">Ngôn ngữ</label>
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="phuongthuc shadow-1">
                    <div class="row">
                        <div class="col-xl-6 d-flex  justify-content-between">
                            <label for="" class="title-9">Phương thức giao hàng: </label>
                            <div class="ml-2">
                                <button type="button" class="btn-pttt" id-pttt="1" data-toggle="modal"
                                        data-target="#phuongthucthanhtoan">
                                    Thanh toán khi nhận hàng
                                </button>
                            </div>
                        </div>

                        <div class="col-xl-6 d-flex  justify-content-between">
                            <label for="" class="title-9">Đơn vị vận chuyển: </label>
                            <div class="ml-2">
                                <button type="button" class="btn-ptgh" id-ptgh="1" data-toggle="modal"
                                        data-target="#phuongthucgiaohang">
                                    Nhanh
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="thanhtoan shadow-1">
                    <div class="thongtintongtien mt-2">
                        <div class="row flex-row-reverse">
                            <div class="col-4 text-right">
                                <div class="row m-0 justify-content-end">
                                    <div class="col-12 p-0">
                                        <div class="d-flex w-100 h-100 align-items-center">
                                            <input type="text" id="magiamgia"
                                                   class="form-control form-custom ip-gray-1 text-dark"
                                                   placeholder="Mã giảm giá"
                                                   style="box-shadow: none;padding: 1.3em 1.43m;">
                                            <input type="hidden" name="giamgia" id="idgiam" value="">
                                            <button class="btn-9" type="button" onclick="ApplyGiamGia()">Sử dụng
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-end mt-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 text-right">Tổng tiền hàng</div>
                                            <div class="col-6 text-right"><span id="tongtienhang">0</span><span>đ</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row justify-content-end mt-1">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 text-right">Số tiền giảm</div>
                                            <div class="col-6 text-right"><span id="tongtiensaugiam">0</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-1">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 text-right">Phí giao hàng</div>
                                            <div class="col-6 text-right"><span id="tienship">30,000</span>đ</div>
                                        </div>
                                    </div>
                                </div>

                                <hr>


                                <div class="row justify-content-end">
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-6 text-right">Tổng thanh toán</div>
                                            <div class="col-6 text-right"><span
                                                    id="tongthanhtoan">0</span><span>đ</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="giohang-footer mt-5">
                        <div class="d-flex d-flex justify-content-between">
                            <a href="{{URL::to('/san-pham')}}">
                                <button class="btn-6 ml-0" type="button">
                                    Tiếp tục mua hàng
                                </button>
                            </a>

                            <a href="javascript:void(0)">
                                <button class="btn-8" type="submit" id="dathang">
                                    <span>Đặt hàng </span>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name="ptgh" id="valgiaohang" value="GHTK">
        <div class="modal fade" id="phuongthucgiaohang" tabindex="-1" aria-labelledby="phuongthucgiaohangLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-content-custom">
                    <div class="custom-option active ptgh active" data-ptgh="1" onclick="phuongthucgiaohang('GHTK')">
                        Giao hàng tiết kiệm
                    </div>
                    <div class="custom-option ptgh" data-ptgh="2" onclick="phuongthucgiaohang('EMS')">
                        Chuyển phát nhanh bưu điện
                    </div>

                    <div class="custom-option ptgh" data-ptgh="3" onclick="phuongthucgiaohang('Sship')">
                        Công nghệ vận chuyển Sship
                    </div>

                    <div class="custom-option ptgh" data-ptgh="4" onclick="phuongthucgiaohang('GRAP')">
                        GRAP giao hàng nhanh
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ptth" id="valthanhtoan" value="KNH">
        <div class="modal fade" id="phuongthucthanhtoan" tabindex="-1" aria-labelledby="phuongthucthanhtoanLabel"
             aria-hidden="true">
            <div class="modal-dialog d-flex align-items-center">
                <div class="modal-content modal-content-custom">
                    <div class="custom-option active pttt" data-pttt="1" onclick="thanhtoanVNPAY(null)">
                        Thanh toán khi nhận hàng
                    </div>
                    <div class="custom-option pttt" onclick="thanhtoanVNPAY('VNPAY')" data-pttt="2" type="button"
                         data-bs-toggle="collapse" data-bs-target="#collapseExample123" aria-expanded="false"
                         aria-controls="collapseExample123">
                        VNPAY
                    </div>
                </div>
            </div>
        </div>
        {{--        <input name="__RequestVerificationToken" type="hidden" value="jchyu2h1E3gmmvKY8z54LOi37WR8jsqDfmxXYUfDwamuOOox7mdZQEwKS4Z5AY_wtqGW0zJyl6PxejmbrdAAMpiRZnEvS5DQ1mCpMnYD51o1" />--}}
    </form>
@endsection

@section('javascript')
    <script src="{{ asset('Site/js') }}/thanhtoan.js"></script>
    <script src="{{ asset('Site/js') }}/xacnhanthanhtoan.js"></script>
    <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
    <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
@endsection
