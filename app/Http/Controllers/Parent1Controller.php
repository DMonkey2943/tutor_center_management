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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Parent1Controller extends Controller
{
    function index() {
        
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
        $classes = Class1::where('class_parent', $pr_id)->get();

        return view('parent.classes', compact('classes'));
    }

    function showClassDetail($class_id) {
        $class = Class1::find($class_id) ;

        // Neu parent khong phai la nguoi dang ky class nay thi se chuyen ve trang chu
        if(Auth::user()->parent->pr_id != $class->class_parent){
            return redirect()->route('home');
        }

        return view('parent.class_detail', compact('class'));
    }

    function editClassDetail($class_id) {
        
    }

    function updateClassDetail($class_id) {
        
    }

}
