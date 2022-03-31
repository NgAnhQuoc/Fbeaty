@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title">Sửa Banner</h4>
                            <div>
                                <a href="{{route("banner.index")}}"
                                   class="btn btn-primary waves-effect waves-light mb-3">Danh sách Banner</a>
                            </div>
                            @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                            @endif
                            <form action="{{route('banner.update',$banner->id)}}" id="ktform" enctype="multipart/form-data" method="post">
                                @csrf
                                {!! method_field('patch') !!}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" for="name">Banner:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="text" name="tieude" parsley-trigger="change"
                                                           required
                                                           placeholder="Tiêu đề banner" class="form-control"
                                                           value="{{$banner->tieude}}"
                                                           id="tieude"
                                                    >
                                                    @error('tieude')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" for="noidung">Nội dung:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="text" name="noidung"
                                                           parsley-trigger="change" required
                                                           placeholder="Nội dung" class="form-control"
                                                           id="noidung" value="{{$banner->noidung}}">
                                                    @error('noidung')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" for="anhien">Ẩn hiện:(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="anhien">
                                                        <option value="<?php echo App\Http\Controllers\Controller::BANNER_HIEN?>"
                                                        <?php echo($banner->AnHien == App\Http\Controllers\Controller::BANNER_HIEN)?"selected":"";?>>Hiện</option>
                                                        <option value="<?php echo App\Http\Controllers\Controller::BANNER_AN?>"
                                                        <?php echo($banner->AnHien == App\Http\Controllers\Controller::BANNER_AN)?"selected":"";?>>Ẩn</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="w-100" for="files">Tải ảnh lên:(<span class="text-danger">* JPG, PNG, GIF</span>)
                                                <div class="wrapper">
                                                    <div class="file-upload">
                                                        <input type="file" id="files"
                                                               name="urlImg">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </div>
                                                </div>
                                                @error('urlImg')
                                                <span class="badge badge-danger">{{$message}}</span>
                                                @enderror
                                            </label>
                                        </div>
                                        <div class="col-md-12 m-auto">
                                            <div id="image" class="w-50 m-auto">
                                                <img
                                                    src="{{asset(App\Http\Controllers\Controller::BASE_URL_UPLOAD_BANNER.$banner->img)}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="justify-content-end float-right">
                                                <a href="{{route("banner.create")}}" type="button"
                                                   class="btn btn-light waves-effect"
                                                >Huỷ
                                                </a>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light " id="them">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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

    <script>

        $("#ktform").validate({
            rules: {
                tieude: {required: true, maxlength: 50, minlength: 3},
                noidung: {required: true, maxlength: 100, minlength: 10},
            },
            messages: {
                tieude: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập email</span>",
                    maxlength: "<span class='badge badge-danger'>Tiêu đề dài quá, phải <100 ký tự </span>",
                    minlength: "<span class='badge badge-danger'>Tiêu đề ngắn quá, phải >3 ký tự </span>"
                },
                noidung: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập email </span>",
                    maxlength: "<span class='badge badge-danger'>Tiêu đề dài quá, phải <100 ký tự </span>",
                    minlength: "<span class='badge badge-danger'>Tiêu đề ngắn quá, phải >10 ký tự </span>"
                }
            }
        });
    </script>
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
                    document.getElementById("image").innerHTML = newIMG.outerHTML;
                };
                //
                // // read the image file as a data URL.
                reader.readAsDataURL(filetoload);
            }
        };
    </script>


@endsection
