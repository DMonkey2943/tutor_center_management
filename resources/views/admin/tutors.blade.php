@extends('admin.layouts.app')
@section('title', 'Danh sách Gia sư')
@section('content')
    <!-- Table Container -->
    <div class="table-container mt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã GS</th>
                    <th>Họ tên GS</th>
                    <th>Trình độ</th>
                    <th>Chuyên ngành</th>
                    <th>Môn dạy</th>
                    <th>Lớp dạy</th>
                    <th>Tình trạng hồ sơ</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutors as $tt)
                    <tr>
                        <td>{{ $tt->tt_id }}</td>
                        <td>{{ $tt->user->name }}</td>
                        <td>{{ $tt->level->level_name }}</td>
                        <td>{{ $tt->tt_major }}</td>
                        <td>
                            @foreach ($tt->subjects as $subject)
                                {{ $subject->subject_name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($tt->grades as $grade)
                                {{ $grade->grade_name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <th>
                            @if ($tt->tt_status == 0)
                                <h5><span class="badge badge-warning font-weight-normal">Đang chờ duyệt</span></h5>
                            @elseif ($tt->tt_status == 1)
                                <h5><span class="badge badge-success font-weight-normal">Đã duyệt</span></h5>
                            @elseif ($tt->tt_status == -1)
                                <h5><span class="badge badge-danger font-weight-normal">Chưa đạt</span></h5>
                            @endif
                        </th>
                        <td>
                            <a href="">Xem
                                chi tiết<i class="bi bi-chevron-double-right"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
    </div>
@endsection
