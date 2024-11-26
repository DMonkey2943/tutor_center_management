@extends('layouts.app')
@section('title', 'Lớp đã nhận dạy')
@section('banner-title', 'Lớp đã nhận dạy')
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
            @if ($classes->isEmpty())
                <p class="alert alert-info">Bạn chưa nhận dạy lớp học nào.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mã lớp</th>
                            <th>Môn học</th>
                            <th>Khối lớp</th>
                            <th>Mức lương/buổi</th>
                            <th>Trạng thái lớp học</th>
                            <td>Tùy chọn</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td class="font-weight-bold">
                                    {{ $class->class_id }}
                                </td>
                                <td>
                                    @foreach ($class->subjects as $subject)
                                        {{ $subject->subject_name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $class->grade->grade_name }}</td>
                                <td>
                                    {{ $class->class_tuition === 'Thỏa thuận' ? 'Thỏa thuận' : number_format($class->class_tuition, 0, ',', '.') . ' VNĐ' }}
                                </td>
                                <td>
                                    @if ($class->class_status == 0)
                                        Chưa giao
                                    @else
                                        Đã giao
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tutor.class_detail.teached', ['class_id' => $class->class_id]) }}">Xem
                                        chi tiết <i class="bi bi-chevron-double-right"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
