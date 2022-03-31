@if(session('thanhtoanthanhcong'))
    <script>
        Swal.fire(
            "Đặt hàng thành công",
            'Hãy đăng nhập để kiểm tra đơn hàng của bạn!',
            'success'
        )
    </script>
@elseif(session('thanhtoanvnpaythanhcong'))
    <?php if (session()->has('khachHang') && session('khachHang') != ''){?>
    <script>
        Swal.fire(
            'Thanh toán thành công',
            'Vào mục thông tin để kiểm tra đơn hàng của bạn!',
            'success'
        )
    </script>
    <?php } else{?>
    <script>
        Swal.fire(
            'Thanh toán thành công',
            'Hãy đăng nhập để kiểm tra đơn hàng của bạn!',
            'success'
        )
    </script>
    <?php }?>
@elseif(session('thanhtoanthatbai'))
    <script>
        Swal.fire(
            'Thanh toán thất bại',
            'Hãy đăng nhập để kiểm tra đơn hàng của bạn!',
            'error'
        )
    </script>
@endif

@if(session('thongbaoprofile'))
    <script>
        Swal.fire(
            '{{session('thongbaoprofile')}}',
            '',
            'success'
        )
    </script>
@elseif(session('thatbaiprofile'))
    <script>
        Swal.fire(
            '{{session('thatbaiprofile')}}',
            '',
            'error'
        )
    </script>
    @endif

@if(session('guilienhe'))
    <script>
        Swal.fire(
            '{{session('guilienhe')}}',
            '',
            'success'
        )
    </script>
@elseif(session('guilienhethatbai'))
    <script>
        Swal.fire(
            '{{session('guilienhethatbai')}}',
            '',
            'error'
        )
    </script>
@endif
