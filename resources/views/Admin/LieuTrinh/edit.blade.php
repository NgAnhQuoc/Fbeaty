@extends('Admin.LayoutAdmin')
@section('content')



<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
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

                        <h4 class="header-title mt-0 mb-4">Sửa Liệu Trình</h4>

                        <form  action="{{URL::to('quantri/khachhang/lieutrinh/'.$data->id.'/update')}}"  method="post" enctype="multipart/form-data">

                            @csrf
                            {!! method_field('patch') !!}

                            <div class="form-group">
                                <input class="form-control" value="{{$data->idkhachhang}}" type="hidden" name="idkhachhang">
                                <select class="form-control select2" name="idnhanvien">
                                    @foreach ($NhanVien as $item)
                                        @if ($item->id === $data->idnhanvien)
                                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                                        @else
                                            <option  value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                               @if ($errors->has('idnhanvien'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('idnhanvien')[0]}}</li></ul>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label >Nhập thời gian bắt đầu </label>
                                            <input class="form-control"  id="example-date" value="{{date('Y-m-d',$data->ngaybatdau)}}" type="date" name="ngaybatdau">
                                        </div>
                                        @if ($errors->has('ngaybatdau'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('ngaybatdau')[0]}}</li></ul>
                                        @endif   
                                     </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label >Nhập dự kiến kết thúc</label>
                                            <input class="form-control" id="example-date" value="{{date('Y-m-d',$data->dukienketthuc)}}" type="date" name="dukienketthuc">
                                        </div>
                                        @if ($errors->has('dukienketthuc'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('dukienketthuc')[0]}}</li></ul>
                                        @endif  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Ghi chú</label>
                                        <textarea class="form-control @error('mota') border-error @enderror"  style="height: 100px;width:100%; border:1px solid #ccc" name="ghichu" >{{$data->ghichu}}</textarea>   
                                        @if ($errors->has('mota'))
                                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false"><li class="parsley-required">{{$errors->get('ghichu')[0]}}</li></ul>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                        
                          
                            <div class="form-group text-right mb-0 mt-5">
                                <a href="/quantri/khachhang" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
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