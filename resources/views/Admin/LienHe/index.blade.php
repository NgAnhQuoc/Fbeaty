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
                             <button class="btn btn-primary waves-effect waves-light mb-3" >Bảng liên hệ  </button>
                        </div>
                        <table id="key-table" class="table table-striped table-bordered dt-responsive ">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">STT</th>
                                    <th width="15%">Tên Khách hàng</th>
                                    <th width="25%">Email</th>  
                                    <th width="20%">Số điện thoại</th>  
                                    <th width="20%">Nội dung</th>  
                                    <th width="20%">Thời gian</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>{{$item->namekh}} 
                                        </td> 
                                        <td>
                                            {{$item->email}}
                                        </td> 
                                        <td >
                                            {{$item->sdt}}
                                        </td> 
                                        <td >
                                            {{$item->noidung}}
                                        </td> 
                                        <td>
                                            {{$item->created_at->format('Y-m-d')}} 
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