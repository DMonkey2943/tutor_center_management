@extends('admin.layouts.app')
@section('title', 'Xét duyệt hồ sơ Gia sư')
@section('content')
    <!-- Table Container -->
    <div class="table-container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã GS</th>
                    <th>Họ tên GS</th>
                    <th>Ảnh đại diện</th>
                    <th>Ảnh bằng cấp/Thẻ SV</th>
                    <th>Môn dạy</th>
                    <th>Lớp dạy</th>
                    {{-- <th>Tình trạng hồ sơ</th> --}}
                    <th>Ngày cập nhật</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tutors as $tt)
                    <tr>
                        <td>{{ $tt->tt_id }}</td>
                        <td>{{ $tt->user->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $tt->tt_avatar) }}" alt="" style="object-fit: cover;"
                                class="rounded" height="100px" width="100px">
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $tt->tt_degree) }}" alt="" width="200px">
                        </td>
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
                        {{-- <td>
                            @if ($tt->tt_status == 0)
                                <h5><span class="badge badge-warning font-weight-normal">Đang chờ duyệt</span></h5>
                            @elseif ($tt->tt_status == 1)
                                <h5><span class="badge badge-success font-weight-normal">Đã duyệt</span></h5>
                            @elseif ($tt->tt_status == -1)
                                <h5><span class="badge badge-danger font-weight-normal">Chưa đạt</span></h5>
                            @endif
                        </td> --}}
                        <td>{{ \Carbon\Carbon::parse($tt->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('admin.approveTutor', ['tutor_id' => $tt->tt_id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="submit" value="Duyệt gia sư"
                                    class="btn btn-success p-2 pl-3 pr-3 rounded mb-4"
                                    style="text-transform: none; font-size:16px; letter-spacing: normal;">
                            </form>
                            <a href="{{ route('admin.tutor_detail', ['tutor_id' => $tt->tt_id]) }}">
                                Xem chi tiết<i class="bi bi-chevron-double-right"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
    </div>
@endsection
