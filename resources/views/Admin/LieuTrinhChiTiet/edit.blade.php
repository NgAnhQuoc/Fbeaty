@extends('Admin.LayoutAdmin')

@section('content')
<?php
    use app\Http\Controllers\Controller;
?>
<div class="content-page">

    <div class="content">

        <!-- Start Content-->

        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title">Liệu Trình Chi Tiết</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang</a></li>
                                <li class="breadcrumb-item active">Liệu trình chi tiết</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            @if ($LieuTrinh !== null)
                <a name="" id="" class="btn btn-primary" href="{{URL::to('quantri/khachhang/detail/'.$LieuTrinh->idkhachhang.'')}}" role="button"><i class="mdi mdi-keyboard-backspace"></i></a>
            @endif
            
            <x-admin.common.CaseError />
            <!-- end page title -->

            <div class="row d-flex justify-content-center">
                <div class="col-sm-8">
                    <div class="d-flex justify-content-center">
                        @if ($hasHoaDon === 0)
                            <a data-toggle="modal" data-target="#myModal2" class="btn btn-primary width-lg text-white" >Thêm Mới</a>
                        @endif
                    </div>

                    <div class="timeline" dir="ltr">

                        <article class="timeline-item alt">
                            <div class="time-show first">

                            </div>

                            <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('lieutrinh.store')}}"  enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$id}}" name="id">

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Thêm Liệu Trình Chi Tiết</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Ảnh </label>
                                                    <input type="file" onchange="previewImg(event)" name="imgkhachhang"
                                                    placeholder="Nhập tên nhà sản xuất" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nhân viên làm</label>
                                                    <select class="form-control select2" name="idnhanvien">
                                                        @foreach ($NhanVien as $item)
                                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Chọn dịch vụ</label>
                                                            <select class="form-control select2" name="iddichvu">
                                                                @foreach ($DichVu as $item)
                                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Ngày làm</label>
                                                        <input class="form-control " id="example-date" type="date" name="ngay">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="">Ghi Chú</label>
                                                        <textarea class="form-control" rows="5" id="example-textarea" placeholder="Nhập nội dung" name="mota"></textarea>
                                                    </div>
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

                        </article>
                        @if (count($LieuTrinhChiTiet) === 0)
                            <x-admin.lieu-trinh-chi-tiet.CaseEmpty/>
                        @else
                       

                        @foreach ($LieuTrinhChiTiet as $item)
                            <article class="timeline-item @if($loop->index % 2 == 0) alt @endif">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="row boxlieutrinh">
                                            @if ($hasHoaDon === 0)
                                                <form action="{{route('lieutrinh.destroy',$item->idlieutrinhchitiet)}}"  method="post">
                                                    @csrf
                                                    {!!method_field('delete')!!}
                                                    <button class="icon-delete" type="submit">
                                                        <i class="mdi mdi-delete" ></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <div class="col-lg-12 @if($loop->index % 2 == 0) order-2 @else order-1 @endif">
                                                <div class="panel-body">
                                                    @if ($item->trangthai == 0)
                                                        <span class="arrow-alt"></span>
                                                    @endif

                                                    <form action="{{route('lieutrinh.update',$item->idlieutrinhchitiet)}}" method="post">
                                                        @csrf
                                                        {!! method_field('patch') !!}
                                                        <label for="update{{$item->idlieutrinhchitiet}}">
                                                            <span class="timeline-icon @if($item->trangthai === 0) bg-danger @else bg-success @endif"><i class="mdi @if($item->trangthai === 0) mdi-close @else mdi-check @endif"></i></span>
                                                        </label>
                                                        <button class="updatelieutrinhct" id="update{{$item->idlieutrinhchitiet}}" type="submit"></button>
                                                    </form>
                                                    @csrf
                                                    <h4 class="timeline-date text-primary date" title="Click để sửa" id="date" data-value="{{date('d-m-Y',$item->ngay)}}" data-format="DD-MM-YYYY" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="{{$item->idlieutrinhchitiet}}" >{{date('d-m-Y',$item->ngay)}}</h4>
                                                    <p class="timeline-date text-muted mt-1"><strong>Chuyên viên điều trị: {{$item->tennv}}</strong></p>
                                                    <div class="row d-flex justify-content-end mt-1">
                                                        <div class="col-12">
                                                            <h4 class="@if($item->trangthai === 0) text-danger @else text-success  @endif">{{$item->tendv}}</h4>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class=" text-danger">{{Controller::caculateGia($item->dongia,$item->giamgia)}} VNĐ</p>
                                                        </div>

                                                    </div>

                                                    <p class="ghichu" style="margin-top: 5px !important;" id="ghichu" title="Click để sửa" data-type="textarea" data-pk="{{$item->idlieutrinhchitiet}}" >{{$item->ghichu}} </p>

                                                    <div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12 d-flex justify-content-end @if($loop->index % 2 == 0) order-1 @else order-2 @endif">
                                                <input type="hidden" value="{{$item->idlieutrinhchitiet}}" id="idlieutrinhgan" class="idlieutrinhchitiet">
                                           
                                                @if (is_file($BASE_URL_UPLOAD_CUSTOMER.$item->imgkhachhang))
                                                    <img onclick="showFullImage(event)" class="imglieutrinh" src="{{asset($BASE_URL_UPLOAD_CUSTOMER.$item->imgkhachhang ) }}" alt="">
                                                    
                                                @else
                                                    <img onclick="showFullImage(event)" class="imglieutrinh" src="{{asset($BASE_URL_UPLOAD_CUSTOMER.'default-avatar-kh.jpg') }}" alt="">
                                                    
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                             
                        @endif
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if (count($LieuTrinhChiTiet) !== 0)
            <div class="row d-flex justify-content-end mb-3">
                <div class="col-lg-3">
                    @php
                        $tongtien =0;
                    @endphp
                    @foreach ($LieuTrinhChiTiet as $item)
                       @php
                             $tongtien +=  $item->dongia - ($item->dongia/100 * $item->giamgia);
                       @endphp
                    @endforeach
                    Tổng tiền: <strong class="text-danger">{{number_format($tongtien, 0, ',', '.')}}</strong> VNĐ <br>
                    @if ($hasHoaDon === 0)
                        <a class="btn btn-primary mt-3" onclick="return checkConfirm()" href="quantri/hoadon/addhoadonbylieutrinh/{{$id}}/store" role="button">Tiến Hành Thanh Toán</a>
                    @else
                        <button class="btn btn-danger mt-2">Liệu trình đã thanh toán</button>
                    @endif
                </div>
            </div>
            @endif
        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                   2016 - 2020 &copy; Adminto theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content boxcontent">
        <img src="" id="imgshow" alt="">
        <label for="inputfile" class="boxedit">
            <div ><i class="fa fa-edit"></i></div>
        </label>
        <input type="file"  id="inputfile" class="inputfile">
        <input type="hidden" id="idlieutrinhchitietgan">
        @csrf
      </div>
    </div>
  </div>

@endsection
