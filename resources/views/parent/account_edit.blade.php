@extends('layouts.app')
@section('title', 'Cập nhật thông tin liên hệ')
@section('banner-title', 'Cập nhật thông tin liên hệ')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-10 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <form action="" method="POST" class="form-box">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Họ tên</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                    value="{{ old('name', $user->name) }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">SĐT</label>
                                <input type="tel" class="form-control" id="inputPhone" name="phone"
                                    value="{{ old('phone', $user->phone) }}">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Cập nhật" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
