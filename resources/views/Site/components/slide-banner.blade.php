<div class="owl-carousel owl-theme" id="header-slide">
    @foreach ($listBanner as $banner)
    <div class="item header-item">
        <div class="header-img">
            <img src="{{ asset('Site/images') }}/{{ $banner->img }}"
                class="imageHeader imageHeader_{{ $loop->index }} @if ($loop->index == 0) auto-scale-loop-forever @endif " alt="">
        </div>

        <div class="content-1 ">
            <div class="w-100 text-center title-small-1">
                {{ $banner->tieude }}
            </div>

            <div class="text-center title-2 box-text-header  mt-3">
                {{ $banner->noidung }}
            </div>

            <div class="w-100 text-center mt-4">
                <button class="button btn-2 btn-modal-main" type-modal="modal-datlich" data-show="one">
                    ĐẶT LỊCH
                </button>
            </div>

        </div>

    </div>
    @endforeach

</div>
