$(".ip-number-box").keyup(function () {
    if (this.value.length == this.maxLength) {
        $(this).next('.ip-number-box').focus();
    } else if (this.value.length == 0) {
        $(this).prev('.ip-number-box').focus();
    }
});

var phoneNumberAuthen;
$('.checkPhoneNumber').click(function (e) {
    e.preventDefault();
    phoneNumberAuthen = $('#phone-number').val();
    let error = phoneNumberCheck(phoneNumberAuthen);
    if (error == false) {
        spinnerTurnOn();
        checkIssetUser(phoneNumberAuthen);
    }

});

$('.send-OTP').click(function (e) {
    e.preventDefault();
    //phoneNumberAuthen
});

function checkIssetUser(phoneNumber) {
    let _token   = $('meta[name="csrf-token"]').attr('content');
    let data = {
        phoneNumber: phoneNumber,
        _token: _token
    }

    $.ajax({
        async: true,
        type: "POST",
        url: checkIssetUserUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.checkIssetUser) {
                movePageAuthen(pageAuthenPass);
                $('.comfirm-sdt').html(phoneNumber);
            } else {
                sendOTPSMS();
            }
        },
        error: function () {
            spinnerTurnOff();
            alert('Lỗi khi check isset user');
        }
    });
}

function phoneNumberCheck(phoneNumber) {
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var error = false;
    $('.phone-auth-error').html('');
    if(phoneNumber !== ''){
        if (vnf_regex.test(phoneNumber) == false) {
            error = true;
            $('.phone-auth-error').html('Số điện thoại không đúng định dạng !');
        }
    } else {
        error = true;
        $('.phone-auth-error').html('Bạn chưa điền số điện thoại !');
    }

    return error;
}

function movePageAuthen(numPage) {
    let tranlate = numPage * 25;
    $('.fa-modal-user').css('transform', 'translateX(-'+tranlate+'%)');
}

const pageAuthenOTP = 2;
const pageAuthenPass = 1
const pageAuthenSDT = 0;
const pageAuthenNewPassword = 3;
var timeOTPNotValid;
$('.prev-authen').click(function (e) {
    e.preventDefault();
    movePageAuthen(pageAuthenSDT);
});

$('.login-button').click(function (e) {
    e.preventDefault();
    let inputsPassword = $('.password');
    let password = '';
    for(var i = 0; i < inputsPassword.length; i++){
        password += ''+$(inputsPassword[i]).val()+'';
    }

    let typePassword = 'old';
    let error = passwordCheck(password, typePassword);
    if (error == false) {
        spinnerTurnOn();
        callLogin(password);
    }
});

function callLogin(password) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    let data = {
        sdt: phoneNumberAuthen,
        password: password,
        _token: _token
    }

    $.ajax({
        async: true,
        type: "POST",
        url: siteLoginUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.success) {
                location.reload();
                InsertGioHangData();
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
            spinnerTurnOff();
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi login',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

function InsertGioHangData() {
    $.ajax({
        url: domain + '/insergiohangdatawherelogin',
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {},
        success: function (data) {
        }
    });
}

$('.forgot-password').click(function (e) {
    e.preventDefault();
    sendOTPSMS();
});

function countDownOTPTimeIsValid() {
    $('.resendOTP').hide();
    $('.forgot-password').hide();
    loadCountDown(59);
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = timeOTPNotValid - now;
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        loadCountDown(seconds);

        if (seconds <= 0) {
            clearInterval(x);
            showButtonSendOTPAndLoadSeccond();
            removeOTP();
        }
    }, 1000);
}

function passwordCheck(password, typePassword) {
    let error = false;
    if (password.length != 6) {
        if (typePassword == 'old') {
            $('.password-old-error').html('Mật khẩu không đúng định dạng');
        } else if (typePassword == 'new') {
            $('.password-new-error').html('Mật khẩu không đúng định dạng');
        } else if (typePassword == 'OTP') {
            $('.OTP-auth-error').html('Mã xác nhận OTP không đúng định dạng');
        }

        error = true;
    }

    return error;
}

function loadCountDown(seconds) {
    $('.countDownOTP').html('Gửi lại sau ' + seconds + 's');
}

function showButtonSendOTPAndLoadSeccond() {
    $('.resendOTP').show();
    $('.forgot-password').show();
    $('.countDownOTP').html('');
}

function removeOTP() {
    $.ajax({
        async: true,
        type: "GET",
        url: removeOTPUrl,
        success: function (respon) {
            if (respon.success) {
                // remove OTP success
            }
        },
        error: function () {
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi xóa OTP',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

function sendOTPSMS() {
    spinnerTurnOn();
    let _token = $('meta[name="csrf-token"]').attr('content');
    let data = {
        sdt: phoneNumberAuthen,
        _token: _token
    }

    $.ajax({
        async: true,
        type: "POST",
        url: sendOTPSMSUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.success) {
                timeOTPNotValid = respon.timeOTPNotValid;
                countDownOTPTimeIsValid();
                movePageAuthen(pageAuthenOTP);
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
            spinnerTurnOff();
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi send OTP lấy mật khẩu',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

$('.resendOTP').click(function (e) {
    e.preventDefault();
    sendOTPSMS();
});

$('.check-OTP').click(function (e) {
    e.preventDefault();
    let inputOTPs = $('.otp');
    let OTP = '';
    for (var i = 0; i < inputOTPs.length; i++){
        OTP += ''+$(inputOTPs[i]).val()+'';
    }

    let typePassword = 'OTP';
    let error = passwordCheck(OTP, typePassword);
    if (error == false) {
        spinnerTurnOn();
        checkOTP(OTP);
    }
});

function checkOTP(OTP) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    let data = {
        OTP: OTP,
        _token: _token
    }

    $.ajax({
        async: true,
        type: "POST",
        url: checkOTPUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.success) {
                movePageAuthen(pageAuthenNewPassword);
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
            spinnerTurnOff();
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi check OTP',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

$('.newPasswordButton').click(function (e) {
    e.preventDefault();
    let inputsPassword = $('.new-password');
    let password = '';
    for(var i = 0; i < inputsPassword.length; i++){
        password += ''+$(inputsPassword[i]).val()+'';
    }

    let typePassword = 'new';
    let error = passwordCheck(password, typePassword);
    if (error == false) {
        spinnerTurnOn();
        createNewPassword(password, phoneNumberAuthen);
    }
});

function createNewPassword(password, phoneNumber) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    let data = {
        password: password,
        sdt: phoneNumber,
        _token: _token
    }

    $.ajax({
        async: true,
        type: "POST",
        url: newPasswordUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.success) {
                location.reload();
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
            spinnerTurnOff();
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi check OTP',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}

$('.skip-password').click(function (e) {
    e.preventDefault();
    spinnerTurnOn();
    skipCreatePassword(phoneNumberAuthen);
});

function skipCreatePassword(phoneNumber) {
    let data = {
        sdt: phoneNumber,
    }

    $.ajax({
        async: true,
        type: "POST",
        url: skipCreatePasswordUrl,
        data: data,
        success: function (respon) {
            spinnerTurnOff();
            if (respon.success) {
                location.reload();
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
            spinnerTurnOff();
            swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi !',
                text: 'Lỗi khi check OTP',
                confirmButtonText: 'Thử lại',
            });
        }
    });
}
