@extends('Site.layout')

@section('title')
    Dịch Vụ
@endsection

@section('main')
    <div class="fa-dichvu my-5" style="margin-bottom: 5em !important;">
        <div class="container">
            <div class="w-100 text-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="head-service-item service-title">
                        <div class="w-100 text-left">
                            <div class="title-small color-black-main">
                                LỰA CHỌN DỊCH VỤ
                            </div>
                            <div class="title-3">
                                Bí Quyết Khỏe Và Đẹp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-tabs">
                    <div class="tab-content" id="myTabContent-1">
                        <div>
                            <div class="w-100">
                                <div class="fa-list-dichvu mt-1">

                                    @foreach ($viewdetail as $dichvuitem)
                                        <div class="dichvu-item d-plex w-100">
                                            <div class="content-1">
                                                <div class="text-7 color-main-1">
                                                    {{$dichvuitem->namedm}}
                                                </div>

                                                <div class="text-8 mt-1">
                                                    {{number_format($dichvuitem->dongia)}} đ
                                                </div>

                                                <div class="img-1 mt-4">
                                                    <a href="{{ asset('dich-vu') }}/{{$dichvuitem->slug}}">
                                                        <img class="" src="{{ asset('uploads/'.$dichvuitem->img) }}"
                                                             alt="">
                                                    </a>
                                                </div>

                                                <div class="text-1 limit-text-row-1 mt-4">
                                                    {{$dichvuitem->name}}
                                                </div>

                                                <p class="text-2 limit-text-row-3 mt-1 mt-3">
                                                    {{$dichvuitem->motangan}}

                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

