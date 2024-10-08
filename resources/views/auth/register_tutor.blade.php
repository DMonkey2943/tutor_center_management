@extends('layouts.app')
@section('title', 'Đăng ký làm gia sư')
@section('banner-title', 'Đăng ký làm gia sư')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-lg-10 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <form action="" method="POST" class="form-box" enctype="multipart/form-data">
                        @csrf
                        <h5 class="font-weight-bold">THÔNG TIN TÀI KHOẢN</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Họ tên</label>
                                <input type="text" class="form-control " id="inputName" name="name"
                                    value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">SĐT</label>
                                <input type="tel" class="form-control" id="inputPhone" name="phone"
                                    value="{{ old('phone') }}">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Mật khẩu</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <h5 class="font-weight-bold mt-4">THÔNG TIN HỒ SƠ</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputGender">Giới tính</label>
                                <select id="inputGender" class="form-control" name="tt_gender">
                                    <option value="M" {{ old('tt_gender') == 'M' ? 'selected' : '' }}>Nam</option>
                                    <option value="F" {{ old('tt_gender') == 'F' ? 'selected' : '' }}>Nữ</option>
                                </select>
                                <span class="text-danger">
                                    @error('tt_gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputBirthday">Ngày sinh</label>
                                <input type="date" class="form-control" id="inputBirthday" name="tt_birthday"
                                    value="{{ old('tt_birthday') }}">
                                <span class="text-danger">
                                    @error('tt_birthday')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddr">Địa chỉ hiện tại</label>
                            <input type="text" class="form-control" id="inputAddr" placeholder="" name="tt_address"
                                value="{{ old('tt_address') }}">
                            <span class="text-danger">
                                @error('tt_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <label for="">Khu vực dạy</label>
                        <span class="text-danger">
                            @error('tt_districts')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            @foreach ($districts as $area)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="area{{ $area->district_id }}"
                                        value="{{ $area->district_id }}" name="tt_districts[]"
                                        {{ is_array(old('tt_districts')) && in_array($area->district_id, old('tt_districts')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="area{{ $area->district_id }}">
                                        {{ $area->district_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <label for="img_avatar">Ảnh đại diện</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_avatar" name="tt_avatar">
                                <label class="custom-file-label" for="img_avatar" aria-describedby="img_avatar">Choose
                                    file</label>
                            </div>
                            <span class="text-danger">
                                @error('tt_avatar')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if ($errors->any())
                                <span class="text-danger">Vui lòng chọn lại ảnh đại diện.</span>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputLevel">Trình độ</label>
                                <select id="inputLevel" class="form-control" name="tt_level">
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->level_id }}"
                                            {{ old('tt_level') == $level->level_id ? 'selected' : '' }}>
                                            {{ $level->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="inputMajor">Chuyên ngành</label>
                                <input type="text" class="form-control" id="inputMajor" placeholder=""
                                    name="tt_major" value="{{ old('tt_major') }}">
                                <span class="text-danger">
                                    @error('tt_major')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSchool">Nơi học tập/công tác</label>
                            <input type="text" class="form-control" id="inputSchool" placeholder="" name="tt_school"
                                value="{{ old('tt_school') }}">
                            <span class="text-danger">
                                @error('tt_school')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="img_degree">Ảnh bằng cấp / Thẻ sinh viên</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img_degree" name="tt_degree">
                                <label class="custom-file-label" for="img_degree">Choose file</label>
                            </div>
                            <span class="text-danger">
                                @error('tt_degree')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if ($errors->any())
                                <span class="text-danger">Vui lòng chọn lại ảnh bằng cấp / thẻ sinh viên.</span>
                            @endif
                        </div>
                        <label for="">Môn dạy</label>
                        <span class="text-danger">
                            @error('tt_subjects')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            @foreach ($subjects as $subj)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="subj{{ $subj->subject_id }}"
                                        value="{{ $subj->subject_id }}" name="tt_subjects[]"
                                        {{ is_array(old('tt_subjects')) && in_array($subj->subject_id, old('tt_subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="subj{{ $subj->subject_id }}">
                                        {{ $subj->subject_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <label for="">Khối lớp dạy</label>
                        <span class="text-danger">
                            @error('tt_grades')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            @foreach ($grades as $gr)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="grade{{ $gr->grade_id }}"
                                        value="{{ $gr->grade_id }}" name="tt_grades[]"
                                        {{ is_array(old('tt_grades')) && in_array($gr->grade_id, old('tt_grades')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="grade{{ $gr->grade_id }}">
                                        {{ $gr->grade_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="inputExperience">Kinh nghiệm</label>
                            <textarea class="form-control" id="inputExperience" rows="5" name="tt_experiences">{{ old('tt_experiences') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputTuition">Học phí/buổi</label>
                            <select id="inputTuition" class="form-control" name="tt_tuition">
                                @foreach ($tuitions as $tuition)
                                    <option value="{{ $tuition->tuition_id }}"
                                        {{ old('tt_tuition') == $tuition->tuition_id ? 'selected' : '' }}>
                                        {{ $tuition->tuition_range }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Đăng ký" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /.untree_co-section -->
@endsection
