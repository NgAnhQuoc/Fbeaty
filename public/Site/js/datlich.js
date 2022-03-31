function getNhanVienByIdCoSo(idCoSo) {
    $.ajax({
        async: true,
        type: "GET",
        url: getNhanVienByIdCoSoUrl + idCoSo,
        success: function (respon) {
            if (respon.success == true) {
                var html = getListHTMLNhanVien(respon.listNhanVien);
                $('.option-dong').remove();
                var elementListNhanVien = $('.list-nhanvien');
                elementListNhanVien.append(html);
                soXuLiBatDongBo--;
                spinnerBatDongBo();
            }
        },
        error: function () {
            alert('Lỗi khi lấy nhân viên bằng id cơ sở');
        }
    });
}

function getListHTMLNhanVien(data) {
    var html = ``;
    data.forEach(nhanVien => {
        html += boxHTMLNhanVien(nhanVien);
    });

    return html;
}

$("body").on("click", ".time-close",function (e) {
    Swal.fire({
        title: 'Khung Giờ Đã Đóng',
        icon: 'warning',
        text: 'Hãy chọn khung giờ khác bạn nhé !',
        confirmButtonText: 'Xác nhận',
    })
});

function boxHTMLNhanVien(nhanVien) {
    if (nhanVien.avatar == '') {
        var imgUrl = 'avatar-default.png';
    } else {
        var imgUrl = nhanVien.avatar;
    }

    if (nhanVien.trangthai == trangThaiNhanVienHoatDong) {
        var disClass = '';
    } else {
        var disClass = 'disabled';
    }

    var html = `
    <div class="option-item option-nhanvien date-bg option-dong ${disClass}">
        <div class="picknhanvien position-relative z-index-999" data-imgurl="${imgUrl}" data-name-nhanvien="${nhanVien.name}" data-option-nhanvien="${nhanVien.id}">
            <div class="img-1 border-image">
                <img src="${rootUrlUploadImage}${imgUrl}" class="cycle-img-1" alt="">
            </div>

            <div class="name-nhanvien">
                ${nhanVien.name}
            </div>
        </div>
    </div>
    `;

    return html;
}

loadNgayDatLich();
function loadNgayDatLich() {
    var htmlDate = ``;
    for (let i = 0; i < 7; i++) {
        var someDay  = moment().add(i, 'days');
        var numberThu = someDay.day();
        var textThuTrongTuan = getThuVietHoa(numberThu);
        var dateWasFormat = moment(someDay).format('DD/MM/YYYY');
        var ngayThang =  moment(someDay).format('DD/MM');
        var textOnBrowser = getTextDateOnBrowser(i, ngayThang, textThuTrongTuan);
        htmlDate += rowHTMLDate(dateWasFormat, textOnBrowser, numberThu);
        if (i == 0) {
            $('.value-date').html(textOnBrowser);
            $('.value-date').attr('data-date', dateWasFormat);
        }
    }
    $('.list-option-lich').append(htmlDate);
}

function rowHTMLDate(dateWasFormat, textOnBrowser, numberThu) {
    let html =
    `
    <div class="option-item date-bg date-click ${todayDMY==dateWasFormat ? 'clicked' : ''}">
        <div class="pickdate" data-option-date="${dateWasFormat}">${textOnBrowser}</div> `;
            if (numberThu > 0 && numberThu < 6) {
                html += `<div class="card-custom-small normal">Ngày thường</div>`;
            } else {
                html += `<div class="card-custom-small special">Cuối tuần</div>`;
            }

            html += ` </div>`;

    return html;
}

function getTextDateOnBrowser(index, ngayThang, thuTrongTuan) {
    var text = '';
    if (index == 0) {
        text = `Hôm nay, ${thuTrongTuan} (${ngayThang})`;
    }
    else if (index == 1) {
        text = `Ngày mai, ${thuTrongTuan} (${ngayThang})`;

    }
    else if (index == 2) {
        text = `Ngày mốt, ${thuTrongTuan} (${ngayThang})`;
    }
    else {
        text = `${thuTrongTuan} (${ngayThang})`;
    }

    return text;
}

