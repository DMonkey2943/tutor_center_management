@extends('layouts.app')
@section('title', 'Đăng ký lớp học')
@section('banner-title', 'Đăng ký lớp học')
@section('content')
    {{-- Banner --}}
    @include('layouts.banner_sm')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-10 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <form action="" method="POST" class="form-box">
                        @csrf
                        <h5 class="font-weight-bold mt-4">THÔNG TIN LỚP HỌC</h5>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputDistrict">Quận/Huyện<span class="text-danger">*</span></label>
                                <select id="inputDistrict" class="form-control" name="district_id">
                                    <option value="">-- Chọn Quận/Huyện --</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->district_id }}"
                                            {{ old('district_id') == $district->district_id ? 'selected' : '' }}>
                                            {{ $district->district_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('district_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputWard">Phường/Xã<span class="text-danger">*</span></label>
                                <select id="inputWard" class="form-control" name="ward_id">
                                    <option value="">-- Chọn Phường/Xã --</option>
                                </select>
                                <span class="text-danger">
                                    @error('ward_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputAddr">Số nhà, tên đường<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputAddr" placeholder="Số 1, đường 3/2"
                                    name="addr_detail" value="{{ old('addr_detail') }}">
                                <span class="text-danger">
                                    @error('addr_detail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <label for="">Môn học<span class="text-danger">*</span></label>
                        <span class="text-danger">
                            @error('subjects')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group pl-5 container-fluid">
                            <div class="row">
                                @foreach ($subjects as $subj)
                                    <div class="form-check form-check-inline col-3">
                                        <input class="form-check-input" type="checkbox" id="subj{{ $subj->subject_id }}"
                                            value="{{ $subj->subject_id }}" name="subjects[]"
                                            {{ is_array(old('subjects')) && in_array($subj->subject_id, old('subjects')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="subj{{ $subj->subject_id }}">
                                            {{ $subj->subject_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputGrade">Khối lớp<span class="text-danger">*</span></label>
                            <select id="inputGrade" class="form-control" name="grade">
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->grade_id }}"
                                        {{ old('grade') == $grade->grade_id ? 'selected' : '' }}>
                                        {{ $grade->grade_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('grade')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputSession">Số buổi/tuần<span class="text-danger">*</span></label>
                                <select id="inputSession" class="form-control" name="num_of_sessions">
                                    <option value="1" {{ old('num_of_sessions') == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('num_of_sessions') == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('num_of_sessions') == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('num_of_sessions') == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('num_of_sessions') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('num_of_sessions') == 6 ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('num_of_sessions') == 7 ? 'selected' : '' }}>7</option>
                                </select>
                                <span class="text-danger">
                                    @error('num_of_sessions')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStudent">Số người học<span class="text-danger">*</span></label>
                                <select id="inputStudent" class="form-control" name="num_of_students">
                                    <option value="1" {{ old('num_of_students') == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('num_of_students') == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('num_of_students') == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('num_of_students') == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('num_of_students') == 5 ? 'selected' : '' }}>5</option>
                                </select>
                                <span class="text-danger">
                                    @error('num_of_students')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTime">Thời gian học<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputTime" placeholder="T2,T4,T6: 18h-19h30"
                                name="time" value="{{ old('time') }}">
                            <span class="text-danger">
                                @error('time')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="inputTuition">Học phí/buổi (VNĐ)<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputTuition"
                                placeholder="80.000đ-100.000đ (hoặc Thỏa thuận)" name="tuition"
                                value="{{ old('tuition') }}">
                            <span class="text-danger">
                                @error('tuition')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <h5 class="font-weight-bold mt-4">YÊU CẦU GIA SƯ</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputGenderTt">Giới tính<span class="text-danger">*</span></label>
                                <select id="inputGenderTt" class="form-control" name="gender_tutor">
                                    <option value="0" selected>Tùy trung tâm</option>
                                    <option value="M" {{ old('tt_gender') == 'M' ? 'selected' : '' }}>Nam gia sư
                                    </option>
                                    <option value="F" {{ old('tt_gender') == 'F' ? 'selected' : '' }}>Nữ gia sư
                                    </option>
                                </select>
                                <span class="text-danger">
                                    @error('gender_tutor')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLevel">Trình độ gia sư<span class="text-danger">*</span></label>
                                <select id="inputLevel" class="form-control" name="level">
                                    <option value="0" selected>Tùy trung tâm</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->level_id }}"
                                            {{ old('level') == $level->level_id ? 'selected' : '' }}>
                                            {{ $level->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRequest">Yêu cầu khác</label>
                            <textarea class="form-control" id="inputRequest" rows="3" name="request">{{ old('request') }}</textarea>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Đăng ký" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /.untree_co-section -->

    <script>
        $(document).ready(function() {
            // Lưu giá trị ward_id cũ từ old()
            var oldWardId = "{{ old('ward_id') }}";

            $('#inputDistrict').change(function() {
                var districtID = $(this).val();
                if (districtID) {
                    $.get('/wards/' + districtID, function(data) {
                        $('#inputWard').empty().append('<option value="">Chọn Phường/Xã</option>');

                        // Duyệt qua dữ liệu và thêm các lựa chọn
                        $.each(data, function(i, ward) {
                            $('#inputWard').append('<option value="' + ward.ward_id + '" ' +
                                (oldWardId == ward.ward_id ? 'selected' : '') + '>' +
                                ward.ward_name + '</option>');
                        });
                    });
                } else {
                    $('#inputWard').empty().append('<option value="">Chọn Phường/Xã</option>');
                }
            });

            // Để hiển thị lựa chọn cũ nếu có giá trị ban đầu
            if (oldWardId) {
                $('#inputWard').val(oldWardId);
            }
        });
    </script>
@endsection
