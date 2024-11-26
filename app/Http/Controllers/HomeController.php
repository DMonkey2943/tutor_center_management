<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use App\Models\Class1;
use App\Models\District;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home() {
        return view('home');
    }

    function classes(Request $request) {
        $districts = District::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        // Lấy các bộ lọc từ request
        $filters = $request->only(['district', 'level', 'gender', 'subject', 'grade']) + [
            'district' => null,
            'level' => null,
            'gender' => null,
            'subject' => null,
            'grade' => null,
        ];

        // dd($filters);

        $classes = Class1::query()
            // Lọc theo district (khu vực)
            ->when($filters['district'], function ($query, $district) {
                $query->whereHas('address.ward.district', function ($q) use ($district) {
                    $q->where('district_id', $district);
                });
            })
            // Lọc theo level (trình độ GS)
            ->when($filters['level'], function ($query, $level) {
                $query->where('class_level', $level);
            })
            // Lọc theo gender (giới tính GS)
            ->when($filters['gender'], function ($query, $gender) {
                $query->where('class_gender_tutor', $gender);
            })
            // Lọc theo subject (môn học)
            ->when($filters['subject'], function ($query, $subject) {
                $query->whereHas('subjects', function ($q) use ($subject) {
                    $q->where('class_subjects.subject_id', $subject); // Chỉ định bảng 'class_subjects'
                });
            })
            // Lọc theo grade (lớp học)
            ->when($filters['grade'], function ($query, $grade) {
                $query->where('class_grade', $grade);
            })
            ->with(['address.ward.district', 'level', 'grade', 'subjects', 'tutor', 'parent'])
            ->orderBy('updated_at', 'desc')
            ->paginate(9)
            ->appends($filters);// Giữ lại query string khi phân trang

        return view('classes', compact('classes', 'filters', 'districts', 'levels', 'subjects', 'grades'));
    }

    function class_detail($class_id) {
        $class = Class1::find($class_id) ;

        return view('class_detail', compact('class'));
    }

    function tutors() {
        $tutors = Tutor::orderBy('updated_at', 'desc')->paginate(10);

        return view('tutors', compact('tutors',));
    }    

}
