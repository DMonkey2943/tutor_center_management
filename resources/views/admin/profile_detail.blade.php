@extends('admin.layouts.app')
@section('title', 'Chi tiết hồ sơ Gia sư')
@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            @if ($tutor->tt_status == 1)
                <p class="p-2 m-0 bg-success text-white rounded">
                    <span class="font-weight-bold">Trạng thái hồ sơ:</span>
                    Đã duyệt
                </p>
            @elseif ($tutor->tt_status == 0)
                <p class="p-2 m-0 bg-warning text-white rounded">
                    <span class="font-weight-bold">Trạng thái hồ sơ:</span>
                    Đang chờ duyệt
                </p>
            @elseif ($tutor->tt_status == -1)
                <p class="p-2 m-0 bg-danger text-white rounded">
                    <span class="font-weight-bold">Trạng thái hồ sơ:</span>
                    Chưa đạt
                </p>
                {{-- <div>
                        <p class="p-2 m-0 bg-danger text-white rounded text-justify" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Chưa đạt <i class="bi bi-caret-down-fill"></i>
                        </p>
                        <div class="collapse mt-1" id="collapseExample">
                            <div class="card card-body">
                                Lý do: The collapse plugin also supports horizontal collapsing. Add the .width modifier
                                class to
                                transition the width instead
                                of height and set a width on the immediate child element. Feel free to write your own custom
                                Sass, use inline styles, or
                                use our width utilities.
                            </div>
                        </div>
                    </div> --}}
            @endif

        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div>
                    <span class="font-weight-bold">Ảnh đại diện:</span>
                    <br>
                    <img src="{{ asset('storage/' . $tutor->tt_avatar) }}" alt="" style="object-fit: cover;"
                        class="rounded" height="260px" width="260px">
                </div>
                <div class="mt-4">
                    <span class="font-weight-bold">Ảnh bằng cấp / Thẻ sinh viên:</span>
                    <br>
                    <img src="{{ asset('storage/' . $tutor->tt_degree) }}" alt="" width="420px">
                </div>
            </div>
            <div class="col-12 col-lg-8" style="">
                <div class="mb-3">
                    <span class="font-weight-bold">Giới tính:</span>
                    <span>
                        @if ($tutor->tt_gender == 'M')
                            Nam
                        @elseif ($tutor->tt_gender == 'F')
                            Nữ
                        @endif
                    </span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Ngày sinh:</span>
                    <span>{{ \Carbon\Carbon::parse($tutor->tt_birthday)->format('d/m/Y') }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Địa chỉ hiện tại:</span>
                    <span>{{ $tutor->tt_address }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Khu vực dạy:</span>
                    <span>
                        @foreach ($tutor->districts as $district)
                            {{ $district->district_name }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Trình độ:</span>
                    <span>{{ $tutor->level->level_name }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Chuyên ngành:</span>
                    <span>{{ $tutor->tt_major }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Nơi học tập/công tác:</span>
                    <span>{{ $tutor->tt_school }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Môn dạy:</span>
                    <span>
                        @foreach ($tutor->subjects as $subject)
                            {{ $subject->subject_name }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Khối lớp dạy:</span>
                    <span>
                        @foreach ($tutor->grades as $grade)
                            {{ $grade->grade_name }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="text-justify mb-3">
                    <span class="font-weight-bold">Kinh nghiệm:</span>
                    <span style="">{{ $tutor->tt_experiences }}</span>
                </div>
                <div class="mb-3">
                    <span class="font-weight-bold">Học phí/buổi:</span>
                    <span>{{ $tutor->tuition->tuition_range }}</span>
                </div>
                <div class="mb-3">
                    <span class="">Cập nhật:</span>
                    <span>{{ \Carbon\Carbon::parse($tutor->updated_at)->format('d/m/Y') }}</span>
                </div>
                @if ($tutor->tt_status == 0)
                    <form action="{{ route('admin.approveTutor', ['tutor_id' => $tutor->tt_id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="submit" value="Duyệt gia sư" class="btn btn-success p-2 pl-3 pr-3 rounded mb-4"
                            style="text-transform: none; font-size:18px; letter-spacing: normal;">
                    </form>
                @endif
            </div>
        </div>
    </div> <!-- /.container-fluid -->
@endsection
