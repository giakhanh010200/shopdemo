<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('library')
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/login.css') }}" </head>

<body>
    <div class="page-wrapper" id="page-wrapper">
        <div class="page-auth-wrap row">
            <div class="page-auth-content col-5">
                <div class="auth-site-login">
                    <div class="auth-form-header">
                        <img src={{ URL::asset('image/admin/login/logo.png') }} alt="logo">
                    </div>
                    <div class="auth-form-login">
                        <h2 class="heading-form">
                            Đăng nhập<br>
                            <span>với tài khoản token ICO của bạn</span>
                        </h2>
                        <form class="auth-form-signin" method="POST" action="{{ route('admin.progress_login') }}">
                            {{ csrf_field() }}
                            <div class="input-form-field">
                                <input type="text" name="username" placeholder="Tên đăng nhập"
                                    class="auth-input-form">
                            </div>
                            <div class="input-form-field">
                                <input type="password" name="password" placeholder="Mật khẩu" class="auth-input-form">
                            </div>
                            <div class="auth-form-action">
                                <div class="form-checkbox">
                                    <input type="checkbox" name="remember_me" class="auth-check-form">
                                    <label class="sub-checkbox">Nhớ tài khoản</label>
                                </div>
                                <div class="form-forgot">
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <button class="btn btn-primary auth-form-btn">Sign in</button>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger field-error-login">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="error-text">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('msg'))
                            <span class="alert-danger alert">
                                {{ session()->get('msg') }}
                            </span>
                        @endif
                    </div>
                    <div class="auth-form-footer">
                        <a href="#">Bảo mật</a>
                        <a href="#">Điều khoản</a>
                        <a href="#">&copy; 2023 TokenICO</a>
                    </div>
                </div>
            </div>
            <div class="page-auth-gfx col-7">
                <div class="img-auth-login">
                    <img src="{{ URL::asset('image/admin/login/main.png') }}" </div>
                </div>
            </div>
        </div>
</body>

</html>
