var w = window.innerWidth;
$('.modal-box-datlich').css('max-width', w);

$(window).resize(function() {
    let w = window.innerWidth;
    $('.modal-box-datlich').css('max-width', w);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#logo-slide').owlCarousel({
    loop: true,
    margin: 80,
    nav: false,
    pagination: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 20000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});

var productSlide = $('#product-home-slide');
productSlide.owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    pagination: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 50000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});

var dichVuUaChuong = $('#dich-home-slide');
dichVuUaChuong.owlCarousel({
    loop: true,
    margin: 70,
    nav: false,
    pagination: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 10000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        800: {
            items: 1
        },
        1150: {
            items: 2
        },
        1250: {
            items: 3
        }
    }
});

var dichVuGiamGiaSlide = $('#dichvugiamgia-home-slide');
dichVuGiamGiaSlide.owlCarousel({
    loop: true,
    margin: 70,
    nav: false,
    pagination: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 10000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        800: {
            items: 1
        },
        1150: {
            items: 2
        },
        1250: {
            items: 3
        }
    }
});

var headerSlide = $('#header-slide');
$('#header-slide').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'flipInX',
    loop: true,
    items: 1,
    smartSpeed: 450,
    dots: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: false,
    mouseDrag: false,
    touchDrag: false,
    pullDrag: false,
});

// Listen to owl events: auto-scale-loop-forever
headerSlide.on('changed.owl.carousel', function(event) {
    setTimeout(() => {
        $('.imageHeader').removeClass('auto-scale-loop-forever');
        var page = event.page.index;
        var elementImg = $('.imageHeader_' + page);
        $(elementImg).addClass('auto-scale-loop-forever');
    }, 800);

    headerSlide.trigger('stop.owl.autoplay');
    headerSlide.trigger('play.owl.autoplay');
});

// modal
$("body").on("click", ".btn-modal-main",function (e) {
    let typeModal = $(this).attr('type-modal');
    let modalAction = $('#' + typeModal);
    modalAction.removeAttr('class');
    modalAction.addClass('modal-container show');
    $('body').addClass('modal-active');
});

$("body").on("click", ".close-modal",function (e) {
    let typeModal = $(this).attr('type-modal');
    let modalAction = $('#' + typeModal);
    modalAction.addClass('out');
    $('body').removeClass('modal-active');
});

var modalDatLichSlide = $('#modal-datlich-slide');
$(modalDatLichSlide).owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    pagination: false,
    dots: false,
    autoplay: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


// slide dat lich
$("body").on("click", ".next-step",function (e) {
    e.preventDefault();
    nextStepFc();
});

$("body").on("click", ".prev-step",function (e) {
    e.preventDefault();
    activeStep = getActiveStep();
    nextStep = parseInt(activeStep) - 1;

    checkStepAndCallAction();
});

function nextStepFc() {
    activeStep = getActiveStep();
    nextStep = parseInt(activeStep) + 1;
    checkStepAndCallAction();
}

function getActiveStep() {
    var stepActive = $('.datlich-step.active');
    var step = $(stepActive).attr('data-step');
    return step;
}

function actionMoveSlide(activeStep, nextStep, tranlateRange) {
    var movingBox = $('.modal-content-1');
    $(movingBox).css('transform', 'translateX(-' + tranlateRange + '%)');


    var activeElement = $("[data-step='" + activeStep + "']");
    var nextElement = $("[data-step='" + nextStep + "']");
    activeElement.removeClass('active');
    nextElement.addClass('active');
}


function checkStepAndCallAction() {
    var checkMove = true;
    if (activeStep == step_1) {
        phoneNumber = $('#phoneNumber').val();
        idCoSo = $('.value-coso').attr('data-coso');
        nameKhachHang = $('.nameKhachHang').val();
        ngaySelected = $('.value-date').attr('data-date');
        var error = firstPageModalValidCheck(phoneNumber, idCoSo, nameKhachHang);
        if (error) {
            checkMove = false;
            controlShortOne.removeClass('done');
        } else {
            // Load nhân viên và khung giờ của cơ sở được chọn
            soXuLiBatDongBo = 2;
            spinnerBatDongBo();
            controlShortOne.addClass('done');
            getNhanVienByIdCoSo(idCoSo);
            loadGio(ngaySelected, nhanVienSelected);
        }
    }

    if (activeStep == step_2) {
        var checkBoxTuVan = $('.checkbox-tuvan');
        if (checkBoxTuVan.prop('checked')) {
            let idNhanVienKhiKhachChonTuVan = 0;
            nhanVienSelected = idNhanVienKhiKhachChonTuVan;
            $('.select-nhanvien').hide();
        } else {
            $('.select-nhanvien').show();
        }

        var error = seccondPageModalCheck();
        if (error) {
            checkMove = false;
            controlShortTwo.removeClass('done');
        } else {
            controlShortTwo.addClass('done');
        }
        if (checkMove) {
            moveStep();
        }
    }

    if (activeStep == step_3) {
        // timeSelected
        var error = pageModalCheckThree();
        if (error) {
            checkMove = false;
            controlShortThree.removeClass('done');
        } else {
            controlShortThree.addClass('done');
        }
        if (checkMove) {
            moveStep();
        }
    }

    if (nextStep == step_4) {
        timeSelected = $('.option-time.clicked').children().attr('data-option-time');
        var error = lastPageModalCheck(idCoSo, phoneNumber, timeSelected, dichVuChecked);
        showDuLieuDatLich();
        if (error) {
            checkMove = false;
            controlShortFour.removeClass('done');
        } else {
            // Load nhân viên và khung giờ của cơ sở được chọn
            controlShortFour.addClass('done');
        }

        if (checkMove) {
            moveStep();
        }
    }

    if (activeStep > nextStep) {
        moveStep();
    }
}

