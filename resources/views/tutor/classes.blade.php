@extends('layouts.app')
@section('title', 'Lớp đã đăng ký nhận dạy')
@section('banner-title', 'Lớp đã đăng ký nhận dạy')
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
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            @if ($classes->isEmpty())
                <p>Bạn chưa đăng ký nhận dạy lớp học nào.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mã lớp</th>
                            <th>Môn học</th>
                            <th>Khối lớp</th>
                            <th>Học phí</th>
                            <th>Trạng thái lớp học</th>
                            <th>Trạng thái xét duyệt</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td class="font-weight-bold">
                                    <a href="{{ route('class_detail', $class->class_id) }}">{{ $class->class_id }}</a>
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
                                <td>{{ $class->class_tuition }}</td>
                                <td>
                                    @if ($class->class_status == 0)
                                        Chưa giao
                                    @else
                                        Đã giao
                                    @endif
                                </td>
                                <td>
                                    @foreach ($class->tutorList as $tutor)
                                        @if ($tutor->pivot->status == 0)
                                            Đang chờ duyệt
                                        @elseif ($tutor->pivot->status == 1)
                                            Đã được duyệt
                                        @else
                                            Phụ huynh từ chối
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($class->tutorList as $tutor)
                                        @if ($tutor->pivot->status == 0)
                                            <div class="mb-2">
                                                <form action="{{ route('tutor.unregisterClass', $class->class_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Hủy đăng ký"
                                                        class="btn btn-danger p-1 rounded"
                                                        style="text-transform: none; font-size:15px; letter-spacing: normal;"
                                                        onclick="return confirm('Bạn có chắc chắn muốn hủy đăng ký lớp học mã số {{ $class->class_id }} hay không?')">
                                                </form>
                                            </div>
                                        @elseif ($tutor->pivot->status == 1 && $class->class_status == 0)
                                            <div>
                                                <form action="{{ route('tutor.teachClass', $class->class_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Nhận lớp"
                                                        class="btn btn-success p-1 rounded"
                                                        style="text-transform: none; font-size:15px; letter-spacing: normal;">
                                                </form>
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
