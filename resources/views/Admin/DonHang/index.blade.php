@extends('Admin.LayoutAdmin')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mt-0 header-title"> Đơn Hàng </h4>
                        <p class="text-muted font-14 mb-3">
                        Đơn Hàng sản phẩm.
                        </p>
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

                        <table id="key-table" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th width="10.5%"> Mã đơn hàng </th>
                                        <th width="15.5%"> Khách hàng </th>
                                        <th width="12%">SĐT người nhận</th>
                                        <th width="11%">Tổng Tiền </th>
                                        <th width="11%">Tổng Tiền Giảm</th>
                                        <th width="12%">Trạng Thái</th>
                                        <th width="12%">Hành Động</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)

                                        <tr class="text-center">
                                            <td>{{$index+=1}}</td>
                                            <td>{{$item->tennguoinhan}}</td>
                                            <td>{{$item->sdtnguoinhan}}</td>
                                            <td>{{number_format($item->tongtientruocgiamgia)}}</td>
                                            <td>{{number_format($item->tongtiensaugiamgia)}}</td>


                                            <td class="text-white">
                                             <?php
                                            if($item->trangthai==0)
                                            {
                                                ?>
                                               <span class="badge bg-primary">Đang xác nhận</span>
                                                <?php
                                            }elseif($item->trangthai==1)
                                            {
                                                ?>
                                               <span class="badge bg-secondary">Đã gửi đi</span>
                                                <?php
                                            }elseif($item->trangthai==2)
                                            {
                                                ?>
                                                <span class="badge bg-success">Đã nhận</span>
                                                <?php
                                            }elseif($item->trangthai==3)
                                            {
                                                ?>
                                                <span class="badge bg-danger">Đơn hàng lỗi</span>
                                                <?php
                                            }elseif($item->trangthai==4)
                                            {
                                                ?>
                                                <span class="badge bg-dark">Khách trả hàng</span>
                                                <?php
                                            }else{
                                                ?>
                                                <span class="badge bg-warning">Hủy đơn hàng</span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="d-flex align-center">
                                                <a name="" id="" class="btn btn-primary mr-2" href="{{route('donhang.edit',$item->id)}}" role="button"><i class="fa fa-edit" title="Sửa Đơn Hàng"></i></a>
                                                            <a name="" id="" class="btn btn-primary " href="{{url('quantri/donhangchitiet/detail/'.$item->id.'/edit')}}" role="button"><i class="fas fa-search-dollar"></i></a>
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
