<?php use Illuminate\Support\Facades\Auth;

$user = Auth::user(); ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{url('/')}}">
    <meta charset="utf-8"/>
    <title>Quản trị | FBeauty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('Admin/assets') }}/images/favicon.ico">


    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"/>
    <link href="{{ asset('Admin/assets') }}/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('Admin/assets') }}/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/libs/select2/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
          rel="stylesheet"/>
    <link href="{{ asset('Admin/assets') }}/libs/switchery/switchery.min.css" rel="stylesheet"/>
    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="{{ asset('Admin/assets') }}/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- Bootstrap Css -->
    <link href="{{ asset('Admin/assets') }}/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('Admin/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('Admin/assets') }}/css/app.css" id="app-stylesheet" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/css/inputfile.css" id="app-stylesheet" rel="stylesheet" type="text/css"/>

    {{-- code nhúng của Quốc --}}
    <link rel="stylesheet" href="{{ asset('Admin/assets') }}/libs/magnific-popup/magnific-popup.css"/>

    <link href="{{ asset('Admin/assets') }}/css/inputfile.css" id="app-stylesheet" rel="stylesheet" type="text/css"/>

    <link href="{{asset("Admin/assets")}}/css/dropupload.css" rel="stylesheet" type="text/css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    {{-- end code nhúng của Quốc --}}

    {{-- code nhúng của Nhân --}}
    <link href="{{ asset('Admin/assets') }}/css/custom.css" id="app-stylesheet" rel="stylesheet" type="text/css"/>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link href="{{ asset('Admin/assets') }}/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/libs/datatables/responsive.bootstrap4.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/libs/x-editable/bootstrap-editable.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Admin/assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
{{-- end code nhúng của Nhân --}}
@yield('css')
<body>
<input type="hidden" id="LinkURL" value="{{URL::to("/quantri/")}}">
<!-- Begin page -->
<div id="wrapper">
    <input type="hidden" name="" id="server-name" value="{{env("APP_URL")}}">

    <!-- Topbar Start -->
    <div class="navbar-custom">

        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <span class="badge badge-primary rounded-circle noti-icon-badge">{{session()->get('coso')}}</span>
                </a>
            </li>
            <li class="dropdown notification-list">

                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="{{ asset('uploads/imgusers/') }}{{auth()->user()->avatar}}"
                                     class="img-fluid rounded-circle" alt=""/></div>
                        </a>

                        <!-- item-->

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('Admin/assets') }}/images/users/user-4.jpg"
                                     class="img-fluid rounded-circle" alt=""/></div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset($BASE_URL_UPLOAD_STAFF.auth()->user()->avatar)}}" alt="user-image"
                         class="rounded-circle img-fluid" style="object-fit: cover">
                    <span class="pro-user-name ml-1">
                                {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Chọn cơ sở !</h6>
                    </div>

                    @foreach ($coSo as $item)
                        @if(session()->get('coso') == $item->id)
                            <a href="{{URL::to('quantri/coso/changecoso/'.$item->id.'')}}"
                               class="dropdown-item notify-item selected">
                                <i class="fe-user"></i>
                                <span>{{$item->name}}</span>
                            </a>
                        @else
                            <a href="{{URL::to('quantri/coso/changecoso/'.$item->id.'')}}"
                               class="dropdown-item notify-item ">
                                <i class="fe-user"></i>
                                <span>{{$item->name}}</span>
                            </a>
                        @endif
                    @endforeach


                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{URL::to("quantri/logout")}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Đăng xuất</span>
                    </a>

                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/quantri" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('Admin/assets') }}/images/logo.svg" alt="" height="80">
                        </span>
                <span class="logo-sm">
                            <img src="{{ asset('Admin/assets') }}/images/logo.svg" alt="" height="80">
                        </span>
            </a>
            <a href="/quantri" class="logo logo-light text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('Admin/assets') }}/images/logo.svg" alt="" height="80">
                        </span>
                <span class="logo-sm">
                            <img src="{{ asset('Admin/assets') }}/images/logo.svg" alt="" height="80">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

        </ul>

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <div class="user-box text-center">
            <img src="{{ $BASE_URL_UPLOAD_STAFF}}/{{auth()->user()->avatar}}" alt="user-img"
                 title="Mat Helme" style="object-fit: cover" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                   aria-expanded="false">{{auth()->user()->name}}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted"><i class="mdi mdi-circle text-success"></i> Admin</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{route("nhanvien.edit", auth()->user()->id)}}" class="text-muted">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="{{URL::to('/quantri/logout')}}">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <small class="menu-title ml-3 text-secondary">Quản lý: </small>
        <div class="slimscroll-menu">

            <!-- User box -->
            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu pb-5 mb-5" id="side-menu">

                    @if( $user->role == 1)
                        <li class="menu-title">Chung</li>
                        <!--- Cơ Sở -->
                        <li>
                            <a href="/quantri">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Thống kê </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route("banner.index")}}">
                                <i class="fa fa-image"></i>
                                <span> Banner </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route("theodoi.index")}}">
                                <i class="fa fa-user-circle"></i>
                                <span> Người Theo Dõi </span>
                            </a>
                        </li>

                        <li>
                            <a href="/quantri/datlichremake">
                                <i class="far fa-calendar-check"></i>
                                <span> Đặt Lịch </span>
                            </a>
                        </li>
                        <li>
                            <a href="/quantri/lienhe">
                                <i class="fa fa-phone"></i>
                                <span> Liên hệ </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-home"></i>
                                <span> Cơ Sở </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("coso.index")}}">Danh sách</a></li>
                            </ul>
                        </li>
                        <!--- Danh mục -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-page-layout-sidebar-left"></i>
                                <span> Danh mục </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("danhmuc.index")}}">Danh sách</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-calendar-month"></i>
                                <span> Lịch </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("lich.index")}}">Danh sách</a></li>
                            </ul>
                        </li>


                        <li class="menu-title">Khách Hàng</li>
                        <!--- Khách hàng -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-account-cowboy-hat"></i>
                                <span> Khách hàng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("khachhang.index")}}">Danh sách</a></li>
                                <li><a href="{{route("khachhang.create")}}">Thêm Khách hàng</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Đặt Lịch</li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-book-open"></i>
                                <span> Hóa đơn </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("hoadon.index")}}">Danh sách</a></li>
                            </ul>

                        </li>
                        <!--- Giảm Giá -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-percentage"></i>
                                <span> Giảm Giá </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("giamgia.index")}}">Danh sách</a></li>
                            </ul>
                        </li>
                        <!--- Đơn Hàng -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-room-service"></i>
                                <span> Dịch vụ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("dichvu.index")}}">Danh sách</a></li>
                                <li><a href="{{route("dichvu.create")}}">Thêm Dịch vụ</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Nhân Viên</li>
                        <!--- Nhân viên -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-account-circle-outline "></i>
                                <span> Nhân viên </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("nhanvien.index")}}">Danh sách</a></li>
                                <li><a href="{{route("nhanvien.create")}}">Thêm nhân viên</a></li>
                            </ul>
                        </li>



                        <li class="menu-title">Sản Phẩm</li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-account-circle-outline "></i>
                                <span> Sản phẩm </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("sanpham.create")}}">Thêm Mới</a></li>
                                <li><a href="{{route("sanpham.index")}}">Danh Sách</a></li>
                            </ul>
                        </li>
                        <!--- Đơn Hàng -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-dolly"></i>
                                <span> Đơn Hàng </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("donhang.index")}}">Danh sách</a></li>
                            </ul>
                        </li>


                        <li class="menu-title">Bài Viết</li>

                        <!--- Blog -->
                        <li class="mb-5">
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-blogger"></i>
                                <span> Blog </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route("blog.index")}}">Danh sách</a></li>
                                <li><a href="{{route("blog.create")}}">Thêm blog</a></li>
                            </ul>
                        </li>
                        <div class="mb-10"></div>
                    @endif

                    @if($user->role == 0)
                            <li>
                                <a href="{{route("theodoi.index")}}">
                                    <i class="fa fa-user-circle"></i>
                                    <span> Người Theo Dõi </span>
                                </a>
                            </li>
                            <li>
                                <a href="/quantri/datlichremake">
                                    <i class="far fa-calendar-check"></i>
                                    <span> Đặt Lịch </span>
                                </a>
                            </li>
                            <li>
                                <a href="/quantri/lienhe">
                                    <i class="fa fa-phone"></i>
                                    <span> Liên hệ </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-book-open"></i>
                                    <span> Hóa đơn </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route("hoadon.index")}}">Danh sách</a></li>
                                </ul>

                            </li>
                            <!--- Giảm Giá -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-percentage"></i>
                                    <span> Giảm Giá </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route("giamgia.index")}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Sản Phẩm</li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-account-circle-outline "></i>
                                    <span> Sản phẩm </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route("sanpham.create")}}">Thêm Mới</a></li>
                                    <li><a href="{{route("sanpham.index")}}">Danh Sách</a></li>
                                </ul>
                            </li>
                            <!--- Đơn Hàng -->
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-dolly"></i>
                                    <span> Đơn Hàng </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route("donhang.index")}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Dịch vụ</li>
                            <li class="mb-5">
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-room-service"></i>
                                    <span> Dịch vụ </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route("dichvu.index")}}">Danh sách</a></li>
                                    <li><a href="{{route("dichvu.create")}}">Thêm Dịch vụ</a></li>
                                </ul>
                            </li>
                        @endif
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->


    @yield('content')


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu rightbar-content">

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="{{ asset('Admin/assets') }}/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked/>
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('Admin/assets') }}/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsStyle="{{ asset('Admin/assets') }}/css/bootstrap-dark.min.css"
                       data-appStyle="{{ asset('Admin/assets') }}/css/app-dark.min.css"/>
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('Admin/assets') }}/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                       data-appStyle="{{ asset('Admin/assets') }}/css/app-rtl.min.css"/>
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('Admin/assets') }}/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail"
                     alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch"
                       data-bsStyle="{{ asset('Admin/assets') }}/css/bootstrap-dark.min.css"
                       data-appStyle="{{ asset('Admin/assets') }}/css/app-dark-rtl.min.css"/>
                <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
            </div>

            <a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i
                    class="mdi mdi-download mr-1"></i> Download Now</a>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2021 &copy; Website được tạo bởi <a href="">Fbeauty</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">Về chúng tôi</a>
                    <a href="javascript:void(0);">Hỗ trợ</a>
                    <a href="javascript:void(0);">Liên hệ</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

