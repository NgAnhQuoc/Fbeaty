<div class="modal-container" id="modal-user">
    <div class="modal-background">
        <div class="close-modal background-close" type-modal="modal-user"></div>
        <div class="modal modal-main fa-content-user">
            <div class="noidung-modal">
                <div class="fa-modal-user">
                    <div class="modal-user-item h-100 active" id="modalDangNhap" data-authen="0">
                        <div class="box-spinner">
                            <div class="child-spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="title-3 text-left color-main uppercase">Nhập số điện thoại</div>
                        <div class="text-10 text-left">Đăng nhập hoặc đăng ký bằng số điện thoại của bạn</div>
                        <div class="w-100">
                            <div action="" class="fa-custom form-phone-number">
                                <div class="div-phone-number">
                                    <input type="text" id="phone-number" name="phoneNumber" placeholder="Ví dụ: 0965XXXXXX">
                                </div>
                            </div>
                            <span class="text-error phone-auth-error"></span>
                        </div>
                        <div class="control-slide-datlich d-flex justify-content-end pb-0">
                            <button type="button" class="button-href-basic checkPhoneNumber">Tiếp theo <i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>

                    <div class="modal-user-item h-100" data-authen="1">
                        <div class="box-spinner">
                            <div class="child-spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="title-3 text-left color-main uppercase">Nhập mật khẩu</div>
                        <div class="text-10 text-left">Nhập mật khẩu của SĐT <span class="comfirm-sdt">0965.286.066</span> hoặc chọn <br> "Quên mật khẩu"
                        </div>
                        <div class="fa-list-input-password d-flex w-100 mt-1">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100 ml-0" maxlength="1" name="password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100" maxlength="1" name="password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100" maxlength="1" name="password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100" maxlength="1" name="password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100" maxlength="1" name="password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="password password-box ip-number-box w-100 mr-0" maxlength="1" name="password">
                        </div>
                        <span class="text-error password-old-error"></span>
                        <div class="d-flex py-3">
                            <button type="button" class="button-href-basic prev-authen mr-auto">Quay lại</button>
                            <button type="button" class="button-href-basic forgot-password">Quên mật khẩu</button>
                            <span class="button-href-basic countDownOTP"></span>
                        </div>

                        <a href="">
                            <button class="btn-8 for-authen w-100 login-button">
                                <span>Đăng nhập</span>
                            </button>
                        </a>
                    </div>

                    <div class="modal-user-item h-100" data-authen="2">
                        <div class="box-spinner">
                            <div class="child-spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="title-3 text-left color-main uppercase">Nhập OTP</div>
                        <div class="text-10 text-left">Chúng tôi sẽ gửi cho bạn mã OTP<br> vui lòng kiểm tra tin nhắn
                        </div>
                        <div class="fa-list-input-otp d-flex w-100 mt-1">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100 ml-0" maxlength="1" name="otp">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100" maxlength="1" name="otp">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100" maxlength="1" name="otp">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100" maxlength="1" name="otp">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100" maxlength="1" name="otp">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="otp otp-box ip-number-box w-100 mr-0" maxlength="1" name="otp">
                        </div>
                        <span class="text-error OTP-auth-error"></span>
                        <div class="d-flex py-3">
                            <button type="button" class="button-href-basic prev-authen mr-auto">Quay lại</button>
                            <button type="button" class="button-href-basic resendOTP">Không nhận được mã?</button>
                            <span class="button-href-basic countDownOTP"></span>
                        </div>

                        <button class="btn-8 for-authen w-100 check-OTP">
                            <span>Xác nhận</span>
                        </button>
                    </div>

                    <div class="modal-user-item h-100" data-authen="3">
                        <div class="box-spinner">
                            <div class="child-spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="title-3 text-left color-main uppercase">Nhập mật khẩu mới</div>
                        <div class="text-10 text-left">Bạn có thể chọn bỏ qua nếu không muốn dùng mật khẩu
                        </div>
                        <div class="fa-list-input-new-password d-flex w-100 mt-1">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100 ml-0" maxlength="1" name="new-password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100" maxlength="1" name="new-password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100" maxlength="1" name="new-password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100" maxlength="1" name="new-password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100" maxlength="1" name="new-password">
                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number" class="new-password new-password-box ip-number-box w-100 mr-0" maxlength="1" name="new-password">
                        </div>
                        <span class="text-error password-new-error"></span>
                        <div class="d-flex py-3">
                            <button type="button" class="button-href-basic prev-authen mr-auto">Quay lại</button>
                            <button type="button" class="button-href-basic skip-password">Bỏ qua</button>
                        </div>

                        <a href="">
                            <button class="btn-8 for-authen w-100 newPasswordButton">
                                <span>Xác nhận</span>
                            </button>
                        </a>
                    </div>
                </div>


                <div class="close close-modal button-close-modal" type-modal="modal-user">
                    x
                </div>
            </div>
        </div>
    </div>
</div>
