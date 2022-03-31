@extends('Site.layout')

@section('title')
    Liên hệ
@endsection

@section('main')
    <div class="fa-lienhe my-5">
        <div class="container py-5">
            <div class="lienhe">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="list-service px-5" style="min-height: 465px;">
                            <div class="container position-relative z-index-1 p-0">
                                <div class="w-100 text-center">
                                    <a href="/trang-chu" class=""><img class="" style="width: 100px" src="{{asset('img/logo.svg')}}" alt=""></a>
                                </div>

                                <div class="card-lienhe">
                                    <div class="w-100 text-center">
                                        <div class="title-small text-left">
                                            Thông tin liên hệ
                                        </div>
                                        <div class="icon d-flex justify-content-start color-black-3">
                                            <span class="fas fa-phone-alt mr-2"></span>
                                            <p class="text-2"><span>Hotline:</span> (84+) 966 966 966, (84+) 121 122 121. </p>
                                        </div>
                                        <div class="icon d-flex justify-content-start color-black-3">
                                            <span class="far fa-paper-plane mr-2"></span>
                                            <p class="text-2"><span>Email:</span> fbeauty.spa@gmail.com. </p>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-lienhe">
                                    <div class="w-100 text-center">
                                        <div class="title-small text-left">
                                            Trụ sở chính
                                        </div>
                                        <div class="icon d-flex justify-content-start">
                                            <span class="fas fa-map-marker-alt mr-2 color-black-3"></span>
                                            <p class="text-2"><span>Địa Chỉ:</span> 44 Nguyễn Thị Thập, Tân Hưng, Quận 7, Hồ Chí Minh (Khu Dân Cư HimLam)
                                            </p>
                                        </div>

                                        <div class="icon d-flex justify-content-start">
                                            <span class="fas fa-map-marker-alt mr-2 color-black-3"></span>
                                            <p class="text-2"><span>Địa Chỉ:</span> 380 Đường Bùi Hữu Nghĩa, Phường 2, Bình Thạnh, Tp HCM (đối diện chợ Bà Chiểu)
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-icon d-flex justify-content-left mt-1">
                                    <div class="icon-item ml-0">
                                        <a href="" class="link">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </div>

                                    <div class="icon-item">
                                        <a href="" class="link">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </div>

                                    <div class="icon-item">
                                        <a href="" class="link">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>

                                    <div class="icon-item">
                                        <a href="" class="link">
                                            <i class="fab fa-tumblr"></i>
                                        </a>
                                    </div>

                                    <div class="icon-item">
                                        <a href="" class="link">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="w-100 text-center mb-4">
                            <div class="title-small text-center" style="margin-top: 5em !important;">
                                MỚI NHẤT
                            </div>
                            <div class="text-4">
                                Sản Phẩm Mới Nhất
                            </div>

                        </div>
                        <form action="/storeLienHe" class="container-fluid" enctype="multipart/form-data" method="post">
                            {{ csrf_field()}}
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-custom" placeholder="Nhập tên của bạn"
                                            name="namekh" id="inputname">
                                        @error('namekh')
                                        <span class="text-error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Nhập email của bạn" class="form-control form-control-custom "
                                            name="email" id="inputemail">
                                        @error('email')
                                        <span class="text-error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-custom mb-2" id="inputphone" name="sdt"
                                            placeholder="Số điện thoại ">
                                        @error('sdt')
                                        <span class="text-error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control form-control-custom mb-2" placeholder="Nội dung" id="inputnoidung" name="noidung"
                                                rows="3"></textarea>
                                        @error('noidung')
                                        <span class="text-error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group ">
                                       <p class="thongbaocss"> {{session('success')}}</p>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="them" onclick="myFunction()" class="btn-full pl-5 pr-5 float-right" value="Liên hệ">
                        </form>
                    </div>

                </div>

            </div>
    </div>
        {{-- <div class="div-map mb-5 mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d62702.15993331947!2d106.62899721916848!3d10.820112183336422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zY8O0bmcgdmnDqm4gcGjhuqduIG3hu4FtIHF1YW5nIHRydW5n!5e0!3m2!1svi!2s!4v1636384106191!5m2!1svi!2s"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div> --}}
    </div>

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/contact.css">
    <script src="{{ asset('Site/js') }}/contact.js"></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'>
    </script>
@endsection
