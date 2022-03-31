const getDoanhThuByDayUrl = serverNameUrl + 'quantri/getDoanhThuByDay/';
const getDoanhThuHoaDonVaDonHangUrl = serverNameUrl + 'quantri/getDoanhThuHoaDonVaDonHang/';
var arrDoanhThuHoaDon;
var nameImageMain = 'Image';
var arrLabel;
var arrDoanhThuDonHang;
var arrLabelSixMonth = [];
makeArrLabelsSixMonth();

const hoaDonSixMonthChart = $('#chartHoaDonSixMonth');
const donHangSixMonthChart = $('#chartDonHangSixMonth');
loadChartMainDoanhThu();
loadChartSixMonth();

function getDoanhThuByDay(e) {
    var day = e.target.value;
    getDoanhThuByDayAjax(day, appendToListHoaDon);
}

function getDoanhThuByDayAjax(day, callback) {
    $.ajax({
        type: "GET",
        url: getDoanhThuByDayUrl + day,
        success: function (respon) {
            if (respon.success == true) {
                callback(respon);
            } else {
                Swal.fire({
                    icon: 'error',
                    confirmButtonText: 'Thử lại',
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: 'Gửi dữ liệu không thành công',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

function getDoanhThuHoaDon(type, numData, date, callback) {
    $.ajax({
        type: "GET",
        url: getDoanhThuHoaDonVaDonHangUrl + type + '/' + numData + '/' + date,
        success: function (respon) {
            if (respon.success == true) {
                getNameImageMainChart();
                arrLabel = respon.arrLabel.reverse();
                arrDoanhThuHoaDon = respon.arrDoanhThuHoaDon.reverse();
                arrDoanhThuDonHang = respon.arrDoanhThuDonHang.reverse();
                callback('bar', arrLabel, arrDoanhThuHoaDon, arrDoanhThuDonHang);
            } else {
                Swal.fire({
                    icon: 'error',
                    confirmButtonText: 'Thử lại',
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: 'Gửi dữ liệu không thành công',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

function appendToListHoaDon(respon) {
    var arrHoaDon = respon.hoaDon;
    var hoaDon = loopHoaDon(arrHoaDon);
    $('.body-doanhthu-hoadon-ngay').children().remove();
    $('.body-doanhthu-hoadon-ngay').append(hoaDon.html);
    $('.tong-sau-giam').html(hoaDon.tongSauGiam);
    $('.tong-truoc-giam').html(hoaDon.tongTruocGiam);
}

function numberFormat (someNumber) {
    var number = new Intl.NumberFormat('en-US', { style: 'decimal' }).format(someNumber) + ' đ';
    return number;
}

function loopHoaDon(arrHoaDon) {
    let html = ``;
    let tongTruocGiam = 0;
    let tongSauGiam = 0;
    arrHoaDon.forEach((element, index) => {
        tongTruocGiam += element.tongtientruocgiamgia;
        tongSauGiam += element.tongtiensaugiamgia;
        html += rowInBodyDoanhThu(element, index);
    });

    return {
        'html': html,
        'tongTruocGiam': numberFormat(tongTruocGiam),
        'tongSauGiam': numberFormat(tongSauGiam)
    }
}

function rowInBodyDoanhThu(hoaDon, index) {
    let html = `
    <tr>
        <td>${index + 1}</td>
        <td>${hoaDon.nameKhachHang}</td>
        <td>${hoaDon.nameThuNgan }</td>
        <td class="text-right">${numberFormat(hoaDon.tongtientruocgiamgia)} </td>
        <td class="text-right">${numberFormat(hoaDon.tongtiensaugiamgia)}</td>
        <td><span class="badge badge-${hoaDon.classTrangThai}">${hoaDon.nameTrangThai}</span></td>
    </tr>
    `
    return html;
}

function makeArrLabelsSixMonth() {
    for (let i = 1; i <= 6; i++) {
        const month = moment().subtract(i, 'months').format('MM');
        var thang = 'Tháng ' + month;
        arrLabelSixMonth.push(thang);
    }
}

function loadChartSixMonth() {
    var label = arrLabelSixMonth.reverse();
    var chartHoaDonSixMonth = new Chart(hoaDonSixMonthChart, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Doanh Thu Tại Spa',
                data: arrDataHoaDonSixMonth.reverse(),
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var chartDonHangSixMonth = new Chart(donHangSixMonthChart, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Doanh Thu Online',
                data: arrDataDonHangSixMonth.reverse(),
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


function loadChartMainDoanhThu() {
    var typeTime = $('select[id=select-type-time]').val();
    var numData = getNumData(typeTime) - 1;
    var date = 0;
    getDoanhThuHoaDon(typeTime, numData, date, loadMainChart);
}

$('.reload-chart').click(function (e) {
    e.preventDefault();
    var requestParam = getRequestParamDeLayDoanhThu();
    getDoanhThuHoaDon(requestParam.typeTime, requestParam.numData, requestParam.date, updateMainChart);
});

function getRequestParamDeLayDoanhThu() {
    var faTypeTime = $('select[id=select-type-fa-time]').val();
    var typeTime = $('select[id=select-type-time]').val();

    if (faTypeTime == 'recent') {
        var numData = getNumData(typeTime) - 1;
        var date = 0;
    } else {
        if (typeTime == 'day') {
            var ipDateRangePicker = $('#ip-specific-day').data('daterangepicker');
            var startDate = ipDateRangePicker.startDate._d;
            var endDate = ipDateRangePicker.endDate._d;
            var numData = getNumberOfDays(startDate, endDate) - 1;
            var date = ipDateRangePicker.endDate.format('YYYY-MM-DD');
        } else if (typeTime == 'month') {
            typeTime = 'day';
            var yearMonth = $('#ip-specific-month').val();
            var yearMonthArr = yearMonth.split("-");
            var numData = daysInMonth(yearMonthArr[1], yearMonthArr[0]) - 1;
            var date = moment(yearMonth).endOf('month').format('YYYY-MM-DD');
        } else if (typeTime == 'year') {
            typeTime = 'month';
            var year = $('#ip-specific-year').val();
            var numData = 11;
            var date = moment(year).endOf('year').format('YYYY-MM-DD');
        }
    }

    return {
        'numData' : numData,
        'date' : date,
        'typeTime' : typeTime
    }
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

function getNumberOfDays(start, end) {
    var date1 = new Date(start);
    var date2 = new Date(end);

    // One day in milliseconds
    var oneDay = 1000 * 60 * 60 * 24;

    // Calculating the time difference between two dates
    var diffInTime = date2.getTime() - date1.getTime();

    // Calculating the no. of days between two dates
    var diffInDays = Math.round(diffInTime / oneDay);

    return diffInDays;
}

function updateMainChart(typeChart, arrLabel, arrDoanhThuHoaDon, arrDoanhThuDonHang) {
    mainDoanhThu.data.datasets[0].data = arrDoanhThuHoaDon;
    mainDoanhThu.data.datasets[1].data = arrDoanhThuDonHang;
    mainDoanhThu.data.labels = arrLabel;
    mainDoanhThu.update();
}

function getNumData(typeTime) {
    if (typeTime == 'day') {
        var numData = $('select[id=select-day]').val();
    } else if (typeTime == 'month') {
        var numData = $('select[id=select-month]').val();
    } else if (typeTime == 'year') {
        var numData = $('select[id=select-year]').val();
    }

    return numData;
}

var mainDoanhThu;
function loadMainChart(typeChart, labels, arrDataHoaDon, arrDataDonHang) {
    mainDoanhThu = new Chart($('#main-chart-thongke'), {
        type: typeChart,
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu hóa đơn',
                data: arrDataHoaDon,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Doanh thu đơn hàng',
                data: arrDataDonHang,
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

$('#select-type-time').on('change', function (e) {
    // var optionSelected = $("option:selected", this);
    var typeTime = this.value;
    checkAndShowSelectTimeCuaMainChart(typeTime);
});

$('#select-type-fa-time').on('change', function (e) {
    var faTypeTime = this.value;
    $('.fa-select-time').hide();
    $('.fa-select-time').removeClass('show');
    if (faTypeTime == 'specific') {
        $('.specific-time-option').show();
        $('.specific-time-option').addClass('show');
    } else if (faTypeTime == 'recent') {
        $('.recent-times').show();
        $('.recent-times').addClass('show');
    }
    var typeTime = $('#select-type-time').find(":selected").val();
    checkAndShowSelectTimeCuaMainChart(typeTime);
});

function checkAndShowSelectTimeCuaMainChart(typeTime) {
    var checkShowRecentTimes = $('.recent-times').hasClass('show');
    $('.select-time').hide();
    if (checkShowRecentTimes) {
        if (typeTime == 'day') {
            $('#select-day').show();
        } else if (typeTime == 'month') {
            $('#select-month').show();
        } else if (typeTime == 'year') {
            $('#select-year').show();
        }
    } else {
        if (typeTime == 'day') {
            $('#specific-day').show();
        } else if (typeTime == 'month') {
            $('#specific-month').show();
        } else if (typeTime == 'year') {
            $('#specific-year').show();
        }
    }
}

$("#ip-specific-year").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
});

$('#ip-specific-day').daterangepicker({
    ranges: {
        'Hôm nay': [moment(), moment()],
        'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 ngày trước': [moment().subtract(6, 'days'), moment()],
        '30 ngày trước': [moment().subtract(29, 'days'), moment()],
        'Tháng này': [moment().startOf('month'), moment().endOf('month')],
        'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
     }
});

$('.download-to-png').click(function (e) {
    e.preventDefault();
    var idDownload = $(this).attr('id-canvas');
    downloadToPNG(idDownload);
});

function downloadToPNG(id) {
    $('#'+id).get(0).toBlob(function(blob) {
        saveAs(blob, nameImageMain);
    });
}

function getNameImageMainChart() {
    var typeFaTime = $('#select-type-fa-time').find(":selected").val();
    var typeTime = $('#select-type-time').find(":selected").val();
    var untilName = 'Doanh thu hóa đơn - đơn hàng - ';

    if (typeFaTime == 'recent') {
        var duoi = ' gần nhất';

        if (typeTime == 'day') {
            var giua = ' ngày';
            var dau = $('#select-day').find(":selected").val();
        } else if (typeTime == 'month') {
            var giua = ' tháng';
            var dau = $('#select-month').find(":selected").val();
        } else if (typeTime == 'year') {
            var giua = ' năm';
            var dau = $('#select-year').find(":selected").val();
        }

        var nameImage = untilName + dau + giua + duoi;
    } else if (typeFaTime == 'specific') {
        if (typeTime == 'day') {
            var dau = 'từ ';
            var ipDateRangePicker = $('#ip-specific-day').data('daterangepicker');
            var endDate = ipDateRangePicker.endDate.format('DD-MM-YYYY');
            var startDate = ipDateRangePicker.startDate.format('DD-MM-YYYY');
            var giua = startDate + ' - ' + endDate;

        } else if (typeTime == 'month') {
            var dau = 'tháng ';
            var yearMonth = $('#ip-specific-month').val();
            var giua = moment(yearMonth).endOf('month').format('MM-YYYY');
        } else if (typeTime == 'year') {
            var dau = 'trong năm ';
            var giua = $('#ip-specific-year').val();
        }
        var nameImage = untilName + dau + giua;
    }

    nameImageMain = nameImage;
}

$('#select-type-chart').on('change', function (e) {
    var typeChart = this.value;
    mainDoanhThu.destroy();
    loadMainChart(typeChart, arrLabel, arrDoanhThuHoaDon, arrDoanhThuDonHang);
});

$('.exportExcelButton').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('id-table-download');
    exportExcel(id, '', 'Doanh Thu Hóa Đơn Trong Ngày');
});

function exportExcel(tableNames, headerbdColor, filename) {
    if (tableNames.trim() === "") {
        alert(' Không có bảng được cung cấp');
        return;
    }

    if (headerbdColor.trim() === "") {
        headerbdColor = "#87AFC6";
    }

    if (filename.trim() === "") {
        filename = "ExportData";
    }

    var export_data = "";
    var arrTableNames = tableNames.split("|");
    if (arrTableNames.length > 0) {
        //duyệt từng bảng
        for (var i = 0; i < arrTableNames.length; i++) {
            export_data += "<table border='2px'><tr bgcolor='" + headerbdColor + "'>";
            var objectTable = document.getElementById(arrTableNames[i]);//Lấy id bảng thứ i

            if (objectTable === undefined) {
                alert('Bảng không tìm thấy');
                return;
            }

            for (var j = 0; j < objectTable.rows.length; j++) {
                export_data += objectTable.rows[j].innerHTML + "</tr>";
            }

            var tongtien = $('.tong-truoc-giam').html();
            var tongtienthanhtoan = $('.tong-sau-giam').html();
            export_data += `<td colspan="6"><b>Tổng tiền: ${tongtien} </b></td> </tr>`;
            export_data += `<td colspan="6"><b>Tổng tiền thanh toán: ${tongtienthanhtoan} </b></td> </tr>`;

            export_data += "</table>";
        }

        // kiểm tra trình duyệt Là IE thì
        if (window.navigator.userAgent.indexOf("MSIE") > 0 || !!window.navigator.userAgent.match(/Trient.*rv\:11\./)) {
            exportIF.document.open("txt/html", "replace");
            exportIF.document.write(export_data);
            exportIF.document.close();
            exportIF.focus();
            sa = exportIF.document.execCommand("SaveAs", true, filename + ".xsl");
        } else { //các trình duyệt khác
            sa = window.open("data:application/vnd.ms-excel," + encodeURIComponent(export_data))
        }
    }
}
