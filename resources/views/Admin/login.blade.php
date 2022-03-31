<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Đăng nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('Admin/assets/css')}}/adminlogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="{{ asset('Admin/assets') }}/js/app.min.js"></script>

</head>
<body>
<div class="login">
    <i class="fa fa-empire"></i>
    <h2>Đăng Nhập</h2>

    <form action="{{URL::to("quantri/login")}}" method="post" >
        @csrf
        @if(session('thongbao'))
            <div class="alert alert-warning alert-dismissible fade show rounded-pill mb-2" role="alert">
                <span class="font-weight-bold">Tên tài khoản hoặc mật khẩu không đúng !</span>
            </div>
        @endif
        <div class="group">
            <select class="text-secondary" name="coso" style="-webkit-appearance: none;">
                <option value="">Chọn cơ sở</option>
                @foreach ($coSo as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select><i class="fa fa-angle-down"></i>
            @error('coso')
            <span class="badge bg-danger text-white float-left mb-1 ml-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="group"><input type="text" name="email" placeholder="Email" value="{{old('email')}}"><i
                class="fa fa-user"></i>
            @error('email')
            <span class="badge bg-danger text-white float-left mb-1 ml-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="group "><input type="password" name="password" placeholder="Mật khẩu" value="{{old('password')}}"><i
                class="fa fa-lock"></i>
            @error('password')
            <span class="badge bg-danger text-white float-left mb-1 ml-2">{{ $message }}</span>
            @enderror
        </div>
        <button class="rounded-pill"><i class="fa fa-send"></i>Đăng nhập</button>
    </form>
</div>
</body>

</html>
