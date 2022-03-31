const pathImg = 'uploads/';
let dataDichVu;
let dataSanPham;
let dataBaiViet;

let perpageDichVu = 6;
let perpageSanPham = 6;
let perpageBaiViet = 6;
let yeuThichSPS = []; // Chưa id của sản phẩm mà User yêu thích khi login



//lấy sản phẩm yêu thích khi có session("khachHang) và thêm vào mảng YeuThichSPS
function GetYeuThichSP() {
    yeuThichSPS = $.ajax({
        url: domain + '/getyeuthichsps',
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {},
        success: function (datayeuthich) {
            return datayeuthich;
        }
    });
   
}   
GetYeuThichSP();



function phanTrang(){
    const value = document.getElementById('data').value;
    const parse = JSON.parse(value);
    dataDichVu = parse.dichVu;
    dataSanPham =  parse.sanPham;
    dataBaiViet = parse.blog;

    showDichVu(dataDichVu,perpageDichVu);
    showSanPham(dataSanPham,perpageSanPham);
    showBaiViet(dataBaiViet,perpageBaiViet);
}
phanTrang()

function xemThemDichVu(){
    perpageDichVu +=3;  
    if(perpageDichVu>dataDichVu.length){
        document.getElementById('xemthembtndv').innerHTML = `<button class="border border-dark p-2" style="width: 30%;background-color: black; color: #e87c7b;">&lt;&lt; Không còn dịch vụ nào &gt;&gt;</button>`
    }
    showDichVu(dataDichVu,perpageDichVu);
}

function xemThemSanPham(){
    perpageSanPham +=3;
    if(perpageSanPham>dataSanPham.length){
        document.getElementById('xemthembtnsp').innerHTML = `<button class="border border-dark p-2" style="width: 30%;background-color: black; color: #e87c7b;">&lt;&lt; Không còn sản phẩm nào &gt;&gt;</button>`
    }
    showSanPham(dataSanPham,perpageSanPham);
}

function xemThemBaiViet(){
    perpageBaiViet +=3;
    if(perpageBaiViet>dataBaiViet.length){
        document.getElementById('xemthembtnbv').innerHTML = `<button class="border border-dark p-2" style="width: 30%;background-color: black; color: #e87c7b;">&lt;&lt; Không còn sản bài viết &gt;&gt;</button>`
    }
    showBaiViet(dataBaiViet,perpageBaiViet);
}

function showSanPham(sanPham,perpage) {
    let data = sanPham.slice(0,perpage);
    var sp = '';
    var dem = 0;
    if(data.length < perpage){
        document.getElementById('xemthembtnsp').style.display = 'none'
    }
    for (let i = 0; i < data.length; i++) {
        dem += 1;
        var thetich;
        if (data[i].thetich != null) {
            thetich = data[i].thetich;
        } else {
            thetich = 0
        }
        var giasaugiam = '';
        var showgiasaugiam = '';

        var yeuthich = SoSanhYeuThich(data[i].id); // gọi hàm so sánh tìm ra sản phẩm Yêu thích của User khi login

        var anhsp = data[i].img.split('"').join('').slice(1, -1).split(',');
        var boxgiamgia = '';
        if (data[i].giamgia != null) {
            boxgiamgia = '<div class="btn-add-discout btn-sticky hover-scale-1">\n' +
                '<div class="box-cicrle-giamgia p-2 rounded text-white">\n' +
                '<span style="font-size: 10pt;">' + data[i].giamgia + '%</span>\n' +
                '</div></div>';
            giasaugiam = (data[i].dongia - ((data[i].dongia * data[i].giamgia) / 100))
            if (giasaugiam < 0) {
                giasaugiam = 0
            }
            showgiasaugiam = '<br><span>Giảm còn: </span><span class="font-weight-bold">' + giasaugiam.toLocaleString().replaceAll(",", ".") + 'đ</span>';
        }
        sp += '<div class="col-xl-4 fa-sanpham-item" id="AnHienSP' + (i + 1) + '">\n' +
            ' <div class="item-sanpham w-100">\n' +
            ' <div class="child-item-sanpham row g-0">\n' +
            ' <div class="btn-add-wishlist btn-sticky hover-scale-1 ' + yeuthich + '" id="tym' + data[i].id + '" onclick="AddYeuThichSPTimKiem(' + data[i].id + ')">\n' +
            '<div class="box-cicrle" id="yt" style="z-index: 9999;">' +
            '<i class="fas fa-heart heart-full"></i><i class="far fa-heart heart-line" ></i>\n' +
            '</div></div>' + boxgiamgia + ' <div class="col-xl-12 fa-image-sanpham ">\n' +
            '<img src="' + document.location.hash + pathImg + anhsp[0] + '" class="img-fluid" alt="...">\n' +
            '</div>\n' +
            '<div class="col-xl-12 fa-content-sanpham pl-0 position-relative"> <div class="card-body pl-0">\n' +
            '<div class="product-info">\n' +
            ' <a href="javascript:;">\n' +
            '<p class="product-catergory font-13 mb-1">' + data[i].tendm + '</p>\n' +
            '</a>\n' +
            ' <a href="san-pham/chi-tiet/' + data[i].slug + '">\n' +
            ' <h6 class="product-name mb-3" style="height: 35px;">' + data[i].name.substring(0, 35) + '...</h6>\n' +
            '  </a>\n' +
            ' <p class="card-text product-motangan">' + data[i].mota + '</p>\n' +
            '<div class="d-flex align-items-center fa-product-price" style="height: 40px;">\n' +
            '<div class="mb-2 product-price">\n' +
            ' <span class="text-decoration-line-through" >' + Number(data[i].dongia).toLocaleString().replaceAll(",", ".") + '</span>đ / <span>' + thetich + '</span>ml  \n' +
            '' + showgiasaugiam + '</div>\n' +
            '</div>\n' +
            '<div class="mt-1 product-action">\n' +
            '<div class="d-flex gap-2">\n' +
            ' <button class="w-100 btn-sanpham btn-5 " style="margin-bottom: 5px!important;" onclick="ThemGioHang(' + data[i].idspct + ')"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</button></br>\n' +
            ' <a href="san-pham/chi-tiet/' + data[i].slug + '"><button class="w-100 btn-sanpham btn-5 mt-2"><i class="fas fa-search"></i> Xem chi tiết</button></a>\n' +
            '</div></div></div></div></div></div></div></div>';
    }
    document.getElementById("showsanpham").innerHTML = sp;
    if(data.length === 0){
        document.getElementById("showsanpham").innerHTML = `Không có dữ liệu nào!`;
    }
}



