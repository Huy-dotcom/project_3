<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{ URL::asset('user/css/userCss.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login_process') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="email-icon"></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="password-icon"></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Nhớ mật khẩu
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                        <div class="text-center">
                            <p style="opacity: 1; color: white">{{ Session::get('error') }}</p>
                        </div>
                        <input type="hidden" name="previous-url" value="{{ url()->previous() }}">
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" style="color:white">quay lại</a>
                    <div class="d-flex justify-content-center links">
                        Chưa có tài khoản?<a href="{{ route('user_sign_up') }}">Đăng kí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
