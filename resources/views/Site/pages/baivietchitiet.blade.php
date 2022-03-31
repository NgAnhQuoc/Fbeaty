@extends('Site.layout')

@section('title')
    bài viết chi tiết
@endsection

@section('main')
    <div class="fa-blogdetail mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-12">
                    <div class="blog-detail">
                        <img src="{{ asset('uploads') }}/{{$viewdetail[0]->img}}" alt="">
                        <div class="blog-content-detail box-shadow-1">
                            <div class="blog-head pb-4">
                                <div class="row">
                                    <div
                                        class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                        <div class="mr-3">
                                            <a href="{{ asset('danh-muc-bai-viet') }}/{{$viewdetail[0]->slugdm}}"
                                               class="box-danhmuc-1 fz-1em2">
                                                {{$viewdetail[0]->danhmuc}}</a>
                                        </div>
                                        <div class="formatDayCustom" data-type="long"
                                             data-format="{{$viewdetail[0]->created_at}}">
                                            <span class="fz-1em1">@if ($viewdetail[0]->created_at != null)
                                                    <?php
                                                    $timestamp = strtotime($viewdetail[0]->created_at);
                                                    print date('d-m-y', $timestamp);
                                                    ?>
                                                @endif</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="name-blog mt-4">
                                    <h1 class=" font-weight-600 mb-0">{{$viewdetail[0]->name}}.</h1>
                                </div>

                                {{-- <div class="list-reac d-flex">
                                    <div class="reac-item pl-0"><i class="far fa-eye"></i> <span>5k</span></div>
                                    <div class="reac-item"><i class="far fa-heart"></i> <span>5k</span></div>
                                    <div class="reac-item pr-0 border-0"><i class="far fa-comments"></i> <span>5k</span>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="blog-body pt-0">
                                <div class="noidungngan">
                                    <div class="border-z border-left-z"></div>
                                    <p class="m-0">{{$viewdetail[0]->motangan}}.</p>
                                    <div class="border-z border-right-z"></div>
                                </div>

                                <div class="noidung divnoidung" style="font-family:'Roboto', sans-serif !important;">
                                    <br>
                                    <a>{!! $viewdetail[0]->noidung !!}</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-3 col-lg-12 fa-fixed-2 right-blog-detail">
                    <div class="child-fixed-2">
                        @include('Site.components.baivietmoi')
                        <div class="box-list-cocial">
                            <div class="title-box-2">
                                <span>Mạng xã hội</span>
                            </div>

                            <div class="list-social">
                                <a href="https://www.facebook.com/FBeauty-103098148891666">
                                    <span><i class="fab fa-facebook-f"></i> <span>15000</span> <small
                                            class="fz-0em9"> Like</small></span>
                                    <span class="fz-0em9">Like</span>
                                </a>

                                <a href="https://twitter.com/HuynTrn26589599">
                                    <span><i class="fab fa-twitter"></i> <span>15000</span> <small
                                            class="fz-0em9"> Tweet</small></span>
                                    <span class="fz-0em9">Like</span>
                                </a>

                                <a href="https://www.instagram.com/fbeautyspa__/">
                                    <span><i class="fab fa-instagram"></i><span>32k+</span> <small
                                            class="fz-0em9"> Follower</small></span>
                                    <span class="fz-0em9">Follower</span>
                                </a>

                                <a href="https://www.youtube.com/channel/UCKmLj9UShXnCrweFbjA9Jvg">
                                    <span><i class="fab fa-youtube"></i> <span>15000</span> <small class="fz-0em9"> Subscriber</small></span>
                                    <span class="fz-0em9">Subscribe</span>
                                </a>
                            </div>

                            <div class="datlich mt-4">
                                <div class="child-box-tin-2 d-flex align-items-center box-small mb-1"
                                    style="background: url('{{ asset('Site/images') }}/toa-heftiba-a9pFSC8dTlo-unsplash.jpg');">
                                    <div class="content-tin background-white">
                                        <div class="text-bl-1 limit-text-row-2 mb-2">
                                            <a href="" class="color-white hover-pink">Trải nghiệm cảm giác spa <br> đỉnh cao
                                                tại
                                                Fbeauty spa</a>
                                        </div>
                                        <div class="row">
                                            <div
                                                class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1 mb-1">
                                                <div class="mr-3">
                                                    <a type-modal="modal-datlich" href="javascript:void(0)" data-show="one"
                                                    class="box-danhmuc-1 maincolor btn-modal-main ">Đặt lịch</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('Site.components.danhmuc-baiviet')
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="danhmuc-listblog container">
                        <div class="head-blog-item blog-title">
                            <div class="w-100 text-left d-flex align-items-center">
                                <div class="title-3 mr-4">
                                    Bài viết liên quan
                                </div>
                                <div class="line-main-color ml-auto" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="list-blog-1 mt-4">
                            <div class="row  mb-30px">

                                @foreach ($viewdetail2 as $data1)
                                    @foreach ($data1->viewdt as $data)
                                        <div class="col-xl-3">
                                            <div class="tin-item-1 box-tin-hv">
                                                <div class="image-tin-1" style="height: 220px;">
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
                                                                <a href="{{ asset('danh-muc-bai-viet') }}/{{$data1->slugdm}}"
                                                                   class="box-danhmuc-1">
                                                                    {{$data->danhmuc}}</a>
                                                            </div>
                                                            <div class="formatDayCustom" data-type="short"
                                                                 data-format="{{$data->created_at}}">
                                                        <span>@if ($data->created_at != null)
                                                                <?php
                                                                $timestamp = strtotime($data->created_at);
                                                                print date('d-m-y', $timestamp);
                                                                ?>
                                                            @endif </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-1 mb-1 mt-3">
                                                        <a href="{{ asset('bai-viet') }}/{{$data->slug}}"
                                                           class="hover-pink">{{$data->name}}</a>
                                                    </div>
                                                    <p class="blog-mota mb-0 limit-text-row-3">
                                                        {{$data->motangan}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script>
        var marginTop = 0;
        var classNameBoxFixed = 'fa-fixed-2';
        var elementChildAddMargin = $(`.child-fixed-2`);
        $(window).scroll(function() {
            var windowsize = $(window).width();
            if (windowsize > 1200) {
                var hH    = elementChildAddMargin.outerHeight(),
                wH    = $(window).height(),
                wS    = $(this).scrollTop(),
                hT    = $(`.${classNameBoxFixed}`).offset().top + 1200,
                hBody = $('body').height();

            if (wS < hBody - 2000) {
                    if (wS > hT){
                        marginTop = wS - hT;
                    } else {
                        marginTop = 0;
                    }
                }
            } else {
                marginTop = 0;
            }
            console.log(marginTop);
            elementChildAddMargin.css('margin-top', marginTop);
        });

    </script>
@endsection
