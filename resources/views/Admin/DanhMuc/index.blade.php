@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Danh Mục</h4>
                        <p class="text-muted font-14 mb-3">
                        Danh mục sản phẩm, dịch vụ, bài viết.
                        </p>
                        <div>
                             <button class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#myModal">Thêm Danh Mục</button>
                        </div>
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('danhmuc.store')}}"  enctype="multipart/form-data" method="post">
                                        @csrf

                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Thêm Danh Mục</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="file" name="img"  onchange="previewImg(event)" parsley-trigger="change" required
                                                 class="form-control" id="img">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="name"  parsley-trigger="change" required
                                                placeholder="Nhập tên danh mục" class="form-control" id="userName">
                                            </div>

                                            <div class="form-group">
                                                @php
                                                    $array = [
                                                        ['id'=>1,'name'=>"Dịch Vụ"],
                                                        ['id'=>2,'name'=>"Sản Phẩm"],
                                                        ['id'=>3,'name'=>"Bài Viết"],
                                                        ['id'=>4,'name'=>"Thương Hiệu"]
                                                    ];
                                                @endphp

                                                <select class="form-control select2" name="loai">
                                                    @foreach ($array as $item)
                                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Huỷ</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <table id="key-table" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="10%">STT</th>
                                        <th width="20%">Ảnh Danh Mục</th>
                                        <th width="40%">Tên Danh Mục</th>
                                        <th width="15%">Loại</th>
                                        <th width="15%">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)

                                        <tr id="row{{$item->id}}">
                                            <td>{{$item->id}}</td>
                                            <td><img  class="objectcv img-common" src="{{asset($URL_IMG.$item->img)}}" alt=""></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @foreach ($array as $row)
                                                    @if ($row['id'] == $item->loai)
                                                        {{$row['name']}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td >
                                                <a id="" class="btn btn-primary mr-2" href="{{route('danhmuc.edit',$item->id)}}" role="button"><i class="fa fa-edit"></i></a>
                                                @csrf
                                                <button type="button" onclick="deleteCommon({{$item->id}})" class="btn btn-danger text-white" data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
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
