
@extends('Admin.LayoutAdmin')
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box task-detail">
                            <div class="media mb-3">
                                <div class="media-body">
                                    <h4 class="media-heading mt-0"> ĐƠN HÀNG CHI TIẾT </h4>
                                </div>
                            </div>
                           @php
                               if($donHang){
                                    $idDetail = $donHang?:[0]->id;
                               }else{
                                    $idDetail = '';
                               }
                           @endphp



                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box box-tuong">
                                    <div class=" box-detail">
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="float-left">
                                                    <p><strong>Thông Tin Khách Hàng</strong></p>
                                                    <p><strong>Tên khách hàng : </strong> {{$khachHang->name}} </p>
                                                    <p class="m-t-10"><strong>Số điện thoại  : </strong> <span class="label label-pink">  {{$khachHang->sdt}}  </span></p>
                                                    <p class="m-t-10"><strong>Email liên hệ : </strong> {{$khachHang->email}} </p>
                                                </div>

                                                <div class="float-center">
                                                    <p><strong>Thông Tin Người Nhận</strong></p>
                                                    <p><strong>Tên người nhận : </strong>  {{ $donHang->tennguoinhan }} </p>
                                                    <p class="m-t-10"><strong>Số điện thoại : </strong> <span class="label label-pink"> {{ $donHang->sdtnguoinhan }} </span></p>
                                                    <p class="m-t-10"  style="width: 350px;"><strong>Địa chỉ người nhận  : </strong> {{ $donHang->diachikhachhang }} </p>
                                                </div>

                                                <div class="float-right ml-4">
                                                    <p><strong>Thông Tin Thanh Toán</strong></p>
                                                    <p><strong>Phương thức thanh toán : </strong> {{ $donHang->phuongthucthanhtoan }} </p>
                                                    <p class="m-t-10"><strong>Phương thức vận chuyển :</strong> <span class="label label-pink"> {{ $donHang->phuongthucgiaohang }} </span></p>
                                                    <p class="m-t-10"><strong>Tổng thanh toán: </strong>
                                                        {{ number_format($Tong->tongtiendonhang + 30000) }} VNĐ</p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                    </div>

                                        <div class=" box-detail" style="width: 100%;">
                                            <div class="table-responsive">
                                                <form action="{{url('quantri/donhangchitiet/detail/'.$idDetail->id.'/edit')}}" novalidate method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                    <tr class="text-center" >
                                                        <th width="5%">STT</th>
                                                        <th width="15%">Tên sản phẩm</th>
                                                        <th width="16%">ML</th>
                                                        <th width="16%">Số lượng đặt</th>
                                                        <th width="16%">Đơn giá gốc</th>
                                                        <th width="16%">Đơn giá khuyến mãi</th>
                                                        <th width="16%">Tổng tiền</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sanpham as $item)
                                                    <tr class="text-center table-tuong">
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{$item->ml}}</td>
                                                        <td>
                                                            <input type="number" name="soluong[]" value="{{$item->soluong}}" parsley-trigger="change" required
                                                            placeholder="Nhập tên nhà sản xuất" id="ml" class="form-control" id="userName">
                                                            <input type="hidden" name="id[]" value="{{$item->iddonhangchitiet}}">
                                                        </td>
                                                        <td>{{ number_format($item->dongiatruocgiamgia)}} VNĐ</td>
                                                        <td>{{ number_format($item->dongiasaugiamgia)}} VNĐ</td>
                                                        <td>{{ number_format($item->tongtien)}} VNĐ</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <div class=" text-right mb-2 mt-2 ">
                                                    Phí Giao Hàng : 30,000 VNĐ
                                                </div>
                                                <div class=" text-right mb-2">
                                                    <a href="/quantri/donhang" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                                                    <input type="submit" class="btn btn-primary waves-effect waves-light mr-1 update"  value="Sửa Đơn Hàng" id='add_product'>

                                                </div>
                                        </form>
                                            </div>
                                        </div>

                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
