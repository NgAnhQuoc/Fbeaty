<div class="box-blog py-5">
    <div class="container">
        <div class="list-blog p-0">
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <div class="head-blog-item blog-title">
                        <div class="w-100 text-left d-flex align-items-center">
                            <div class="title-3 mr-4">
                                Tin tức mới
                            </div>
                            <div class="line-main-color"></div>
                        </div>
                    </div>

                    <div class="head-blog-item">
                        <div class="d-flex">
                            <div class="d-flex align-items-center text-2 mr-4">Tìm kiếm theo</div>
                            <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn-3 active" id="new-tab" data-toggle="tab" href="#new"
                                       role="tab" aria-controls="new" aria-selected="true">Mới nhất</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn-3" id="lastweek-tab" data-toggle="tab" href="#lastweek"
                                       role="tab" aria-controls="lastweek" aria-selected="false">Tuần trước</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            <div class="list-tabs">
                <div class="tab-content" id="">
                    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                        <div class="row">
                            <div class="col-xl-7 col-lg-6 pr-0">
                                @foreach ($blog as $item)
                                    <div class="blog-bigsize">
                                        <div class="box-danhmuc">
                                            {{ $item->danhmuc }}
                                        </div>

                                        <div class="img-1 w-100">
                                            <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="hover-pink">
                                                <img class="img-fluid" src="{{ asset('uploads/')}}/{{$item->img}}"
                                                     alt="">
                                            </a>
                                        </div>

                                <div class="blog-content-bigsize">
                                    <div class="blog-text-1 limit-text-row-2">
                                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}">{{$item->name}}</a>
                                    </div>
                                    <div class="blog-text-2 mt-2 formatDayCustom" data-type="long" data-format="{{ $item->created_at }}">

                                    </div>
                                    <div class="blog-text-3 text-2 mt-2 limit-text-row-3">
                                        {{$item->motangan}}
                                    </div>

                                            <div class="mt-3">
                                                <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="">
                                                    <button class="
                                            btn-line px-0 color-gray-2">
                                                        Đọc ngay
                                                    </button>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                            </div>

                            <div class="col-xl-5 col-lg-6 pl-0">
                                <div class="list-blog-small pl-5">
                                    @foreach ($getBlog2 as $item)
                                        <div
                                            class="small-blog-item box-tin-hv @if ($loop->index == 0) pt-0 @endif ">
                                            <div class="row">
                                                <div class="col-xl-5 col-lg-5 col-md-5 col-5">
                                                    <div class="img-1 image-tin-1">
                                                        {{-- <img class="img-fluid" src="{{ asset('uploads/')}}/{{$item->img}}" alt=""> --}}
                                                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                           class="hover-pink">
                                                            <img class="img-fluid"
                                                                 src="{{ asset('uploads/') }}/{{$item->img}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-7 col-lg-7 col-md-7 col-7 pl-0 align-self-center">
                                                    <div class="row">
                                                        <div
                                                            class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1 mt-1">
                                                            <div class="mr-3">
                                                                <a class="box-danhmuc-1">
                                                                    {{$item->danhmuc}}</a>
                                                            </div>
                                                            <div class="formatDayCustom" data-type="short"
                                                                 data-format="{{ $item->created_at }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mt-3 mb-1">
                                                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                           class="hover-pink">{{$item->name}}</a>
                                                    </div>
                                                    <p class="limit-text-row-2 mb-0">{{ $item->motangan }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lastweek" role="tabpanel" aria-labelledby="lastweek-tab">
                        @if (count($blog3) > 0 && count($blog4) > 0  )
                            
                        <div class="row">
                            @foreach ($blog3 as $item)
                                <div class="col-xl-7 col-lg-6 pr-0">
                                    <div class="blog-bigsize">
                                        <div class="box-danhmuc">
                                            {{$item->danhmuc}}
                                        </div>

                                        <div class="img-1 w-100">
                                            <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="hover-pink">
                                                <img class="img-fluid" src="{{ asset('uploads/') }}/{{$item->img}}"
                                                     alt="">
                                            </a>
                                        </div>

                                        <div class="blog-content-bigsize">
                                            <div class="blog-text-1 limit-text-row-2">
                                                <a href="{{ asset('bai-viet') }}/{{$item->slug}}">{{$item->name}}</a>
                                            </div>
                                            <div class="blog-text-2 mt-2 formatDayCustom" data-type="long"
                                                 data-format="{{ $item->created_at }}">
                                                @if ($item->created_at != null)
                                                    {{$item->created_at->format('Y.m.d')}}
                                                @endif
                                            </div>
                                            <div class="blog-text-3 text-2 mt-2 limit-text-row-3">
                                                {{$item->motangan}}
                                            </div>

                                            <div class="mt-3">
                                                <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="">
                                                    <button class="
                                            btn-line px-0 color-gray-2">
                                                        Đọc ngay
                                                    </button>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @endforeach

                            <div class="col-xl-5 col-lg-6 pl-0">
                                <div class="list-blog-small pl-5">
                                    @foreach ($blog4 as $item)

                                        <div class="small-blog-item box-tin-hv @if ($loop->index == 0) pt-0 @endif ">
                                            <div class="row">
                                                <div class="col-xl-5 col-lg-5 col-md-5 col-5">
                                                    <div class="img-1 image-tin-1">
                                                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                           class="hover-pink">
                                                            <img class="img-fluid"
                                                                 src="{{ asset('uploads/')}}/{{$item->img}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xl-7 col-lg-7 col-md-7 col-7 pl-0 align-self-center">
                                                    <div class="row">
                                                        <div
                                                            class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1 mt-1">
                                                            <div class="mr-3">
                                                                <a class="box-danhmuc-1">
                                                                    {{$item->danhmuc}}</a>
                                                            </div>
                                                            <div class="formatDayCustom" data-type="short"
                                                                 data-format="{{ $item->created_at }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-bl-1 limit-text-row-2 mt-3 mb-1">
                                                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}"
                                                           class="hover-pink">{{$item->name}}</a>
                                                    </div>
                                                    <p class="limit-text-row-2 mb-0">{{ $item->motangan }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row w-100">
                            <p class="text-center" style="width:100%;">Danh mục trống </p>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
