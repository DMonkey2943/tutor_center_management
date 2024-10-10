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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="line-bottom font-weight-bold">MÃ SỐ LỚP: {{ $class->class_id }}</h3>
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
                            <span class="font-weight-bold">Lớp dạy: </span>
                            <span class="text-primary">{{ $class->grade->grade_name }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Địa chỉ: </span>
                            {{ $class->address->ward->ward_name }},
                            {{ $class->address->ward->district->district_name }}
                        </p>
                        <p>
                            <span class="font-weight-bold">Số học viên: </span>
                            {{ $class->class_num_of_students }}
                        </p>
                        <p>
                            <span class="font-weight-bold">Số buổi/tuần: </span>
                            {{ $class->class_num_of_sessions }}
                        </p>
                        <p>
                            <span class="font-weight-bold">Mức lương/buổi: </span>
                            {{ $class->class_tuition }}
                        </p>
                        <p>
                            <span class="font-weight-bold">Thời gian: </span>
                            {{ $class->class_time }}
                        </p>
                        <h5 class="font-weight-bold mt-4">YÊU CẦU GIA SƯ</h5>
                        <p>
                            <span class="font-weight-bold">Trình độ:</span>
                            @if ($class->class_level != null)
                                {{ $class->level->level_name }}
                            @endif
                        </p>
                        <p>
                            <span class="font-weight-bold">Giới tính: </span>
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
                        @if ($class->class_request != null)
                            <p>
                                <span class="font-weight-bold">Yêu cầu khác: </span>
                                {{ $class->class_request }}
                            </p>
                        @endif
                        <p>
                            <span class="">Ngày cập nhật: </span>
                            {{ \Carbon\Carbon::parse($class->updated_at)->format('d/m/Y') }}
                        </p>

                        <a href="{{ route('parent.class_details.edit', ['class_id' => $class->class_id]) }}"
                            class="mb-3 ml-2 mr-2 btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Chỉnh sửa
                        </a>
                        <a href="{{ route('parent.class_details.edit', ['class_id' => $class->class_id]) }}"
                            class="mb-3 ml-2 mr-2 btn btn-danger">
                            <i class="bi bi-trash3-fill"></i>
                            Xóa
                        </a>
                    </div>
                </div>
            </div>

            {{-- DS gia sư đăng ký nhận lớp --> Xét duyệt gia sư --}}
            <div class="row mb-5 justify-content-center">
                <h3 class="font-weight-bold text-primary">DANH SÁCH GIA SƯ ĐĂNG KÝ NHẬN LỚP</h3>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection