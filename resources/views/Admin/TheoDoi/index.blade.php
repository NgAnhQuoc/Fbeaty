@extends('Admin.LayoutAdmin')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title"> Người theo dõi</h4>
                            <p class="text-muted font-14 mb-3">
                                Danh sách người gửi email theo dõi
                            </p>
                            <table id="key-table" class="table table-striped table-bordered dt-responsive">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="">STT</th>
                                    <th scope="">Email</th>
                                    <th scope="">Ngày gửi</th>
                                    <th scope="">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=0; ?>
                                @foreach ($data as $row)

                                    <tr id="row{{$row->id}}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class="" >{{$row->email}}</td>
                                        <td class="" >Ngày:{{date_format(date_create($row->created_at), "d-m-Y H:i:s")}}
                                        <p>
                                            Giờ: {{date_format(date_create($row->created_at), "H:i:s")}}
                                        </p>
                                        </td>
                                        <td class="" >
                                            @csrf
                                            <button type="button" onclick="deleteCommon({{$row->id}})" class="btn btn-primary text-white mt-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
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
