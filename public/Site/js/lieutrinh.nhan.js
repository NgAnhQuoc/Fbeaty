async function showLieuTrinhDetail(id,event){
    $('#lieutrinh-id').modal('show');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val(),
        },
    });


    await $.ajax({
        type: "GET",
        url: `lieutrinhchitiet/${id}/get`,
        contentType: false,
        processData: false,
        success: function (response) {
            const tong = response.dataLieuTrinhChiTiet.length;
            const ngayBatDau =  formatDate(response.dataLieuTrinh.ngaybatdau);
            const duKienKetThuc =  formatDate(response.dataLieuTrinh.dukienketthuc);
       
            $("#ngaybatdau").html(ngayBatDau);
            $("#dukienketthuc").html(duKienKetThuc);

            let thanhcong = 0;
          
            const value = response.dataLieuTrinhChiTiet.map(val=>{
                (val.trangthai === 1) ? ++thanhcong : thanhcong;
                const html = ` <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    ${
                        (val.trangthai === 1) ? '<span class="uk-badge done"><span uk-icon="check" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span></span>' 
                        : '<span class="uk-badge in-propress"><span uk-icon="check" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span></span>'
                    }
                </div>
                <input type="hidden" id="idlieutrinh" value="${val.idlieutrinh}">
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                                <h3 class="uk-card-title uk-first-column"><time datetime="2020-07-08">Ngày ${new Date(val.ngay * 1000).getDate()} Tháng  ${new Date(val.ngay * 1000).getMonth()}</time></h3>
                                ${
                                    (val.trangthai === 1) ? '<span class="uk-label uk-label-success uk-margin-auto-left">Hoàn thành</span>' :  '<span class="uk-label uk-label-secondary uk-margin-auto-left">Chưa đến </span>'
                                }
                            
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <div class="list-image-group">
                                <div class="item">
                                    <img src="uploads/khachhang/${val.imgkhachhang}" alt="">
                                </div>

                               
                            </div>
                            <div class="list-group mt-4">
                                <label class="">Dịch vụ sử dụng</label>
                                <div class="item">${val.tendv}</div>
                               
                            </div>

                            <div class="list-group mt-4">
                                <label class="">Chuyên viên thực hiện</label>
                                <div class="item">CV. ${val.tennv}</div>
                            </div>

                            <div class="list-group mt-4">
                                <label class="">Ghi Chú </label>
                                <div class="ghichu">${val.ghichu}</div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>`;
            return html;
            })
            let phantram;
            if(thanhcong !== 0){
                phantram = thanhcong / tong  * 100;
            }else{
                phantram = 0;
            }
            showProgressLieuTrinh(phantram);
            
            $("#bodylieutrinhchitiet").html(value);
            
            

        }
    });

}
async function checkConfirm(text) {

    return await Swal.fire({
        title: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: 'Huỷ'
    }).then((result) => {
        if (result.isConfirmed) {
            return true;
        } else {
            return false;
        }
    })
}

function showError(text){
    Swal.fire({
        title: text,
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
    })
}
function showSuccess(text){
    Swal.fire({
        title: text,
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
    })
}




async function huyLieuTrinh(){
    const confilm = await checkConfirm('Bạn có chắc muốn huỷ liệu trình không ?');
    if(confilm){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            },
        });

        const idlieutrinh = $("#idlieutrinh").val();
        const formData = new FormData();
        formData.append('idlieutrinh',idlieutrinh);

        await $.ajax({
            type: "POST",
            url: `lieutrinh/cancel`,
            contentType: false,
            processData: false,
            data:formData,
            success: function (response) {
                if(response.success == false){
                    showError(response.textMess);
                }else{
                    showSuccess(response.textMess);
                    window.location.reload();
                }

            }})
    }
}

function showProgressLieuTrinh(percent){

    let progressBar =  $("#circular-progress");
    let valueContainer = $("#progress");

    let progressValue = 0;
    let progressEndValue = percent;
    let speed = 10;

    let progress = setInterval(() => {
        progressValue++;
        if(percent == 0){
            clearInterval(progress);
            progressValue = 0;
        }
       
        if ( progressValue >= progressEndValue) {
            clearInterval(progress);
        }
        valueContainer.html(`${progressValue}%`);

        progressBar.css('background', `conic-gradient(
            #4d5bf9 ${progressValue * 3.6}deg,
            #cadcff ${progressValue * 3.6}deg
        )`);
       
    }, speed);
    $("#progress").html(percent + '%');
}

function formatDate(ngay){
    const parseDate =  new Date(ngay * 1000);
    return `${parseDate.getDate()} - ${parseDate.getMonth()} - ${parseDate.getFullYear()}`
}