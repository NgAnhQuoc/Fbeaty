<div>
    <h2>{{ $data['type'] }}</h2>
    <p><b>{{ $data['task'] }}</b></p>

    <p><b>Trân trọng !!</b></p>
</div>

<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse" bgcolor="4C4E4E">
    <tr>
        <td style="padding:30px;">
            <div align="center">
                <table border="0" width="600" cellpadding="0" style="border-collapse: collapse" bgcolor="4C4E4E">
                    <tr>
                        <td style="border-top-left-radius: 8px; border-top-right-radius: 8px;" height="40"
                            bgcolor="1c4a8a">
                            <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
                                <tr>
                                    <td style="padding-left: 10px; color: white">
                                        <font color="#FFFFFF" style="color: white;">Gửi đến từ : {{ $data['task']}}
                                        </font>
                                    </td>
                                    <td style="padding-right: 20px; " align="right ">
                                        <font color="#FFFFFF ">Hotline: 0868970582</font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px; " bgcolor="ECECEC " height="60 ">
                            <table border="0 " width="100% " cellpadding="0 " style="border-collapse: collapse">
                                <tr>
                                    <td><img src="https://sky-incubator.edu.vn/wp-content/uploads/2021/12/logofbeuty.png"
                                             width="200 " height="200 "></td>
                                    <td class="logo" align="center "
                                        style="color: #1c4a8a;font-family: Abril Fatface;font-weight:400 ">FBEAUTY
                                        <br> Hệ Thống Spa Làm Đẹp FBEAUTY
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px; " bgcolor="#ECECEC ">


                            <table border="0 " width="100% ">
                                <tr>
                                    <td bgcolor="#FFFFFF " style="padding:15px; ">
                                        <br>
                                        <h2 style="text-align: center ">THƯ CẢM ƠN</h2>
                                        <p style="text-align: left ">
                                        <hr>
                                        Tiêu đề : {{ $data['type'] }}
                                        <hr>
                                         Nội dung : <p>{{ $data['content'] }} Cảm ơn bạn đã liên hệ với chúng tôi</p>
                                        <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
                                        <hr>
                                        <p><b>Trân trọng !!</b></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

