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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

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
                        <form method="POST" action="{{ route('parent.class_details.delete', $class) }}"
                            onclick="return confirm( 'Bạn có chắc muốn xóa lớp học mã số {{ $class->class_id }} hay không?' )"
                            style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="mb-3 ml-2 mr-2 btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                Xóa
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- DS gia sư đăng ký nhận lớp --> Xét duyệt gia sư --}}
            @if ($class->class_status == 0)
                <div>
                    <div class="row mb-3 justify-content-center">
                        <h3 class="font-weight-bold text-primary">DANH SÁCH GIA SƯ ĐĂNG KÝ NHẬN LỚP</h3>
                    </div>
                    <div>
                        @if ($class->tutorList->isEmpty())
                            <p class="alert alert-info">Không có gia sư nào đăng ký nhận lớp này.</p>
                        @else
                            @foreach ($class->tutorList as $index => $tt)
                                <div class="card card-body mb-3">
                                    <h5 class="font-weight-bold">{{ $tt->user->name }} - Mã gia sư: {{ $tt->tt_id }}
                                    </h5>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <img src="{{ asset('storage/' . $tt->tt_avatar) }}" alt=""
                                                style="object-fit: cover;" class="rounded" height="140px" width="140px">
                                        </div>
                                        <div class="col-lg-5">
                                            <div>
                                                <span class="font-weight-bold">Ngày sinh:</span>
                                                <span>{{ \Carbon\Carbon::parse($tt->tt_birthday)->format('d/m/Y') }}</span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Trình độ:</span>
                                                <span>{{ $tt->level->level_name }}</span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Chuyên ngành:</span>
                                                <span>{{ $tt->tt_major }}</span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Nơi học tập/công tác:</span>
                                                <span>{{ $tt->tt_school }}</span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Các môn:</span>
                                                <span>
                                                    @foreach ($tt->subjects as $subject)
                                                        {{ $subject->subject_name }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Nhận dạy:</span>
                                                <span>
                                                    @foreach ($tt->grades as $grade)
                                                        {{ $grade->grade_name }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div>
                                                <span class="font-weight-bold">Khu vực:</span>
                                                <span>
                                                    @foreach ($tt->districts as $district)
                                                        {{ $district->district_name }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                            <div class="text-justify">
                                                <span class="font-weight-bold">Kinh nghiệm:</span>
                                                <span>{{ $tt->tt_experiences }}</span>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold">Học phí/buổi:</span>
                                                <span>{{ $tt->tuition->tuition_range }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        @if ($tt->pivot->status == 0)
                                            <form
                                                action="{{ route('parent.approveTutor', [$class->class_id, $tt->tt_id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="submit" value="Duyệt gia sư"
                                                    class="btn btn-success p-2 pl-3 pr-3 rounded"
                                                    style="text-transform: none; font-size:16px; letter-spacing: normal;">
                                            </form>
                                        @elseif($tt->pivot->status == 1)
                                            <div class="alert alert-warning">
                                                Đang đợi gia sư xác nhận!
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @else
                <div>
                    <div class="row mb-3 justify-content-center">
                        <h3 class="font-weight-bold text-primary">GIA SƯ NHẬN LỚP</h3>
                    </div>
                    <div class="card card-body mb-3">
                        @php
                            $tutor = $class->tutor;
                        @endphp
                        <h5 class="font-weight-bold">{{ $tutor->user->name }} - Mã gia sư: {{ $tutor->tt_id }}</h5>
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{ asset('storage/' . $tutor->tt_avatar) }}" alt=""
                                    style="object-fit: cover;" class="rounded" height="140px" width="140px">
                            </div>
                            <div class="col-lg-5">
                                <div>
                                    <span class="font-weight-bold">SĐT liên hệ:</span>
                                    <span class="text-primary">{{ $tutor->user->phone }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Ngày sinh:</span>
                                    <span>{{ \Carbon\Carbon::parse($tutor->tt_birthday)->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Trình độ:</span>
                                    <span>{{ $tutor->level->level_name }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Chuyên ngành:</span>
                                    <span>{{ $tutor->tt_major }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Nơi học tập/công tác:</span>
                                    <span>{{ $tutor->tt_school }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Các môn:</span>
                                    <span>
                                        @foreach ($tutor->subjects as $subject)
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
                                        @foreach ($tutor->grades as $grade)
                                            {{ $grade->grade_name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div>
                                    <span class="font-weight-bold">Khu vực:</span>
                                    <span>
                                        @foreach ($tutor->districts as $district)
                                            {{ $district->district_name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                                <div class="text-justify">
                                    <span class="font-weight-bold">Kinh nghiệm:</span>
                                    <span>{{ $tutor->tt_experiences }}</span>
                                </div>
                                <div>
                                    <span class="font-weight-bold">Học phí/buổi:</span>
                                    <span>{{ $tutor->tuition->tuition_range }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
