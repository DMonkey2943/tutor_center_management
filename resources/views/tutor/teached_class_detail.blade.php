@extends('layouts.app')
@section('title', 'Chi tiết lớp học nhận dạy')
@section('banner-title', 'Thông tin lớp học nhận dạy')
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
                        </div>
                        <h5 class="font-weight-bold mt-4">THÔNG TIN LỚP HỌC</h5>
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
                            <span class="text-primary">
                                {{ $class->address->addr_detail }},
                                {{ $class->address->ward->ward_name }},
                                {{ $class->address->ward->district->district_name }}
                            </span>
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
                            {{ $class->class_tuition === 'Thỏa thuận' ? 'Thỏa thuận' : number_format($class->class_tuition, 0, ',', '.') . ' VNĐ' }}
                        </p>
                        <p>
                            <span class="font-weight-bold">Thời gian: </span>
                            {{ $class->class_time }}
                        </p>

                        <h5 class="font-weight-bold mt-4">THÔNG TIN LIÊN HỆ PHỤ HUYNH</h5>
                        <p>
                            <span class="font-weight-bold">Tên Phụ huynh: </span>
                            <span class="text-primary">{{ $class->parent->user->name }}</span>
                        </p>
                        <p>
                            <span class="font-weight-bold">Số điện thoại Phụ huynh: </span>
                            <span class="text-primary">{{ $class->parent->user->phone }}</span>
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

                        {{-- @if (Auth::check() && Auth::user()->role == 'tutor' && $class->class_satus == 0)
                            <div class="text-right">
                                <form action="{{ route('tutor.registerClass') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="class_id" value="{{ $class->class_id }}">
                                    <input type="submit" value="Đăng ký nhận lớp" class="btn btn-primary">
                                </form>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
