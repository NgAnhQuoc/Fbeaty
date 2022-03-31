<div class="list-blog-small p-0">
    <div class="title-box-1">
        <span>Bài viết mới</span>
    </div>
    <div class="row">
    @foreach ($getBlog2 as $item)
        <div class="col-xl-12 col-lg-6 col-12 small-blog-item box-tin-hv detail-right-new-blog">
            <div class="row">
                <div class="col-xl-5">
                    <div class="img-1">
                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}">
                        <img class="img-fluid "
                            src="{{ asset('uploads') }}/{{$item->img}}"
                            alt=""></a>
                    </div>
                </div>
                <div class="col-xl-7 pl-0 align-self-center small-blog-content">
                    <div class="row">
                        <div class="col-xl-12 d-flex align-items-center color-gray-2 hover-color-black text-small-1 formatDayCustom" data-type="short" data-format="{{$item->created_at}}">
                            <span>@if ($item->created_at != null)
                                {{$item->created_at->format('d-m-y')}}
                            @endif</span>
                        </div>
                    </div>
                    <div class="text-bl-1 limit-text-row-2 mb-2 mt-1">
                        <a href="{{ asset('bai-viet') }}/{{$item->slug}}" class="hover-pink">
                            {{$item->name}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
