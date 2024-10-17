@extends('layouts.app')
@section('title', 'Quản lý tài khoản')
@section('banner-title', 'Quản lý tài khoản')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="form-box">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <p>
                            <span class="font-weight-bold">Họ tên: </span>
                            <span class="">{{ $user->name }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Số điện thoại: </span>
                            <span class="">{{ $user->phone }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Email: </span>
                            <span class="">{{ $user->email }}</span>
                        </p>
                        <a href="{{ route('parent.account.edit') }}" class="mb-3 ml-2 mr-2 btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Chỉnh sửa thông tin liên hệ
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