function lastPageModalCheck(idCoSo, phoneNumber, timeSelected, dichVuChecked) {
    var error = false;
    $('.form-phone-number').removeClass(classError);
    $('.select-coso').removeClass(classError);
    $('.select-dichvu').removeClass(classError);
    $('.select-time').removeClass(classError);

    if (phoneNumber == '') {
        error = true;
        $('.form-phone-number').addClass(classError);
    }

    if (parseInt(idCoSo) == 0) {
        error = true;
        $('.select-coso').addClass(classError);
    }

    var checkBoxTuVan = $('.checkbox-tuvan');
    if (!checkBoxTuVan.prop('checked') == true && !dichVuChecked.length > 0) {
        $('.select-dichvu').addClass(classError);
        error = true;
    }

    if (timeSelected == null) {
        $('.select-time').addClass(classError);
        error = true;
    }

    return error;
}

function pageModalCheckThree() {
    var error = false;
    $('.select-time').removeClass(classError);
    $('.time-datlich-error').html('');

    if (!timeSelected > 0) {
        $('.time-datlich-error').html('Bạn chưa chọn khung giờ đến !');
        $('.select-time').addClass(classError);
        error = true;
    }

    return error;
}

function moveStep() {
    if (nextStep < maxStep + 1 && nextStep > -1) {
        var tranlatexRangeZ = nextStep * tranlatexRange;
        actionMoveSlide(activeStep, nextStep, tranlatexRangeZ);
    }
}

function spinnerBatDongBo() {
    if (soXuLiBatDongBo > 0) {
        var boxSpinner = $('.box-spinner');
        if (!boxSpinner.hasClass('show')) {
            spinnerTurnOn();
        }
    } else {
        spinnerTurnOff();
        if (activeStep == 0) {
            moveStep();
        }
    }
}

function seccondPageModalCheck() {
    var error = false;
    $('.select-dichvu').removeClass(classError);
    $('.dichvu-datlich-error').html('');
    var checkBoxTuVan = $('.checkbox-tuvan');
    if (!checkBoxTuVan.prop('checked') == true && !dichVuChecked.length > 0) {
        $('.select-dichvu').addClass(classError);
        $('.dichvu-datlich-error').html('Bạn chưa chọn dịch vụ !');
        error = true;
    }

    return error;
}

function firstPageModalValidCheck(phone, coSo, nameKhachHang) {
    var error = false;

    $('.form-phone-number').removeClass(classError);
    $('.select-coso').removeClass(classError);
    $('.form-name-khachhang').removeClass(classError);

    $('.phone-datlich-error').html('');
    $('.name-datlich-error').html('');
    $('.coso-datlich-error').html('');

    if (nameKhachHang.length == 0) {
        error = true;
        $('.name-datlich-error').html('Tên của bạn không được để trống !');
        $('.form-name-khachhang').addClass(classError);
    } else if (nameKhachHang.length < 4 || nameKhachHang.length > 55) {
        error = true;
        $('.name-datlich-error').html('Tên phải từ 4 - 55 ký tự');
        $('.form-name-khachhang').addClass(classError);
    }

    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    if (phone !== '') {
        if (vnf_regex.test(phone) == false) {
            error = true;
            $('.phone-datlich-error').html('Số điện thoại của bạn không đúng định dạng !');
            $('.form-phone-number').addClass(classError);
        }
    } else {
        error = true;
        $('.phone-datlich-error').html('Bạn chưa điền số điện thoại !');
        $('.form-phone-number').addClass(classError);
    }

    if (parseInt(coSo) == 0) {
        error = true;
        $('.coso-datlich-error').html('Bạn chưa chọn cơ sở !');
        $('.select-coso').addClass(classError);
    }

    return error;
}

var dichVuChecked = [];
var arrIdDichVu = [];

$(document).on("change", ".option-dich-vu", function () {
    calTotal();
});

function calTotal() {
    var checkBoxTuVan = $('.checkbox-tuvan');
    if (!checkBoxTuVan.prop('checked')) {
        tinhTongVaPushArrayIdDichVu();
    } else {
        checkBoxDichVu.prop('checked', false);
    }
}

