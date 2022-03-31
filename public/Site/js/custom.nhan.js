async function checkCancel(url) {

    Swal.fire({
        title: 'Bạn có chắc chắn huỷ không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng Ý',
        cancelButtonText:'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
            return true;
        }else{
            return false;
        }
    });
}