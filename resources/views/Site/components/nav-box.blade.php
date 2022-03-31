<div class="nav-box">
    <nav class="navbar navbar-expand-lg navbar-light background-color-none p-0">
        <div class="pl-0" style="width: 155px;">
            <a href="/trang-chu" class=""><img class="img-logo-header" src="{{asset('img/logo.svg')}}" alt=""></a>
        </div>

        <div class="div-mobile-nav">
            <div class="d-flex">
                <div class="box-icon mr-4">
                    <li class="icon-item d-inline-block {{ ($pathActive == 'tim-kiem') ? 'active' : '' }} ">
                        <a class="btn-modal-sreach" href="/tim-kiem"><i class="fas fa-search color-black-2 hover-pink"></i></a>
                    </li>
                    @if (session()->has('khachHang') && session('khachHang') != '')
                    <li class="icon-item d-inline-block fa-dropdown-custom-1">
                        <a href="javascript:void(0)"><i class="fas fa-user-alt color-black-2"></i></a>
                        <ul class="dropdown-custom-1" style="right: 0px;">
                            <li class="dropdown-custom-item">
                                <a href="" class="thong-tin-user">
                                    @if (session('khachHang')->name != '')
                                        {{ session('khachHang')->name }}
                                    @else
                                        {{ session('khachHang')->sdt }}
                                    @endif
                                </a>
                            </li>
                            <li class="dropdown-custom-item"><a href="/thong-tin-tai-khoan">Thông tin tài khoản</a></li>
                            <li class="dropdown-custom-item"><a href="/site-logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="icon-item d-inline-block">
                        <a class="btn-modal-main" id="btn-modal-dangnhaps" type-modal="modal-user" href="javascript:void(0)" data-show="one"><i class="fas fa-user-alt color-black-2 hover-pink"></i></a>
                    </li>
                    @endif
                    <li class="icon-item d-inline-block position-relative icon-cart show-giohang-fixed" data-toggle="modal" data-target="#giohang-fixed">
                        <span class="badge badge-pill badge-primary number-cart" id="soluonghangmodal">0</span>
                        <a href="javascript:void(0)"><i class="fas fa-shopping-cart color-black-2 hover-pink"></i></a>
                    </li>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>


        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent" style="flex-grow: 0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ ($pathActive == 'trang-chu') ? 'active' : '' }}">
                    <a class="nav-link" href="/trang-chu">Trang Chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="btn-modal-main nav-link" type-modal="modal-datlich" href="javascript:void(0)" data-show="one">Đặt Lịch</a>
                </li>
                <li class="nav-item {{ ($pathActive == 'san-pham') ? 'active' : '' }} fa-dropdown-custom-1">
                    <a class="nav-link" href="/san-pham">Sản Phẩm</a>
                </li>
                <li class="nav-item {{ ($pathActive == 'dich-vu') ? 'active' : '' }} fa-dropdown-custom-1">
                    <a class="nav-link" href="/dich-vu">Dịch Vụ</a>
                </li>

                <li class="nav-item {{ ($pathActive == 'gioi-thieu') ? 'active' : '' }}">
                    <a class="nav-link" href="/gioi-thieu">Về Chúng Tôi</a>
                </li>
                <li class="nav-item {{ ($pathActive == 'lien-he') ? 'active' : '' }}">
                    <a class="nav-link" href="/lien-he">Liên Hệ</a>
                </li>
                <li class="nav-item {{ ($pathActive == 'bai-viet') ? 'active' : '' }} fa-dropdown-custom-1">
                    <a class="nav-link" href="/bai-viet">Bài viết</a>
                </li>
            </ul>
            <div class="box-icon box-icon-desk">
                <li class="icon-item d-inline-block boxsearch {{ ($pathActive == 'tim-kiem') ? 'active' : '' }} ">
                    <a class="btn-modal-sreach" ><i class="fas fa-search color-black-2"></i></a>
                    <form action="/tim-kiem" class="mt-n4" >
                        <div class="form-group search mt-n2">
                            <input type="text" name="key" id="" class="form-control" placeholder="Tìm Kiếm.. " aria-describedby="helpId" required>
                            <button type="submit" class="buttonsearch hover-scale-1"><i class="fa fa-search " aria-hidden="true"></i></button>
                          </div>
                    </form>
                </li>
                @if (session()->has('khachHang') && session('khachHang') != '')
                <li class="icon-item d-inline-block fa-dropdown-custom-1">
                    <a href="javascript:void(0)"><i class="fas fa-user-alt color-black-2"></i></a>
                    <ul class="dropdown-custom-1" style="right: 0px;">
                        <li class="dropdown-custom-item">
                            <a href="">
                                @if (session('khachHang')->name != '')
                                    {{ session('khachHang')->name }}
                                @else
                                    {{ session('khachHang')->sdt }}
                                @endif
                            </a>
                        </li>
                        <li class="dropdown-custom-item"><a href="/thong-tin-tai-khoan">Thông tin tài khoản</a></li>
                        <li class="dropdown-custom-item"><a href="/site-logout">Đăng xuất</a></li>
                    </ul>
                </li>
                @else
                <li class="icon-item d-inline-block">
                    <a class="btn-modal-main" id="btn-modal-dangnhaps" type-modal="modal-user" href="javascript:void(0)" data-show="one"><i class="fas fa-user-alt color-black-2 hover-pink"></i></a>
                </li>
                @endif
                <li class="icon-item d-inline-block position-relative icon-cart show-giohang-fixed" data-toggle="modal" data-target="#giohang-fixed">
                    <span class="badge badge-pill badge-primary number-cart" id="soluonghangmodal">0</span>
                    <a href="javascript:void(0)"><i class="fas fa-shopping-cart color-black-2 hover-pink"></i></a>
                </li>
            </div>
        </div>
    </nav>
</div>
