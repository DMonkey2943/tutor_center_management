<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use App\Models\Parent1;
use App\Models\Class1;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        $totalTutors = Tutor::count();
        $totalPendingTutors = Tutor::where('tt_status', 0)->count();
        $totalParents = Parent1::count();
        $totalClasses = Class1::count();

        return view('admin.dashboard', compact('totalClasses', 'totalTutors', 'totalPendingTutors', 'totalParents'));
    }

    function tutorList() {
        // $tutors = Tutor::orderBy('updated_at', 'asc')->paginate(10);
        $tutors = Tutor::get();

        return view('admin.tutors', compact('tutors',));
    }

    function approvedTutorList() {
        $tutors = Tutor::where('tt_status', 0)->orderBy('updated_at', 'asc')->paginate(10);

        return view('admin.approve_tutors', compact('tutors',));
    }

    function showProfileDetail($tutor_id) {
        $tutor = Tutor::firstWhere('tt_id', $tutor_id);

        return view('admin.profile_detail', compact('tutor',));
    }

    function approveTutor($tutor_id) {
        $tutor = Tutor::firstWhere('tt_id', $tutor_id);

        if($tutor) {
            $tutor->tt_status = 1;
            $tutor->save();

            return redirect()->route('admin.approvedTutors')->with('success', 'Duyệt hồ sơ Gia sư mã số '. $tutor_id .' thành công!');
        } else {
            return redirect()->route('admin.approvedTutors')->with('error', 'Duyệt hồ sơ Gia sư mã số '. $tutor_id .' thất bại');
        }
    }

    function parentList() {
        $parents = Parent1::all();

        return view('admin.parents', compact('parents',));
    }

    function classList() {
        // $classes = Class1::orderBy('updated_at', 'asc')->paginate(10);
        $classes = Class1::get();

        return view('admin.classes', compact('classes',));
    }


}
