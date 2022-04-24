<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sign up</title>
    <link rel="stylesheet" href="{{ URL::asset('user/css/userCss.css') }}">
</head>
<body>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Đăng kí</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('sign_up_process') }}">
                            @csrf
                            <div class="input-group form-group">
                                <input type="text" class="form-control" name="name" placeholder="Tên" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="email-icon"></span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="email" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="phone-icon"></span>
                                </div>
                                <input type="number" class="form-control" name="phone" placeholder="SĐT" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="password-icon"></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <div class="input-group form-group" style="color:white">
                                <h5>Giới tính:</h5>
                                <div>
                                    <span style="margin-left: 10px; ">Nam<input type="radio" name="sex" value="0"></span>
                                <span style="margin-left: 10px; ">Nũ<input type="radio" name="sex" value="1"></span>
                                <span style="margin-left: 10px; ">Bí mật<input type="radio" name="sex" value="2" checked></span>
                                </div>

                            </div>
                            <div class="text-center">
                                <p style="opacity: 1; color: white">{{ Session::get('error') }}</p>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="sign up" class="btn float-right login_btn">
                            </div>
                            <input type="hidden" name="previous-url" value="{{ url()->previous() }}">
                        </form>
                        <a href="{{ url()->previous() }}" style="color:white">trở lại</a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