function loadGio(ngay, idNhanVien) {
    if (ngay == null) {
        ngay = moment();
    } else {
        ngay = moment(ngay, 'DD/MM/YYYY', true);
    }
    var ngayWasFormat = moment(ngay).format('YYYY-MM-DD');
    var numberThu = ngay.day();

    $.ajax({
        async: true,
        type: "GET",
        url: getGioTheoThuUrl,
        data: {
            'ngay': ngayWasFormat,
            'thu': numberThu,
            'idCoSo': parseInt(idCoSo),
            'idNhanVien': idNhanVien
        },
        success: function (respon) {
            khungGio = respon;
            if (respon.success == true) {
                var html = loopGetHTMLKhungGio(respon.lich, respon.ngay);
                $('.list-option-khunggio .option-item').remove();
                $('.list-option-khunggio').append(html);
                elementValueTime.html('Chọn giờ đến');
                elementValueTime.attr(attrValueTime, '');
            } else {
                alert('Error!</br> ' + respon.textMess);
            }

            soXuLiBatDongBo--;
            spinnerBatDongBo();
        },
        error: function () {
            alert('Lỗi khi lấy data khung giờ');
        }
    });
}

function rowHTMLGio(rowLich, ngay) {
    var quaGio = false;
    if (ngay == todayYMD) {
        if (rowLich.gio < gioiHanDatLich) {
            quaGio = true;
        }
    }

    var html = ``;
    if (rowLich.coNhanVien == 'false' || rowLich.soKhachDaDat >= rowLich.soluongkhach || quaGio == true || !rowLich.trangthai == trangThaiLichSanSang) {
        html += `
            <div class="option-item time-bg time-close" fa-data-id-lich="${rowLich.id}">
                <div class="picktime" data-option-time="${rowLich.gio}">${rowLich.gio}</div>
            </div>
        `
    } else {
        html += `
            <div class="option-item option-time time-bg" fa-data-id-lich="${rowLich.id}">
                <div class="picktime" data-option-time="${rowLich.gio}">${rowLich.gio}</div>
            </div>
        `
    }

    return html;
}

function loopGetHTMLKhungGio(dataLich, ngay) {
    var html = ``;
    dataLich.forEach(rowLich => {
        html += rowHTMLGio(rowLich, ngay);
    });
    return html;
}

$("body").on("click", ".date-click",function (e) {
    e.preventDefault();
    var text = $(this).children('div.pickdate').text();
    var valDate = $(this).children('div.pickdate').attr(attrOptionDate);

    var elementValueDate = $('.value-date');
    elementValueDate.html(text);
    elementValueDate.attr(attrValueDate, valDate);

    $('.date-click').removeClass('clicked');
    $(this).addClass('clicked');

    timeSelected = '';
    soXuLiBatDongBo = 1;
    spinnerBatDongBo();
    ngaySelected = valDate;
    loadGio(ngaySelected, nhanVienSelected);
});

$(document).on('click', ".option-nhanvien", function() {
    if (!$(this).hasClass('disabled')) {
        var thisChild = $(this).children();
        var text = thisChild.children('.' + classGetTextNhanVien).text();
        nhanVienSelected = thisChild.attr(attrOptionNhanVien);
        nameNhanVien = thisChild.attr('data-name-nhanvien');
        imgUrlNhanVien = thisChild.attr('data-imgurl');
        objectNhanVienSelected = {
            'id': nhanVienSelected,
            'ten': nameNhanVien,
            'imgUrl': imgUrlNhanVien
        };
        elementValueNhanVien.html(text);
        elementValueNhanVien.attr(attrValueNhanVien, nhanVienSelected);
        $('.option-nhanvien').removeClass('clicked');
        timeSelected = '';
        $(this).addClass('clicked');
        soXuLiBatDongBo = 1;
        spinnerBatDongBo();
        loadGio(ngaySelected, nhanVienSelected);
    } else {
        Swal.fire({
            title: 'Chuyên Viên Bận',
            icon: 'warning',
            text: 'Chuyên viên bạn chọn đang bận. Hãy chọn chuyên viên khác bạn nhé !',
            confirmButtonText: 'Xác nhận',
        });
    }
});

$(document).on('click', ".option-time", function() {
    var checkClose = $(this).hasClass('time-close');

    if (checkClose == false) {
        var text = $(this).children().text();
        timeSelected = $(this).children().attr(attrOptionTime);
        elementValueTime.html(text);
        elementValueTime.attr(attrValueTime, timeSelected);

        $('.time-bg').removeClass('clicked');
        $(this).addClass('clicked');
    }
});

