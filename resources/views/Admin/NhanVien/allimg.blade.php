@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 btn btn-primary">Ảnh khách hàng</h4>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                <tr>
                                    <th width="14%">Thông tin nhân viên</th>
                                    <th width="80%">Ảnh khách hàng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            <span>
                                                <img
                                                    src="{{ asset('Admin/assets') }}/images/users/{{$item->avatar}}"
                                                    alt="user-img"
                                                    title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                                            </span>
                                            <br>
                                            <span>
                                                {{$item->name}}
                                            </span>
                                            <br>
                                            <span>
                                             <?php echo ($item->role == 1) ? " <i class='fas fa-crown text-warning' style='font-size:10px'></i>Admin" : " <i class='fas fa-chess-pawn text-danger' style='font-size:12px'></i>Staff";?>
                                           </span>
                                            <br>
                                            <span>
                                               {{$item->coso}}
                                           </span>
                                            <br>
                                            <span>
                                               {{$item->email}}
                                           </span>

                                        </td>
                                        <td>
                                            <div class="row mt-1">
                                                <div class="col-md-12 bg-white">
                                                    <div class="port mb-1">
                                                        <?php $nv = json_decode($item->img); ?>
                                                        @if(is_array($nv))
                                                        <div class="portfolioContainer" style="overflow: scroll">


                                                                @foreach($nv as $id => $ns)
                                                                    <div
                                                                        class="col-md-6 col-xl-3 col-lg-4 natural personal">
                                                                        <div
                                                                            class="gal-detail thumb position-relative showdel">
                                                                            <a href="{{asset('uploads/khachhang')}}/{{ $ns}}"
                                                                               class="image-popup" title="Screenshot-1">
                                                                                <img
                                                                                    src="{{asset('uploads/khachhang')}}/{{ $ns}}"
                                                                                    style="height: 140px; object-fit: cover; "
                                                                                    class="thumb-img img-fluid overflow-hidden w-100 hoverbg"
                                                                                    alt="work-thumbnail">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                        </div><!-- end portfoliocontainer-->
                                                            @else
                                                                <p>Không có ảnh</p>
                                                            @endif
                                                    </div> <!-- End row -->
                                                </div>
                                            </div>
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
