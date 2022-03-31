


@extends('Admin.LayoutAdmin')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row d-flex justify-content-center mt-3">
                <div class="col-xl-10 ">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="mt-0 header-title ">Danh Mục</h4>
                        <p class="text-muted font-14 mb-3">
                        Chỉnh sửa thông tin của danh mục.
                        </p>

                        <form data-parsley-validate action="{{route('danhmuc.update',$data->id)}}" novalidate method="post"  enctype="multipart/form-data">
                            @csrf
                            {!! method_field('patch') !!}
                           
                            <div class="form-group">
                                <label for="">Ảnh Danh Mục</label> <br>
                                <img width="200px" height="100px" class="objectcv" src="{{$URL_IMG.$data->img}}" alt="">
                                <input type="file" name="img"  parsley-trigger="change" required
                                placeholder="Nhập tên nhà sản xuất" class="form-control mt-3" id="img">
                            </div>
                            <div class="form-group">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" name="name" value="{{$data->name}}"  parsley-trigger="change" required
                                       placeholder="Nhập tên danh mục cần sửa" class="form-control @error('name') border-error @enderror" id="userName">
                                    @if ($errors->has('name'))
                                        <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('name')[0]}}</li></ul>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="">Loại</label>
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
                                            @if ($data->loai == $item['id'])
                                                <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                                            @else
                                                <option value="{{$item['id']}}" >{{$item['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group text-right mb-0 mt-4">
                                <a href="/quantri/danhmuc" clas="btn btn-secondary waves-effect waves-light ">Huỷ</a>
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light ml-2" value="Sửa">
                            </div>

                        </form>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>
@endsection
