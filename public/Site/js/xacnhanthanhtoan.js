
$("#create_form").validate({
    rules: {
        username: {required: true, maxlength: 45, minlength: 3},
        phonenumber: {required: true, number: true, valid_phone: true, maxlength: 11},
        diachi: {required: true, minlength: 5}
    },
    messages: {
        username: {
            required: "<span class='badge badge-danger'>Mời bạn nhập tên</span>",
            maxlength: "<span class='badge badge-danger'>Tên dài quá, phải <25 ký tự </span>",
            minlength: "<span class='badge badge-danger'>Tên ngắn quá, phải >3 ký tự </span>"
        },
        phonenumber: {
            required: "<span class='badge badge-danger'>Mời bạn nhập số điện thoại </span>",
            number: "<span class='badge badge-danger'>Chỉ được nhập số </span>",
            valid_phone:"<span class='badge badge-danger'>Số điện thoại không đúng định dạng </span>",
            maxlength:"<span class='badge badge-danger'>Số điện thoại chỉ được 10 số </span>"
        },
        diachi:{
            required: "<span class='badge badge-danger'>Mời bạn nhập địa chỉ</span>",
            minlength: "<span class='badge badge-danger'>Tên ngắn quá, phải >5 ký tự </span>"
        }
    }
});

jQuery.validator.addMethod('valid_phone', function (value) {
    var regex = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
    return value.trim().match(regex);
});


