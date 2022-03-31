
@extends('Admin.LayoutAdmin')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="col-xl-10">
                        <div class="card-box">
                            <div class="dropdown float-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>

                            <h4 class="header-title mt-0 mb-3">Sửa Đơn Hàng</h4>

                            @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                            @endif

                            <form data-parsley-validate action="{{route('donhang.update',$data->id)}}" id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                                @csrf
                                {!! method_field('patch') !!}

                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Tên Người Đặt</label><span style="color:red;"> (*)</span>
                                                <input type="text" name="namedat" class="form-control" value="{{$khachHang->name}}"  parsley-trigger="change"  readonly>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Mã Giảm Giá</label><span style="color:red;"> (*)</span>
                                                <input type="text" name="magiamgia" class="form-control @error('magiamgia') border-error @enderror magiamgia" value="@if($data->idgiamgia === null)Đơn Hàng không áp dụng mã@else{{$GiamGia->namegiamgia}}@endif
                                                "  parsley-trigger="change" readonly>
                                                @error('magiamgia')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Tên Người Nhận</label><span style="color:red;"> (*)</span>
                                                <input type="text" name="namenguoinhan" class="form-control @error('namenguoinhan') border-error @enderror namenguoinhan" value="{{$data->tennguoinhan}}"  parsley-trigger="change"
                                                   placeholder="Tên Người Nhận" >
                                                   @error('namenguoinhan')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                    </div>



                                    <div class="form-group">
                                            <label for="">Địa Chỉ Khách Hàng</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="diachi" class="form-control @error('diachi') border-error @enderror diachi" value="{{$data->diachikhachhang}}"  parsley-trigger="change"
                                                   placeholder="Địa Chỉ Khách Hàng" >
                                                   @error('diachi')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                    </div>



                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label for="">SĐT Người Nhận</label><span style="color:red;"> (*)</span>
                                            <input type="number" name="sodienthoai" class="form-control @error('sodienthoai') border-error @enderror sodienthoai" value="{{$data->sdtnguoinhan}}"  parsley-trigger="change"
                                                   placeholder="SĐT Người Nhận" >
                                                   @error('sodienthoai')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Tổng Tiền Trước Giảm Giá</label><span style="color:red;"> (*)</span>
                                            <input type="number" name="tongtientruocgiamgia" class="form-control @error('tongtientruocgiamgia') border-error @enderror tongtientruocgiamgia" value="{{$data->tongtientruocgiamgia}}"  parsley-trigger="change"
                                                   placeholder="Tổng Tiền Trước Giảm Giá" >
                                                   @error('tongtientruocgiamgia')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Tổng Tiền sau Giảm Giá</label><span style="color:red;"> (*)</span>
                                            <input type="number" name="tongtiensaugiamgia" class="form-control @error('tongtiensaugiamgia') border-error @enderror tongtiensaugiamgia" value="{{$data->tongtiensaugiamgia}}"  parsley-trigger="change"
                                                   placeholder="Tổng Tiền sau Giảm Giá" >
                                                   @error('tongtiensaugiamgia')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                    </div>



                                    <div class="form-row">
                                            <div class="form-group col-md-3">
                                            <label for="">Phương Thức Thanh Toán</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="phuongthucthanhtoan" class="form-control @error('phuongthucthanhtoan') border-error @enderror phuongthucthanhtoan" value="{{$data->phuongthucthanhtoan}}"  parsley-trigger="change"  readonly
                                                   placeholder="Phương Thức Thanh Toán" >
                                                   @error('phuongthucthanhtoan')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-3">
                                            <label for="">Phương Thức Giao Hàng</label><span style="color:red;"> (*)</span>
                                            <select name="phuongthucgiaohang"  placeholder="Phương Thức Giao Hàng" class="form-control @error('phuongthucgiaohang') border-error @enderror phuongthucgiaohang" value="{{$data->phuongthucgiaohang}}" parsley-trigger="change">
                                                 <option>{{$data->phuongthucgiaohang}}</option>
                                                 <option>GHTK</option>
                                                 <option>EMS</option>
                                                 <option>Sship</option>
                                            </select>
                                            @error('phuongthucgiaohang')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Trạng Thái</label><span style="color:red;"> (*)</span>
                                                <select name="trangthai" id="inputState" class="form-control"  placeholder="Phương Thức Giao Hàng" class="form-control @error('trangthai') border-error @enderror trangthai" value="{{$data->trangthai}}" parsley-trigger="change">
                                                    <option {{$data->trangthai == '0'? 'selected':''}} value="0">Đang xác nhận</option>
                                                    <option {{$data->trangthai == '1'? 'selected':''}} value="1">Đã gửi đi</option>
                                                    <option {{$data->trangthai == '2'? 'selected':''}} value="2">Đã nhận</option>
                                                    <option {{$data->trangthai == '3'? 'selected':''}} value="3">Đơn hàng lỗi</option>
                                                    <option {{$data->trangthai == '4'? 'selected':''}} value="4">Khách trả hàng</option>
                                                    <option {{$data->trangthai == '5'? 'selected':''}} value="5">Hủy đơn hàng</option>
                                                </select>
                                                @error('trangthai')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Trạng thái thanh toán</label><span style="color:red;"> (*)</span>
                                                    <select name="trangthaithanhtoan"  placeholder="Trạng thái thanh toán" class="form-control @error('trangthaithanhtoan') border-error @enderror trangthaithanhtoan" value="{{$data->phuongthucgiaohang}}" parsley-trigger="change">
                                                        <option {{$data->trangthaithanhtoan == '0'? 'selected':''}} value="0">Đã thanh toán</option>
                                                        <option {{$data->trangthaithanhtoan == '1'? 'selected':''}} value="1">Chưa thanh toán</option>
                                                    </select>
                                                    @error('trangthaithanhtoan')
                                                        <span class="badge badge-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                    </div>



                                        <div class="form-group">
                                            <label for="">Ghi Chú Khách Hàng</label><span style="color:red;"> (*)</span>
                                            <textarea rows="9" cols="70" type="text" name="ghichukhachhang" class="form-control @error('ghichukhachhang') border-error @enderror ghichukhachhang"  parsley-trigger="change"
                                                   placeholder="Ghi Chú Khách Hàng">{{$data->ghichucuakhachhang}}</textarea>
                                                   @error('ghichukhachhang')
                                                        <span class="badge badge-danger">{{$message}}</span>
                                                        @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group text-right mb-0 mt-5">

                                            <a href="/quantri/donhang" clas="btn btn-secondary waves-effect waves-light">Hủy</a>

                                            <input type="submit" class="btn btn-primary waves-effect waves-light mr-1 update" value="Sửa Đơn Hàng" id='add_product'>

                                </div>


                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection
