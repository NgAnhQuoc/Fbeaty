@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div>
                             <button class="btn btn-primary waves-effect waves-light mb-3" ><a class="text-white" href="{{route('blog.create')}}">Thêm Bài Viết </a> </button>
                        </div>
                        <table class="table table-striped table-bordered dt-responsive " id="key-table" >
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">STT</th>
                                    <th width="20%">Tên bài viết</th>
                                    <th width="15%">Hình ảnh</th>
                                    <th width="15%">Danh mục</th>
                                    <th width="35%">Mô tả</th>
                                    <th width="15%">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i=> $item)
                                    <tr id="row{{$item->id}}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td> 
                                                {{$item->name}} <br>
                                                <?php if($item->trangthai == 0) echo "<div class=\"bg-danger mt-2 rounded-circle\" style=\"width:15px ;height: 15px;\"> </div>";
                                                else echo "<div class=\"bg-success mt-2 rounded-circle\" style=\"width:15px ;height: 15px;\"> </div>";?>
                                            
                                        </td> 
                                        <td>
                                            <img style="object-fit:cover; border-radius:10px" class="img-admin" width="120" height="80" src="{{ asset('uploads/'.$item->img) }}">
                                        </td>
                                        <td>
                                            {{$item->danhmuc}}
                                        </td>
                                        <td>
                                            <p style="width: 100%!important;">{{$item->motangan}}</p>
                                        </td>
                                        <td class="d-flex">
                                            <a name="" id="" class="btn btn-primary mr-2" href="{{route('blog.edit',$item->id)}}" role="button"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            <button type="submit" class="btn btn-danger"  onclick="deleteCommon({{$item->id}})"><i class="fa fa-trash"></i></button>
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
