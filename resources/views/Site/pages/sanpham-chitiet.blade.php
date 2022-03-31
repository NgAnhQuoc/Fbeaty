@extends('Site.layout')

@section('title')
    Sản Phẩm
@endsection

@section('main')
    @if(!isset($khongcosanpham))
        <div class="fa-sanphamchitiet mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="fa-slider-images">
                            @if($sanpham[0]->giamgia!='')
                                <div class="box-giamgia-1 rounded">
                                    {{$sanpham[0]->giamgia}}%
                                </div>
                            @endif
                            <div class="children-slider-images">
                                <div class="owl-carousel owl-theme" id="slide-images-sanpham-2">
                                    <?php $slide1 = json_decode($sanpham[0]->img);?>
                                    @foreach($slide1 as $st => $sli )

                                        <div class="item img-sanpham-item">
                                            <img src="{{ asset('uploads')}}/{{$sli}}" class="img-fluid" alt="...">
                                        </div>
                                    @endforeach

                                </div>
                                <div class="owl-dots" id="custom-dots-1">
                                    <?php $slide2 = json_decode($sanpham[0]->img);?>
                                    @foreach($slide2 as $st => $sli )
                                        <div class="owl-dot dot-custom <?php if ($st == 0) {
                                            echo 'active';
                                        }?>">
                                            <img style="height: 100%;" src="{{ asset('uploads')}}/{{$sli}}" class="img-fluid" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 ">
                        <div class="fa-info-sanpham">
                            <div class="product-info p-5 rounded" style="background-color: rgb(255,237,232);">
                                <a href="javascript:;">
                                    <p class="product-catergory font-13 mb-1">{{$sanpham[0]->tendm}}</p>
                                </a>
                                <h6 class="product-name mb-2">{{$sanpham[0]->name}}</h6>
                                <p class="card-text product-motangan">{{$sanpham[0]->mota}}</p>
                                <div class="d-flex align-items-center">
                                    @if($sanphamchitietlimit[0]!=null)
                                        <div class="w-100 mb-1 product-price d-flex">
                                            <span
                                                class="me-1 text-decoration-line-through font-weight-normal giasanpham">{{str_replace(',', '.',number_format($sanphamchitietlimit[0]->dongia)), ""}} đ </span>
                                            <div class="d-flex mt-auto mb-auto">
                                                <div class="list-info-sanpham"><span class="dungtich-ml"> {{$sanphamchitietlimit[0]->ml}}ml</span>
                                                </div>
                                                <div class="list-info-sanpham"><span
                                                        class="soluotmua">{{$sanphamchitietlimit[0]->soluotmua}}</span>
                                                    <small>Đã bán</small></div>
                                                <div class="list-info-sanpham"><span
                                                        class="tonkho">{{$sanphamchitietlimit[0]->tonkho}}</span>
                                                    <small>Sản phẩm có sẵn</small></div>
                                            </div>
                                        </div>
                                    @else
                                        <h3 class="">Sản phẩm ngừng kinh doanh</h3>
                                    @endif
                                </div>
                                @if($sanpham[0]->giamgia!=null)
                                    <div class="dungtich mt-2">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <span class="text-bold">Giảm còn: </span>
                                            </div>

                                            <div class="col-9">
                                                @if($sanphamchitietlimit[0]!=null)
                                                    <h3><span
                                                            class="text-bold giamgiasanpham">{{str_replace(',', '.',number_format(($sanphamchitietlimit[0]->dongia - (($sanphamchitietlimit[0]->dongia *$sanpham[0]->giamgia)/100)))), ""}}</span>đ
                                                    </h3>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <span></span>
                                    @endif


                                <div class="dungtich mt-2">

                                    <div class="row align-items-center">
                                        @if($sanphamchitietlimit[0]!=null)
                                        <div class="col-3">
                                            <span class="text-bold">Dung tích </span>
                                        </div>
                                            <div class="col-9">
                                                @foreach($sanphamchitiet as $index =>$spct)
                                                    <div
                                                        class="basic-btn-gray btn-dungtich  <?php echo ($index == 0) ? 'active' : '';?>"
                                                        data-id="{{$spct->id}}" data-soluotmua="{{$spct->soluotmua}}"
                                                        data-giamgia="{{$sanpham[0]->giamgia}}" data-ml="{{$spct->ml}}"
                                                        data-kho="{{$spct->tonkho}}"
                                                        data-gia="{{$spct->dongia}}">{{$spct->ml}} ml
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span></span>
                                            @endif

                                    </div>
                                </div>

                                <div class="soluong mt-3">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <span class="text-bold">Số lượng </span>
                                        </div>
                                        <div class="col-9">
                                            <div class="input-group inline-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary btn-minus btn-cal">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input class="form-control text-center quantity maxsl" min="1"
                                                       id="nhapsoluong" name="quantity" value="1" type="number">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary btn-plus btn-cal">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-start">
                                        @if($sanphamchitietlimit[0]!=null)
                                            <input type="hidden" id="tonkho"
                                                   value="{{$sanphamchitietlimit[0]->tonkho}}">
                                            <input type="hidden" id="idsanpham" value="{{$sanphamchitietlimit[0]->id}}">
                                        @else
                                            <span></span>
                                            @endif
                                        <button class="btn-5 ml-0 mr-2  bg-white idspct"
                                                onclick="ThemGioHangChiTiet(null)"><i class="fas fa-cart-plus"></i> Thêm
                                            giỏ hàng
                                        </button>
                                        <button class="btn-6 ml-0" onclick="ThemGioHangChiTiet('muamgay')">Mua ngay
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-12">
                        <div class="fa-mota w-80 m-auto">
                            <div class="title-cs-1 mt-3">MÔ TẢ SẢN PHẨM</div>
                            <hr>
                            <div class="noidung p-5 bg-white">
                                <?php echo $sanpham[0]->noidung;?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sanpham-lienquan mt-5">
                    <div class="title-cs-1 p-2 rounded" style="background-color: pink">
                        <span class="btn btn-light text-pink">Sản Phẩm Liên Quan</span>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($splienquan as $i => $splq)
                            <?php $anh = json_decode($splq->img);
                            ?>
                            <div class="col-3">
                                <div class="card product-card child-item-sanpham zbar">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        @if(session()->has('khachHang') && session('khachHang') != '')
                                            <?php $checkyeuthich = \Illuminate\Support\Facades\DB::table('yeuthich')->where('idkhachhang', session('khachHang')->id)->where('idsanphamchitiet', $splq->id)->doesntExist()?>
                                            <?php if ($checkyeuthich == false) {?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1 active"
                                                 id="tym{{$splq->id}}" onclick="AddYeuThich({{$splq->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php } else{?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$splq->id}}"
                                                 onclick="AddYeuThich({{$splq->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php }?>
                                        @else
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$splq->id}}"
                                                 onclick="AddYeuThich({{$splq->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($splq->giamgia !="")
                                            <div class="btn-add-discout btn-sticky hover-scale-1">
                                                <div class="box-cicrle-giamgia p-2 rounded text-white">
                                                    <span style="font-size: 10pt;">{{$splq->giamgia}}%</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <img src="{{ asset('/uploads')}}/{{$anh[0]}}" class="card-img-top img-sanpham-zbar"
                                         alt="...">
                                    <div class="card-body text-center">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">{{$sanpham[0]->tendm}}</p>
                                            </a>
                                            <a href="{{URL::to("san-pham/chi-tiet", $splq->slug)}}">
                                                <h6 class="product-name mb-2"
                                                    style="height: 40px;"><?php if (strlen($splq->name) <= 47) {
                                                        echo $splq->name;
                                                    } else {
                                                        echo substr($splq->name, 0, 40) . '...';
                                                    }?></h6>
                                            </a>
                                            <div class="mt-2 d-flex align-items-center justify-content-center"
                                                 style="height: 50px;">
                                                <div class="mb-1 product-price">
                                                    <span class="me-1 text-decoration-line-through">{{str_replace(',', '.',number_format($splq->dongia)), ""}} đ</span>
                                                    / <span>{{$splq->ml}} ml</span>
                                                    @if($splq->giamgia !="")
                                                        <br><span style="font-size: 13pt;">Giảm còn: </span><span
                                                            class="me-1 text-decoration-line-through font-weight-bold">{{str_replace(',', '.',number_format($splq->dongia-(($splq->dongia * $splq->giamgia)/100))), ""}}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-action mt-1">
                                                <div class="d-grid gap-2">
                                                    <button class="w-100 btn-sanpham btn-5"
                                                            onclick="ThemGioHang({{$splq->idspct}})"><i
                                                            class="fas fa-cart-plus"></i> Thêm giỏ hàng
                                                    </button>
                                                    <a href="{{URL::to("san-pham/chi-tiet", $splq->slug)}}">
                                                        <button class="w-100 btn-sanpham btn-5 mt-2"><i
                                                                class="fas fa-search"></i> Xem chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="sanpham-lienquan my-2">
                    <div class="title-cs-1 p-2 rounded" style="background-color: pink">
                        <span class="btn btn-light">Sản phẩm khác</span>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($spkhac as $i => $spk)
                            <?php $anhk = json_decode($spk->img);
                            ?>
                            <div class="col-3">
                                <div class="card rounded-0 product-card child-item-sanpham zbar">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        @if(session()->has('khachHang') && session('khachHang') != '')
                                            <?php $checkyeuthich1 = \Illuminate\Support\Facades\DB::table('yeuthich')->where('idkhachhang', session('khachHang')->id)->where('idsanphamchitiet', $spk->id)->doesntExist()?>
                                            <?php if ($checkyeuthich1 == false) {?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1 active"
                                                 id="tym{{$spk->id}}" onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php } else{?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$spk->id}}"
                                                 onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php }?>
                                        @else
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$spk->id}}"
                                                 onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($spk->giamgia !="")
                                            <div class="btn-add-discout btn-sticky hover-scale-1">
                                                <div class="box-cicrle-giamgia p-2 rounded text-white">
                                                    <span style="font-size: 10pt;">{{$spk->giamgia}}%</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <img src="{{ asset('/uploads')}}/{{$anhk[0]}}" class="card-img-top img-sanpham-zbar"
                                         alt="...">
                                    <div class="card-body text-center">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">{{$spk->tendm}}</p>
                                            </a>
                                            <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                <h6 class="product-name mb-2"
                                                    style="height: 40px;"><?php if (strlen($spk->name) <= 45) {
                                                        echo $spk->name;
                                                    } else {
                                                        echo substr($spk->name, 0, 45) . '...';
                                                    }?></h6>
                                            </a>
                                            <div class="d-flex align-items-center justify-content-center"
                                                 style="height: 50px;">
                                                <div class="mb-1 product-price">
                                                    <span class="me-1 text-decoration-line-through">{{str_replace(',', '.',number_format($spk->dongia)), ""}} đ</span>
                                                    / <span>{{$spk->ml}}ml</span>
                                                    @if($spk->giamgia !="")
                                                        <br><span style="font-size: 13pt;">Giảm còn: </span><span
                                                            class="me-1 text-decoration-line-through font-weight-bold">{{str_replace(',', '.',number_format($spk->dongia-(($spk->dongia * $spk->giamgia)/100))), ""}}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-action mt-2">
                                                <div class="d-grid gap-2">

                                                    <button class="w-100 btn-sanpham btn-5"
                                                            onclick="ThemGioHang({{$spk->id}})"><i
                                                            class="fas fa-cart-plus"></i> Thêm giỏ hàng
                                                    </button>
                                                    <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                        <button class="w-100 btn-sanpham btn-5 mt-2"><i
                                                                class="fas fa-search"></i> Xem chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="fa-sanphamchitiet mt-4">
            <div class="container">
                <div class="sanpham-lienquan mt-5 text-center">
                    <hr>
                    <div class="row m-auto">
                        <h2 class="text-center m-auto" style="color: var(--main-color);">Không có sản phẩm này</h2>
                    </div>
                    <hr>
                </div>
                <div class="sanpham-lienquan my-2">
                    <div class="title-cs-1 p-2 rounded" style="background-color: pink">
                        <span class="btn btn-light">Sản phẩm khác</span>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($spkhac as $i => $spk)
                            <?php $anhk = json_decode($spk->img);
                            ?>
                            <div class="col-3">
                                <div class="card rounded-0 product-card child-item-sanpham zbar">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        @if(session()->has('khachHang') && session('khachHang') != '')
                                            <?php $checkyeuthich1 = \Illuminate\Support\Facades\DB::table('yeuthich')->where('idkhachhang', session('khachHang')->id)->where('idsanphamchitiet', $spk->id)->doesntExist()?>
                                            <?php if ($checkyeuthich1 == false) {?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1 active"
                                                 id="tym{{$spk->id}}" onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php } else{?>
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$spk->id}}"
                                                 onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                            <?php }?>
                                        @else
                                            <div class="btn-add-wishlist btn-sticky hover-scale-1" id="tym{{$spk->id}}"
                                                 onclick="AddYeuThich({{$spk->id}})">
                                                <div class="box-cicrle">
                                                    <i class="fas fa-heart heart-full"></i>
                                                    <i class="far fa-heart heart-line"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($spk->giamgia !="")
                                            <div class="btn-add-discout btn-sticky hover-scale-1">
                                                <div class="box-cicrle-giamgia p-2 rounded text-white">
                                                    <span style="font-size: 10pt;">{{$spk->giamgia}}%</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <img src="{{ asset('/uploads')}}/{{$anhk[0]}}" class="card-img-top img-sanpham-zbar"
                                         alt="...">
                                    <div class="card-body text-center">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">{{$spk->tendm}}</p>
                                            </a>
                                            <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                <h6 class="product-name mb-2"
                                                    style="height: 40px;"><?php if (strlen($spk->name) <= 45) {
                                                        echo $spk->name;
                                                    } else {
                                                        echo substr($spk->name, 0, 45) . '...';
                                                    }?></h6>
                                            </a>
                                            <div class="d-flex align-items-center justify-content-center"
                                                 style="height: 50px;">
                                                <div class="mb-1 product-price">
                                                    <span class="me-1 text-decoration-line-through">{{str_replace(',', '.',number_format($spk->dongia)), ""}} đ</span>
                                                    / <span>{{$spk->ml}}ml</span>
                                                    @if($spk->giamgia !="")
                                                        <br><span style="font-size: 13pt;">Giảm còn: </span><span
                                                            class="me-1 text-decoration-line-through font-weight-bold">{{str_replace(',', '.',number_format($spk->dongia-(($spk->dongia * $spk->giamgia)/100))), ""}}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-action mt-2">
                                                <div class="d-grid gap-2">

                                                    <button class="w-100 btn-sanpham btn-5"
                                                            onclick="ThemGioHang({{$spk->id}})"><i
                                                            class="fas fa-cart-plus"></i> Thêm giỏ hàng
                                                    </button>
                                                    <a href="{{URL::to("san-pham/chi-tiet", $spk->slug)}}">
                                                        <button class="w-100 btn-sanpham btn-5 mt-2"><i
                                                                class="fas fa-search"></i> Xem chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('javascript')
    <script src="{{ asset('Site/js') }}/sanpham.js"></script>
    <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">


@endsection

