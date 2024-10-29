@extends('layouts.app')
@section('title', 'Lớp đã đăng ký')
@section('banner-title', 'Lớp đã đăng ký')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                                @php
                                    $check = App\Models\Approve::where('class_id', $class->class_id)->exists(); //Kiểm tra xem lớp chưa giao có GS nào nhận lớp chưa để duyệt
                                @endphp
                                @if ($check && $class->class_status == 0)
                                    <p class="alert alert-warning">Đã có gia sư đăng ký nhận lớp!</p>
                                @endif
                            </div>

                            <div class="text-right">
                                <p class="mb-0"><a
                                        href="{{ route('parent.class_details', ['class_id' => $class->class_id]) }}">Xem chi
                                        tiết <i class="bi bi-chevron-double-right"></i></a></p>
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