function showDuLieuDatLich() {
    $('.check-phone').html(phoneNumber);
    $('.check-ngay').html(ngaySelected);
    $('.check-gio').html(timeSelected);

    $('.check-coso').html($('.value-coso').html());
    var listDichVuHTML = loopDichVuSelected();
    var listDichVuElement = $('.list-dichvu-selected');
    listDichVuElement.children().remove();
    listDichVuElement.append(listDichVuHTML);

    var nhanVienHTML = rowNhanVienPage4();
    var nhanVienElement = $('.check-nhanvien');
    nhanVienElement.children().remove();
    nhanVienElement.append(nhanVienHTML);
}

function loopDichVuSelected() {
    var html = ``;
    dichVuChecked.forEach(element => {
        html += rowDichVuSelected(element);
    });
    return html
}

function rowDichVuSelected(dichVu) {
    var giaFormat = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(dichVu.gia) + 'đ';
    var html =
    `
    <div class="row align-items-center">
        <div class="col-xl-9 body-table-item">
            <div class="name-dichvu">
                ${dichVu.ten}
            </div>
        </div>
        <div class="col-xl-3 body-table-item">
            <div class="gia-dichvu">
                ${giaFormat}
            </div>
        </div>
    </div>
    `;

    return html;
}

function rowNhanVienPage4() {
    var html =
    `
        <div class="img-1" style="width: 19%;">
            <img src="${rootUrlUploadImage}${objectNhanVienSelected.imgUrl}" alt="">
        </div>
        <div class="">
            ${objectNhanVienSelected.ten}
        </div>
    `;

    return html;
}

var loaddingDatLich = false;
function datLich() {
    Swal.fire({
        title: 'Kiểm tra thông tin?',
        icon: 'info',
        text: 'Bạn hãy kiểm tra đúng thông tin trước khi đặt nhé',
        showDenyButton: false,
        showCancelButton: true,
        cancelButtonText: 'Xem lại',
        confirmButtonText: 'Xác nhận',
    }).then((result) => {
        if (result.isConfirmed) {
            // Send Request
            if (loaddingDatLich == false) {
                if (arrIdDichVu.length == 0) {
                    arrIdDichVu = [0];
                }
                loaddingDatLich = true;

                let _token   = $('meta[name="csrf-token"]').attr('content');
                let ngayGioSelected = ngaySelected + ' ' + timeSelected;
                let thoiGianDat = moment(ngayGioSelected, 'DD/MM/YYYY HH:mm:ss', true).unix();
                let ngaySelectedYMD = moment(ngaySelected, 'DD/MM/YYYY', true).format('YYYY-MM-DD');

                let data = {
                    idCoSo: idCoSo,
                    listDichVu: JSON.stringify(arrIdDichVu),
                    idNhanVien: nhanVienSelected,
                    nameKhachHang: nameKhachHang,
                    ngay: ngaySelectedYMD,
                    gio: timeSelected,
                    soDienThoai: phoneNumber,
                    thoiGianDat: thoiGianDat,
                    _token: _token,
                }

                showLoading();
                $.ajax({
                    type: "POST",
                    url: postDatLichUrl,
                    data: data,
                    success: function (respon) {
                        loaddingDatLich = false;
                        if (respon.success == true) {
                            swal.fire({
                                icon: 'success',
                                title: 'Đặt lịch thành công !',
                                text: 'FBeauty spa xin cảm ơn bạn',
                                showDenyButton: true,
                                denyButtonText: 'Hủy lịch',
                                confirmButtonText: 'Ok',
                            }).then((resul) => {
                                if (resul.isDenied) {
                                    if ($('.thong-tin-user').length > 0) {
                                        // Đã login
                                        // Get đường dẫn hiện tại
                                        var currentUrl = window.location.href;
                                        var currentRoute = currentUrl.substring(serverNameUrl.length, currentUrl.length);

                                        if (currentRoute != 'thong-tin-tai-khoan') {
                                            window.location.href = linkThongTinUser;
                                        }
                                    } else {
                                        $('#btn-modal-dangnhaps').click();
                                    }
                                }

                                resetModal();
                            });
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: respon.titleMess,
                                text: respon.textMess,
                                confirmButtonText: 'Thử lại',
                            });
                        }
                    },
                    error: function () {
                        swal.fire({
                            icon: 'error',
                            title: 'Đã xảy ra lỗi',
                            text: 'Gửi dữ liệu không thành công',
                            confirmButtonText: 'Thử lại',
                        });
                    }
                });
            }
        }
    });
}