function showDichVu(data,perpage){
    const dichvu = data.slice(0,perpage);
    
    if(data.length < perpage){
        document.getElementById('xemthembtndv').style.display = 'none'
    }

    const dulieuResult = dichvu.reduce((total,value)=>{
        total +=`<div class="dichvu-item d-plex w-100">
        <div class="content-1">
            <div class="text-7 color-main-1">
            
                ${value.namedm}
            </div>

            <div class="text-8 mt-1">
               ${  formatTien(value.dongia - (value.dongia/100 * value.giamgia))} đ
            </div>

            <div class="img-1 mt-4">
                <a href="dich-vu/${value.slug}">
                    <img class="" src="${pathImg+ value.img}" alt="">
                </a>
            </div>

            <div class="text-1 limit-text-row-1 mt-4">
                <a href="dich-vu/${value.slug}">
                    ${value.name}
                </a>
            </div>

            <p class="text-2 limit-text-row-3 mt-1 mt-3">
                ${value.motangan}
            </p>
        </div>
        <div class="w-100 text-center mb-4">
            <a href="javascript:void(0)">
                <button  class="button btn-8 btn-datlich btn-modal-main" type-modal="modal-datlich" data-show="one">Đặt lịch</button>
            </a>
        </div>
    </div>`;
    return total;
    },'');
    document.getElementById('showdichvu').innerHTML = dulieuResult;
    if(data.length === 0){
        document.getElementById("showdichvu").innerHTML = `Không có dữ liệu nào!`;
    }
}


function showBaiViet(data,perpage){
    const baiviet = data.slice(0,perpage);
    
    if(data.length < perpage){
        document.getElementById('xemthembtnbv').style.display = 'none'
    }

    const dulieuResult = baiviet.reduce((total,value)=>{
        total +=`  <div class="dichvu-item d-plex w-100">
        <div class="content-1">
            <div class="text-7 color-main-1">
                ${value.tendm}
            </div>

            <div class="img-1 mt-4">
                <a href="${pathImg+value.slug}">
                    <img class="" src="${pathImg+value.img}" alt="">
                </a>
            </div>

            <div class="text-1 limit-text-row-1 mt-4">
                <a href="bai-viet/${value.slug}">
                 ${value.name}
                 </a>
            </div>

            <p class="text-2 limit-text-row-3 mt-1 mt-3">
                ${value.motangan}

            </p>
        </div>
        <div class="mt-3">
            <a href="bai-viet/${value.slug}"
                class="">
                <button class="
                btn-line px-0 color-gray-2">
                Đọc ngay
                </button>
            </a>
        </div>
    </div>`;
    return total;
    },'');
    document.getElementById('showbaiviet').innerHTML = dulieuResult;
    if(data.length === 0){
        document.getElementById("showbaiviet").innerHTML = `Không có dữ liệu nào!`;
    }
}

function formatTien(tien){
    return Number(tien).toLocaleString().replaceAll(",", ".");
}


// Hàm nhận id từ fun ShowSanPham để so sánh tiềm ra sản phẩm yêu thích
function SoSanhYeuThich(id) {
    var yeuthichs = '';
    if (yeuThichSPS.responseJSON.length != 0) {
        for (let i = 0; i < yeuThichSPS.responseJSON.length; i++) {
            if (Number(id) == Number(yeuThichSPS.responseJSON[i].idsanphamchitiet)) {
                yeuthichs = 'active';
            }
        }
    } else {
        yeuthichs = '';
    }
    return yeuthichs;
}

function AddYeuThichSPTimKiem(id) {
    $.ajax({
        url: domain + '/addyeuthichsp/' + id,
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {idsp: id},
        success: function (datayeuthich) {
            if (datayeuthich === 1) {
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

