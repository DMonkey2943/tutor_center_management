@extends('layouts.app')
@section('title', 'Lớp mới')
@section('banner_content')
    <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Lớp mới</h1>
    <div class="mb-4 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
        <p>Trung tâm gia sư Cần Thơ thường xuyên cập nhật lớp dạy kèm mới hàng giờ.</p>
    </div>
    @guest
        <div class="mb-1 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
            <p>Gia sư có nhu cầu nhận lớp vui lòng đăng ký tài khoản.</p>
        </div>
        <p class="mb-0" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('tutorRegister') }}" class="btn btn-secondary">
                <i class="bi bi-briefcase-fill"></i>
                Đăng ký làm gia sư
            </a>
        </p>
    @endguest
@endsection
@section('content')
    {{-- Banner --}}
    @include('layouts.banner')

    <div class="untree_co-section">
        <div class="container">
            {{-- Filter form --}}
            <div class="row text-center mb-5" style="display: block;">
                <form method="GET">
                    {{-- @csrf --}}
                    <div class="form-row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control" name="district">
                                <option value="" selected>-- Chọn Khu vực --</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->district_id }}"
                                        {{ request('district') == $district->district_id ? 'selected' : '' }}>
                                        {{ $district->district_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control" name="level">
                                <option value="" selected>-- Chọn Trình độ gia sư --</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->level_id }}"
                                        {{ request('level') == $level->level_id ? 'selected' : '' }}>
                                        {{ $level->level_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control" name="gender">
                                <option value="" selected>-- Chọn Giới tính gia sư --</option>
                                <option value="M" {{ request('gender') == 'M' ? 'selected' : '' }}>
                                    Nam gia sư
                                </option>
                                <option value="F" {{ request('gender') == 'F' ? 'selected' : '' }}>
                                    Nữ gia sư
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control" name="subject">
                                <option value="" selected>-- Chọn Môn học --</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}"
                                        {{ request('subject') == $subject->subject_id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <select class="form-control" name="grade">
                                <option value="" selected>-- Chọn Khối lớp --</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->grade_id }}"
                                        {{ request('grade') == $grade->grade_id ? 'selected' : '' }}>
                                        {{ $grade->grade_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <input type="submit" class="btn btn-primary" value="LỌC" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                @foreach ($classes as $class)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="col-6 font-weight-bold p-0">MS: {{ $class->class_id }}</h3>
                                    @if ($class->class_status == 0)
                                        <p class="p-2 m-0 bg-primary text-white rounded">Chưa giao</p>
                                    @elseif($class->class_status == 1)
                                        <p class="p-2 m-0 bg-success text-white rounded">Đã giao</p>
                                    @endif
                                </div>
                                <p>
                                    <span class="font-weight-bold">Môn dạy: </span>
                                    <span class="text-primary">
                                        @foreach ($class->subjects as $subject)
                                            {{ $subject->subject_name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </p>
                                <p>
                                    <span class="font-weight-bold">Khối lớp: </span>
                                    <span class="text-primary">{{ $class->grade->grade_name }}</span>
                                </p>
                                <p>
                                    <span class="font-weight-bold">Số học viên: </span>
                                    {{ $class->class_num_of_students }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Địa chỉ: </span>
                                    {{ $class->address->ward->ward_name }},
                                    {{ $class->address->ward->district->district_name }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Số buổi/tuần: </span>
                                    {{ $class->class_num_of_sessions }}
                                </p>
                                <p>
                                    <span class="font-weight-bold">Yêu cầu GS:</span>
                                    @if ($class->class_level != null)
                                        {{ $class->level->level_name }} +
                                    @endif

                                    @if ($class->class_gender_tutor != null)
                                        @if ($class->class_gender_tutor == 'M')
                                            Nam
                                        @elseif ($class->class_gender_tutor == 'F')
                                            Nữ
                                        @endif
                                    @else
                                        Nam/Nữ
                                    @endif
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="mb-0"><a
                                        href="{{ route('class_detail', ['class_id' => $class->class_id]) }}">Xem chi tiết
                                        <i class="bi bi-chevron-double-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- /.container -->

        {{-- Pagination --}}
        <div class="pagination d-flex justify-content-center">
            {{ $classes->links('pagination::bootstrap-4') }}
        </div>
    </div> <!-- /.untree_co-section -->
@endsection
