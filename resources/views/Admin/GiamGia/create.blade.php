@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title">Thêm Giảm Giá </h4>
                            <x-admin.common.CaseErrorInput />
                            <form action="{{route('giamgia.store')}}"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Thêm Giảm Giá</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Tên Giảm Giá</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="name" class="form-control @error('name') border-error @enderror name" value="{{old('name')}}"  parsley-trigger="change"
                                                placeholder="Tên Giảm Giá" >
                                                @error('name')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Mã Giảm Giá</label><span style="color:red;"> (*)</span>
                                            <input type="text" name="ma" class="form-control @error('ma') border-error @enderror ma" value="{{old('ma')}}"  parsley-trigger="change"
                                                placeholder="Mã Giảm Giá" >
                                                @error('ma')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Loại Giảm Giá </label><span style="color:red;"> (*)</span>
                                            <select name="loai" id="inputState" onchange="select()" class="form-control"  placeholder="Phương Thức Giao Hàng" class="form-control @error('loai') border-error @enderror loai" value="{{old('loai')}}" parsley-trigger="change">
                                                <option value="0">Giảm Theo Giá</option>
                                                <option value="1">Giảm Theo %</option>
                                            </select>
                                            @error('loai')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Giảm Giá tối thiểu</label><span style="color:red;"> (*)</span>
                                            <input type="number" name="number" id="" value="" class="form-control @error('number') border-error @enderror name" value="{{old('number')}}"  parsley-trigger="change"
                                                placeholder="Giảm Giá tối thiểu " >
                                                @error('number')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Giảm Giá tối đa</label><span style="color:red;"> (*)</span>
                                            <input type="number" name="max" id="" value="" class="form-control @error('max') border-error @enderror diachi" value="{{old('max')}}"  parsley-trigger="change"
                                                placeholder="Khoảng Giá Tối Đa" >
                                                @error('max')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                     <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Ngày Áp Dụng</label><span style="color:red;"> (*)</span>
                                            <input type="date" name="ngaytao" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                            @error('ngaytao')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="">Ngày Hết Hạn</label><span style="color:red;"> (*)</span>
                                            <input type="date" name="ngayhethan" class="form-control @error('ngayhethan') border-error @enderror ngayhethan" value="{{old('ngayhethan')}}"  parsley-trigger="change"
                                                placeholder="Khoảng Giá Tối Đa" >
                                                @error('ngayhethan')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="/quantri/giamgia" clas="btn btn-secondary waves-effect waves-light ">Huỷ</a>
                                    <button type="submit" name="them" class="btn btn-primary waves-effect waves-light"  id='add_product'>Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-5">
                        <nav>
                            <ul class="pagination pagination-split">
                                <?php
                                // echo $Pagination;
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>


            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>



@endsection
