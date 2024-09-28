@extends('layouts.app')
@section('title', 'Gia sư')
@section('banner_content')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Danh sách gia sư</h1>
    <div class="mb-4 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Trung tâm gia sư Cần Thơ với nhiều năm kinh nghiệm trong lĩnh vực gia sư dạy kèm tại nhà bảo đảm sẽ gửi tới phụ
            huynh
            học sinh những gia sư tốt đã được chọn lọc kỹ càng và phù hợp với yêu cầu riêng biệt của từng học viên.</p>
    </div>
    <div class="mb-1 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Phụ huynh có nhu cầu đăng ký lớp học để tìm gia sư vui lòng đăng ký tài khoản.</p>
    </div>

    <p class="mb-0" data-aos="fade-up" data-aos-delay="300">
        <a href="register_parent.html" class="btn btn-secondary">
            <i class="bi bi-briefcase-fill"></i>
            Đăng ký tìm gia sư
        </a>
    </p>
@endsection
@section('content')
    {{-- Banner --}}
    @include('layouts.banner')

    <div class="untree_co-section p-5">
        <div class="container">
            <div class="card card-body mb-3">
                <h5 class="font-weight-bold">Lê Trương Ngọc Duyên</h5>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="./images/avatar_3.png" alt="" style="object-fit: cover;" class="rounded"
                            height="150px" width="150px">
                    </div>
                    <div class="col-lg-5">
                        <div>
                            <span class="font-weight-bold">Ngày sinh:</span>
                            <span>04/29/2003</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Trình độ</span>
                            <span>Sinh viên</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Chuyên ngành:</span>
                            <span>Công nghệ thông tin</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Nơi học tập/công tác:</span>
                            <span>Đại học Cần Thơ</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Môn dạy:</span>
                            <span>Toán, Lý, Hóa, Tiếng Anh, Tin học, Toán, Lý, Hóa, Tiếng Anh, Tin học</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Khối lớp dạy:</span>
                            <span>Lớp 10, Lớp 11, Lớp 12</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Khu vực dạy:</span>
                            <span>Quận Ninh Kiều</span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-justify">
                            <span class="font-weight-bold">Kinh nghiệm:</span>
                            <span>Có 6 năm kinh nghiệm giúp các em học sinh yếu vượt qua khó khăn trong tiếng Anh trở thành
                                học sinh khá
                                giỏi,
                                bên cạnh đó có phương pháp giảng dạy sáng tạo, phương pháp phản xạ giúp học sinh thích thú
                                với
                                việc</span>
                        </div>
                        <div class="text-justify">
                            <span class="font-weight-bold">Thành tích:</span>
                            <span>GPA: 3.83/4.0 và 5 học kì liên tiếp nhận học bổng của trường</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Học phí/buổi:</span>
                            <span>120.000 - 200.000đ</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body mb-3">
                <h5 class="font-weight-bold">Lê Trương Ngọc Duyên</h5>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="./images/avatar_3.png" alt="" style="object-fit: cover;" class="rounded"
                            height="150px" width="150px">
                    </div>
                    <div class="col-lg-5">
                        <div>
                            <span class="font-weight-bold">Ngày sinh:</span>
                            <span>04/29/2003</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Trình độ</span>
                            <span>Sinh viên</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Chuyên ngành:</span>
                            <span>Công nghệ thông tin</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Nơi học tập/công tác:</span>
                            <span>Đại học Cần Thơ</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Môn dạy:</span>
                            <span>Toán, Lý, Hóa, Tiếng Anh, Tin học, Toán, Lý, Hóa, Tiếng Anh, Tin học</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Khối lớp dạy:</span>
                            <span>Lớp 10, Lớp 11, Lớp 12</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Khu vực dạy:</span>
                            <span>Quận Ninh Kiều</span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-justify">
                            <span class="font-weight-bold">Kinh nghiệm:</span>
                            <span>Có 6 năm kinh nghiệm giúp các em học sinh yếu vượt qua khó khăn trong tiếng Anh trở thành
                                học sinh
                                khá
                                giỏi,
                                bên cạnh đó có phương pháp giảng dạy sáng tạo, phương pháp phản xạ giúp học sinh thích thú
                                với
                                việc</span>
                        </div>
                        <div class="text-justify">
                            <span class="font-weight-bold">Thành tích:</span>
                            <span>GPA: 3.83/4.0 và 5 học kì liên tiếp nhận học bổng của trường</span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Học phí/buổi:</span>
                            <span>120.000 - 200.000đ</span>
                        </div>
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