$("body").on("click", ".dat-lich",function (e) {
    e.preventDefault();
    datLich();
});

var sweet_loader = `<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>`;

var showLoading = function () {
    Swal.fire({
        title: 'Tiến hành đặt lịch !',
        html: '<div>Vui lòng chờ trong giây lát </div>',
        willOpen: () => {
            Swal.showLoading()
        },
        showConfirmButton: false,
    });
}

function resetModal() {
    var buttonCloseModalDatLich = $('[type-modal="modal-datlich"]');
    buttonCloseModalDatLich.click();
    var modalHTML = HTMLModalDatLich();
    var noiDungModalElement = $('.noidung-modal-datlich');
    noiDungModalElement.children().remove();
    noiDungModalElement.append(modalHTML);
    loadNgayDatLich();
    nhanVienSelected = 0;
    objectNhanVienSelected = {
        'id': 0,
        'ten': 'Spa chọn chuyên viên giúp bạn',
        'imgUrl': 'chuyenvienspa.png'
    };

    // Set lại data vừa remove
    controlShortOne = $('[data-step=0]');
    controlShortTwo = $('[data-step=1]');
    controlShortThree = $('[data-step=2]');
    controlShortFour = $('[data-step=3]');
}

function checkKhungGio(objectDatLich) {
    if (khungGio != null && idCoSo == objectDatLich.idcoso) {
        let ngayDatYMD = moment.unix(objectDatLich.thoiGianDat).format("YYYY-MM-DD");
        if (ngayDatYMD == khungGio.ngay) {
            timViTriVaClose(khungGio, objectDatLich);
        }
    }
}

function timViTriVaClose(khungGio, objectDatLich) {
    let thoiGianDatHMS = moment.unix(objectDatLich.thoiGianDat).format("HH:mm:ss");
    let arrLich = khungGio.lich;

    arrLich.forEach(lichItem => {
        if (thoiGianDatHMS == lichItem.gio) {
            lichItem.soKhachDaDat++;
            if (lichItem.soKhachDaDat >= lichItem.soluongkhach) {
                checkVaCloseLich(lichItem.id);
            }

            if (nhanVienSelected == objectDatLich.idnhanvien) {
                checkVaCloseLich(lichItem.id);
            }
        }
    });
}

function checkVaCloseLich(idLich) {
    let elementLich = $("[fa-data-id-lich='"+idLich+"']");
    let hasClose = elementLich.hasClass('time-close');
    if (hasClose == false) {
        elementLich.addClass('time-close');
        elementLich.removeClass('option-time');
    }
}

function checkTimeStatus(lich) {
    if ($(`[fa-data-id-lich=${lich.id}]`).length > 0) {
        if (lich.trangthai == 0) {
            // open
            $(`[fa-data-id-lich=${lich.id}]`).removeClass('time-close');
            $(`[fa-data-id-lich=${lich.id}]`).addClass('option-time');
        } else {
            $(`[fa-data-id-lich=${lich.id}]`).addClass('time-close');
            $(`[fa-data-id-lich=${lich.id}]`).removeClass('option-time');
        }
    }
}

