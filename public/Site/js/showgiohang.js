var modalgiohang=document.getElementById("modalgiohang");
var soluonghang=document.getElementById("soluonghang");
var soluonghangmodal=document.querySelectorAll("#soluonghangmodal");
var tongtien=document.getElementById("tongtien");
var nutcheckout=document.getElementById("nutcheckout");
var asset=document.getElementById("asset").value;
var domain=document.getElementById("domain").value;
//Thêm sản phẩm vào giỏ
function ThemGioHang(id) {
    if (id==null){
        iziToast.warning({
            title: 'Thêm giỏ hàng thất bại !!!',
            message: '',
            position: 'bottomRight',
            backgroundColor: 'oranged',
            titleColor: 'black',
            messageColor: 'black',
            iconColor: 'black',
        });
    }
    else {
        $.ajax({
            url: domain + '/themsanphamgiohang/' + id,
            type: 'GET',
            async: false,
            dataType: 'json',
            data: {},
            success: function (data) {
                if (data==0){
                    iziToast.warning({
                        title: 'Thêm giỏ hàng thất bại !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'oranged',
                        titleColor: 'black',
                        messageColor: 'black',
                        iconColor: 'black',
                    });
                }
                else {
                    iziToast.success({
                        title: 'Thêm giỏ hàng thành công !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'green',
                        titleColor: 'white',
                        messageColor: 'white',
                        iconColor: 'white',
                    });
                    showGioHang();
                }
            }
        });
    }

}
//Thêm sản phẩm vào giỏ hàng từ trang chi tiết
function ThemGioHangChiTiet(muangay) {
    var idsanpham=$("#idsanpham").val();
    var tonkho=$("#tonkho").val();
    var nhapsoluong=$("#nhapsoluong").val();
    if (nhapsoluong!="" && Number(nhapsoluong)<=Number(tonkho) && Number(nhapsoluong)>=1 ){
        $.ajax({
            url: domain + '/themsanphamgiohangchitiet/'+idsanpham+'/soluongsanpham/'+nhapsoluong,
            type: 'GET',
            async: false,
            dataType: 'json',
            data: {id: idsanpham, soluong: nhapsoluong},
            success: function (data) {
                if (data==0){
                    iziToast.warning({
                        title: 'Thêm giỏ hàng thất bại !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'oranged',
                        titleColor: 'black',
                        messageColor: 'black',
                        iconColor: 'black',
                    });
                }
                else {
                    iziToast.success({
                        title: 'Thêm giỏ hàng thành công !!!',
                        message: '',
                        position: 'bottomRight',
                        backgroundColor: 'green',
                        titleColor: 'white',
                        messageColor: 'white',
                        iconColor: 'white',
                    });
                    showGioHang()
                    if (muangay!=null){
                        var timer = setTimeout(function() {
                            window.location= domain+'/gio-hang'
                        }, 2000);
                    }
                }
            }

        });
    }
    else {
        iziToast.warning({
            title: 'Thêm giỏ hàng thất bại !!!',
            message: '',
            position: 'bottomRight',
            backgroundColor: 'oranged',
            titleColor: 'black',
            messageColor: 'black',
            iconColor: 'black',
        });
    }
}
//Show gio hang
function showGioHang() {
    $.ajax({
        url: domain + '/showdonhangandgiohang',
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {},
        success: function (data) {
            if (data==0){
                modalgiohang.innerHTML="<p>Không có sản phẩm nào</p>";
                soluonghang.innerHTML=0;
                tongtien.innerHTML = 0;
                nutcheckout.href= "javascript:void(0)";
                ShowSoLuongModal(0)
                if (window.location == domain+'/gio-hang'){
                    $("#giohang-body").html("<p>Không có sản phẩm nào</p>");
                    $("#tongtiengiohang").html("0");
                    $("#xoatatca").prop('disabled', true);
                    $("#nextthanhtoan").attr("href", "javascript:void(0)")
                }
                else if (window.location == domain+'/thanh-toan'){
                    $("#payproduct").html("<p>Không có sản phẩm nào</p>");
                    $("#tongtienhang").html("0");
                    $("#tongthanhtoan").html("0");
                    $("#tienship").html("0");
                    $('#amount').val("0");
                    $("#dathang").prop('disabled', true);
                    CapNhatGiaSession(0)
                }
            }
            else {
                nutcheckout.href= document.location.hash+"/gio-hang";
                Showmodalgiohang(data);
                if (window.location == domain+'/gio-hang'){
                    GioHangBoDy(data);
                    $("#xoatatca").prop('disabled', false);
                }
                else if (window.location == domain+'/thanh-toan'){
                    ShowPayProduct(data);
                    $("#dathang").prop('disabled', false);
                }
            }
        }
    });
}
showGioHang();
//Show Số lượng sản phẩm đang có
function ShowSoLuongModal(soluong) {
    for (let i=0; i<soluonghangmodal.length; i++){
        soluonghangmodal[i].innerHTML=soluong;
    }
}
//Show giỏ hàng tại đây
//Show giỏ hàng dạng modal
function Showmodalgiohang(data) {
    var span='';
    var total=0;
    var stt=0;
    for (let i=0; i<data.length ; i++){
        stt+=1;
        const img = JSON.parse(data[i].img)[0];
        var ten='';
        var gia='';
        if (data[i].giamgia !=null){
            gia = (data[i].dongia - ((data[i].dongia * data[i].giamgia)/100))
        }
        else {
            gia =data[i].dongia
        }
        if (data[i].name.length >15){
            ten+=data[i].name.substring(0, 15)+"...";
        }
        else {
            ten+=data[i].name
        }
        total+=(gia * data[i].soluong)

        span+='  <tr>\n' +
            ' <td width="25%"><img class="w-100" style="width: 100%; height: 80px; object-fit: cover;" src="' + asset + '/' + img + '"></td>\n' +
            ' <td width="30%">\n' +
            ' <span style="font-size: 11pt;">'+ten+'</span> <br>\n' +
            ' <span class="font-weight-bold" style="font-size: 10pt;"><i class="fa fa-close"></i> '+data[i].ml+'ml</span>\n' +
            ' <br>\n' +
            ' <span class="font-weight-600 ">'+gia.toLocaleString().replaceAll(",", ".")+' </span>VND\n' +
            ' </td>\n' +
            ' <td width="29%">\n' +
            ' <div class="input-group inline-group">\n' +
            ' <div class="input-group-prepend">\n' +
            ' <button class=" btn-minus btn-cal rounded-left" onclick="GiamSoLuong('+data[i].id+')">\n' +
            ' <i class="fa fa-minus"></i>\n' +
            ' </button>\n' +
            ' </div>\n' +
            ' <input class="form-control text-center quantity bg-white" id="slspn'+data[i].id+'" onkeyup="SoLuong('+data[i].id+')" min="1" max="'+data[i].tonkho+'" name="quantity" value="'+data[i].soluong+'" type="number" disabled>\n' +
            ' <div class="input-group-append">\n' +
            ' <button class="btn-plus btn-cal rounded-right" onclick="TangSoLuong('+data[i].id+')">\n' +
            ' <i class="fa fa-plus"></i>\n' +
            ' </button>\n' +
            ' </div>\n' +
            ' </div>\n' +
            ' </td>\n' +
            ' <td width="3%"><span> <button class="btn" onclick="XoaSanPham('+data[i].id+')"><i class=\'fas fa-trash-alt\' style=\'font-size:24px\'></i></button></span></td>\n' +
            ' </tr>';
    }
    modalgiohang.innerHTML=span;
    tongtien.innerHTML = total.toLocaleString().replaceAll(",", ".");
    soluonghang.innerHTML=stt;
    ShowSoLuongModal(stt)
}
//Show giỏ hàng trang giỏ hàng
function GioHangBoDy(data) {
    var span='';
    var total=0;
    var stt=0
    var tongtien=0;
    for (let i=0; i<data.length ; i++){
        stt+=1;
        const img = JSON.parse(data[i].img)[0];
        var ten='';
        var gia='';
        if (data[i].giamgia !=null){
            gia ='<span class="giagiam">'+data[i].dongia.toLocaleString().replaceAll(",", ".")+' đ </span><span class="gia left-bar">'+(data[i].dongia - ((data[i].dongia * data[i].giamgia)/100)).toLocaleString()+'đ </span>';
            tongtien=(data[i].dongia - ((data[i].dongia * data[i].giamgia)/100)) *data[i].soluong;
        }
        else {
            gia ='<span class="">'+data[i].dongia.toLocaleString().replaceAll(",", ".")+'đ </span>';
            tongtien=data[i].dongia *data[i].soluong;
        }
        if (data[i].name.length >30){
            ten+=data[i].name.substring(0, 30)+"...";
        }
        else {
            ten+=data[i].name
        }
        total+=tongtien

        span+='<div class="row shadow-2 align-items-center giohang-item">\n' +
            '                <div class="col-xl-1 d-flex  align-items-center">\n' +
            '                    <div class="body-text d-flex">\n' +
            '                        <img style="width: 100%;" src="'+asset+'/'+img+'" class="img-sanpham img-fluid" alt="...">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-3">\n' +
            '                    <div class="body-text text-left">'+ten+'</div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-4">\n' +
            '                    <div class="body-text">\n' +
            '                        <div class="box-gia">'+gia+'\n' +
            '                            <span class="left-bar dungtich"> '+data[i].ml+'ml</span>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-2">\n' +
            '                    <div class="body-text">\n' +
            ' <div class="input-group inline-group">\n' +
            ' <div class="input-group-prepend">\n' +
            ' <button class="btn btn-minus btn-cal rounded-left" onclick="GiamSoLuong('+data[i].id+')">\n' +
            ' <i class="fa fa-minus"></i>\n' +
            ' </button>\n' +
            ' </div>\n' +
            ' <input class="form-control text-center quantity" id="slspn'+data[i].id+'" onkeyup="SoLuong('+data[i].id+')" min="1" max="'+data[i].tonkho+'" name="quantity" value="'+data[i].soluong+'" type="number">\n' +
            ' <div class="input-group-append">\n' +
            ' <button class="btn btn-plus btn-cal rounded-right" onclick="TangSoLuong('+data[i].id+')">\n' +
            ' <i class="fa fa-plus"></i>\n' +
            ' </button>\n' +
            ' </div>\n' +
            ' </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-1">\n' +
            '                    <div class="body-text">\n' +
            '                        <span class="tongtien">'+tongtien.toLocaleString().replaceAll(",", ".")+'đ</span>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-1 text-center"><button class="btn" onclick="XoaSanPham('+data[i].id+')"><i class=\'fas fa-trash-alt\' style=\'font-size:24px\'></i></button></div>\n' +
            '            </div>';
    }
    document.getElementById("giohang-body").innerHTML=span;
    document.getElementById("tongtiengiohang").innerHTML=total.toLocaleString().replaceAll(",", ".");
}
//show đơn hàng trang thanh toán
function ShowPayProduct(data) {
    var span='';
    var total=0;
    var stt=0
    var tongtien=0;
    for (let i=0; i<data.length ; i++){
        stt+=1;
        const img = JSON.parse(data[i].img)[0];
        var ten='';
        var gia='';
        if (data[i].giamgia !=null){
            gia ='<span class="giagiam">'+data[i].dongia.toLocaleString().replaceAll(",", ".")+' đ </span><span class="gia left-bar">'+(data[i].dongia - ((data[i].dongia * data[i].giamgia)/100)).toLocaleString().replaceAll(",", ".")+'đ </span>';
            tongtien=(data[i].dongia - ((data[i].dongia * data[i].giamgia)/100)) *data[i].soluong;
        }
        else {
            gia ='<span class="">'+data[i].dongia.toLocaleString().replaceAll(",", ".")+'đ </span>';
            tongtien=data[i].dongia *data[i].soluong;
        }
        if (data[i].name.length >30){
            ten+=data[i].name.substring(0, 40)+"...";
        }
        else {
            ten+=data[i].name
        }
        total+=tongtien;

        span+='<div class="row align-items-center giohang-item">\n' +
            '                <div class="col-xl-1 d-flex  align-items-center">\n' +
            '                    <div class="body-text d-flex">\n' +
            '                        <img style="width: 100%;" src="'+asset+'/'+img+'" class="img-sanpham img-fluid" alt="...">\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-4">\n' +
            '                    <div class="body-text text-left">'+ten+'</div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-4">\n' +
            '                    <div class="body-text">\n' +
            '                        <div class="box-gia">'+gia+'\n' +
            '                            <span class="left-bar dungtich"> '+data[i].ml+'ml</span>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-1">\n' +
            '                    <div class="body-text">'+data[i].soluong+'\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="col-xl-2 text-right">\n' +
            '                    <div class="body-text">\n' +
            '                        <span class="tongtien">'+tongtien.toLocaleString().replaceAll(",", ".")+'đ</span>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>';
    }
    document.getElementById("payproduct").innerHTML=span;
    $("#tongtienhang").html(total.toLocaleString().replaceAll(",", "."));
    $("#tongthanhtoan").html((total+30000).toLocaleString().replaceAll(",", "."));
    $('#amount').val(total+30000);
    CapNhatGiaSession(total+30000);
}
//Xóa sản phẩm giỏ hàng
function XoaSanPham(id) {
    $.ajax({
        url: domain + '/xoasanphamgiohang/'+id,
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {id: id},
        success: function (data) {
            if (data==1){
                iziToast.success({
                    title: 'Xóa thành công !!!',
                    message: '',
                    position: 'bottomRight',
                    backgroundColor: 'green',
                    titleColor: 'white',
                    messageColor: 'white',
                    iconColor: 'white',
                });
                showGioHang();
                if (window.location == domain+'/thanh-toan') {
                    HuyGiamGia();
                }
            }
            else {
                iziToast.warning({
                    title: 'Xóa thất bại thất bại !!!',
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
//Cập nhật số lượng sản phẩm
function SoLuong(id) {
    let tonkho=document.getElementById("slspn"+id).max;
    let soluong=document.getElementById("slspn"+id).value;
    if (soluong != "" && Number(soluong)>=1 && Number(soluong)<=Number(tonkho)){
        $.ajax({
            url: domain + '/idsanphamchitiet/'+id+'/soluong/'+soluong,
            type: 'GET',
            async: false,
            dataType: 'json',
            data: {
                id: id,
                soluong:soluong
            },
            success: function (data) {
                // console.log(data)
            }
        });
        showGioHang();
    }

}
//giảm số lượng sản phẩm
function GiamSoLuong(id) {
    let soluong=document.getElementById("slspn"+id).value;
    if (Number(soluong) <=1){
        iziToast.warning({
            title: 'Số lượng đã đạt tới giới hạn nhỏ nhất !!!',
            message: '',
            position: 'bottomLeft',
            backgroundColor: 'oranged',
            titleColor: 'black',
            messageColor: 'black',
            iconColor: 'black',
        });
    }
    else {
        $.ajax({
            url: domain + '/giamsoluong/'+id,
            type: 'GET',
            async: false,
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                showGioHang();
                if (window.location == domain+'/thanh-toan') {
                    HuyGiamGia();
                }
            }
        });
    }
}
//tăng số lượng sản phẩm
function TangSoLuong(id) {
    let tonkho=document.getElementById("slspn"+id).max;
    let soluong=document.getElementById("slspn"+id).value;
    if (Number(soluong) >Number(tonkho)){
        iziToast.warning({
            title: 'Số lượng đã đạt tới giới hạn !!!',
            message: '',
            position: 'bottomLeft',
            backgroundColor: 'oranged',
            titleColor: 'black',
            messageColor: 'black',
            iconColor: 'black',
        });
    }
    else {
        $.ajax({
            url: domain + '/tangsoluong/'+id,
            type: 'GET',
            async: false,
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                showGioHang();
            }
        });

    }
}
//Xóa tất cả sản phẩm
function XoaTatCa() {
    Swal.fire({
        title: 'Bạn muốn xóa tất cả chứ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#efa789',
        cancelButtonColor: '#000000',
        confirmButtonText: 'Đồng Ý',
        cancelButtonText:'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire(
                {
                    title: 'Xóa thành công',
                    icon: 'success'
                }
            );
            $.ajax({
                url: domain + '/xoatatcasanpham',
                type: 'GET',
                async: false,
                dataType: 'json',
                data: {},
                success: function (data) {
                    showGioHang();
                }
            });
        }
    });

}
//Cập nhật lại giá của đơn hàng đã lưu session
function CapNhatGiaSession(gia) {
    $.ajax({
        url: domain + '/capnhatgiasession/'+gia,
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {id: gia},
        success: function (data) {
            // console.log(data)
        }
    });
}

