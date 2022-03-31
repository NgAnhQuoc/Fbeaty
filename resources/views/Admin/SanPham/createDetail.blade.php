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

                        <h4 class="header-title mt-0 mb-4">Nhập chi tiết sản phẩm</h4>

                        <form data-parsley-validate  novalidate method="post" enctype="multipart/form-data">
                            @csrf
                            @if($errors->any())
                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{!! implode('', $errors->all('<div>:message</div>')) !!}</li></ul>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="+ Thêm Mới">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right mb-0 mt-5">
                                <a href="quantri/sanpham/create" class="btn-cancel">Huỷ</a>
                                {{-- <input type="submit" name="them" class="btn btn-primary waves-effect waves-light ml-2" value="Thêm"> --}}
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>



<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <form action="{{URL::to('quantri/sanpham/detail/'.session()->get('idDetail').'/store')}}"  enctype="multipart/form-data" method="post">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Thêm Liệu Trình Chi Tiết</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >Nhập số ml</label>
                    <input type="number" name="ml"  parsley-trigger="change" required
                    placeholder="Nhập số ml" class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label >Nhập số lượt tồn kho</label>
                        <input type="number" name="tonkho"  parsley-trigger="change" required
                        placeholder="Nhập Số lượt tồn kho" class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label >Nhập đơn giá sản phẩm</label>
                        <input type="number" name="dongia"  parsley-trigger="change" required
                        placeholder="Đơn giá sản phẩm" class="form-control" id="userName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection
