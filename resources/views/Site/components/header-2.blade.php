<header>
    <div class="box-header">
        <div class="box-shadow-2 position-relative z-index-1 nav-fixed">
            <div class="container position-relative z-index-1 py-0">
                @include('Site.components.nav-box')
            </div>
        </div>

        <div class="owl-carousel owl-theme" id="header-slide">
            <?php
            $banner2=\Illuminate\Support\Facades\DB::table("banner")
                ->select("*")
                ->where('Anhien', App\Http\Controllers\Controller::BANNER_HIEN)
                ->get();
            ?>
            @foreach($banner2 as $banner2)
            <div class="item header-item">
                <div class="header-img" style="height: 500px">
                    <img src="{{ asset('Site/images') }}/{{$banner2->img}}"
                        class="imageHeader imageHeader_0 auto-scale-loop-forever" alt="">
                </div>

                <div class="content-1">
                    <div class="w-100 text-center">
                        @include('Site.components.breadcrumb')
                    </div>
                    <div class="text-center title-6 box-text-header">
                        {{ $namePage }}
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</header>
