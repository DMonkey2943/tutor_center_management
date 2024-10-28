<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Parent1;
use App\Models\Class1;
use App\Models\Level;
use App\Models\Tuition;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\District;
use App\Models\Ward;
use App\Models\Address;
use App\Models\TutorDistrict;
use App\Models\TutorGrade;
use App\Models\TutorSubject;
use App\Models\ClassSubject;
use App\Models\Approve;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Parent1Controller extends Controller
{
    function index() {
        $user = Auth::user();
        return view('parent.account', compact('user'));
    }

    function editAccount() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return view('parent.account_edit', compact('user'));
    }

    function updateAccount(Request $req) {
        $validatedData = $req->validate(
            [
                'name' => ['required', 'string', ],
                'phone' => ['required', 
                            'regex:/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/', 
                           ],
            ],
            [
                'required' => 'Không được để trống.',
                'phone.regex' => 'SĐT không hợp lệ.',
            ],
        );

        $data = $req->all();
        
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->save();

        return redirect()->route('parent.account')->with('success', 'Cập nhật thông tin liên hệ thành công!');
    }

    function showFormRegisterClass() {
        $districts = District::all();
        $wards = Ward::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        return view('parent.register_class', compact('districts', 'wards', 'levels', 'subjects', 'grades'));
    }

    function registerClass(Request $req) {
        $validatedData = $req->validate(
            [
                'district_id' => ['required'],
                'ward_id' => ['required',],
                'addr_detail' => ['required',],
                'subjects' => ['required'],
                'grade' => ['required'],
                'num_of_sessions' => ['required'],
                'num_of_students' => ['required'],
                'time' => ['required'],
                'tuition' => ['required'],
                'gender_tutor' => ['required'],
                'level' => ['required'],
                'request' => [],
            ],
            [
                'required' => 'Không được để trống.',
            ],
        );

        $data = $req->all();

        $address = Address::create([
            'addr_detail' => $data['addr_detail'], 
            'ward_id' => $data['ward_id'],
        ]);

        $user = Auth::user();

        $class = Class1::create([
            'class_num_of_students' => $data['num_of_students'], 
            'class_num_of_sessions' => $data['num_of_sessions'], 
            'class_time' => $data['time'], 
            'class_gender_tutor' => $data['gender_tutor']=='0' ? null : $data['gender_tutor'], 
            'class_request' =>  $data['request'] ?? null,
            'class_tuition' => $data['tuition'],  
            'class_status' => 0, 
            'class_address' => $address->addr_id, 
            'class_grade' => $data['grade'], 
            'class_level' => $data['level']=='0' ? null : $data['level'], 
            'class_tutor' => null, 
            'class_parent' => $user->parent->pr_id,
        ]);

        $class_id = $class->class_id;
        foreach($data['subjects'] as $subject) {
            ClassSubject::create([
                'class_id' => $class_id,
                'subject_id' => $subject,
            ]);
        };

        return redirect()->route('home');
    }

    function showRegisteredClasses() {
        $pr_id = Auth::user()->parent->pr_id;
        $classes = Parent1::findOrFail($pr_id)->classes()->paginate(12); // = Class1::where('class_parent', $pr_id)->get()->paginate(12);

        return view('parent.classes', compact('classes'));
    }

    function showClassDetail($class_id) {
        $class = Class1::find($class_id);

        // Neu parent khong phai la nguoi dang ky class nay thi se chuyen ve trang chu
        if(Auth::user()->parent->pr_id != $class->class_parent){
            return redirect()->route('home');
        }

        return view('parent.class_detail', compact('class'));
    }

    function editClassDetail($class_id) {
        $class = Class1::findOrFail($class_id);
        $class_subjects = $class->subjects->pluck('subject_id')->toArray();
        $districts = District::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $wards = Ward::where('district_id', $class->address->ward->district_id)->get();

        // Neu parent khong phai la nguoi dang ky class nay thi se chuyen ve trang chu
        if(Auth::user()->parent->pr_id != $class->class_parent){
            return redirect()->route('home');
        }

        return view('parent.class_update', compact('class', 'class_subjects', 'districts', 'wards', 'levels', 'subjects', 'grades'));
    }

    function updateClassDetail(Request $req, $class_id) {
        $validatedData = $req->validate(
            [
                'district_id' => ['required'],
                'ward_id' => ['required',],
                'addr_detail' => ['required',],
                'subjects' => ['required'],
                'grade' => ['required'],
                'num_of_sessions' => ['required'],
                'num_of_students' => ['required'],
                'time' => ['required'],
                'tuition' => ['required'],
                'gender_tutor' => ['required'],
                'level' => ['required'],
                'request' => [],
            ],
            [
                'required' => 'Không được để trống.',
            ],
        );

        $data = $req->all();

        $class = Class1::findOrFail($class_id);

        $address = Address::findOrFail($class->class_address);
        $address->addr_detail = $data['addr_detail'];
        $address->ward_id = $data['ward_id'];
        $address->save();

        $class->class_num_of_students = $data['num_of_students'];
        $class->class_num_of_sessions = $data['num_of_sessions'];
        $class->class_time = $data['time'];
        $class->class_gender_tutor = $data['gender_tutor'] == '0' ? null : $data['gender_tutor'];
        $class->class_request = $data['request'] ?? null;
        $class->class_tuition = $data['tuition'];
        $class->class_grade = $data['grade'];
        $class->class_level = $data['level'] == '0' ? null : $data['level'];
        $class->save();

        $class->subjects()->sync($data['subjects']);
        
        return redirect()->route('parent.class_details', ['class_id' => $class_id])->with('success', 'Cập nhật lớp học thành công!');
    }

    function destroyClassDetail($class_id) {
        $class = Class1::findOrFail($class_id);
        
        $class->subjects()->sync([]);
        $class->delete();

        return redirect()->route('parent.classes')->with('success', 'Xóa lớp học thành công!');
    }

    function approveTutor($class_id, $tutor_id) {
        $approve = Approve::where('class_id', $class_id)
                      ->where('tt_id', $tutor_id)
                      ->first();
        if($approve) {
            $approve->status = 1;
            $approve->save();

            return redirect()->route('parent.class_details', ['class_id' => $class_id])->with('success', 'Duyệt gia sư mã số'. $tutor_id .' thành công!');
        } else {
            return redirect()->route('parent.class_details', ['class_id' => $class_id])->with('error', 'Duyệt gia sư mã số '. $tutor_id .' thất bại.');
        }
    }
}
