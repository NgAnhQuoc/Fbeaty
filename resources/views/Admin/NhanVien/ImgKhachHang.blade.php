@extends('Admin.LayoutAdmin')

@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                @if(session('thanhcong'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('thanhcong')}}
                    </div>
                @endif
                @if(session('thatbai'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('thatbai')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-9 bg-white">
                        <p class="header-title mt-1">Ảnh khách hàng</p>
                        <form id="ktform" action="{{URL::to('quantri/nhanvien/uploadKH', auth()->user()->id)}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="frameupload mb-2">
                                <div class="centerupload">
                                    <div class="titless">
                                        <h1>Kéo thả hoặc click vào đây</h1>
                                    </div>

                                    <div class="dropzone">
                                        <img src="{{asset("Admin/assets/images/iconupload.png")}}"
                                             class="upload-icon w-75"/>
                                        <input type="file" id="files" name="photos[]" class="upload-input" multiple required/>
                                    </div>
                                </div>
                            </div>

                            <p class="text-success"> Xem trước ảnh</p>
                            <div id="imageKH" class="mb-2"></div>
                            <input type="hidden" id="saveimg" name="saveimg" value="">
                            <button type="submit" class="btn btn-primary mb-1" name="uploadbutton">Tải lên</button>
                        </form>
                        <!--/ meta -->
                    </div>

                    <div class="col-sm-3 ">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name">
                                <div class="row">
                                    <div class="col-md-12 text-center ">
                                        <img src="{{asset('Admin/assets/images/users')}}/{{auth()->user()->avatar}}"
                                             class="rounded-circle avatar-xl img-thumbnail float-left w-50"
                                             style="margin-left: 25%" alt="profile-image">
                                    </div>
                                </div>

                                <div class="profile-info-detail  overflow-hidden">
                                    <div class="text-center">
                                    <h4 class="m-0">{{auth()->user()->name}}</h4>
                                    <p class="text-muted">
                                        <i class="mdi mdi-circle text-success"></i>
                                        <?php echo (auth()->user()->avatar == 1) ? 'Admin' : 'Nhân viên';?></p>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-3">Email:</div>
                                        <div class="col-md-9">{{auth()->user()->email}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">SDT:</div>
                                        <div class="col-md-9">{{auth()->user()->sdt}}</div>
                                    </div>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12 bg-light">
                        <p class="mt-2 text-success">Ảnh của khách hàng đã tải lên ---></p>

                        <div class="port mb-2">
                            <div class="portfolioContainer" style="overflow-y: scroll; overflow-x: hidden;">
                                <?php $nv = json_decode($nhanvien->img); ?>
                                @if(is_array($nv))

                                    @foreach($nv as $id => $ns)

                                        <div class="col-md-6 col-xl-3 col-lg-4 natural personal">
                                            <div class="gal-detail thumb position-relative showdel">
                                                <a href="{{asset('uploads/khachhang')}}/{{ $ns}}" class="image-popup" title="Screenshot-1">
                                                    <img src="{{asset('uploads/khachhang')}}/{{ $ns}}"
                                                         style="height: 250px; object-fit: cover;"
                                                         class="thumb-img img-fluid overflow-hidden w-100 hoverbg"
                                                         alt="work-thumbnail">
                                                    <a href="{{URL::to("quantri/nhanvien/xoaImgKH", auth()->user()->id)}}/phantu/{{$id}}" class="p-1 bg-primary rounded position-absolute btnxoa" style="right: 7%; top: 7%;"  data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash text-white"></i></a>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div><!-- end portfoliocontainer-->
                        </div> <!-- End row -->
                    </div>
                </div>

            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <script>
            $("#ktform").validate({
                rules: {
                    files: {required: true,}
                },
                messages: {
                    files: {
                        required: "<span class='badge badge-danger'>Bạn chưa chọn ảnh</span>"
                    },
                }
            });
var ArrayAnh= new Array();
            document.getElementById("files").onchange = function () {
                var ListImages = document.getElementById("files").files;
                if (ListImages.length > 0) {
                    for (let i = 0; i < ListImages.length; i++) {
                        var filetoload = ListImages[i];
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var srcData = e.target.result;
                            var newIMG = document.createElement('img');
                            newIMG.src = srcData;
                            document.getElementById("imageKH").innerHTML += newIMG.outerHTML;
                        };
                        //
                        // // read the image file as a data URL.
                        reader.readAsDataURL(filetoload);
                        ArrayAnh.push(URL.createObjectURL(ListImages[i]))
                    }
                    console.log(ArrayAnh);

                    // document.getElementById("files").files=ArrayAnh;
                    console.log(JSON.stringify(ArrayAnh));
                    // document.getElementById("saveimg").value=ArrayAnh.toString();
                }
            };


        </script>


@endsection