function HTMLModalDatLich() {
    var html =
    `
    <div class="modal-content-1 h-100">
        <div class="datlich-step h-100 active" data-step="0">
            <div class="child-datlich-step">
                <div class="close close-modal button-close-modal" type-modal="modal-datlich">
                    x
                </div>
                <div class="box-spinner">
                    <div class="child-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="title-3 color-main uppercase">Nhập SĐT & Chọn cơ sở</div>
                <div class="text-10">Nếu bạn chưa biết chọn dịch vụ nào hãy chọn ‘’Tôi muốn tư vấn’’ </div>
                <div class="list-select position-relative">
                    <form action="">
                        <div class="w-100">
                            <div class="fa-custom form-custom-datlich form-name-khachhang mr-2">
                                <div class="div-phone-number">
                                    <input type="text" id="name" class="nameKhachHang" placeholder="Tên của bạn"`;
                                    if ($('.thong-tin-user').length > 0 && khachHangLogin.name != null) {
                                        html += `value="${ khachHangLogin.name }"`;
                                    }

                                    html += `>

                                </div>
                            </div>
                            <span class="text-error name-datlich-error"></span>
                        </div>
                        <div class="w-100">
                            <div class="fa-custom form-custom-datlich form-phone-number">
                                <div class="div-phone-number">
                                    <input type="number" id="phoneNumber" placeholder="Nhập số điện thoại của bạn"`;
                                    if ($('.thong-tin-user').length > 0) {
                                        html += `value="${ khachHangLogin.sdt }"`;
                                    }
                                    html += `>
                                </div>
                            </div>
                            <span class="text-error phone-datlich-error"></span>
                        </div>
                    </form>

                    <div class="w-100">
                        <div class="select-custom fa-custom select-coso">
                            <div class="select-fa">
                                <div class="name-select d-flex align-items-center" data-mov="13">
                                    <div class="tendanhmuc value-coso limit-text-row-1" data-coso="0">
                                        Chọn cơ sở
                                    </div>
                                    <div class="icon-1">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="list-option coso-fa" slide-mov="13">`;
                                    var arrCoSo = Object.values(listCoSo)
                                    arrCoSo.forEach(coSo => {
                                        html += `
                                        <div class="option-item coso-fa date-bg pickcoso d-block">
                                            <div class="position-relative z-index-999 pickcoso-children d-flex" data-option-coso="${coSo.id}">
                                                <div class="d-inline-block" style="width: 11%;">
                                                    ${ coSo.name }:
                                                </div>
                                                <div class="d-inline-block">
                                                    ${ coSo.diachi }
                                                </div>
                                            </div>
                                        </div>
                                        `;
                                    });
                                    html += `
                                </div>
                            </div>
                        </div>
                        <span class="text-error coso-datlich-error"></span>
                    </div>

                </div>

                <div class="control-slide-datlich d-flex justify-content-between">
                    <button type="button" class="button-href-basic close-modal" type-modal="modal-datlich"><i class="fas fa-caret-left"></i> Thoát ra</button>
                    <div class="control-short">
                        <div class="control-item active" data-step="0">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="1">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="2">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item final" data-step="3">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                    </div>
                    <button type="button" class="button-href-basic check-next-step">Tiếp theo <i class="fas fa-caret-right"></i></button>
                </div>
            </div>
        </div>

        <div class="datlich-step h-100" data-step="1">
            <div class="child-datlich-step">
                <div class="close close-modal button-close-modal" type-modal="modal-datlich">
                    x
                </div>
                <div class="box-spinner">
                    <div class="child-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="title-3 uppercase color-main">Chọn dịch vụ</div>
                <div class="text-10">Nếu bạn chưa biết chọn dịch vụ nào hãy chọn ‘’Tôi muốn tư vấn’’ </div>
                <div class="w-100">
                    <div class="list-select">`;
                        listDanhMucDichVu.forEach(row => {
                        html += `
                        <div class="select-custom select-dichvu fa-custom">
                            <div class="select-fa">
                                <div class="name-select d-flex align-items-center" data-mov="${row.id}">
                                    <div class="tendanhmuc">
                                        ${row.name}
                                    </div>
                                    <div class="icon-1">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="list-option dichvu-checkbox" slide-mov="${row.id}">`;
                                    row.listDichVu.forEach(dichVu => {
                                        var id = 'optionDichVu' + dichVu.id;
                                        if (dichVu.giamgia > 0)
                                        {
                                            var gia = dichVu.dongia - (dichVu.dongia * dichVu.giamgia / 100);
                                        } else {
                                            var gia = dichVu.dongia;
                                        }
                                    html += `
                                        <label class="option-item option-dich-vu" for="${id}">
                                            <div class="row align-items-center">
                                                <div class="col-xl-8">
                                                    <div class="form-check d-flex align-items-center">
                                                        <input type="checkbox" class="form-check-input checkbox-dichvu mt-0" data-name="${dichVu.name}" data-id="${dichVu.id}" name="dichvu" value="${gia}" id="${id}">
                                                        <div class="mid-content">
                                                            <div class="d-flex align-items-center">
                                                                <div class="ml-2">
                                                                    <span class="name-dichvu" href="javascript:void(0)">${dichVu.name}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 text-right">`;
                                                    if (dichVu.giamgia > 0) {
                                                        var gia = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(gia);
                                                        var giaTruocGiam = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(dichVu.dongia);

                                                        html += `
                                                        <div class="gia-dichvu giagoc d-inline-block">${ giaTruocGiam } đ</div>
                                                        <div class="gia-dichvu d-inline-block">${gia} đ</div>`;
                                                    } else {
                                                        html += `
                                                        <div class="gia-dichvu d-inline-block">${ gia } đ</div>`;
                                                    }
                                                    html += `
                                                </div>
                                            </div>
                                        </label>`;
                                    });
                                    html += `
                                </div>
                            </div>
                        </div>`;
                        });
                        html += `
                    </div>
                    <span class="text-error dichvu-datlich-error"></span>
                </div>


                <div class="row mt-2">
                    <div class="col-xl-6">
                        <div class="form-group form-check mr-auto mb-0">
                            <label class="form-check-label button-href-basic uncheck-dich-vu" for="em">
                                <input type="checkbox" class="form-check-input checkbox-tuvan" name="tuvan" id="em" data-id="0" value="-1">
                            Tôi muốn tư vấn</label>
                        </div>
                    </div>

                    <div class="col-xl-6 text-right">
                        <div class="">
                            Tổng : <span data-tongtien='' class="tongtiendichvu"></span>
                        </div>
                    </div>
                </div>
                <div class="control-slide-datlich d-flex align-items-between">
                    <button type="button" class="button-href-basic prev-step mr-auto"><i class="fas fa-caret-left"></i> Quay lại</button>
                    <div class="control-short">
                        <div class="control-item active" data-step="0">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="1">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="2">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item final" data-step="3">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                    </div>
                    <button type="button" class="button-href-basic next-step">Tiếp theo <i class="fas fa-caret-right"></i></button>
                </div>
            </div>
        </div>

        <div class="datlich-step h-100" data-step="2">
            <div class="child-datlich-step">
                <div class="close close-modal button-close-modal" type-modal="modal-datlich">
                    x
                </div>
                <div class="box-spinner">
                    <div class="child-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="title-3 uppercase color-main">Thời gian bạn đến</div>
                <div class="text-10">Để tiết kiệm thời gian cho bạn hãy đặt trước khi đến spa</div>
                <div class="list-select position-relative">
                    <div class="w-100">
                        <div class="select-custom">
                            <div class="select-fa">
                                <div class="name-select d-flex align-items-center" data-mov="9">
                                    <div class="tendanhmuc value-date">
                                        Hôm nay, T2 (27/9)
                                    </div data-date="27/9/2001">
                                    <div class="icon-1">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="list-option list-option-lich" slide-mov="9">

                                </div>
                            </div>
                            <span class="text-error coso-datlich-error">Bạn chưa chọn dịch vụ !</span>
                        </div>
                        <span class="text-error date-datlich-error"></span>
                    </div>

                    <div class="w-100">
                        <div class="select-custom select-nhanvien">
                            <div class="select-fa">
                                <div class="name-select d-flex align-items-center" data-mov="11">
                                    <div class="tendanhmuc value-nhanvien">
                                        Spa chọn chuyên viên giúp bạn
                                    </div data-nhanvien="0">
                                    <div class="icon-1">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="list-option list-nhanvien" slide-mov="11">
                                    <div class="option-item option-nhanvien date-bg clicked">
                                        <div class="picknhanvien position-relative z-index-999" data-name-nhanvien="Spa chọn chuyên viên giúp bạn" data-option-nhanvien="0" data-option-nhanvien="0">
                                            <div class="img-1 border-image">
                                                <img src="${ rootUrlUploadImage }chuyenvienspa.png" class="cycle-img-1" alt="">
                                            </div>

                                            <div class="name-nhanvien">Spa chọn chuyên viên giúp bạn</div>
                                        </div>
                                    </div>

                                    <div class="option-item option-nhanvien date-bg option-dong">
                                        <div class="picknhanvien position-relative z-index-999" data-option-nhanvien="2">
                                            <div class="img-1 border-image">
                                                <img src="${ rootUrlImage }image8.png" class="cycle-img-1" alt="">
                                            </div>

                                            <div class="name-nhanvien">
                                                Hằng Nguyễn Thị
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="text-error coso-datlich-error">Bạn chưa chọn dịch vụ !</span>

                        </div>
                        <span class="text-error nhanvien-datlich-error"></span>
                    </div>

                    <div class="w-100">
                        <div class="select-custom fa-custom select-time">
                            <div class="select-fa">
                                <div class="name-select d-flex align-items-center" data-mov="10">
                                    <div class="tendanhmuc value-time">
                                        Chọn thời gian
                                    </div data-time="0">
                                    <div class="icon-1">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="list-option mb-3 list-option-khunggio" slide-mov="10">
                                    <div class="option-item time-bg">
                                        <div class="picktime" data-option-time="8:00">8h00</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <span class="text-error time-datlich-error"></span>
                    </div>
                </div>

                <div class="control-slide-datlich d-flex  justify-content-between">
                    <button type="button" class="button-href-basic prev-step"><i class="fas fa-caret-left"></i> Quay lại</button>
                    <div class="control-short">
                        <div class="control-item active" data-step="0">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="1">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="2">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item final" data-step="3">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                    </div>
                    <button type="button" class="button-href-basic next-step">Tiếp theo <i class="fas fa-caret-right"></i></button>
                </div>
            </div>
        </div>

        <div class="datlich-step h-100" data-step="3">
            <div class="child-datlich-step">
                <div class="close close-modal button-close-modal" type-modal="modal-datlich">
                    x
                </div>
                <div class="box-spinner">
                    <div class="child-spinner">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>

                <div class="title-3 uppercase color-main text-center">KIỂM TRA THÔNG TIN</div>
                <div class="w-100 list-select box-checkthongtin mt-3">
                    <div class="row">
                        <div class="col-4 check-info-user">
                            <div class="upper">
                                <i class="fas fa-phone-alt"></i>
                                <span class="">Số điện thoại</span>
                            </div>
                            <div class="under check-phone">
                                0965286066
                            </div>
                        </div>
                        <div class="col-4 check-info-user">
                            <div class="upper">
                                <i class="far fa-calendar-alt"></i>
                                <span>Ngày</span>
                            </div>
                            <div class="under check-ngay">
                                27-09-2021
                            </div>
                        </div>
                        <div class="col-4 check-info-user">
                            <div class="upper">
                                <i class="fas fa-clock"></i>
                                <span>Giờ</span>
                            </div>
                            <div class="under check-gio">
                                8h30
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4">

                        <div class="col-6 check-info-user">
                            <div class="upper">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Phương thức thanh toán</span>
                            </div>
                            <div class="under">
                                Thanh toán tại quầy
                                <div class="img-1">
                                    <img src="${ rootUrlImage }visa.png" alt="">
                                    <img src="${ rootUrlImage }momo.png" alt="">
                                    <img src="${ rootUrlImage }cash.png" alt="">
                                    <img src="${ rootUrlImage }vnpay.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 check-info-user">
                            <div class="upper">
                                <i class="fas fa-user-tie"></i>
                                <span>Chuyên viên Spa</span>
                            </div>
                            <div class="under check-nhanvien align-items-center">

                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-12 check-info-user">
                            <div class="upper">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Địa chỉ Spa</span>
                            </div>
                            <div class="under check-coso">
                                Toà nhà Innovation lô 24, Quang Trung, Quận 12, Thành phố Hồ Chí Minh
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 check-info-user">
                            <div class="upper">
                                <i class="fas fa-spa"></i>
                                <span>Dịch vụ đã chọn</span>
                            </div>
                            <div class="under">
                                <div class="table-custom mt-2">
                                    <div class="head-title">
                                        <div class="bg-table-custom">
                                            <div class="row">
                                                <div class="col-xl-9 title-table">
                                                    Tên dịch vụ
                                                </div>
                                                <div class="col-xl-3 title-table">
                                                    Giá dịch vụ
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="body-table-custom">
                                        <div class="bg-table-custom">
                                            <div class="list-dichvu-selected">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-9 body-table-item">
                                                        <div class="name-dichvu">
                                                            Làm đẹp công nghệ cao
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 body-table-item">
                                                        <div class="gia-dichvu">
                                                            300.000đ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="control-slide-datlich d-flex justify-content-between">
                    <button type="button" class="button-href-basic prev-step"><i class="fas fa-caret-left"></i> Quay lại</button>
                    <div class="control-short">
                        <div class="control-item active" data-step="0">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="1">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item" data-step="2">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                        <div class="control-item final" data-step="3">
                            <i class="fas fa-check icon-check"></i>
                        </div>
                    </div>
                    <button type="button" class="button-href-basic next-step dat-lich">Đặt lịch <i class="fas fa-caret-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    `;

    return html;

}

