@extends('layouts.app')
@section('title', 'Gia sư')
@section('banner_content')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Danh sách gia sư</h1>
    <div class="mb-4 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Trung tâm gia sư Cần Thơ với nhiều năm kinh nghiệm trong lĩnh vực gia sư dạy kèm tại nhà bảo đảm sẽ gửi tới phụ
            huynh
            học sinh những gia sư tốt đã được chọn lọc kỹ càng và phù hợp với yêu cầu riêng biệt của từng học viên.</p>
    </div>
    @if (Auth::check())
        @if (Auth::user()->role == 'parent')
            <p class="mb-4" data-aos="fade-up" data-aos-delay="300"></p>
            <a href="{{ route('parent.registerClass.form') }}" class="mb-3 ml-2 mr-2 btn btn-secondary">
                <i class="bi bi-plus-circle-fill"></i>
                Đăng ký lớp học
            </a>
            </p>
        @endif
    @else
        <div class="mb-1 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
            <p>Phụ huynh có nhu cầu đăng ký lớp học để tìm gia sư vui lòng đăng ký tài khoản.</p>
        </div>

        <p class="mb-0" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('parentRegister') }}" class="btn btn-secondary">
                <i class="bi bi-briefcase-fill"></i>
                Đăng ký tìm gia sư
            </a>
        </p>
    @endif
@endsection
@section('content')
    {{-- Banner --}}
    @include('layouts.banner')

    <div class="untree_co-section p-5">
        <div class="container">
            @foreach ($tutors as $tt)
                <div class="card card-body mb-3">
                    <h5 class="font-weight-bold text-primary">{{ $tt->user->name }} - Mã gia sư: {{ $tt->tt_id }}</h5>
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{{ asset('storage/' . $tt->tt_avatar) }}" alt="" style="object-fit: cover;"
                                class="rounded" height="140px" width="140px">
                        </div>
                        <div class="col-lg-5">
                            {{-- <div>
                                <span class="font-weight-bold">Ngày sinh:</span>
                                <span>{{ \Carbon\Carbon::parse($tt->tt_birthday)->format('d/m/Y') }}</span>
                            </div> --}}
                            <div>
                                <span class="font-weight-bold">Trình độ:</span>
                                <span>{{ $tt->level->level_name }}</span>
                            </div>
                            <div>
                                <span class="font-weight-bold">Chuyên ngành:</span>
                                <span>{{ $tt->tt_major }}</span>
                            </div>
                            {{-- <div>
                                <span class="font-weight-bold">Nơi học tập/công tác:</span>
                                <span>{{ $tt->tt_school }}</span>
                            </div> --}}
                            <div>
                                <span class="font-weight-bold">Các môn:</span>
                                <span>
                                    @foreach ($tt->subjects as $subject)
                                        {{ $subject->subject_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                            <div>
                                <span class="font-weight-bold">Nhận dạy:</span>
                                <span>
                                    @foreach ($tt->grades as $grade)
                                        {{ $grade->grade_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                            <div>
                                <span class="font-weight-bold">Khu vực:</span>
                                <span>
                                    @foreach ($tt->districts as $district)
                                        {{ $district->district_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="text-justify">
                                <span class="font-weight-bold">Kinh nghiệm:</span>
                                <span>{{ $tt->tt_experiences }}</span>
                            </div>
                            {{-- <div>
                                <span class="font-weight-bold">Học phí/buổi:</span>
                                <span>{{ $tt->tuition->tuition_range }}</span>
                            </div> --}}
                            <div class="mt-3 text-right">
                                <span class="">Cập nhật:</span>
                                <span>{{ \Carbon\Carbon::parse($tt->updated_at)->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- /.container -->

        {{-- Pagination --}}
        <div class="pagination d-flex justify-content-center">
            {{ $tutors->links('pagination::bootstrap-4') }}
        </div>
    </div> <!-- /.untree_co-section -->
@endsection
