$('.pttt').click(function (e) {
    e.preventDefault();
    let idpttt = $(this).attr('data-pttt');
    let text = $(this).html();
    $('.btn-pttt').html(text);
    $('.btn-pttt').attr('id-pttt', idpttt);
    $('.pttt').removeClass('active');
    $(this).addClass('active');
    setTimeout(() => {
        $('#phuongthucthanhtoan').modal('toggle');
    }, 100);

});

$('.ptgh').click(function (e) {
    e.preventDefault();
    let idptgh = $(this).attr('data-ptgh');
    let text = $(this).html();
    $('.btn-ptgh').html(text);
    $('.btn-ptgh').attr('id-ptgh', idptgh);
    $('.ptgh').removeClass('active');
    $(this).addClass('active');
    setTimeout(() => {
        $('#phuongthucgiaohang').modal('toggle');
    }, 100);

});

function thanhtoanVNPAY(bien) {
    if (bien == 'VNPAY') {
        $('#collapseExample123').addClass('show');
        var tongthanhtoan = document.getElementById('tongthanhtoan').innerText.split('.').join('');
        $('#amount').val(tongthanhtoan);
        $('#valthanhtoan').val('VNPAY');
        $('#create_form').attr('action', domain + '/vnpay_php/vnpay_create_payment');
    } else {
        $('#collapseExample123').removeClass('show');
        $('#valthanhtoan').val('KNH');
        $('#create_form').attr('action', domain + '/thanh-toan-don-hang');
    }
}

function ApplyGiamGia() {
    var idgiamgia = $("#idgiam").val();
    if (idgiamgia == "") {
        var magiamgia = $("#magiamgia").val();
        var tongthanhtoan = document.getElementById('tongthanhtoan').innerText.split('.').join('');
        if (magiamgia != "") {
            $.ajax({
                url: domain + '/CheckGiamGia/' + magiamgia + '/tongthangtoan/' + tongthanhtoan,
                type: 'GET',
                async: false,
                dataType: 'json',
                data: {},
                success: function (data) {
                    if (data == 0) {
                        iziToast.warning({
                            title: 'Mã giảm giá không hợp lệ!!!',
                            message: '',
                            position: 'bottomRight',
                            backgroundColor: 'oranged',
                            titleColor: 'black',
                            messageColor: 'black',
                            iconColor: 'black',
                        });
                    } else {
                        //loại 1 là %
                        //loại 2 là tiền
                        iziToast.success({
                            title: 'Áp dụng thành công !!!',
                            message: '',
                            position: 'bottomRight',
                            backgroundColor: 'green',
                            titleColor: 'white',
                            messageColor: 'white',
                            iconColor: 'white',
                        });
                        if (data[0].loai == 1) {
                            var tiensaugiam = (Number(tongthanhtoan) - ((Number(tongthanhtoan) * Number(data[0].number)) / 100));
                            LuuSessionGiamGia(((Number(tongthanhtoan) * Number(data[0].number)) / 100));
                            $('#amount').val(tiensaugiam);
                            $('#tongtiensaugiam').html(Number(data[0].number).toLocaleString().replaceAll(",", ".") + '% <span class="btn btn-dark" onclick="HuyGiamGia()">Hủy</span>');
                            $('#tongthanhtoan').html(tiensaugiam.toLocaleString().replaceAll(",", "."));
                        } else {
                            var tiensaugiam = Number(tongthanhtoan) - Number(data[0].number);
                            LuuSessionGiamGia(Number(data[0].number));
                            $('#amount').val(tiensaugiam);
                            $('#tongtiensaugiam').html(Number(data[0].number).toLocaleString().replaceAll(",", ".") + 'đ <span class="btn btn-dark" onclick="HuyGiamGia()">Hủy</span>');
                            $('#tongthanhtoan').html(tiensaugiam.toLocaleString().replaceAll(",", "."));
                        }
                        $("#idgiam").val(data[0].id)
                    }
                }
            });
        }
    }
}

function HuyGiamGia() {
    if (window.location == domain+'/thanh-toan') {
        $('#tongtiensaugiam').html(0);
        $("#idgiam").val("");
        $("#magiamgia").val("");
        showGioHang();
        LuuSessionGiamGia(0)
    }
}

function phuongthucgiaohang(bien) {
    $("#valgiaohang").val(bien);
}

function LuuSessionGiamGia(giam) {
    $.ajax({
        url: domain + '/capnhatgiamgiasession/' + giam,
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {id: giam},
        success: function (data) {
        }
    });
}

LuuSessionGiamGia(0);


