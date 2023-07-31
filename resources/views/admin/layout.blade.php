<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Document</title>
    @include('library')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/main.css') }}">
    @yield('link')
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <div class="main-auth-wrapper layout-admin">
            <div class="auth-layout-left active" id="menuSidebar">
                <aside class="layout-sidebar menu-sidebar">
                    <div class="auth-header-aside">
                        <div class="top-head">
                            <div class="logo-site">
                                <img src="{{ URL::asset('image/admin/login/logo.png') }}">
                            </div>
                            <div class="user-infor">
                                <a class="btn-show-dropdown-user">
                                    <i class="fa-regular fa-user"></i>
                                    <div class="auth-user-dropdown-menu">
                                        <button class="btn btn-setting-auth">
                                            <i class="fa-solid fa-gear"></i>
                                            <p>Cài đặt</p>
                                        </button>
                                        <button class="btn btn-profile-auth">
                                            <i class="fa-solid fa-circle-user"></i>
                                            <p>Thông tin cá nhân</p>
                                        </button>
                                        <div class="footer-dropdown">
                                            <button class="btn btn-logout-auth"
                                                onclick="window.location='{{ route('admin.logout') }}'">
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                <p>Đăng xuất</p>
                                            </button>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>
                        <div class="main-head">
                            @if (session()->has('admin_id'))
                                <div class="auth-admin">
                                    <img class="auth-avatar" src={{ URL::asset('image/admin/admin_avatar.jpeg') }}>
                                    <div class="auth-name">
                                        <strong>{{ session()->get('admin_name') }}</strong>
                                    </div>
                                    <div class="auth-email">
                                        <strong>{{ session()->get('admin_email') }}</strong>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="auth-main-aside">
                        <div class="auth-main-menu">
                            <nav class="auth-navigation">
                                <div class="group-nav-item">
                                    <h5 class="header-group">
                                        Bảng điều khiển
                                    </h5>
                                    <ul class="auth-menu">
                                        <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-gauge"></i>
                                            <a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/chart*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-chart-simple"></i>
                                            <a href="{{ route('admin.chart') }}">Biểu đồ</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="group-nav-item">
                                    <h5 class="header-group">
                                        Sản phẩm
                                    </h5>
                                    <ul class="auth-menu">
                                        <li class="menu-item {{ request()->is('admin/products*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-box"></i>
                                            <a href="{{ route('admin.products') }}">Sản phẩm</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/view_manufacturer*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-boxes-stacked"></i>
                                            <a href="{{ route('admin.view_manufacturer') }}">Nhà sản xuất</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/view_category*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-boxes-stacked"></i>
                                            <a href="{{ route('admin.view_category') }}">Danh mục sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="group-nav-item">
                                    <h5 class="header-group">
                                        Giỏ hàng
                                    </h5>
                                    <ul class="auth-menu">
                                        <li class="menu-item {{ request()->is('admin/cart*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <a href="{{ route('admin.cart') }}">Giỏ Hàng</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/payment_methods*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <a href="{{ route('admin.payment_methods') }}">Phương thức thanh toán</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/promotion_code*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-ticket"></i>
                                            <a href="{{ route('admin.promotion_code') }}">Mã khuyến mãi</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="group-nav-item">
                                    <h5 class="header-group">
                                        Blog
                                    </h5>
                                    <ul class="auth-menu">
                                        <li class="menu-item {{ request()->is('admin/blogs*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-newspaper"></i>
                                            <a href="{{ route('admin.blogs') }}">Tin tức</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/blog_category*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-clipboard"></i>
                                            <a href="{{ route('admin.blog_category') }}">Danh mục tin tức</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="group-nav-item">
                                    <h5 class="header-group">
                                        Người dùng
                                    </h5>
                                    <ul class="auth-menu">
                                        <li class="menu-item {{ request()->is('admin/admin_page*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-user-gear"></i>
                                            <a href="{{ route('admin.admin_page') }}">Quản trị</a>
                                        </li>
                                        <li class="menu-item {{ request()->is('admin/user_page*') ? 'active' : ''}}">
                                            <i class="fa-solid fa-user"></i>
                                            <a href="{{ route('admin.user_page') }}">Người dùng</a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="auth-layout-right col">
                <header class="auth-header-default">
                    <div class="header-row">
                        <div class="auth-left-header">
                            <button class="btn btn-show-sidebar" id="btnSidebar">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                        <div class="auth-right-header">
                            <div class="auth-notifications">
                                <i class="fa-regular fa-bell"></i>
                                <div class="sub-bell"></div>
                            </div>
                            <div class="auth-search">
                                <button class="auth-btn-search btn">
                                    <i class="fa-solid fa-magnifying-glass">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="box-auth-search">
                        <div class="icon-magnify">
                            <i class="fa-solid fa-magnifying-glass">
                            </i>
                        </div>
                        <input type="text" class="auth-searching-all" name="search" placeholder="Tìm kiếm ..."">
                        <div class="icon-xmark">
                            <button class="btn btn-cancel-search">
                                <i class="fa-solid fa-x"></i>
                            </button>
                        </div>
                    </div>
                </header>
                @yield('content')
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/admin/main.js') }}"></script>
@yield('script')
</html>
