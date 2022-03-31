@extends('Admin.LayoutAdmin')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <p class="mt-0 header-title btn btn-primary">Lịch làm việc</p>
                            <div class="container">
                                @if(session('thanhcong'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('thanhcong')}}
                                    </div>
                                @endif
                                    @if(session('thatbai'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            {{session('thatbai')}}
                                        </div>
                                    @endif
                            </div>

                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="5%">STT</th>
                                    <th width="95%">Cơ sở</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coso as $index => $cs)
                                    <tr>
                                        <td>{{$index+=1}}</td>
                                        <td>
                                            <p id="idcs" data-id="{{$cs->id}}">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-toggle="collapse" data-target="#collapseExample{{$index}}"
                                                        aria-expanded="false" aria-controls="collapseExample{{$index}}"
                                                        style="width: 20%;">
                                                    {{$cs->name}} <i class="fa fa-caret-down"></i>
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample{{$index}}">
                                                <div class="">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <?php $arrayThu = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7']; ?>
                                                        @foreach ($arrayThu as $in => $lh)
                                                            <li class="nav-item "
                                                                onclick="showngay({{$cs->id}}, {{$in+=0}})"
                                                                role="presentation">
                                                                <a class="nav-link <?php echo ($in == 0) ? 'active' : '';?>"
                                                                   id="home-tab" data-toggle="tab" href="#home"
                                                                   role="tab" aria-controls="home"
                                                                   aria-selected="true">{{$lh}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    <div id="showgio{{$cs->id}}"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- end row -->
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-5">
                        <nav>
                            <ul class="pagination pagination-split">
                                <?php
                                // echo $Pagination;
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>


            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay đổi khung giờ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formupgio" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhập số lượng khách</label>
                            <input type="number" min="1" max="1000000" name="soluongkh" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Giờ bắt đầu</label>
                                <select class="form-control" name="giobatdau" id="giobatdau" onchange="gio()">
                                    <?php
                                    for ($i = 5; $i <= 22; $i++)
                                    {
                                    ?>
                                    <option value=" {{$i}}">
                                        {{$i}}
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Giờ kết thúc</label>
                                <select class="form-control" name="gioketthuc" id="gioketthuc">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Khoảng giữa (? Phút)</label>
                                <select class="form-control" name="khoangiua" id="khoangiua">
                                    <?php
                                    for ($i = 1; $i <= 6; $i++)
                                    {
                                    ?>
                                    <option value="{{$i}}0">
                                        {{$i}}0
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('Admin/assets') }}/js/lich.js"></script>
    <script>
        function gio() {
            var gioketthuc = (Number(document.getElementById('giobatdau').value) + 1);
            var op = "";
            for (let i = gioketthuc; i <= 23; i++) {
                op += "<option>" + i + "</option>";
            }
            document.getElementById("gioketthuc").innerHTML = op;
        }
        gio()
    </script>

@endsection
