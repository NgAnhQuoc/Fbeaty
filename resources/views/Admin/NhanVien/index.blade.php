@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="mt-0 header-title">Nhân viên cơ sở </h4>
                                    <p class="text-muted font-14 mb-3">
                                        Đây danh sách nhân viên đang hoạt động tại cơ sở.
                                    </p>
                                </div>
                            </div>


                            <div>
                                <a href="{{route("nhanvien.create")}}"
                                   class="btn btn-primary waves-effect waves-light mb-3">Thêm nhân viên
                                </a>
                            </div>
                            <div class="container">
                                @if(session('thanhcong'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('thanhcong')}}
                                    </div>
                                @endif

                                @if(session('thatbai'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('thatbai')}}
                                    </div>
                                @endif

                            </div>
                            <table id="key-table" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                <tr>
                                    <th width="">STT</th>
                                    <th scope="">Thông tin nhân viên</th>
                                    <th width="">Cơ sở</th>
                                    <th width="10%">Avatar</th>
                                    <th width="">Phân quyền</th>
                                    <th width="">Sửa</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4 font-weight-bold">Tên:</div>
                                                <div class="col-md-6">{{$item->name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 font-weight-bold">Email:</div>
                                                <div class="col-md-6">{{$item->email}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 font-weight-bold">Năm sinh:</div>
                                                <div class="col-md-6">{{$item->namsinh}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 font-weight-bold">SĐT:</div>
                                                <div class="col-md-6">{{$item->sdt}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 font-weight-bold">Giới tính:</div>
                                                <div
                                                    class="col-md-6"><?php echo ($item->gioitinh == 1) ? "Nam" : "Nữ";?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5 font-weight-bold">Cơ sở:</div>
                                                <div class="col-md-7 ">{{$item->coso}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <img class="w-100 m-auto" style="border-radius:3px;width:100px;height:100px; object-fit:cover"
                                                 src="{{asset($BASE_URL_UPLOAD_STAFF.$item->avatar)}}">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6 font-weight-bold">Role:</div>
                                                <div
                                                    class="col-md-6"><?php echo ($item->role == 1) ? " <i class='fas fa-crown text-warning' style='font-size:10px'></i>Admin" : " <i class='fas fa-chess-pawn text-danger' style='font-size:12px'></i>Staff";?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 font-weight-bold">Active:</div>
                                                <div
                                                    class="col-md-6"><?php echo ($item->active == 1) ? "<i class='fa fa-circle text-success' style='font-size:7px'></i> Kích hoạt" : " <i class='fa fa-circle text-danger' style='font-size:7px'></i>Chưa kích hoạt";?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 font-weight-bold">Trạng thái:</div>
                                                <div
                                                    class="col-md-6"><?php echo ($item->trangthai == 1) ?"<i class='fa fa-circle text-success' style='font-size:7px'></i> Hoạt động" : "<i class='fa fa-circle text-danger' style='font-size:7px'></i> Không hoạt động";?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a id="" class="btn btn-primary mb-2"
                                               href="{{route("nhanvien.edit", $item->id)}}" role="button" title="sửa"><i
                                                    class="fa fa-edit"></i></a>
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



@endsection
