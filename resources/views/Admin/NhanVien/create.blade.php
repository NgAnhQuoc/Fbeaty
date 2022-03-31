@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title">Thêm nhân viên</h4>
                            <div>
                                <a href="{{route("nhanvien.index")}}"
                                   class="btn btn-primary waves-effect waves-light mb-3">Danh sách nhân viên</a>
                            </div>
                            @if(session('thatbai'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('thatbai')}}
                                </div>
                            @endif
                            <form action="{{route('nhanvien.store')}}" id="ktform" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="w-100" for="name">Tên nhân viên:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="text" name="username" parsley-trigger="change"
                                                           required
                                                           placeholder="Tên nhân viên" class="form-control"
                                                           value="{{old('username')}}"
                                                           id="username"
                                                           >
                                                    @error('username')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="w-100" for="email">Email:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="email" name="email"
                                                           parsley-trigger="change" required
                                                           placeholder="Email" class="form-control"
                                                           id="email" value="{{old('email')}}">
                                                    @error('email')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                    <span id="kqcheckemail"></span>

                                                </label>

                                            </div>

                                            <div class="form-group">
                                                <label class="w-100" for="password">Mật khẩu:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="password" name="password"
                                                           parsley-trigger="change" required
                                                           placeholder="Mật khẩu" class="form-control"
                                                           id="password" value="{{old('password')}}">
                                                    @error('password')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="w-100" for="sdt">Số điện thoại:(<span
                                                        class="text-danger">*</span>)
                                                    <input type="number" name="sdt"
                                                           parsley-trigger="change" required
                                                           placeholder="Số điện thoại" class="form-control"
                                                           id="sdt" value="{{old('sdt')}}">
                                                    @error('sdt')
                                                    <span class="badge badge-danger">{{$message}}</span>
                                                    @enderror
                                                    <span id="kqchecksdt"></span>
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label class="w-100" for="gioitinh">Giới tính:(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="gioitinh">
                                                        <option value="1">Nam</option>
                                                        <option value="0">Nữ</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="w-100" for="files">Avatar nhân
                                                            viên:(<span class="text-danger">*</span>)
                                                            <div class="wrapper">
                                                                <div class="file-upload">
                                                                    <input type="file" id="files"
                                                                           name="urlHinh" value="{{old('urlHinh')}}">
                                                                    <i class="fa fa-arrow-up"></i>
                                                                </div>
                                                            </div>
                                                            @error('urlHinh')
                                                            <span class="badge badge-danger">{{$message}}</span>
                                                            @enderror
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div id="imageA" class="mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="w-100" for="role">Role:(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="role">
                                                        <option value="1">ADMIN</option>
                                                        <option value="0">Nhân viên</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="w-100" for="active">Active:(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="active">
                                                        <option value="1">Kích hoạt</option>
                                                        <option value="0">Chưa kích hoạt</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="w-100" for="namsinh">Năm sinh :(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="namsinh">
                                                        <?php
                                                        $year = date('Y') - 16;
                                                        $min = $year - 60;
                                                        $max = $year;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                        ?>
                                                        <option
                                                            value="{{$i}}">{{$i}}</option>
                                                        ;
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="w-100" for="trangthai">Trạng thái:(<span
                                                        class="text-danger">*</span>)
                                                    <select class="form-control select2" name="trangthai">
                                                        <option value="1">Hoạt động</option>
                                                        <option value="0">Không hoạt động</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route("nhanvien.create")}}" type="button"
                                       class="btn btn-light waves-effect"
                                    >Huỷ
                                    </a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light " id="them">
                                        Thêm
                                    </button>
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
        $(document).ready(function () {
            $("#email").blur(function () {
                u = $(this).val();
                $("#kqcheckemail").load("{{URL::to("quantri/nhanvien/kiemtraemail")}}/" + u);
            });

            $("#sdt").blur(function () {
                u = $(this).val();
                $("#kqchecksdt").load("{{URL::to("quantri/nhanvien/kiemtrasdt")}}/" + u);
            });
        });

        $("#ktform").validate({
            rules: {
                username: {required: true, maxlength: 50, minlength: 3},
                email: {required: true, maxlength: 50, minlength: 3},
                password: {required: true, minlength: 3},
                sdt: {required: true, number: true},
            },
            messages: {
                username: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập họ và tên.</span>",
                    maxlength: "<span class='badge badge-danger'>Tên dài quá, phải <50 ký tự </span>",
                    minlength: "<span class='badge badge-danger'>Tên ngắn quá, phải >3 ký tự </span>"
                },
                email: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập email </span>",
                    maxlength: "<span class='badge badge-danger'>Email dài quá, phải <50 ký tự </span>",
                    minlength: "<span class='badge badge-danger'>Email ngắn quá, phải >3 ký tự </span>"
                },
                password: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập mật khẩu </span>",
                    minlength: "<span class='badge badge-danger'>Mật khẩu ngắn quá, phải >5 ký tự </span>"
                },
                sdt: {
                    required: "<span class='badge badge-danger'>Mời bạn nhập số điện thoại </span>",
                    number: "<span class='badge badge-danger'>Chỉ được nhập số </span>"
                },
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
                    document.getElementById("imageA").innerHTML = newIMG.outerHTML;
                };
                //
                // // read the image file as a data URL.
                reader.readAsDataURL(filetoload);
            }
        };
    </script>


@endsection
