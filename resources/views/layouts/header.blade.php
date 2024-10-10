<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav mb-5">
    @auth
        <div class="pb-2 top-bar mb-3">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-8 col-lg-7">
                        <p class="text-white m-0 align-middle">Xin chào, {{ Auth::user()->name }}</p>
                    </div>

                    <div class="col-4 col-lg-5 text-right">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="bg-transparent border-white rounded-pill text-white"
                                value="Đăng xuất">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endauth

    <div class="sticky-nav js-sticky-header">
        <div class="container position-relative">
            <div class="site-navigation text-center">
                <a href="{{ route('home') }}" class="logo menu-absolute m-0">Gia Sư Cần Thơ<span
                        class="text-primary">.</span></a>

                <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="font-weight-bold"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="font-weight-bold"><a href="{{ route('tutors') }}">Gia sư</a></li>
                    <li class="font-weight-bold"><a href="{{ route('classes') }}">Lớp mới</a></li>
                    @auth
                        @if (Auth::user()->role == 'tutor')
                            <li class="font-weight-bold">
                                <a href="{{ route('tutor.classes') }}">Lớp đã đăng ký nhận dạy</a>
                            </li>
                        @elseif (Auth::user()->role == 'parent')
                            <li class="font-weight-bold">
                                <a href="{{ route('parent.classes') }}">Lớp đã đăng ký</a>
                            </li>
                        @endif
                    @endauth



                </ul>

                @auth
                    @if (Auth::user()->role == 'tutor')
                        <a href="{{ route('tutor.account') }}" class="btn-book btn btn-secondary btn-sm menu-absolute">
                            TÀI KHOẢN
                        </a>
                    @elseif (Auth::user()->role == 'parent')
                        <a href="{{ route('parent.account') }}" class="btn-book btn btn-secondary btn-sm menu-absolute">
                            TÀI KHOẢN
                        </a>
                    @endif
                @else
                    <a href="{{ route('login.form') }}" class="btn-book btn btn-secondary btn-sm menu-absolute">ĐĂNG
                        NHẬP</a>
                @endauth

                <a href="#"
                    class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
