<!DOCTYPE html>
<html lang="zxx">
@include('Login.loginCss')
<body>
    <div class="login-wrap">
        <div class="login-html">
            <!-- Nếu không có lỗi nào được trả về (!$errors->any()), tab Đăng Nhập sẽ được chọn mặc định (checked). Nếu có lỗi, tab tương ứng với form_type trong session sẽ được chọn. -->
            <input id="tab-1" type="radio" name="tab" class="sign-in" {{ (session('form_type') == 'login' || !$errors->any()) ? 'checked' : '' }}><label for="tab-1" class="tab">Đăng Nhập</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up" {{ (session('form_type') == 'register' && $errors->any()) ? 'checked' : '' }}><label for="tab-2" class="tab">Đăng Kí</label>
            <input id="tab-3" type="radio" name="tab" class="forgot-password" {{ (session('form_type') == 'forgot-password' && $errors->any()) ? 'checked' : '' }}><label for="tab-3" class="tab">Quên mật khẩu</label>
            

            <div class="login-form">
                <!-- Đăng nhập -->
                <form class="sign-in-htm" action="{{ route('getLogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="sign-in-htm" style="padding-top:30px">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="email" type="text" class="input" name="txtemail">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mật khẩu</label>
                            <input id="pass" type="password" class="input" data-type="password" name="txtMatKhau">
              
                            @if ($errors->any() && session('form_type') == 'login')
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ $errors->first() }}</li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Nhớ mật khẩu </label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Đăng Nhập">
                        </div>
                        <div class="foot-lnk" style="padding-top:20px;color:white">
                            <label for="tab-2">Bạn chưa có tài khoản? Đăng kí.</label>
                        </div>
                        <div class="foot-lnk" style="padding-top:20px;color:white">
                            <a href="/"> Trang chủ</a>
                        </div>
                    </div>
                </form>

                <!-- Đăng ký -->
                <form class="sign-up-htm" action="{{ route('getregister') }}" method="post">
                    {{ csrf_field() }}
                    <div class="sign-up-htm" style="padding-top:30px">
                        <div class="group">
                            <label for="user" class="label">Họ Tên</label>
                            <input id="user" type="text" class="input" name="name">
                        </div>
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <div class="input-group" style="display: flex;">
                                <input id="email-register" type="text" class="input" name="email" style="flex: 1;">
                                <button id="send-otp-btn" type="button" class="button" style="width: 100px;">Gửi OTP</button>
                            </div>
                        </div>

                        <div class="group">
							<div style="display: flex;">
								<div style="flex: 1;">
									<label for="pass" class="label">Mật khẩu</label>
									<input id="pass" type="password" class="input" data-type="password" name="password">
								</div>
								<div style="flex: 1;">
									<label for="pass" class="label">Nhập lại mật khẩu</label>
									<input id="pass" type="password" class="input" data-type="password" name="repassword">
								</div>
							</div>
						</div>
                        <div class="group">
                            <label for="otp" class="label">Xác thực OTP</label>
                            <input id="otp" type="text" class="input" name="otp">
                        </div>
                        @if ($errors->any() && session('form_type') == 'register')
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first() }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="group">
                            <input type="submit" class="button" value="Đăng Kí">
                        </div>
                        <div class="foot-lnk" style="padding-top:20px;color:white">
                            <label for="tab-1">Bạn đã có tài khoản? Đăng nhập.</label>
                        </div>
                    </div>
                </form>

                <!-- Quên mật khẩu -->
                <form class="forgot-password-htm">
                    {{ csrf_field() }}
                    <div class="forgot-password-htm" style="padding-top:30px">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <div class="input-group" style="display: flex;">
                                <input id="email-forgot-password" type="text" class="input" name="email" style="flex: 1;">
                                <button id="send-otp-btn-forgot-password" type="button" class="button" style="width: 100px;">Gửi OTP</button>
                            </div>
                        </div>
                        <div class="group">
                            <label for="otp" class="label">Xác thực OTP</label>
                            <input id="otp-forgot-password" type="text" class="input" name="otp">
                        </div>
                        
                        @if ($errors->any() && session('form_type') == 'forgot-password')
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ $errors->first() }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="group">
                            <input id="forgot-password-btn" type="button" class="button" value="Lấy lại mật khẩu">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#send-otp-btn, #send-otp-btn-forgot-password').click(function () {
            // Lấy id của nút đã được nhấn
            var clickedButtonId = this.id;

            // Tìm ra trường input email tương ứng
            var emailInputId = (clickedButtonId == 'send-otp-btn') ? '#email-register' : '#email-forgot-password';
            
            $.ajax({
                url: "{{ route('sendOtp') }}",
                method: "POST",
                data: {
                    email: $(emailInputId).val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert(response.message);
                },
                error: function (xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.message) {
                        alert(response.message);
                    } else {
                        alert("Lỗi không xác định. Vui lòng thử lại sau.");
                    }
                    console.error(error);
                }
            });
        });

        $('#forgot-password-btn').click(function () {
            $.ajax({
                url: "{{ route('postResetPassword') }}",
                method: "POST",
                data: {
                    email: $('#email-forgot-password').val(),
                    otp: $('#otp-forgot-password').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                    }
                },
                error: function (xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (response && response.message) {
                        alert(response.message);
                    } else {
                        alert("Lỗi không xác định. Vui lòng thử lại sau.");
                    }
                    console.error(error);
                }
            });
        });
    });

</script>

</html>