<!-- Vendor js -->
<script src="{{ asset('Admin/assets') }}/js/vendor.min.js"></script>

<!-- knob plugin -->
<script src="{{ asset('Admin/assets') }}/libs/jquery-knob/jquery.knob.min.js"></script>

<!--Morris Chart-->
{{-- <script src="{{ asset('Admin/assets') }}/libs/morris-js/morris.min.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/raphael/raphael.min.js"></script> --}}

<!-- Dashboard init js-->
<script src="{{ asset('Admin/assets') }}/js/pages/dashboard.init.js"></script>

<script src="{{ asset('Admin/assets') }}/libs/custombox/custombox.min.js"></script>


<script src="{{ asset('Admin/assets') }}/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/multiselect/jquery.multi-select.js"></script>

<script src="{{ asset('Admin/assets') }}/libs/select2/select2.min.js"></script>


<script src="{{ asset('Admin/assets') }}/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="{{ asset('Admin/assets') }}/js/app.min.js"></script>

{{-- code nhúng bởi Nhân --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{ asset('Admin/assets') }}/js/pages/texteditor.js"></script>


<script src="{{ asset('Admin/assets') }}/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/datatables/dataTables.bootstrap4.js"></script>

<script src="{{ asset('Admin/assets') }}/js/pages/form-xeditable.init.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/x-editable/bootstrap-editable.min.js"></script>
<script src="{{ asset('Admin/assets') }}/js/pages/lieutrinh.nhan.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="{{ asset('Admin/assets') }}/js/pages/form-wizard.init.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{ asset('Admin/assets') }}/js/pages/custom.js"></script>

<script src="{{ asset('Admin/assets') }}/js/pages/common.nhan.js"></script>
{{-- end code nhúng bởi Nhân --}}

{{-- code nhúng bởi Tưởng --}}
<script src="{{ asset('Admin/assets') }}/js/pages/coso.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/morris-js/morris.min.js"></script>
<script src="{{ asset('Admin/assets') }}/libs/raphael/raphael.min.js"></script>
<script src="{{ asset('Admin/assets') }}/js/pages/dashboard.init.js"></script>


{{-- end code nhúng bởi Tưởng --}}

{{--code của quốc--}}
<script src="{{ asset('Admin/assets') }}/libs/isotope/isotope.pkgd.min.js"></script>

<!--venobox lightbox-->
<script src="{{ asset('Admin/assets') }}/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Gallery Init-->
<script src="{{ asset('Admin/assets') }}/js/pages/gallery.init.js"></script>

<!--- Bắt lỗi--->
{{--end code của quốc--}}

@yield('custom-javascript')
</body>

</html>
