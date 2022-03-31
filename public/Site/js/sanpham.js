$('.child-item-sanpham').hover(function () {
        $(this).find('.btn-sanpham').css('opacity', 1);
    }, function () {
        $(this).find('.btn-sanpham').css('opacity', 0);
    }
);

$('.btn-add-wishlist').click(function (e) {
    e.preventDefault();
    let hasActive = $(this).hasClass('active');
    if (hasActive) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active');
    }
});

const imageSanPhamSlider = $('#slide-images-sanpham-2');
imageSanPhamSlider.owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout: 3000,
    autoplayHoverPause:true,
    navText: ['<div class="custom-nav-owl" aria-label="Previous"><i class="fas fa-angle-left"></i></div>','<div class="custom-nav-owl" aria-label="Next"><i class="fas fa-angle-right"></i>     </div>'],
    dotsContainer: '#custom-dots-1',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.custom-nav-owl').parent().parent().addClass('fa-custom-nav-owl');



$('.owl-dot').click(function () {
    imageSanPhamSlider.trigger('to.owl.carousel', [$(this).index(), 300]);
});

$('.btn-dungtich').click(function (e) {
    e.preventDefault();
    let dangActive = $(this).hasClass('active');
    if (!dangActive) {
        xuLiReplaceDataSanPham($(this));
    }
});

function xuLiReplaceDataSanPham(thisz) {
    let id = thisz.attr('data-id');
    let ml = thisz.attr('data-ml');
    let kho = thisz.attr('data-kho');
    let gia = thisz.attr('data-gia');
    let giamgia=thisz.attr('data-giamgia');
    let soluotmua = thisz.attr('data-soluotmua');
    let formatGia = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(gia) + ' đ';
    $('.giasanpham').html(formatGia.replaceAll(',', '.'));
    $('.tonkho').html(kho);
    $('.soluotmua').html(soluotmua);
    $('.dungtich-ml').html(ml + 'ml');
    $('.btn-dungtich').removeClass('active');
    $('#tonkho').val(kho);
    $('#idsanpham').val(id);
    if (giamgia !=null){
        $('.giamgiasanpham').html((Number(gia) - ((Number(gia)*(Number(giamgia)))/100)).toLocaleString().replaceAll(',', '.'))
    }
    thisz.addClass('active');
}

$('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-group').find('input');
    if (input.is('input')) {
      input[0][isNegative ? 'stepDown' : 'stepUp']()
    }
});

function loadMarginTop() {
    var typeColumn = $('.change-column-control.active').attr('type-column');
    var sanphamElement = $('.fa-sanpham-item');
    var soLuongSanPham = sanphamElement.length;
    sanphamElement.removeClass('mt-3');
    if (typeColumn == 'single') {
        for (var i = 0; i < soLuongSanPham; i++) {
            if (i > 0) {
                $(`[id-data-sanpham="${i}"]`).addClass('mt-3');
            }
        }
    } else {
        for (var i = 0; i < soLuongSanPham; i++) {
            if (i > 2) {
                $(`[id-data-sanpham="${i}"]`).addClass('mt-3');
            }
        }
    }
}

$('.change-column-control').click(function (e) {
    e.preventDefault();
    if (!$(this).hasClass('active')) {
        $('.change-column-control').removeClass('active');
        $(this).addClass('active');

        var typeColumn = $(this).attr('type-column');
        if (typeColumn == 'single') {
            if ($('.fa-sanpham-item').length > 1) {

            }
            $('.fa-sanpham-item').removeClass('col-xl-4 col-lg-6 col-md-6 col-12');
            $('.fa-sanpham-item').addClass('col-12');

            $('.fa-image-sanpham').removeClass('col-12');
            $('.fa-image-sanpham').addClass('col-3');

            $('.fa-content-sanpham').removeClass('col-xl-12');
            $('.fa-content-sanpham').addClass('col-9');
        } else {
            $('.fa-sanpham-item').removeClass('col-12');
            $('.fa-sanpham-item').addClass('col-xl-4 col-lg-6 col-md-6 col-12');

            $('.fa-image-sanpham').removeClass('col-3');
            $('.fa-image-sanpham').addClass('col-12');

            $('.fa-content-sanpham').removeClass('col-9');
            $('.fa-content-sanpham').addClass('col-xl-12');
        }
        loadMarginTop();
    }
});

function AddYeuThich(id) {
    $.ajax({
        url: domain + '/addyeuthichsp/' + id,
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {idsp: id},
        success: function (datayeuthich) {
            if (datayeuthich === 0) {
                $("#tym"+id).removeClass('active');
            }
            else if (datayeuthich === 2) {
                $("#tym"+id).addClass('active');
                $('#btn-modal-dangnhaps').click();
            }
            else {
                $("#tym"+id).addClass('active');
            }
        }
    });

}

$('.show-loc-mobile').click(function (e) {
    e.preventDefault();
    var elementBoLoc = $('.body-boloc-mobile');

    if (elementBoLoc.hasClass('show')) {
        elementBoLoc.removeClass('show');
        elementBoLoc.slideUp();
    } else {
        elementBoLoc.addClass('show');
        elementBoLoc.slideDown();
    }
    
});
