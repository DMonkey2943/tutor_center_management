@extends('layouts.app')
@section('title', 'Chi tiết lớp học')
@section('banner-title', 'Thông tin lớp học')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="form-box">
                        <h3 class="line-bottom font-weight-bold">MÃ LỚP: 123</h3>
                        <p>
                            <span class="font-weight-bold">Môn dạy: </span>
                            Toán, Văn, Anh
                        </p>
                        <p>
                            <span class="font-weight-bold">Lớp dạy: </span>
                            12
                        </p>
                        <p>
                            <span class="font-weight-bold">Địa chỉ: </span>
                            P.Hưng Lợi, Q.Ninh Kiều
                        </p>
                        <p>
                            <span class="font-weight-bold">Số buổi/tuần: </span>
                            3
                        </p>
                        <p>
                            <span class="font-weight-bold">Mức lương/buổi: </span>
                            100.000đ
                        </p>
                        <p>
                            <span class="font-weight-bold">Thời gian: </span>
                            T2-T4-T6, 18h-19h30
                        </p>
                        <h5 class="font-weight-bold mt-4">YÊU CẦU GIA SƯ</h5>
                        <p>
                            <span class="font-weight-bold">Trình độ:</span>
                            Giáo viên
                        </p>
                        <p>
                            <span class="font-weight-bold">Giới tính: </span>
                            Nữ
                        </p>
                        <p>
                            <span class="font-weight-bold">Yêu cầu khác: </span>
                            Học sư phạm, có kinh nghiệm
                        </p>
                        <h5 class="font-weight-bold mt-4">THÔNG TIN HỌC VIÊN</h5>
                        <p>
                            <span class="font-weight-bold">Giới tính: </span>
                            Nữ
                        </p>
                        <p>
                            <span class="font-weight-bold">Học lực: </span>
                            Trung bình
                        </p>
                        <p>
                            <span class="font-weight-bold">Trường: </span>
                            THPT Nguyễn Việt Dũng
                        </p>
                        <p>
                            <span class="font-weight-bold">Ghi chú thêm: </span>
                            Dạy ôn chương trình lớp 11 trong tầm 4 buổi để cháu nhớ lại kiến thức cơ bản và sau đó sẽ đi vào
                            chương trình lớp 12.
                        </p>
                        <div class="text-right">
                            <input type="submit" value="Đăng ký nhận lớp" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
