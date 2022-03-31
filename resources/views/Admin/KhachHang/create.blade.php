@extends('Admin.LayoutAdmin')
@section('content')
<style>
    /* img{
        width: 100px !important;
    } */
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title  mt-0 mb-3 btn btn-primary">THÊM KHÁCH HÀNG</h4>
                        <form action="{{route('khachhang.store')}}"  enctype="multipart/form-data"
                           method="post">
                           {{ csrf_field()}}

                        <x-admin.common.CaseErrorInput />
                       
                        <div class="row">
                            <div class="col-md-4">
                                <label class="w-100" for="files">Tải ảnh khách hàng:
                                    <div class="form-group">
                                        <input type="file" class="mt-2"  name="urlHinh"
                                        value="{{old('img')}}" onchange="previewImg(event)" >
                                    </div>   
                                    @error('img')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </label>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tên khách hàng</label>
                                    <input type="text" name="name" value="{{old('name')}}"
                                        parsley-trigger="change" placeholder="Tên khách hàng" class="form-control">
                                    @error('name')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="idcoso" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại </label><span style="color:red;"> (*)</span>
                                    <input type="number" name="sdt" value="{{old('sdt')}}"
                                        parsley-trigger="change" placeholder="Số điện thoại" class="form-control">
                                    @error('sdt')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}"
                                        parsley-trigger="change" placeholder="Email" class="form-control">
                                    @error('email')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" value="{{old('password')}}"
                                        parsley-trigger="change" placeholder="Mật khẩu" class="form-control">
                                    @error('password')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                         
                            <div class="form-group ml-2 mt-3">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="remember-1" type="checkbox" name="active" value="1" data-parsley-multiple="remember-1">
                                        <label for="remember-1">Trạng Thái ? </label>
                                    </div>
                                </div>    
                             
                            </div>
                            <div class="form-group text-right mb-0 mt-4 col-12">
                                <a href="/quantri/khachhang" clas="btn btn-secondary waves-effect waves-light ">Huỷ</a>
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light ml-2" value="Thêm">
                            </div>
                        </div>

                        </form>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById("files").onchange = function () {

        var ListImages = document.getElementById("files").files;
        if (ListImages.length > 0) {

            var filetoload = ListImages[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var srcData = e.target.result;
                var newIMG = document.createElement('img');
                newIMG.src = srcData;
                document.getElementById("imageA").innerHTML = newIMG.outerHTML;
            };
            //
            // // read the image file as a data URL.
            reader.readAsDataURL(filetoload);
        }
    };
</script>
@endsection