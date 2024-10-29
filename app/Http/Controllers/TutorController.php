<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Class1;
use App\Models\Approve;
use App\Models\Level;
use App\Models\Tuition;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\District;
use App\Models\TutorDistrict;
use App\Models\TutorGrade;
use App\Models\TutorSubject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TutorController extends Controller
{
    function index() {
        $user = Auth::user();
        $user_id = $user->id;
        $tutor = Tutor::firstWhere('user_id', $user_id);
        return view('tutor.profile', compact('user', 'tutor'));
    }

    function editProfile()  {
        $user = Auth::user();
        $user_id = $user->id;
        $tutor = Tutor::firstWhere('user_id', $user_id);
        $districts = District::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $tuitions = Tuition::all();
        $tutor_districts = $tutor->districts->pluck('district_id')->toArray();
        $tutor_subjects = $tutor->subjects->pluck('subject_id')->toArray();
        $tutor_grades = $tutor->grades->pluck('grade_id')->toArray();

        return view('tutor.profile_edit', compact('tutor', 'districts', 'levels', 'subjects', 'grades', 'tuitions', 'tutor_districts', 'tutor_subjects', 'tutor_grades'));
    }

    function updateProfile(Request $req) {
        $validatedData = $req->validate(
            [
                'tt_birthday' => ['required', 'date', 'before:today'],
                'tt_address' => ['required',],
                'tt_districts' => ['required'],
                'tt_major' => ['required',],
                'tt_school' => ['required',],
                'tt_subjects' => ['required'],
                'tt_grades' => ['required'],
                'tt_avatar' => ['image', 'max:2048'],
                'tt_degree' => ['image', 'max:2048'],
            ],
            [
                'required' => 'Không được để trống.',
                'tt_birthday.date' => 'Ngày sinh không đúng định dạng.',
                'tt_birthday.before' => 'Ngày sinh không hợp lệ.',
                'image' => 'Ảnh không hợp lệ.',
                'tt_avatar.max' => 'Ảnh không quá 2MB.',
                'tt_degree.max' => 'Ảnh không quá 2MB.',                
            ],
        );

        $data = $req->all();
        // dd($data);

        $tutor = Tutor::firstWhere('user_id', Auth::user()->id);

        // Nếu có ảnh đại diện được upload
        if ($req->hasFile('tt_avatar')) {
            // Xóa ảnh cũ nếu có
            if ($tutor->tt_avatar) {
                Storage::delete('public/' . $tutor->tt_avatar);
            }
            // Lưu ảnh mới
            $fileAvt = $req->file('tt_avatar'); // Lấy file hình ảnh từ request
            $originalAvtName = pathinfo($fileAvt->getClientOriginalName(), PATHINFO_FILENAME); // Lấy tên file gốc
            $avtExtension = $fileAvt->getClientOriginalExtension();// Lấy phần mở rộng của file (jpg, png...)
            $newAvtName = $originalAvtName . '_' . Carbon::now()->format('Ymd_His') . '.' . $avtExtension;// Tạo tên mới cho file: avatar01_YYYYMMDD_HHMMSS.jpg
            $avtPath = $fileAvt->storeAs('images', $newAvtName, 'public'); // Lưu file vào thư mục 'images' trong 'public' disk
            $tutor->tt_avatar = $avtPath;
        }
        // Nếu có ảnh bẳng cấp/thẻ SV được upload
        if ($req->hasFile('tt_degree')) {
            // Xóa ảnh cũ nếu có
            if ($tutor->tt_degree) {
                Storage::delete('public/' . $tutor->tt_degree);
            }
            // Lưu ảnh mới
            $fileDegree = $req->file('tt_degree'); // Lấy file hình ảnh từ request
            $originalDegreeName = pathinfo($fileDegree->getClientOriginalName(), PATHINFO_FILENAME); // Lấy tên file gốc
            $degreeExtension = $fileDegree->getClientOriginalExtension();// Lấy phần mở rộng của file (jpg, png...)
            $newDegreeName = $originalDegreeName . '_' . Carbon::now()->format('Ymd_His') . '.' . $degreeExtension;// Tạo tên mới cho file: degree01_YYYYMMDD_HHMMSS.jpg
            $degreePath = $fileDegree->storeAs('images', $newDegreeName, 'public'); // Lưu file vào thư mục 'images' trong 'public' disk
            $tutor->tt_degree = $degreePath;
        }

        $tutor->tt_gender = $data['tt_gender'];
        $tutor->tt_birthday = $data['tt_birthday'];
        $tutor->tt_address = $data['tt_address'];
        $tutor->tt_major = $data['tt_major'];
        $tutor->tt_school = $data['tt_school'];
        $tutor->tt_experiences = $data['tt_experiences'];
        $tutor->tt_status = 0;
        $tutor->level_id = $data['tt_level'];
        $tutor->tuition_id = $data['tt_tuition'];
        
        $tutor->districts()->sync($data['tt_districts']);
        $tutor->subjects()->sync($data['tt_subjects']);
        $tutor->grades()->sync($data['tt_grades']);

        $tutor->save();

        return redirect()->route('tutor.profile')->with('success', 'Cập nhật hồ sơ thành công');
    }

    function registerClass(Request $req) {
        $data = $req->all();
        // dd($data);
        $user = Auth::user();
        $approve = Approve::create([
            'class_id' => $data['class_id'],
            'tt_id' => $user->tutor->tt_id,
            'status' => 0,
        ]);

        return redirect()->route('tutor.classes');
    }

    function showRegisteredClasses(){
        $tt_id = Auth::user()->tutor->tt_id;
        
        // Lấy các lớp mà gia sư đã đăng ký thông qua bảng 'approve'
        $classes = Class1::whereHas('tutorList', function ($query) use ($tt_id) {
            $query->where('approve.tt_id', $tt_id); // Chỉ định rõ tên bảng cho tt_id
        })
        ->with(['subjects', 'grade', 'tutorList' => function ($query) use ($tt_id) {
            $query->where('approve.tt_id', $tt_id)->select('status'); // Chỉ định rõ approve.tt_id
        }])
        ->select('class_id', 'class_grade', 'class_tuition', 'class_status') // lấy các thông tin cần hiển thị
        ->get();

        return view('tutor.classes', compact('classes'));
    }

    function unregisterClass($class_id) {
        $tt_id = Auth::user()->tutor->tt_id;

        $deleted = Approve::where('class_id', $class_id)
                        ->where('tt_id', $tt_id)
                        ->delete();

        return redirect()->route('tutor.classes')->with('success', 'Hủy đăng ký lớp học mã số '. $class_id .'  thành công!');

        if ($deleted) {
            return redirect()->route('tutor.classes')->with('success', 'Hủy đăng ký lớp học mã số '. $class_id .'  thành công!');
        } else {
            return redirect()->route('tutor.classes')->with('error', 'Hủy đăng ký lớp học mã số '. $class_id .'  thất bại!');
        }
    }

    function showTeachedClasses() {
        $tt_id = Auth::user()->tutor->tt_id;

        $classes = Class1::where('class_tutor', $tt_id)->get();
        // dd($classes);

        return view('tutor.teachedClasses', compact('classes'));
    }

    function teachClass($class_id) {
        $tt_id = Auth::user()->tutor->tt_id;

        $class = Class1::find($class_id);

        if(!empty($class->class_tutor)) {
            return redirect()->route('tutor.classes')->with('error', 'Nhận dạy lớp học mã số '. $class_id .'  thất bại!');
        } 
        // Cập nhật trạng thái thành -1 của tất cả các gia sư khác trong bảng 'approve' (ngoại trừ gia sư nhận lớp)
        Approve::where('class_id', $class_id)
            ->where('tt_id', '!=', $tt_id)
            ->update(['status' => -1]);
        
        $class->class_tutor = $tt_id;
        $class->class_status = 1; // Cập nhật trạng thái lớp thành đã giao
        $class->save();

        return redirect()->route('tutor.classes.teached')->with('success', 'Nhận dạy lớp học mã số '. $class_id .'  thành công!');
    }

    function showTeachedClassesDetail($class_id) {
        $class = Class1::find($class_id);

        if(Auth::user()->tutor->tt_id != $class->class_tutor){
            return redirect()->route('home');
        }

        return view('tutor.teached_class_detail', compact('class'));
    }
}
