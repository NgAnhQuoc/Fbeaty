@extends('Admin.LayoutAdmin')

@section('content')
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title"> Giảm Giá </h4>
                        <p class="text-muted font-14 mb-3">
                        Đây là Giảm Giá.
                        </p>
                        <div>
                            <a href="{{route("giamgia.create")}}"
                               class="btn btn-primary waves-effect waves-light mb-3">Thêm giảm giá
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
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <table id="key-table" class="table table-striped table-bordered dt-responsive ">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th width="5%">STT</th>
                                        <th width="10%">Tên Giảm Giá</th>
                                        <th width="10%">Mã Giảm Giá</th>
                                        <th width="11%">Loại Giảm Giá</th>
                                        <th width="14%">Giảm Giá tối thiểu</th>
                                        <th width="14%">Giảm Giá Tối Đa</th>
                                        <th width="11%">Ngày Tạo Mã</th>
                                        <th width="11%">Ngày Hết Hạn</th>
                                        <th width="12%">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                    @foreach ($data as $row)
                                    <?php $i++; ?>
                                        <tr class="text-center" id="row{{$row->id}}">
                                            <td>{{$i}}</td>
                                            <td class="" >{{$row->name}}</td>
                                            <td class="" >{{$row->ma}}</td>
                                            <td class="" >
                                                <?php
                                                if($row->loai==0)
                                                {
                                                    ?>
                                                   <span> Giảm Theo Giá </span>
                                                    <?php
                                                }else{
                                                ?>
                                                <span> Giảm Theo % </span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="" >
                                                <?php
                                                if($row->number <= 100)
                                                {
                                                    ?>
                                                   <span> {{number_format($row->number)}} % </span>
                                                    <?php
                                                }else{
                                                ?>
                                                 <span> {{$row->number}} VNĐ </span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="" >{{number_format($row->max)}} VNĐ</td>
                                            <td class="" >{{date('d-m-Y',$row->ngaytao)}}</td>
                                            <td class="" >{{date('d-m-Y',$row->ngayhethan)}}</td>

                                            <td class="d-flex">
                                                <a href="{{route("giamgia.edit",$row->id)}}" class="btn btn-primary mr-2" data-toggle="tooltip" data-placement="right" title="Sửa" ><i
                                                    class="fa fa-edit"  style="color: white;"></i></a>
                                                @csrf
                                                <button type="button" onclick="deleteCommon({{$row->id}})" class="btn btn-danger text-white" data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
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
@section('custom-javascript')
    <script src="{{ asset('Admin/assets') }}/js/pages/giamgia.js"></script>
@endsection
