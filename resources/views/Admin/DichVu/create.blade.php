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
                        <h4 class="header-title  mt-0 mb-3 btn btn-primary">THÊM DỊCH VỤ</h4>
                        <form action="{{route('dichvu.store')}}"  enctype="multipart/form-data"
                           method="post">
                           {{ csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tên dịch vụ</label><span style="color:red;"> (*)</span>
                                    <input type="text" name="name" value="{{old('name')}}"
                                        parsley-trigger="change" placeholder="Tên dịch vụ" class="form-control">
                                    @error('name')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Đơn giá </label><span style="color:red;"> (*)</span>
                                    <input type="number" name="dongia" value="{{old('dongia')}}"
                                        parsley-trigger="change" placeholder="Đơn giá" class="form-control">
                                    @error('dongia')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Danh mục</label><span style="color:red;"> (*)</span>
                                    <select class="form-control select2" name="danhmuc">
                                        @foreach ($DanhMuc as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="">Giảm giá</label><span style="color:red;"> (*)</span>
                                    <input type="number" name="giamgia" value="{{old('giamgia')}}"
                                        parsley-trigger="change" placeholder="Giảm giá" class="form-control">
                                    @error('giamgia')
                                    <span class="badge badge-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group ml-0 col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="w-100" for="files">Tải ảnh dịch vụ:<span style="color:red;"> (*)</span>
                                            <div class="wrapper"> <br>
                                                <div class="file-upload mt-1">
                                                    <input type="file" id="files" name="urlHinh"
                                                        value="{{old('img')}}">
                                                    <i class="fa fa-download " style="font-size:52px;color:blue"></i>
                                                </div>
                                            </div>
                                            @error('urlHinh')
                                            <span class="badge badge-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="imageA" style="width:350px;" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Mô tả</label><span style="color:red;"> (*)</span>
                                <textarea name="motangan" class="form-control"
                                    id="mytextarea" cols="25" rows="3" placeholder="Mô tả">{{old('motangan')}}</textarea>
                                @error('motangan')
                                <span class="badge bg-danger text-white">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label class="form-label">Nội dung</label><span style="color:red;"> (*)</span>
                                <textarea name="noidung" class="form-control" id="summernote"  cols="25" rows="3"
                                    placeholder="Nội dung">{{old('noidung')}}</textarea>
                                    
                                @error('noidung')
                                <span class="badge bg-danger text-white">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="remember-1" type="checkbox" name="trangthai" value="1" data-parsley-multiple="remember-1">
                                        <label for="remember-1">Trạng Thái ? </label>
                                    </div>
                                </div>            
                            </div>
                            <div class="form-group text-right mb-0 mt-4 col-12">
                                <a href="/quantri/dichvu" clas="btn btn-secondary waves-effect waves-light ">Huỷ</a>
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