function getdata() {
    var x = document.querySelectorAll("#idcs");
    var i;
    for (i = 0; i < x.length; i++) {
        var uid = x[i].getAttribute('data-id');
        showngay(uid, 0);
    }
}

getdata();

function showngay(id, idthu) {
    $.ajax({
        url: document.URL + '/' + id + '/thungay/' + idthu,
        type: 'GET',
        data: {
            id: id,
            idthu: idthu
        },
        success: function (response) {
            showgio(id, response)
        }
    });
}

function showgio(id, res) {
    var span = '<div class="tab-content bg-white" id="myTabContent">\n' +
        ' <div class="tab-pane fade show active" id="home" role="tabpanel"\n' +
        ' aria-labelledby="home-tab">' +
        '<table class="table table-bordered mt-1">\n' +
        '<thead>\n' +
        '<tr class="text-center">\n' +
        '<th scope="col">Số lượng khách (max=1000000)</th>\n' +
        '<th scope="col">Giờ \n' +
        '</th>\n' +
        '<th scope="col">Chọn tất cả ( nghỉ )' +
        '<input type="checkbox" class="ml-1" id="checkall' + id + '" onclick="checkAll(' + id + ')">' +
        '</th>\n' +
        '<th scope="col" width="15%"><button onclick="upCoSo(' + id + ')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-gear fa-spin" style="font-size:20px; color: white;"></i> Cài đặt</button></th>\n' +
        '  </tr>\n' +
        '</thead>\n' +
        '<tbody>';
    for (let i = 0; i < res.length; i++) {
        if (res[i].trangthai == 1) {
            var check = "checked";
        } else {
            var check = "";
        }
        span += '<tr class="text-center">\n' +
            ' <td><input type="number" class="form-control border border-secondary" min="0" max="1000000" name="soluongkhach" value="' + res[i].soluongkhach + '" id="soluongkhach' + res[i].id + '"></td>\n' +
            ' <td><input type="text" class="form-control" value="' + res[i].gio + '" disabled></td>\n' +
            ' <td><input type="checkbox" name="trangthai" class="trangthai' + res[i].idcoso + '" value="' + res[i].trangthai + '" id="trangthai' + res[i].id + '" ' + check + '></td>\n' +
            ' <td><button class="btn btn-warning" onclick="submitForm(' + res[i].id + ')" id="capnhat">Cập nhật</button></td>\n' +
            '<input type="hidden" id="thuungay' + res[i].idcoso + '" value="' + res[i].thutrongtuan + '">' +
            '<input type="hidden" id="coso" value="' + res[i].thutrongtuan + '">' +
            ' </tr>';
    }
    span += '</tbody></table></div></div>';
    document.getElementById('showgio' + id + '').innerHTML = span;
}

function upCoSo(id) {
    $('#formupgio').attr('action', '' + document.URL + '/updateTime/' + id);
}

function checkAll(checkbox) {
    var checkboxes = document.getElementsByClassName("trangthai" + checkbox);
    var thungay = document.getElementById("thuungay" + checkbox).value;
    var tt = document.getElementById("checkall" + checkbox);
    for (let i = 0; i < checkboxes.length; i++) {
        if (tt.checked === true) {
            checkboxes[i].checked = true;
        } else {
            checkboxes[i].checked = false;
        }
    }

    if (tt.checked === true) {
        var trangthai0 = 1;
    } else {
        var trangthai0 = 0;
    }

    $.ajax({
        url: document.URL + '/uplichAll/' + checkbox,
        type: "GET",
        data:
            {
                id: checkbox,
                thutrongtuan: thungay,
                trangthai: trangthai0,
            },
        success: function (response) {
            iziToast.success({
                title: 'Cập nhật thành công !!!',
                message: '',
                position: 'bottomRight',
                backgroundColor: 'green',
                titleColor: 'white',
                messageColor: 'white',
                iconColor: 'white',
            });
        }
    });

}


function submitForm(id1) {
    var soluong = document.getElementById("soluongkhach" + id1).value;
    if (Number(soluong)!="" && Number(soluong)!=0 &&Number(soluong) <= 1000000){
        var tt = document.getElementById("trangthai" + id1);
        if (tt.checked === true) {
            var trangthai = 1;
        } else {
            var trangthai = 0;
        }
        $.ajax({
            url: document.URL + '/uplich/' + id1,
            type: "GET",
            data:
                {
                    id: id1,
                    soluong: soluong,
                    trangthai: trangthai,
                },
            success: function (response) {
                if (response==1){
                    iziToast.success({
                        title: 'Cập nhật thành công !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'green',
                        titleColor: 'white',
                        messageColor: 'white',
                        iconColor: 'white',
                    });
                }
                else {
                    iziToast.warning({
                        title: 'Cập nhật thất bại !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'oranged',
                        titleColor: 'black',
                        messageColor: 'black',
                        iconColor: 'black',
                    });
                }
            }
        });
    }
    else {
        iziToast.warning({
            title: 'Cập nhật thất bại !!!',
            message: '',
            position: 'bottomRight',
            backgroundColor: 'oranged',
            titleColor: 'black',
            messageColor: 'black',
            iconColor: 'black',
        });
    }
}


