@extends('Site.layout')

@section('title')
    Giới thiệu
@endsection

@section('main')
    <div class="fa-gioithieu">
        <div class="about about-1" style="min-height: 780px">
            <div class="box-about position-relative">
                <div class="background-about">
                    <div class="box-images-2">
                        <div class="box-color-1"></div>
                        <div class="img-1">
                            <img class="img-fluid position-relative z-index-1"
                                 src="{{ asset('Site/images') }}/about-1.png" alt="">
                        </div>
                        <div class="img-2">
                            <img class="img-small-2 float-right position-relative z-index-1"
                                 src="{{ asset('Site/images') }}/coso4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="col-xl-6 col-lg-6 col-ml-6 col-sm-12 col-12">
                            <div class="about-content">
                                <div class="title-small line-before">
                                    VỀ CHÚNG TÔI
                                </div>
                                <div class="w-100">
                                    <div class="title-1">
                                        Hệ Thống Spa <br> Đẳng Cấp
                                    </div>

                                    <div class="text-4">
                                        Hệ Thống Spa Đẳng Cấp
                                    </div>

                                    <div class="text-1 mt-2 text-desk">
                                        Với 45 chi nhánh trải dài khắp cả nước, FBeauty Spa tự hào là chuỗi hệ thống thẩm mỹ
                                        viện hàng đầu Việt Nam
                                    </div>

                                    <div class="text-2 mt-3">
                                        Được thành lập từ năm 2012, Fbeauty Spa với hơn 9 năm kinh nghiệm trong lĩnh vực chăm sóc và
                                        điều trị các vấn đề về: Mụn – Thâm –  Sẹo. Trong những năm tháng hoạt động, Fbeauty Spa đã
                                        không ngừng nâng cấp dịch vụ, không gian và thiết bị cho khách hàng nhằm đem đến những
                                        trải nghiệm tốt nhất mà một hệ thống chăm sóc da có thể mang lại.
                                    </div>

                                    <div class="text-2 mt-3">
                                        Mang trong mình niềm tin về sứ mệnh đánh thức vẻ đẹp tiềm ẩn trong mỗi người, Fbeauty Spa luôn nỗ lực
                                        không ngừng để đem đến cho khách hàng những dịch vụ hoàn hảo nhất. Không chỉ nằm ở
                                        kết quả mà Fbeauty Spa còn hướng tới thẩm mỹ khỏe – đẹp – an toàn để mỗi phút giây ngắm mình trong
                                        gương là những
                                        phút giây tận hưởng hạnh phúc thật sự của mỗi khách hàng. đáp ứng tốt mọi nhu cầu làm đẹp của chị em trên khắp vùng miền Tổ Quốc.
                                    </div>

                                    <div class="text-2 mt-3">
                                        Quy trình điều trị chuẩn y khoa, sẵn sàng học hỏi, nỗ lực và cập nhật những kiến thức y khoa,
                                        công nghệ hiện đại để mang đến cho khách hàng trải nghiệm và kết quả điều trị tốt nhất.
                                    <br>
                                        Nụ cười hài lòng, sự tin tưởng tuyệt đối của khách hàng là thước đo
                                        của sự thành công của chúng tôi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 about-2 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="service-content position-relative z-index-1">
                            <div class="title-small line-before">
                                ĐỘI NGŨ NHÂN VIÊN Chuyên nghiệp
                            </div>
                            <div class="w-100 about-content">
                                <div class="text-4 w-100">
                                    Chuyên viên và bác sĩ
                                </div>

                                <div class="text-1 mt-2 text-desk">
                                    100% các bác sĩ tại FBeauty được đào tạo bài bản từ các trường Đại học danh tiếng trong và ngoài
                                    nước.
                                </div>

                                <div class="text-2 mt-3">
                                    Ngoài kiến thức và kỹ năng trong nghề,

                                    mỗi Bác sĩ và Trưởng bộ phận phải trải qua quá trình trị liệu tối thiểu 10,000 ca lâm sàng để
                                    có hiểu biết chuyên sâu về làn da cũng như cơ địa người Châu Á.
                                </div>

                                <div class="col-xl-6 col-md-12 box-image-not-desk">
                                    <div class="w-100 mt-4 container">
                                        <img src="{{ asset('uploads') }}/doingubacsi.jpg" alt="Avatar" class=" mb-2" style="width:100%;height:100%;">
                                    </div>
                                </div>

                                <div class="text-2 mt-3">
                                    Luôn nỗ lực và cập nhật những kiến thức y khoa – xu hướng thẩm mỹ mới nhất để bắt kịp với
                                    xu hướng y học hiện đại cam kết mang đến cho khách hàng kết quả thẩm mỹ tốt nhất.
                                </div>

                                <div class="text-2 mt-3">
                                    Gây ấn tượng với khách hàng từ cái nhìn đầu tiên chính là nụ cười thân thiện, cử chỉ gần gũi và không
                                    kém phần duyên dáng của đội ngũ chuyên viên tư vấn. Những điều đó chắc chắn sẽ làm bạn hài lòng khi
                                    đến với chúng tôi.
                                </div>

                                <div class="text-2 mt-3">
                                    Ngoài ra, đội ngũ chuyên viên cũng thường xuyên được tham gia các khóa học nâng cao trình độ, hướng dẫn
                                    sử dụng trang thiết bị hiện đại,
                                    làm việc với các bác sỹ, chuyên gia nước ngoài để tăng cường kiến thức để phục vụ khách hàng tốt hơn nữa.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 box-image-desk">
                        <div class="w-100 mt-4 container">
                            <img src="{{ asset('uploads') }}/doingubacsi.jpg" alt="Avatar" class=" mb-2" style="width:100%;height:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-lieutrinh pb-0 mt-5">
            <div class="bg-lieutrinh">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                            <div class="box-title-lieutrinh">
                                <div class="title-3">
                                    Điểm Nổi Bật Spa Hướng Đến
                                </div>

                                <p class="text-2 mt-1 mt-3">
                                    Luôn lắng nghe, không ngừng đổi mới, nâng cấp trang thiết bị, đội ngũ kĩ thuật viên thường xuyên được tham
                                    gia các khóa hướng dẫn sử dụng máy móc, tập huấn nghiêm ngặt trước khi thực hiện dịch vụ cho khách hàng.
                                </p>

                                <div class="w-100 text-left ">
                                    <a href="/lien-he"><button class="button btn-5">Liên hệ</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-12">
                            <div class="cac-buoc-lieutrinh">
                                <div class="lieutrinh-item">
                                    {{-- <div class="number-1">
                                        1
                                    </div> --}}

                                    <div class="title-5">
                                        An Toàn & Vệ Sinh
                                    </div>
                                    <div class="icon-1 mt-4">
                                        <img class="" src=" {{ asset('Site/images/icon') }}/task.png"
                                            alt="">
                                    </div>
                                    <div class="text-2 mt-4 color-white font-weight-300 ">
                                        Luôn đảm bảo vệ sinh cao độ cũng như trang bị lò hấp khử trùng bằng cực tím.
                                    </div>
                                </div>

                                <div class="lieutrinh-item">
                                    {{-- <div class="number-1">
                                        1
                                    </div> --}}

                                    <div class="title-5">
                                        Bác Sĩ & Chuyên Viên
                                    </div>

                                    <div class="icon-1 mt-4">
                                        <img class="" src=" {{ asset('Site/images/icon') }}/doctor.png"
                                            alt="">
                                    </div>

                                    <div class="text-2 mt-4 color-white font-weight-300">
                                        Được đào tạo chuyên sâu về ngành thẩm mỹ, và trên hết họ phải hiểu rất kỹ sản phẩm sử dụng cho khách hàng.
                                    </div>
                                </div>

                                <div class="lieutrinh-item">
                                    {{-- <div class="number-1">
                                        1
                                    </div> --}}

                                    <div class="title-5">
                                        Trang Thiết Bị Hiện Đại
                                    </div>

                                    <div class="icon-1 mt-4">
                                        <img class="" src="
                                            {{ asset('Site/images/icon') }}/customer-service.png" alt="">
                                    </div>

                                    <div class="text-2 mt-4 color-white font-weight-300">
                                        Kiểm tra chất lượng thiết bị định kì, đảm bảo được sự an toàn tuyệt đối với khách hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="div-coso">
            <div class="container pb-5 py-3">
                <div class="card-body">
                    <div class="title-small line-before text-center">
                        TRẢI NGHIỆM CƠ SỞ CHẤT LƯỢNG
                    </div>
                    <div class="text-center">
                        <h5 class="card-title mb-3"
                            style="font-family: 'Roboto', sans-serif;font-size:50px;color:black;">CƠ SỞ VẬT CHẤT HÀNG ĐẦU</h5>
                    </div>
                    <ul class="mt-4">
                        <li>Lấy cảm hứng từ phong cách hiện đại, tinh tế với thiết kế rộng rãi lên tới 2000m2 nhưng vẫn
                            bật lên sự ấm cúng, thân thiện cùng nội thất hàng đầu, tiện nghi FBeauty là một trong những
                            Spa có cơ sở vật chất đạt tiêu chuẩn quốc tế.
                        </li>
                        <li>Đồng thời, tất cả các giường thẩm mỹ được thiết kế độc lập, kín đáo mang đến không gian
                            riêng tư, sự thoải mái nhất cho khách hàng khi trải nghiệm các dịch vụ tại FBeauty
                        </li>
                        <li>Máy Móc Trang Thiết Bị</li>
                        <li>Hệ thống công nghệ được trang bị đầy đủ từ cơ bản đến nâng cao. Đồng thời luôn cập nhật và
                            ứng dụng các công nghệ, thiết bị thẩm mỹ được đánh giá tốt nhất, hiện đại hàng đầu thế giới
                            vào các dịch vụ tại Spa.
                        </li>
                        <li>Chuỗi phòng chờ, phòng hậu phẫu rộng rãi, tiện nghi tại FBeauty chắc chắn sẽ làm khách hàng
                            hài lòng.
                        </li>
                    </ul>
                    <div class="d-flex justify-content-start mt-5">
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/coso1.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs2.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs3.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs4.jpg" alt=""></div>
                    </div>
                    <div class="d-flex justify-content-start mt-5">
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs5.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs6.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs7.jpg" alt=""></div>
                        <div class="col-3"><img height="230px" class=""
                                                src="{{ asset('uploads') }}/cs8.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>




    </div>


    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Site/css') }}/gioithieu.css">
@endsection

