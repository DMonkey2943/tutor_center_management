@extends('layouts.app')
@section('title', 'Lớp mới')
@section('banner_content')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Lớp mới</h1>
    <div class="mb-4 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Trung tâm gia sư Cần Thơ thường xuyên cập nhật lớp dạy kèm mới hàng giờ.</p>
    </div>
    <div class="mb-1 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Gia sư có nhu cầu nhận lớp vui lòng đăng ký tài khoản.</p>
    </div>
    <p class="mb-0" data-aos="fade-up" data-aos-delay="300">
        <a href="register_tutor.html" class="btn btn-secondary">
            <i class="bi bi-briefcase-fill"></i>
            Đăng ký làm gia sư
        </a>
    </p>
@endsection
@section('content')
    {{-- Banner --}}
    @include('layouts.banner')

    <div class="untree_co-section">
        <div class="container">
            {{-- Filter form --}}
            <div class="row text-center mb-5" style="display: block;">
                <form>
                    <div class="form-row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control">
                                <option selected>Khu vực</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control">
                                <option selected>Trình độ</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control">
                                <option selected>Giới tính</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control">
                                <option selected>Môn học</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control">
                                <option selected>Khối lớp</option>
                                <option>Ôn thi trường chuyên</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <input type="submit" class="btn btn-primary" value="LỌC" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="col-6 font-weight-bold p-0">MS: 000001</h3>
                                <p class="p-2 m-0 bg-primary text-white rounded">Chưa giao</p>
                            </div>
                            <p>
                                <span class="font-weight-bold">Môn dạy: </span>
                                <span class="text-primary">Toán, Văn, Anh </span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Khối lớp: </span>
                                <span class="text-primary">Lớp 12 </span>
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
                                100.000đ - 150.000đ
                            </p>
                            <p>
                                <span class="font-weight-bold">Thời gian: </span>
                                T2: 17h-18h30,
                                T3: 18h30-20h,
                                T4: 9h-10h30,
                                T5: 18h30-20h,
                                T6: 17h-18h30,
                            </p>
                            <p>
                                <span class="font-weight-bold">Yêu cầu:</span>
                                Giáo viên, Nữ
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="mb-0"><a href="{{ route('class_detail') }}">Xem chi tiết <i
                                        class="bi bi-chevron-double-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature">
                        <!-- <span class="uil uil-music"></span> -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="col-6 font-weight-bold p-0">MS: 000002</h3>
                                <p class="p-2 m-0 bg-success text-white rounded">Đã giao</p>
                            </div>
                            <p>
                                <span class="font-weight-bold">Môn dạy: </span>
                                <span class="text-primary">Rèn chữ </span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Khối lớp: </span>
                                <span class="text-primary">Lớp 1 </span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Địa chỉ: </span>
                                P.Lê Bình, Q.Cái Răng
                            </p>
                            <p>
                                <span class="font-weight-bold">Số buổi/tuần: </span>
                                5
                            </p>
                            <p>
                                <span class="font-weight-bold">Mức lương/buổi: </span>
                                100.000đ - 150.000đ
                            </p>
                            <p>
                                <span class="font-weight-bold">Thời gian: </span>
                                T2-T3-T4-T5-T6: 8h-9h30
                            </p>
                            <p>
                                <span class="font-weight-bold">Yêu cầu:</span>
                                Giáo viên, Nữ
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="mb-0"><a href="{{ route('class_detail') }}">Xem chi tiết <i
                                        class="bi bi-chevron-double-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature">
                        <span class="uil uil-book-open"></span>
                        <h3>English Class</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay=100">
                    <div class="feature">
                        <span class="uil uil-book-alt"></span>
                        <h3>Reading for Kids</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature">
                        <span class="uil uil-history"></span>
                        <h3>History Class</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature">
                        <span class="uil uil-headphones"></span>
                        <h3>Music</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->

        {{-- Pagination --}}
        <nav aria-label="..." class="text-center">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div> <!-- /.untree_co-section -->
@endsection
