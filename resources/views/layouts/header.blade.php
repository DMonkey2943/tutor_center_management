<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">
        <div class="container position-relative">
            <div class="site-navigation text-center">
                <a href="{{ route('home') }}" class="logo menu-absolute m-0">Gia Sư Cần Thơ<span
                        class="text-primary">.</span></a>

                <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="active font-weight-bold"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="font-weight-bold"><a href="{{ route('tutors') }}">Gia sư</a></li>
                    <li class="font-weight-bold"><a href="{{ route('classes') }}">Lớp mới</a></li>
                </ul>

                <a href="{{ route('login.form') }}" class="btn-book btn btn-secondary btn-sm menu-absolute">ĐĂNG
                    NHẬP</a>

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