function tinhTongVaPushArrayIdDichVu() {
    dichVuChecked = [];
    arrIdDichVu = [];
    totalPriceDichVu = 0;
    $('input[name="dichvu"]').each(function() {
        var idDichVu = $(this).attr('data-id');
        idDichVu = parseInt(idDichVu);
        var gia = $(this).val();
        var name = $(this).attr('data-name');
        if (this.checked) {
            totalPriceDichVu += parseInt($(this).val());

            var dt = {
                'id': idDichVu,
                'ten': name,
                'gia': gia,
            }
            dichVuChecked.push(dt);
            arrIdDichVu.push(idDichVu);
        }
    });

    inTotalToBrowser(totalPriceDichVu);
}

function inTotalToBrowser(totalPriceDichVu) {
    var totalFormat = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(totalPriceDichVu) + 'đ';
    $('.tongtiendichvu').attr('data-tongtien', totalPriceDichVu);
    $('.tongtiendichvu').html(totalFormat);
}

$("body").on("click", ".name-select",function (e) {
    e.preventDefault();

    var dataMove = $(this).attr('data-mov');
    var elementMove = $("[slide-mov='" + dataMove + "']");
    var checkShow = $(this).hasClass('show');
    if (checkShow) {
        elementMove.slideUp(timeMoving);
        $(this).removeClass('show');
    } else {
        elementMove.slideDown(timeMoving);
        $(this).addClass('show');
    }
});

$("body").on("click", ".pickcoso",function (e) {
    e.preventDefault();
    var text = $(this).children().text();
    var idCoSo = $(this).children().attr(attrOptionCoSo);
    elementValueCoSo = $('.value-coso');
    elementValueCoSo.html(text);
    elementValueCoSo.attr(attrValueCoSo, idCoSo);
    $('.coso-fa').removeClass('clicked');
    $(this).addClass('clicked');
});

$("body").on("click", ".check-next-step",function (e) {
    e.preventDefault();
    // $('.box-spinner').fadeIn(timeMoving, function() {
    //     setTimeout(() => {
    //         $('.box-spinner').fadeOut(timeMoving);
    //     }, 500);
    // });
    // var demoS = (timeMoving * 2) + 550;
    // setTimeout(() => {

    // }, demoS);
    nextStepFc();
});

$("body").on("click", ".control-item",function (e) {
    e.preventDefault();
    nextStep = $(this).attr('data-step');
    activeStep = getActiveStep();
    checkStepAndCallAction();
});

function spinnerTurnOn() {
    var boxSpinner = $('.box-spinner');
    boxSpinner.fadeIn(50);
    boxSpinner.addClass('show');
}

function spinnerTurnOff() {
    var boxSpinner = $('.box-spinner');
    boxSpinner.fadeOut(timeMoving);
    boxSpinner.removeClass('show');
}

var oldDichVuChecked;
var checkBoxDichVu = $('.checkbox-dichvu');

$(document).on("change", ".uncheck-dich-vu", function () {
    uncheckDichVu();
});

function uncheckDichVu() {
    checkBoxTuVan = $('.checkbox-tuvan');
    checkBoxDichVu = $('.checkbox-dichvu');

    if (checkBoxTuVan.prop('checked')) {
        checkBoxDichVu.prop('checked', false);
        tinhTongVaPushArrayIdDichVu();
    }
}

formatDayCustom();
function formatDayCustom() {
    var listElementDate = $(".formatDayCustom");
    listElementDate.each( function(i){
        var dataFormat = listElementDate.eq(i).attr('data-format');
        var type =  listElementDate.eq(i).attr('data-type');
        var someDay  = moment(dataFormat);
        var numberThu = someDay.day();
        if (type == 'long') {
            var dayInWeek = getFullThuVietHoa(numberThu);
            var date = someDay.format('DD/MM/YYYY, HH:mm');
            var dayWasFormat = dayInWeek + ', ' + date + ' (GMT+7)';
        }

        if (type == 'short') {
            var dayInWeek = getThuVietHoa(numberThu);
            var date = someDay.format('DD/MM/YYYY, HH:mm');
            var dayWasFormat = dayInWeek + ', ' + date;
        }
        listElementDate.eq(i).html(dayWasFormat);
    });


    // return YMDHIS;
}


function getThuVietHoa(numberThu) {
    var text = '';

    if (numberThu == 0) {
        text = 'CN';
    } else if (numberThu == 1) {
        text = 'T2';
    } else if (numberThu == 2) {
        text = 'T3';
    } else if (numberThu == 3) {
        text = 'T4';
    } else if (numberThu == 4) {
        text = 'T5';
    } else if (numberThu == 5) {
        text = 'T6';
    } else if (numberThu == 6) {
        text = 'T7';
    }

    return text;
}

function getFullThuVietHoa(numberThu) {
    var text = '';

    if (numberThu == 0) {
        text = 'Chủ nhật';
    } else if (numberThu == 1) {
        text = 'Thứ hai';
    } else if (numberThu == 2) {
        text = 'Thứ ba';
    } else if (numberThu == 3) {
        text = 'Thứ tư';
    } else if (numberThu == 4) {
        text = 'Thứ năm';
    } else if (numberThu == 5) {
        text = 'Thứ sáu';
    } else if (numberThu == 6) {
        text = 'Thứ bảy';
    }

    return text;
}

