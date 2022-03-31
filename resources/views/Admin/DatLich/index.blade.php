@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <p class="mt-0 header-title btn btn-primary">Danh sách Đặt lịch làm việc theo từng cơ sở</p>
                        <div class="container">
                            @if(session('thanhcong'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('thanhcong')}}
                            </div>
                            @endif
                        </div>

                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header " id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-primary " data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                            Danh sách
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div id="showgio">
                                                            <table class="table">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">Stt</th>
                                                                        <th scope="col">Dịch vụ</th>
                                                                        <th scope="col">Nhân viên</th>
                                                                        <th scope="col">Khách hàng</th>
                                                                        <th scope="col">Thời gian đặt</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach ($data as $i=> $data1)

                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">{{$i+=1}}</th>
                                                                        {{-- <td>{{$name}}</td> --}}
                                                                        <td>{{$data1->namenv}}</td>
                                                                        <td>{{$data1->namekh}}</td>
                                                                        <td>{{$data1->thoigiandat}}</td>
                                                                    </tr>
                                                                </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0 ">
                                                        <button class="btn btn-primary collapsed" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Hôm nay
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div id="showgio">
                                                            <table class="table">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">Stt</th>
                                                                        <th scope="col">Dịch vụ</th>
                                                                        <th scope="col">Nhân viên</th>
                                                                        <th scope="col">Khách hàng</th>
                                                                        <th scope="col">Thời gian đặt</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach ($data as $i=> $data1)
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">{{$i+=1}}</th>
                                                                        <td>{{$data1->iddichvu}}</td>
                                                                        <td>{{$data1->namenv}}</td>
                                                                        <td>{{$data1->namekh}}</td>
                                                                        <td>{{($data1->thoigiandat)}}</td>
                                                                    </tr>
                                                                </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-primary collapsed" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                            7 ngày tới
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div id="showgio">
                                                            <table class="table">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">Stt</th>
                                                                        <th scope="col">Dịch vụ</th>
                                                                        <th scope="col">Nhân viên</th>
                                                                        <th scope="col">Khách hàng</th>
                                                                        <th scope="col">Thời gian đặt</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach ($data as $i=> $data1)
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">{{$i+=1}}</th>
                                                                        <td>{{$data1->iddichvu}}</td>
                                                                        <td>{{$data1->namenv}}</td>
                                                                        <td>{{$data1->namekh}}</td>
                                                                        <td>{{$data1->thoigiandat}}</td>
                                                                    </tr>
                                                                </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    </div>
                    </td>
                    </tr>
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
