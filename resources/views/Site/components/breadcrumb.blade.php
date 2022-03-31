<div class="fa-breadcrumb">
    <div class="container text-center">
        <div class="child-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center" style="
                background: none;
                padding: 0em 0em .4em 0em;">
                  <li class="breadcrumb-item"><a href="/trang-chu">Trang chủ</a></li>
                  @foreach ($breadcrumbArray as $breadcrumbItem)
                    @if ($breadcrumbItem['link'] == '')
                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumbItem['name'] }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ $breadcrumbItem['link'] }}">{{ $breadcrumbItem['name'] }}</a></li>
                    @endif


                  @endforeach

                </ol>
            </nav>

        </div>
    </div>
</div>
