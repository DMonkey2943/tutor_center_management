<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Class1;
use App\Models\Approve;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    function index() {
        
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
}
