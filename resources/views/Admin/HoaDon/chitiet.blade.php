@extends('Admin.LayoutAdmin')

@section('content')
    <style>
        .demos-show-btn {
            display: none;
        }
    </style>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card-box">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body p-3">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <p style="font-size: 22pt;">Hóa đơn FBeauty </p>
                                    </div>
                                    <div class="float-right">
                                        <p style="font-size: 15pt;">Hóa đơn #<br>
                                            <strong>{{date_format(date_create($hoadon->created_at), 'YmdHis')}}</strong>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row mt-3">
                                            <address class="col-md-8">
                                                <strong>Cơ sở: </strong>
                                                {{$coso->name}} <br>
                                                <strong title="Phone">ĐC: </strong> {{$coso->diachi}}
                                            </address>
                                        </div>
                                        <div class="row mt-1">
                                            <address class="col-md-6">
                                                <strong>Liệu trình</strong><br>
                                                <?php $infolieutrinh = \Illuminate\Support\Facades\DB::table('lieutrinh')->select("*")->where('id', '=', $idlieutrinh)->first();?>

                                                <table class="table table-bordered w-100">
                                                    <thead>
                                                    <tr>
                                                        <th >Ngày bắt đầu</th>
                                                        <th >Dự kiến kết thúc</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>@if(empty($infolieutrinh)==false)
                                                        <td width="50%">{{date('d-m-Y',$infolieutrinh->ngaybatdau)}}</td>
                                                        <td width="50%">{{date('d-m-Y',$infolieutrinh->dukienketthuc)}}</td>
                                                            @else
                                                            <td colspan="2">Chưa có liệu trình</td>
                                                        @endif
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="float-right mt-3">
                                            <p><strong>Ngày
                                                    tạo: </strong> {{date_format(date_create($hoadon->created_at), 'd-m-Y')}}
                                            </p>
                                            <p class="m-t-10"><strong>Trạng thái: </strong> <span
                                                    class="label label-pink"><?php echo ($hoadon->trangthai == \App\Http\Controllers\Controller::TRANGTHAITHANHTOAN) ? 'Đã thanh toán' : 'Chưa thanh toán';?></span>
                                            </p>
                                            <p class="m-t-10"><strong>Thu ngân: </strong> <span
                                                    class="label label-pink">{{$thungan->name}}</span></p>
                                            <p class="m-t-10"><strong>Nhân viên: </strong> <span
                                                    class="label label-pink">{{$TenNhanVien->name}}</span></p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        Chi tiết hóa đơn -->
                                        <div class="table-responsive">
                                            <table class="table mt-4">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên dịch vụ / Sản phẩm</th>
                                                    <th>Mô tả</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Tổng tiền (VND)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($hdct as $in =>$hdchitiet)
                                                    <tr>
                                                        <td>{{$in+=1}}</td>
                                                        <?php if ($hdchitiet->type == \App\Http\Controllers\Controller::ID_LIENQUAN_SP_)
                                                        {
                                                        $tensp = \Illuminate\Support\Facades\DB::table('sanphamchitiet')->select("sanphamchitiet.*", "sanpham.name AS TenSP")->join('sanpham', 'sanphamchitiet.idsanpham', '=', 'sanpham.id')->where('sanphamchitiet.id', '=', $hdchitiet->idlienquan)->get();
                                                        ?>
                                                        <td>{{$tensp[0]->TenSP}}</td>
                                                        <td>{{$tensp[0]->ml}} ml</td>
                                                        <?php
                                                        }
                                                        else{
                                                        $tendichvu = \Illuminate\Support\Facades\DB::table('dichvu')->select("*")->where('id', '=', $hdchitiet->idlienquan)->get();
                                                        ?>

                                                        <td>{{$tendichvu[0]->name}}</td>
                                                        <td>{{ substr($tendichvu[0]->motangan, 0, 25)}}...</td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td>{{$hdchitiet->soluong}}</td>
                                                        <td>{{number_format($hdchitiet->dongiasaugiamgia), ""}}</td>
                                                        <td>{{number_format($hdchitiet->dongiasaugiamgia*$hdchitiet->soluong), ""}} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-6">
                                        <div class="clearfix mt-4">
                                            <p class="small text-dark" style="font-size: 10pt;">Spa làm đẹp FBeauty</p>

                                            <small>
                                                Cảm ơn quý khách hàng đã tin tưởng và ủng hộ chúng tôi !!!
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6 offset-xl-3">
                                        <p class="text-right">
                                            <b>Tổng: </b> {{number_format($hoadon->tongtientruocgiamgia), ""}} VND</p>
                                        @if($hoadon->idgiamgia!="")
                                            <?php $magiam = \Illuminate\Support\Facades\DB::table('giamgia')->select("*")->where('id', '=', $hoadon->idgiamgia)->get();?>
                                            <p class="text-right"><strong>Mã giảm giá: </strong> {{$magiam[0]->name}}</p>
                                            <p class="text-right">
                                                <strong>Giảm: </strong> {{number_format($magiam[0]->number), ""}} <?php echo ($magiam[0]->loai == \App\Http\Controllers\Controller::LOAIGIAM) ? '%' : 'VND';?>
                                            </p>
                                        @else
                                            <p class="text-right">Giảm giá: <strong>Không</strong></p>
                                        @endif
                                        <hr>
                                        <p class="text-right" style="font-size: 13pt;"><b>THÀNH
                                                TIỀN: </b>{{number_format($hoadon->tongtiensaugiamgia), ""}}VND</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()"
                                           class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->



@endsection
