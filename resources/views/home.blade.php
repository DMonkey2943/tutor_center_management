@extends('layouts.app')
@section('title', 'Gia sư Cần Thơ')
@section('banner_content')
    <h1 class="mb-2 heading text-white" data-aos="fade-up" data-aos-delay="100">Trung Tâm Gia Sư
        Cần Thơ</h1>
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Uy tín - Chất
        lượng</h1>
    <p class="mb-4" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ route('register_parent') }}" class="mb-3 ml-2 mr-2 btn btn-secondary">
            <i class="bi bi-book-half"></i>
            Đăng ký tìm gia sư
        </a>
        <a href="{{ route('register_tutor') }}" class=" mb-3 ml-2 mr-2 btn btn-secondary">
            <i class="bi bi-briefcase-fill"></i>
            Đăng ký làm gia sư
        </a>
    </p>
    <p class="mb-4" data-aos="fade-up" data-aos-delay="300"></p>
    <a href="register_class.html" class="mb-3 ml-2 mr-2 btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i>
        Đăng ký lớp học
    </a>
    </p>
@endsection
@section('content')
    {{-- Banner --}}
    @include('layouts.banner')

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 mb-5">
                    <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">Giới thiệu</h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Trung tâm gia sư Cần Thơ với nhiều năm kinh nghiệm trong lĩnh vực gia sư dạy kèm tại nhà bảo đảm
                        sẽ gửi tới phụ huynh học sinh
                        những gia sư tốt đã được chọn lọc kỹ càng và phù hợp với yêu cầu riêng biệt của từng học viên.
                    </p>
                    <ul class="list-unstyled ul-check mb-5 primary" data-aos="fade-up" data-aos-delay="200">
                        <li>Dạy kèm cho các em chuẩn bị vào lớp 1, rèn chữ đẹp</li>
                        <li>Dạy kèm tất cả các môn từ lớp 1 đến lớp 12</li>
                        <li>Ôn thi vào lớp 10</li>
                        <li>Ôn thi Đại học</li>
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-1"></div>
                    <img src="{{ asset('images/tutorWithStudent_1.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div> <!-- /.untree_co-section -->

    <div class="services-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">
                        <h2 class="line-bottom mb-4">Dành cho Phụ huynh - Học sinh</h2>
                    </div>

                    <p data-aos="fade-up" data-aos-delay="100">PHHS có thể yêu cầu gia sư là sinh viên hoặc giáo viên,
                        nam hay nữ, yêu cầu về chuyên ngành, thế mạnh gia sư. Gia sư có
                        thể tới nhà, thư viện, trường học hoặc địa điểm theo yêu cầu của học viên. Gia sư dạy theo khung
                        giờ học viên đưa ra.
                    </p>
                    <p data-aos="fade-up" data-aos-delay="300"><a href="register_parent.html" class="btn btn-primary">
                            <i class="bi bi-book-half"></i>
                            Đăng ký tìm gia sư
                        </a></p>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
                    <figure class="img-wrap-2">
                        <img src="{{ asset('images/student_1.jpg') }}" alt="Image" class="img-fluid">
                        <div class="dotted"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="services-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
                    <figure class="img-wrap-2">
                        <img src="{{ asset('images/teacher-min.jpg') }}" alt="Image" class="img-fluid">
                        <div class="dotted"></div>
                    </figure>

                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">
                        <h2 class="line-bottom mb-4">Dành cho Gia sư</h2>
                    </div>

                    <p data-aos="fade-up" data-aos-delay="100">Trung tâm gia sư Cần Thơ luôn sẵn sàng hỗ trợ và tạo
                        điều kiện để gia sư có được những lớp dạy phù hợp, phần nào giúp cải thiện thu nhập.
                        Thời gian dạy linh hoạt giúp gia sư vừa dạy vừa đảm bảo được công việc cũng như việc học tập của
                        mình
                    </p>
                    <p data-aos="fade-up" data-aos-delay="300">
                        <a href="register_tutor.html" class="btn btn-primary">
                            <i class="bi bi-briefcase-fill"></i>
                            Đăng ký làm gia sư
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
