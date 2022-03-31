@extends('Admin.LayoutAdmin')
@section('content')
<?php
    use app\Http\Controllers\Admin\KhachHangController;
    use app\Http\Controllers\Controller;
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title">Thông Tin Khách Hàng</h4>
                        <p class="text-muted font-14 mb-3">
                        Thông tin chi tiết mô tả của khách hàng.
                        </p>
                        <div class="boxinfouser">
                            <div class="left">
                                @if ($KhachHang->img)
                                    <img class="d-flex mr-3 rounded-circle avatar-md" style="object-fit: cover" alt="64x64" src="{{asset(Controller::BASE_URL_UPLOAD_CUSTOMER.$KhachHang->img)}}">
                                @else
                                    <img  class="mr-3 rounded-circle avatar-md"  style="object-fit: cover" src="{{ asset(''.$URL_IMG.'khachhang/default-avatar-kh.jpg') }}">
                                @endif
                            </div>
                            <div class="right ml-2">
                                <div class="boxnguoidung">
                                    <p>Anh(chị):</p><h4> {{$KhachHang->name}} </h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        Số điện thoại: {{$KhachHang->sdt}}
                                    </div>
                                    <div class="col-lg-9">
                                        Email: {{$KhachHang->email}}
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div id="basicwizard" class="mt-4">

                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-2">
                                <li class="nav-item">
                                    <a href="#basictab1" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2"> 
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline">Liệu Trình</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile mr-1"></i>
                                        <span class="d-none d-sm-inline">Dịch Vụ Đã Sử Dụng</span>
                                    </a>
                                </li>
                             
                            </ul>

                            <div class="tab-content border-0 mb-0">
                                <div class="tab-pane" id="basictab1">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal" value="Thêm Liệu Trình">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                               
                                                     @endif
                                                </div>
                                            </div>
                                            @if (count($LieuTrinh)>0)
                                            <table class="table table-centered mb-0 lieutrinhtable" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nhân Viên Làm</th>
                                                        <th>Ngày bắt đầu</th>
                                                        <th>Dự kiến Kết thúc</th>
                                                        <th width="15%">Ghi Chú</th>
                                                        <th>Hoàn Thành</th>
                                                        <th>Thanh Toán</th>
                                                        <th>Hành Động</th>
                                                    </tr>
                                                </thead>

                                                <tbody >
                                                    @foreach ($LieuTrinh as $item)
                                                        
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <img style="width:80px;height:80px;border-radius:3px;object-fit:cover"  src="{{ asset($BASE_URL_UPLOAD_STAFF.$item->imgnv) }}"><br>
                                                                <div class="badge badge-primary">{{$item->tennv}}</div> 
                                                            </td>
                                                            <td>{{date('d-m-Y',$item->ngaybatdau)}} </td>
                                                            <td> {{date('d-m-Y',$item->dukienketthuc) }}</td>
                                                            <td>{{substr($item->ghichu,0,90)}} ..</td>
                                                           
                                                            <td>
                                                                @if ($item->trangthai === 0)
                                                                         <span class="badge badge-primary badge-pill float-left ">Đang Tiến hành<i class="mdi mdi-trending-up"></i> </span>
                                                                @else
                                                                    <span class="badge badge-success badge-pill float-left">Hoàn Thành<i class="mdi mdi-check"></i> </span>
                                                                @endif
                                                            </td>
                                                              
                                                            <td>
                                                                 @if (KhachHangController::checkHoaDon($item->idlieutrinh))
                                                                    <span class="badge badge-primary badge-pill float-left "><i class="fa fa-check-circle"></i> </span>
                                                                 @else
                                                                    <span class="badge badge-danger badge-pill float-left"><i class="fa fa-minus-circle"></i>  </span>
                                                                 @endif
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <a class="btn btn-success mr-2 mt-3" href="{{URL::to('quantri/khachhang/lieutrinh/'.$item->idlieutrinh.'/edit')}}" role="button"><i class="fa fa-info-circle"></i></a>
                                                                <a class="btn btn-primary mr-2 mt-3" href="{{route('lieutrinh.edit',$item->idlieutrinh)}}" role="button"><i class="fa fa-edit"></i></a>
                                                                <form action="{{URL::to('quantri/khachhang/xoalieutrinh/'.$item->idlieutrinh.'/delete')}}" method="post">
                                                                    @csrf
                                                                    {!!method_field('delete')!!}
                                                                    <button class="btn btn-danger mr-2 mt-3" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    @else
                                                        <p class="mb-3">Khách hàng chưa có liệu trình nào!</p> 
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>

                                <div class="tab-pane" id="basictab2">
                                    @if (count($DichVuDaSuDung)>0)
                                    <table class="table table-centered mb-0 lieutrinhtable" id="btn-editable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ảnh</th>
                                                <th>Tên dịch vụ</th>
                                                <th>Giá</th>
                                                <th>Mô Tả</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                                @foreach ($DichVuDaSuDung as $item)
                                                    <tr>
                                                        <td>{{++$loop->index}}</td>
                                                        <td><img style="width:80px;height:80px;border-radius:3px;object-fit:cover"  src="{{ asset($URL_IMG.$item->img) }}"><br></td>
                                                        <td>{{$item->name}}</td>
                                                        <td> {{Controller::caculateGia($item->dongia,$item->giamgia)}} VNĐ</td>
                                                        <td>{{substr($item->motangan,0,150)}} ...</td>
                                                    </tr>
                                                @endforeach
                                         
                                        </tbody>
                                    </table>
                                    @else
                                        <p class="mb-3">Khách hàng chưa sử dụng dịch vụ nào!</p> 
                                    @endif

                                </div>

                                

                                <ul class="list-inline wizard mb-0">
                                    <li class="previous list-inline-item">
                                        <a href="javascript: void(0);" class="btn btn-secondary">Lùi</a>
                                    </li>
                                    <li class="next list-inline-item float-right">
                                        <a href="javascript: void(0);" class="btn btn-secondary">Tiếp</a>
                                    </li>
                                </ul>

                            </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->


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


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{URL::to('quantri/khachhang/themlieutrinh/'.$KhachHang->id.'/store')}}"  enctype="multipart/form-data" method="post">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Thêm Liệu Trình</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >Nhân Viên</label>
                        <select class="form-control select2 @error('iddanhmuc') border-error @enderror" name="idnhanvien">
                            <option value="">Chọn</option>
                            @foreach ($NhanVien as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Nhập thời gian bắt đầu</label>
                        <input class="form-control" id="example-date" type="date" name="ngaybatdau">
                    </div>
                    <div class="form-group">
                        <label >Nhập dự kiến kết thúc</label>
                        <input class="form-control" id="example-date" type="date" name="dukienketthuc">
                    </div>
                    <div class="form-group">
                        <label >Nhập ghi chú</label>
                        <textarea class="form-control" name="ghichu" rows="5" id="example-textarea" placeholder="Nhập ghi chú"></textarea>
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
@endsection