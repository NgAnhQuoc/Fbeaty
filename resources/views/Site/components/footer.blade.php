<div class="box-guimail p-2">
    <div class="w-100 text-center position-relative" style="z-index: 30;margin: 7em 0em;">
        <div class="guimail-content">
            <div class="container">
                <div class="w-100 text-center">
                    <div class="title-small text-center">
                        ĐỂ LẠI EMAIL
                    </div>
                </div>

                <div class="title-3">
                    Đăng Ký Và Là Người Đầu Tiên Biết Về <br>Các Sản Phẩm Đặc Biệt, Sự Kiện Và Hơn Thế Nữa!
                </div>
                <form id="formTheoDoi" action="{{URL::to("/emaillienhe")}}" class="form-subscribe" method="post">
                    @csrf
                    <div class="bg-white div-subscribe">
                            <input type="email" name="email" class="text-danger" id="emaillienhe" value="@error('email')
                            {{ $message }}
                            @enderror" placeholder="Nhập email của bạn">
                            <button type="submit" class="btn-nor">Gửi email</button>
                    </div>

                </form>
            </div>
        </div>

        {{-- <div class="background-img img-1">
            <img src="{{ asset('Site/images') }}/Rectangle 184.png" alt="">
        </div> --}}
    </div>
</div>
<footer>
    <div class="footer-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-12">
                    <div class="box-footer box-footer-1 mt-0">
                        <div class="w-100 text-center">
                            <a class="m-auto"><img class="logo-footer" src="{{asset('img/logo.svg')}}" alt=""></a>
                        </div>

                        <div class="text-6" style="margin-top: 2em">
                            FBeauty Spa luôn nỗ lực không ngừng để đem đến cho khách hàng những dịch vụ hoàn hảo. Thẩm mỹ khỏe – đẹp – an toàn để mỗi phút giây ngắm mình trong gương là những
                            giây tận hưởng hạnh phúc thật sự của mỗi khách hàng.
                        </div>

                        <div class="list-icon d-flex justify-content-left ">
                            <div class="icon-item ml-0">
                                <a href="https://www.facebook.com/FBeauty-103098148891666" class="link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>

                            <div class="icon-item">
                                <a href="https://twitter.com/HuynTrn26589599" class="link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>

                            <div class="icon-item">
                                <a href="https://www.youtube.com/channel/UCKmLj9UShXnCrweFbjA9Jvg" class="link">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>

                            <div class="icon-item">
                                <a href="http://fbeauty.ml/" class="link">
                                    <i class="fab fa-tumblr"></i>
                                </a>
                            </div>

                            <div class="icon-item">
                                <a href="https://www.instagram.com/fbeautyspa__/" class="link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-xl-3 col-lg-12 col-12">
                    <div class="box-footer footer-menu">
                        <div class="title-4 d-inline-block">
                            Trụ Sở Chính
                        </div>

                        <div class="content-1">
                            <div class="menu-item text-6">
                                <div class="icon d-flex justify-content-start">
                                    <a href="javascript:void(0)">
                                        <span class="fas fa-map-marker-alt mr-2 color-black-3"></span>
                                        44 Nguyễn Thị Thập, Tân Hưng, Quận 7, Hồ Chí Minh (Khu Dân Cư HimLam)
                                    </a>
                                </div>
                            </div>

                            <div class="menu-item text-6">
                                <div class="icon d-flex justify-content-start">
                                    <a href="javascript:void(0)">
                                        <span class="fas fa-map-marker-alt mr-2 color-black-3"></span>
                                        380 Đường Bùi Hữu Nghĩa, Phường 2, Bình Thạnh, Tp HCM (đối diện chợ Bà Chiểu)
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-12">
                    <div class="box-footer footer-menu">
                        <div class="title-4 d-inline-block">
                            Danh Mục
                        </div>

                        <div class="content-1">

                            <div class="menu-item text-6">
                                <a href="">Chăm sóc da mặt
                                </a>
                            </div>

                            <div class="menu-item text-6">
                                <a href="">Điều trị mụn, sẹo
                                </a>
                            </div>

                            <div class="menu-item text-6">
                                <a href="">Dịch vụ trị nám, tàn nhang
                                </a>
                            </div>

                            <div class="menu-item text-6">
                                <a href="">Làm trẻ hóa da
                                </a>
                            </div>

                            <div class="menu-item text-6">
                                <a href="">Dịch vụ massage
                                </a>
                            </div>

                            <div class="menu-item text-6">
                                <a href="">Dịch vụ giảm béo

                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-12 col-12">
                    <div class="box-footer footer-menu">
                        <div class="title-4 d-inline-block">
                            Liên Hệ
                        </div>

                        <div class="content-1">

                            <div class="menu-item text-6">
                                <div class="icon d-flex justify-content-start">
                                    <a href="javascript:void(0)">
                                        <span class="fas fa-phone-alt mr-2"></span> (84+) 966 966 966,
                                    </a>
                                </div>
                            </div>

                            <div class="menu-item text-6">
                                <div class="icon d-flex justify-content-start">
                                    <a href="javascript:void(0)">
                                        <span class="fas fa-phone-alt mr-2"></span> (84+) 121 122 121,
                                    </a>
                                </div>
                            </div>

                            <div class="menu-item text-6">
                                <div class="icon d-flex justify-content-start">
                                    <a href="javascript:void(0)">
                                        <span class="far fa-paper-plane mr-2"></span>
                                        fbeauty.spa@gmail.com.
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="w-100 footer-copyright">
        ©2021 Bản quyền FBeauty. Đã đăng ký bản quyền
    </div>
</footer>
