@extends('Admin.LayoutAdmin')
@section('content')



<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-12">
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

                        <h4 class="header-title mt-0 mb-4">Sửa Sản Phẩm</h4>

                        <form  action="{{route('sanpham.update',$data->id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            {!! method_field('patch') !!}

                            <div class="form-group">
                                <label for="">Hình ảnh</label><br>
                                <div class="d-flex">
                                    @foreach ( json_decode($data->img)  as $item)
                                        <img class="mr-2" width="130" height="90" style="object-fit: cover; border-radius:3px"  src="{{ asset($URL_IMG.$item) }}" alt="">
                                    @endforeach
                                </div>
                              
                               <br><br><input type="file" name="imgs[]" multiple>
                               @if ($errors->has('img'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('img')[0]}}</li></ul>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Tên Sản Phẩm</label>
                                                <input type="text" name="name" value="{{$data->name}}" parsley-trigger="change" required
                                                    placeholder="Nhập tên của sản phẩm" class="form-control @error('name') border-error @enderror" id="userName">
                                                @if ($errors->has('name'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('name')[0]}}</li></ul>
                                                @endif   
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Giảm Giá</label>
                                                <input type="number"  name="giamgia" value="{{$data->giamgia}}"
                                                    placeholder="Nhập giảm giá" class="form-control  @error('giamgia') border-error @enderror" id="userName">
                                                    @if ($errors->has('giamgia'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('giamgia')[0]}}</li></ul>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Danh Mục</label>
                                                <select class="form-control select2" name="iddanhmuc">
                                                    @foreach ($cate as $item)
                                                        @if ($item->id === $data->iddanhmuc)
                                                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                        @else
                                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('iddanhmuc'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('iddanhmuc')[0]}}</li></ul>
                                                @endif  
                                            </div>
                                        </div>

                                       <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Thương Hiệu</label>
                                                <select class="form-control select2" name="idthuonghieu">
                                                    @foreach ($thuongHieu as $item)
                                                        @if ($item->id === $data->idthuonghieu)
                                                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                        @else
                                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('idthuonghieu'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('idthuonghieu')[0]}}</li></ul>
                                                @endif  
                                            </div>
                                       </div>

                                        
                                    </div>
                              
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Mô Tả</label>
                                        <textarea class="form-control @error('mota') border-error @enderror"  style="height: 100px;width:100%; border:1px solid #ccc" name="mota" >{{$data->mota}}</textarea>   
                                        @if ($errors->has('mota'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('mota')[0]}}</li></ul>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                           
                            <textarea id="summernote"  name="noidung" >
                                {{$data->noidung}}
                            </textarea>
                            @if ($errors->has('noidung'))
                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('noidung')[0]}}</li></ul>
                            @endif
                            <div class="row mt-3">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input id="remember-1" {{($data->trangthai === 1 ) ? 'checked' : '' }} type="checkbox" name="trangthai" value="1"  data-parsley-multiple="remember-1">
                                            <label for="remember-1">Trạng Thái ? </label>
                                            @if ($errors->has('trangthai'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('trangthai')[0]}}</li></ul>
                                            @endif
                                        </div>
                                    </div>            
                                </div>   
                            </div>
                          
                            <div class="form-group text-right mb-0 mt-5">
                                <a href="/quantri/sanpham" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
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