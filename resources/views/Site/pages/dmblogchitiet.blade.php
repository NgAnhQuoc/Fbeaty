@extends('Site.layout')

@section('title')
    Danh mục bài viết
@endsection

@section('main')
    <div class="fa-baiviet mt-5">
        <div class="container">

            <div class="all-blog mt-5 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="danhmuc-listblog">
                                <div class="head-blog-item blog-title">
                                    <div class="w-100 text-left d-flex align-items-center">
                                        <div class="title-3 mr-4">
                                            {{$nameDanhMucbyslug[0]->name}}
                                        </div>
                                        <div class="line-main-color ml-auto" style="width: 70%"></div>
                                    </div>
                                </div>
                                @if (count($viewbt) == 7)
                                    <div class="list-blog-1 mr-1 mb-2 list-blog-dmct7 mt-4">
                                        <div class="row mb-2 mr-1" data-danhmuc="{{$viewbt[0]->id}}">
                                            @foreach ($viewbt as $data)
                                                <div class="col-xl-4 content1 mt-3">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1 mt-3" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                        src="{{ asset('uploads') }}/{{$data->img}}" alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="" class="box-danhmuc-1">
                                                                            {{$data->danhmuc}}</a>
                                                                    </div>
                                                                    <div class="formatDayCustom" data-type="short"
                                                                            data-format="{{$data->created_at}}">
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
                                @elseif(count($viewbt) > 7 )
                                    <div class="list-blog-1 mr-1 mb-2 list-blog-dmct mt-4">
                                        <div class="row mb-2 mr-1 ">
                                            @foreach ($viewbt as $data)
                                                <div class="col-xl-4 content1 mt-3">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1 mt-3" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                    src="{{ asset('uploads') }}/{{$data->img}}" alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="" class="box-danhmuc-1">
                                                                            {{$data->danhmuc}}</a>
                                                                    </div>
                                                                    <div class="formatDayCustom" data-type="short"
                                                                        data-format="{{$data->created_at}}">
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
                                @elseif(count($viewbt) < 0)
                                    <div class="col-12" style="text-align:center!important;">
                                        <p class="text-center"> Danh mục trống </p>
                                    </div>
                                @elseif (count($viewbt) <= 3)
                                    <div class="list-blog-1 list-blog-dmct6 mt-4">
                                        <div class="row mb-2 mr-1">
                                            @foreach ($viewbt as $data)
                                                <div class="col-xl-4 content1 mt-3">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1 mt-3" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                     src="{{ asset('uploads') }}/{{$data->img}}" alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="" class="box-danhmuc-1">
                                                                            {{$data->danhmuc}}</a>
                                                                    </div>
                                                                    <div class="formatDayCustom" data-type="short"
                                                                         data-format="{{$data->created_at}}">
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
                                @elseif (count($viewbt) <= 6)
                                    <div class="list-blog-1 list-blog-dmct3 mt-4">
                                        <div class="row mb-2 mr-1">
                                            @foreach ($viewbt as $data)
                                                <div class="col-xl-4 content1 mt-3">
                                                    <div class="tin-item-1 box-tin-hv">
                                                        <div class="image-tin-1 mt-3" style="height: 220px">
                                                            <a href="{{ asset('bai-viet') }}/{{$data->slug}}">
                                                                <img class="img-fluid"
                                                                     src="{{ asset('uploads') }}/{{$data->img}}" alt=""></a>
                                                        </div>
                                                        <div class="content-tin-3 background-white">
                                                            <div class="row">
                                                                <div
                                                                    class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1">
                                                                    <div class="mr-3">
                                                                        <a href="" class="box-danhmuc-1">
                                                                            {{$data->danhmuc}}</a>
                                                                    </div>
                                                                    <div class="formatDayCustom" data-type="short"
                                                                         data-format="{{$data->created_at}}">
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
                               
                                @endif
                            </div>

                            @if (count($viewbt)>9)
                                <button onclick="anbutton()" type="button" class="xemthemblog btn mb-5 mt-3"
                                        id="buttonid">Xem thêm
                                </button>
                            @endif

                        </div>
                        <div class="col-xl-3">
                            @include('Site.components.danhmucct-baiviet')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/baiviet.css">
    <script src="{{ asset('Site/js') }}/blog.js"></script>
@endsection
