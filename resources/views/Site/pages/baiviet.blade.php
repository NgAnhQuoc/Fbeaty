@extends('Site.layout')

@section('title')
    Bài viết
@endsection

@section('main')
    <div class="fa-baiviet">
        @include('Site.components.box-blog')

        <div class="">
            <div class="box-tin-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="head-blog-item blog-title">
                                    <div class="w-100 text-left d-flex align-items-center">
                                        <div class="title-3 mr-4">
                                            Tin tức mới
                                        </div>
                                        <div class="line-main-color"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-tin-1">
                                <div class="tin-item-1">
                                    <div class="image-tin-1">
                                        <a href="{{ asset('bai-viet') }}/{{$blognewtt[0]->slug}}">
                                            <img class="img-fluid"
                                                    src="{{ asset('uploads') }}/{{$blognewtt[0]->img}}" alt=""></a>
                                    </div>
                                    <div class="content-tin background-white">
                                        <div class="row">
                                            <div
                                                class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <div class="mr-3">
                                                    <a href="{{ asset('danh-muc-bai-viet') }}/{{$blognewtt[0]->slugdm}}"
                                                        class="box-danhmuc-1">
                                                        {{$blognewtt[0]->danhmuc}}</a>
                                                </div>
                                                <div class="div formatDayCustom" data-type="long"
                                                        data-format="{{$blognewtt[0]->created_at}}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                            <a href="{{ asset('bai-viet') }}/{{$blognewtt[0]->slug}}"
                                                class="hover-pink">
                                                {{$blognewtt[0]->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="box-tin-2 d-flex flex-column h-100">
                                @foreach ($blognew as $item)
                                    <a href="{{ asset('bai-viet') }}/{{$item->slug}}">
                                        <div class="child-box-tin-2 d-flex align-items-end"
                                                style="background: url('{{ asset('uploads') }}/{{$item->img}}')">
                                            <div class="content-tin background-white">
                                                <div class="row">
                                                    <div
                                                        class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}"
                                                                class="box-danhmuc-1 maincolor">
                                                                {{$item->danhmuc}}</a>
                                                        </div>
                                                        <div class="div formatDayCustom color-miniDay-white" data-type="long" data-format="{{$blognewtt[0]->created_at}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-2 mt-3">
                                                    <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                        class="color-white hover-pink fz-1em2 font-weight-600">
                                                        {{$item->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-3 box-right-re">
                            <div class="title-box-2">
                                <span>Mạng xã hội</span>
                            </div>

                            <div class="list-social">
                                <a href="https://www.facebook.com/FBeauty-103098148891666">
                                    <span><i class="fab fa-facebook-f"></i> <span>15000</span></span>
                                    <span class="fz-0em9">Like</span>
                                </a>

                                <a href="https://twitter.com/HuynTrn26589599">
                                    <span><i class="fab fa-twitter"></i> <span>15000</span></span>
                                    <span class="fz-0em9">Like</span>
                                </a>

                                <a href="https://www.instagram.com/fbeautyspa__/">
                                    <span><i class="fab fa-instagram"></i><span>32k+</span></span>
                                    <span class="fz-0em9">Follower</span>
                                </a>

                                <a href="https://www.youtube.com/channel/UCKmLj9UShXnCrweFbjA9Jvg">
                                    <span><i class="fab fa-youtube"></i> <span>15000</span></span>
                                    <span class="fz-0em9">Subscribe</span>
                                </a>
                            </div>

                            <div class="datlich mt-4">
                                <div class="child-box-tin-2 d-flex align-items-center box-small"
                                        style="background: url('{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg');">
                                    <div class="content-tin background-white">
                                        <div class="text-bl-1 limit-text-row-2 mb-2">
                                            <a class="color-white hover-pink">Trải nghiệm cảm giác spa <br> đỉnh cao
                                                tại Fbeauty spa</a>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                <div class="mt-3 text-center">
                                                    <a class="btn-modal-main" type-modal="modal-datlich"
                                                        href="javascript:void(0)" data-show="one">
                                                        <button class="btn-full">Đặt Lịch</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-blog mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        @foreach ($listdanhmuc2 as $item)
                            @if (count($item->blogbyid2) > 0 )

                                <div class="danhmuc-listblog">
                                    <div class="head-blog-item blog-title">
                                        <div class="w-100 text-left d-flex align-items-center">
                                            <div class="title-3 mr-4">
                                                {{$item->name}}
                                            </div>
                                            <div class="line-main-color ml-auto" style="width: 70%"></div>
                                        </div>
                                    </div>

                                    <div class="list-blog-1 mt-4">
                                        <div class="row mb-30px " data-danhmuc="{{$item->id}}">
                                            @foreach ($item->blogbyid2 as $data)
                                                <div class="col-xl-4">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                        src="{{ asset('uploads') }}/{{$data->img}}"
                                                                        alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}"
                                                                            class="box-danhmuc-1">
                                                                            {{$item->name}}</a>
                                                                    </div>
                                                                    <div class="div formatDayCustom" data-type="short" data-format="{{$blognewtt[0]->created_at}}">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-bl-1 limit-text-row-1 mb-1 mt-3">
                                                                <a href="{{ asset('bai-viet') }}/{{$data->slug}}"
                                                                    class="hover-pink">{{$data->name}}</a>
                                                            </div>
                                                            <p class="blog-mota limit-text-row-3 mb-0">
                                                                {{$data->motangan}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- <button data-iddm="{{$item->id}}" type="button" class="xemthemblog btn mb-5 mt-3" data-take="0" data-skip="3">Xem thêm</button> --}}

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-xl-3">
                        @include('Site.components.baivietmoi')
                    </div>
                </div>
            </div>
        </div>

        <div class="list-blog-quantam">
            <div class="background-overlay">
                <div class="container">
                    <div class="blog-quantam">
                        <div class="head-blog-item blog-title">
                            <div class="w-100 text-left d-flex align-items-center">
                                <div class="title-3 mr-4 color-white">
                                    Xu hướng tìm kiếm
                                </div>
                                <div class="line-main-color ml-auto" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="body mt-4">
                            <div class="row">
                                @foreach ($xuhuong as $item)

                                    <div class="col-xl-3 col-lg-6">
                                        <div class="tin-item-1 blog-xuhuong">
                                            <div class="image-tin-1 " style="height: 180px;">
                                                <a href="{{ asset('bai-viet') }}/{{$item->slug}}">
                                                    <img class="img-fluid "
                                                            src="{{ asset('uploads') }}/{{$item->img}}" alt=""></a>
                                            </div>
                                            <div class="content-tin background-none pt-4 p-0">
                                                <div class="row">
                                                    <div
                                                        class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                        <div class="mr-3">
                                                            <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}" class="box-danhmuc-1 maincolor"> {{$item->danhmuc}}</a>
                                                        </div>
                                                        <div class="div formatDayCustom color-miniDay-white" data-type="short" data-format="{{$blognewtt[0]->created_at}}"> </div>
                                                    </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-1 mb-0 mt-3">
                                                    <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                        class=" color-white fz-1em font-weight-600 name-blog">{{$item->name}}</a>
                                                </div>

                                                <div class="mt-0">
                                                    <p class="blog-mota limit-text-row-3 mb-0 color-mota-white">
                                                        Sở hữu làn da từ mặt tới body trắng sáng, mịn màng không tì vết, chính là ao ước mà phái đẹp luôn muốn sở hữu.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="all-blog mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        @foreach ($listdanhmuc as $item)

                            @if (count($item->blogbyid) > 0 )
                                <div class="danhmuc-listblog mt-4">
                                    <div class="head-blog-item blog-title">
                                        <div class="w-100 text-left d-flex align-items-center">
                                            <div class="title-3 mr-4">
                                                {{$item->name}}
                                            </div>
                                            <div class="line-main-color ml-auto" style="width: 70%"></div>
                                        </div>
                                    </div>

                                    <div class="list-blog-1 mt-4">
                                        <div class="row mb-60px" data-danhmuc="{{$item->id}}">
                                            @foreach ($item->blogbyid as $data)
                                                <div class="col-xl-4 content1 mt-3">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1 mt-3" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                        src="{{ asset('uploads') }}/{{$data->img}}"
                                                                        alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}"
                                                                            class="box-danhmuc-1">
                                                                            {{$item->name}}</a>
                                                                    </div>
                                                                    <div class=" formatDayCustom" data-type="short"
                                                                            data-format="{{$blognewtt[0]->created_at}}">
                                                                <span> @if ($data->created_at != null)
                                                                        <?php
                                                                        $timestamp = strtotime($data->created_at);
                                                                        print date('d-m-y', $timestamp);
                                                                        ?>
                                                                    @endif
                                                                </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-bl-1 limit-text-row-1 mb-1 mt-3">
                                                                <a href="{{ asset('bai-viet') }}/{{$data->slug}}"
                                                                    class="hover-pink">{{$data->name}}</a>
                                                            </div>
                                                            <p class="blog-mota limit-text-row-3 mb-0">
                                                                {{$data->motangan}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 text-center">
                                    @if (count($item->blogbyid) == 3)
                                        <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}">
                                            <button type="button" class="mb-2 mt-4 btn-full" data-take="3" data-skip="3">Xem thêm </button>
                                        </a>
                                    @else
                                        <br> <br>
                                    @endif
                                </div>

                            @endif
                        @endforeach
                    </div>
                    <div class="col-xl-3 fa-fixed">
                        <div class="child-fixed">
                            @include('Site.components.box-lienhe')

                            <div class="list-blog-small p-0">
                                <div class="title-box-1">
                                    <span>Top lượt xem</span>
                                </div>
                                @foreach ($luotxem as $item)
                                    <div class="small-blog-item box-tin-hv">
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="img-1">
                                                    <a href="{{ asset('bai-viet') }}/{{$item->slug}}">
                                                        <img class="img-fluid" src="{{ asset('uploads/') }}/{{$item->img}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 pl-0 align-self-center">
                                                <div class="row">
                                                    <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1 formatDayCustom" data-type="short" data-format="{{$data->created_at}}"> </div>
                                                </div>
                                                <div class="text-bl-1 limit-text-row-2 mb-0 mt-1">
                                                    <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="hover-pink">{{$item->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">
@endsection

@section('javascript')
    <script src="{{ asset('Site/js') }}/blog.js"></script>
@endsection
