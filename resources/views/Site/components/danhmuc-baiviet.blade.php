<div class="danhmuc">
    <div class="title-box-1">
        <span>Danh Mục</span>
    </div>


    </div>
    <div class="list-dm-blog list-danhmuc mt-4">
        @if (count($danhmuc) > 0 )
        @foreach ($danhmuc as $item)

            <div class="danhmuc-item" style="background: url('{{ asset('uploads/')}}/{{$item->img}}')">
                <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}" class="d-flex justify-content-between">
                    <span class="name">{{$item->name}}</span>
                </a>
            </div>

        @endforeach
            {{-- <a href="{{ asset('danh-muc-bai-viet') }}/{{$danhmuc[0]->slug}}">
                <button type="button" class="xemthemblog btn mb-5 mt-3" >Xem thêm danh mục</button>
            </a> --}}
        @endif

    </div>

</div>
