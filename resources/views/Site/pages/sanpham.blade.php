@extends('Site.layout')

@section('title')
    Sản Phẩm
@endsection

@section('main')

    <div class="fa-sanpham mt-4">
        <div class="container p-4">
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <div class="fa-left w-100">
                        <div class="fa-box-search">
                            <form action="javascript:void(0)">
                                <input type="text" id="seach" value="" class="input-search-2" onkeyup="SearchFilter()"
                                       placeholder="Tìm kiếm ..." name="">
                                <button type="submit" class="button-submit-search-2"><i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <hr>
                        <div class="fa-bo-loc-doc fa-boloc-mobile mt-2">
                            <div class="header">
                                <div class="loc-item d-flex justify-content-center show-loc-mobile">
                                    <h6 class="title-loc mb-0 mr-auto">Bộ lọc sản phẩm</h6>

                                    <div class="icon-1 pr-3">
                                        <i class="fas fa-caret-down" style="font-size: 1.5em; "></i>
                                    </div>
                                </div>
                            </div>
                            <div class="boloc-body body-boloc-mobile">
                                <hr>
                                <div class="loc-item">
                                    <ul class="body-loc">
                                        <h6 class="title-loc">Danh Mục Sản phẩm Mobile</h6>

                                        @foreach($danhmucsp as $dm)
                                            <?php  $soluong = \Illuminate\Support\Facades\DB::table('sanpham')->where('iddanhmuc', $dm->id)->where('trangthai', 1)->count();?>
                                            <li>
                                                <a href="javascript:;" class="text-decoration-none hover-pink hov">
                                                    <label for="danhmuc{{$dm->id}}">
                                                        <input type="checkbox" onclick="FilterDanhMuc({{$dm->id}})"
                                                            name="danhmuc" id="danhmuc{{$dm->id}}"> {{$dm->name}}
                                                    </label><span
                                                        class="badge badge-pill badge-primary background-color-main float-right">{{$soluong}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <hr>
                                <div class="loc-item">
                                    <ul class="body-loc">
                                        <h6 class="title-loc">Danh Mục Thương Hiệu</h6>

                                        @foreach($danhmucth as $dm)
                                            <?php  $soluong = \Illuminate\Support\Facades\DB::table('sanpham')
                                                ->where('idthuonghieu', $dm->id)
                                                ->where('trangthai', 1)
                                                ->count();?>
                                            <li>
                                                <a href="javascript:;" class="text-decoration-none hover-pink hov">
                                                    <label for="danhmuc{{$dm->id}}">
                                                        <input type="checkbox" onclick="FilterDanhMuc({{$dm->id}})"
                                                            name="danhmuc" id="danhmuc{{$dm->id}}"> {{$dm->name}}
                                                    </label><span
                                                        class="badge badge-pill badge-primary background-color-main float-right">{{$soluong}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <hr>
                                <div class="loc-item">
                                    <h6 class="title-loc">Mức giá</h6>
                                    <div class="price-range">

                                    </div>


                                    <div class="range-gia mt-3 text-left">
                                        <p><label for="locgia0" class="hover-pink">
                                                <input type="radio" name="locgia" id="locgia0" onclick="Locgia('g0')"> Không
                                                lọc
                                            </label></p>
                                        <p><label for="locgia" class="hover-pink">
                                                <input type="radio" name="locgia" id="locgia" onclick="Locgia('g1')"> Giá:
                                                <span class="min-price" price-value="100000"> < 500,000 đ</span>
                                            </label></p>
                                        <p><label for="locgia1" class="hover-pink">
                                                <input type="radio" name="locgia" id="locgia1" onclick="Locgia('g2')"> Giá:
                                                <span class="min-price" price-value="100000">500,000 đ</span>
                                                -
                                                <span class="max-price" price-value="10000000">1,000,000 đ</span>
                                            </label>
                                        </p>
                                        <p><label for="locgia2" class="hover-pink">
                                                <input type="radio" name="locgia" id="locgia2" onclick="Locgia('g3')"> Giá:
                                                <span class="min-price" price-value="100000">1,000,000 đ</span>
                                                -
                                                <span class="max-price" price-value="10000000">5,000,000 đ</span>
                                            </label>
                                        </p>
                                        <p class="mb-0"><label for="locgia3" class="hover-pink mb-0">
                                                <input type="radio" name="locgia" id="locgia3" onclick="Locgia('g4')"> Giá:
                                                <span class="min-price" price-value="100000"> > 5,000,000 đ</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="fa-bo-loc-doc fa-boloc-desk mt-2">
                            <div class="loc-item">
                                <ul class="body-loc">
                                    <h6 class="title-loc">Danh Mục Sản phẩm</h6>

                                    @foreach($danhmucsp as $dm)
                                        <?php  $soluong = \Illuminate\Support\Facades\DB::table('sanpham')->where('iddanhmuc', $dm->id)->where('trangthai', 1)->count();?>
                                        <li>
                                            <a href="javascript:;" class="text-decoration-none hover-pink hov">
                                                <label for="danhmuc{{$dm->id}}">
                                                    <input type="checkbox" onclick="FilterDanhMuc({{$dm->id}})"
                                                           name="danhmuc" id="danhmuc{{$dm->id}}"> {{$dm->name}}
                                                </label><span
                                                    class="badge badge-pill badge-primary background-color-main float-right">{{$soluong}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="loc-item">
                                <ul class="body-loc">
                                    <h6 class="title-loc">Danh Mục Thương Hiệu</h6>

                                    @foreach($danhmucth as $dm)
                                        <?php  $soluong = \Illuminate\Support\Facades\DB::table('sanpham')
                                            ->where('idthuonghieu', $dm->id)
                                            ->where('trangthai', 1)
                                            ->count();?>
                                        <li>
                                            <a href="javascript:;" class="text-decoration-none hover-pink hov">
                                                <label for="danhmuc{{$dm->id}}">
                                                    <input type="checkbox" onclick="FilterDanhMuc({{$dm->id}})"
                                                           name="danhmuc" id="danhmuc{{$dm->id}}"> {{$dm->name}}
                                                </label><span
                                                    class="badge badge-pill badge-primary background-color-main float-right">{{$soluong}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="loc-item">
                                <h6 class="title-loc">Mức giá</h6>
                                <div class="price-range">

                                </div>


                                <div class="range-gia mt-3 text-left">
                                    <p><label for="locgia0" class="hover-pink">
                                            <input type="radio" name="locgia" id="locgia0" onclick="Locgia('g0')"> Không
                                            lọc
                                        </label></p>
                                    <p><label for="locgia" class="hover-pink">
                                            <input type="radio" name="locgia" id="locgia" onclick="Locgia('g1')"> Giá:
                                            <span class="min-price" price-value="100000"> < 500,000 đ</span>
                                        </label></p>
                                    <p><label for="locgia1" class="hover-pink">
                                            <input type="radio" name="locgia" id="locgia1" onclick="Locgia('g2')"> Giá:
                                            <span class="min-price" price-value="100000">500,000 đ</span>
                                            -
                                            <span class="max-price" price-value="10000000">1,000,000 đ</span>
                                        </label>
                                    </p>
                                    <p><label for="locgia2" class="hover-pink">
                                            <input type="radio" name="locgia" id="locgia2" onclick="Locgia('g3')"> Giá:
                                            <span class="min-price" price-value="100000">1,000,000 đ</span>
                                            -
                                            <span class="max-price" price-value="10000000">5,000,000 đ</span>
                                        </label>
                                    </p>
                                    <p class="mb-0"><label for="locgia3" class="hover-pink mb-0">
                                            <input type="radio" name="locgia" id="locgia3" onclick="Locgia('g4')"> Giá:
                                            <span class="min-price" price-value="100000"> > 5,000,000 đ</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12">
                    <div class="fa-list-sanpham">
                        <div class="head-list">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-7">
                                    <div class="d-flex">
                                        <div class="text-small d-flex align-items-center">
                                            Sắp xếp theo:
                                        </div>
                                        <div class="select">
                                            <select id="sapxep" onchange="SapXep()" class="custom-select"
                                                    style="border-radius: 0px;margin-left: 6%;">
                                                <option value="AZ" id="AZ">Tên sản phẩm từ A->Z</option>
                                                <option value="ZA">Tên sản phẩm từ Z->A</option>
                                                <option value="thapcao">Giá thấp đến cao</option>
                                                <option value="caothap">Giá cao đến thấp</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-7 col-5 align-items-center">
                                    <div class="d-flex justify-content-end">
                                        <div class="text-small d-flex align-items-center">

                                        </div>
                                        <ul class="fa-checkbox-loc nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item px-0" role="presentation">
                                                <span
                                                    class="nav-link  custom-2 bg-gray-1 active change-column-control"
                                                    type-column='mutiple'><i class="fas fa-grip-horizontal"></i></span>
                                            </li>
                                            <li class="nav-item pr-0" role="presentation">
                                                <span class="nav-link  custom-2 bg-gray-1 change-column-control"
                                                      type-column='single'><i class="fas fa-bars"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-sanpham-2">
                            <div class="fa-list-sanpham">
                                <div class="row" id="showSP">


                                </div>
                                <div class="justify-content-center text-center mt-2" id="xemthemsanpham">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script src="{{ asset('Site/js') }}/sanpham.js" defer></script>
    <script src="{{ asset('Site/js') }}/showsanpham.js"></script>

@endsection
