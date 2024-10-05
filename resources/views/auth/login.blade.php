@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('banner-title', 'Đăng nhập')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <form action="" method="POST" class="form-box">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                            </div>
                            <div class="col-12 mb-2">
                                <input type="submit" value="Đăng nhập" class="btn btn-primary">
                            </div>
                            <div class="col-12 text-right">
                                <p class="mb-0">Bạn chưa có tài khoản?</p>
                                <a href="register_tutor.html">
                                    <i class="bi bi-book-half"></i>
                                    Đăng ký tìm gia sư ngay
                                </a>
                                <br>
                                <a href="register_parent.html">
                                    <i class="bi bi-briefcase-fill"></i>
                                    Đăng ký làm gia sư ngay
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div> <!-- /.untree_co-section -->
@endsection
