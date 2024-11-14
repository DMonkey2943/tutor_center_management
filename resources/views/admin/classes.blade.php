@extends('admin.layouts.app')
@section('title', 'Danh sách Lớp học')
@section('content')
    <!-- Table Container -->
    <div class="table-container mt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã lớp</th>
                    <th>Môn dạy</th>
                    <th>Khối lớp dạy</th>
                    <th>Phụ huynh</th>
                    {{-- <th>Địa chỉ</th> --}}
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->class_id }}</td>
                        <td>
                            @foreach ($class->subjects as $subject)
                                {{ $subject->subject_name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $class->grade->grade_name }}</td>
                        <td>{{ $class->parent->user->name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#classModal-{{ $class->class_id }}">
                                Xem chi tiết
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="classModal-{{ $class->class_id }}" tabindex="-1" role="dialog"
                        aria-labelledby="classModalLabel-{{ $class->class_id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title font-weight-bold" id="classModalLabel-{{ $class->class_id }}">
                                        Mã lớp: {{ $class->class_id }}
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="font-weight-bold mt-1">THÔNG TIN LỚP HỌC</h5>
                                    <p><strong>Môn dạy:</strong>
                                        @foreach ($class->subjects as $subject)
                                            {{ $subject->subject_name }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                    <p><strong>Khối lớp dạy:</strong> {{ $class->grade->grade_name }}</p>
                                    <p>
                                        <strong>Địa chỉ:</strong>
                                        {{ $class->address->addr_detail }},
                                        {{ $class->address->ward->ward_name }},
                                        {{ $class->address->ward->district->district_name }}
                                    </p>
                                    <p><strong>Số học viên:</strong> {{ $class->class_num_of_students }}</p>
                                    <p><strong>Số buổi/tuần:</strong> {{ $class->class_num_of_sessions }}</p>
                                    <p><strong>Mức lương/buổi:</strong> {{ $class->class_tuition }}</p>
                                    <p><strong>Thời gian:</strong> {{ $class->class_time }}</p>

                                    <h5 class="font-weight-bold mt-4">YÊU CẦU GIA SƯ</h5>
                                    <p>
                                        <strong>Trình độ:</strong>
                                        @if ($class->class_level != null)
                                            {{ $class->level->level_name }}
                                        @endif
                                    </p>
                                    <p>
                                        <strong>Giới tính GS:</strong>
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
                                        <p><strong>Yêu cầu khác:</strong> {{ $class->class_request }}</p>
                                    @endif


                                    <h5 class="font-weight-bold mt-4">THÔNG TIN LIÊN HỆ PHỤ HUYNH</h5>
                                    <p><strong>Phụ huynh:</strong> {{ $class->parent->user->name }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
    </div>
@endsection
