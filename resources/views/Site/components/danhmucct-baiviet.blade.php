<div class="danhmuc">
    <div class="title-box-1">
        <span>Danh Mục</span>
    </div>


    </div>
    <div class="list-dm-blog list-danhmuc mt-4">
        @if (count($danhmucct) > 0 )
        @foreach ($danhmucct as $item)
            <div class="danhmuc-item" style="background: url('{{ asset('uploads/')}}/{{$item->img}}')">
                <a href="{{ asset('danh-muc-bai-viet') }}/{{$item->slug}}" class="d-flex justify-content-between">
                    <span class="name">{{$item->name}}</span>
                </a>
            </div>
        @endforeach
        @endif

    </div>

</div>
