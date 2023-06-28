<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mật khẩu mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xin chào,</h1>

        <p>Bạn đã yêu cầu mật khẩu mới cho tài khoản của bạn. Mật khẩu mới của bạn là:</p>

        <p><strong>{{ $password }}</strong></p>

        <p>Đừng quên đổi mật khẩu này sau khi đăng nhập lại vào tài khoản của bạn.</p>

        <p>Trân trọng,</p>
        <p>Đội ngũ hỗ trợ</p>
    </div>
</body>
</html>
