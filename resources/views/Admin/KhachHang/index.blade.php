@extends('Admin.LayoutAdmin')

@section('content')
@php
    use app\Http\Controllers\Controller;
@endphp
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <x-admin.common.CaseError />
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="mb-3">
                            <a name="" id="" class="btn btn-primary" href="{{route('khachhang.create')}}" role="button">Thêm Khách Hàng</a>
                        </div>
                        <table id="key-table" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="3%">STT</th>
                                        <th width="20%">Khách hàng</th>
                                        <th width="20%">Hình ảnh</th>
                                        <th width="15%">Điện thoại</th>
                                        <th width="30%">Email</th>
                                        <th width="15%">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i=> $item)

                                        <tr id="row{{$item->id}}">
                                            <td>{{$i+=1}}</td>
                                            <td>{{$item->name}} <br>
                                                <?php if($item->active == 0) echo "<div class=\"bg-danger mt-2 rounded-circle\" style=\"width:15px ;height: 15px;\"> </div>";
                                                else echo "<div class=\"bg-success mt-2 rounded-circle\" style=\"width:15px ;height: 15px;\"> </div>";?>
                                            </td>
                                            <td>
                                                @if ($item->img && is_file(Controller::BASE_URL_UPLOAD_CUSTOMER.$item->img))
                                                    <img  class="img-common"  src="{{ asset(Controller::BASE_URL_UPLOAD_CUSTOMER.$item->img) }}">
                                                @else
                                                    <img  class="img-common"  src="{{ asset("".$URL_IMG.'khachhang/default-avatar-kh.jpg') }}">
                                                @endif
                                            </td>
                                            <td>
                                                {{$item->sdt}}
                                            </td>
                                            <td>
                                                {{$item->email}}
                                            </td>
                                            <td class="d-flex border-none">
                                                <a href="{{url('quantri/khachhang/detail/'.$item->id)}}" class="d-flex justify-content-center mr-2"><div class="btn btn-success"><i class="fa fa-info-circle"></i></div></a>
                                                <a name="" id="" class="btn btn-primary mr-2" href="{{route('khachhang.edit',$item->id)}}" role="button"><i class="fa fa-edit"></i></a>
                                                @csrf
                                                <button type="button" onclick="deleteCommon({{$item->id}})" class="btn btn-danger text-white " data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
