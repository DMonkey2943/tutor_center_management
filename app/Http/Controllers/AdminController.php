<?php

namespace App\Http\Controllers;
use App\Models\Tutor;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('admin.dashboard');
    }

    function tutorList() {
        $tutors = Tutor::orderBy('updated_at', 'asc')->paginate(10);

        return view('admin.tutors', compact('tutors',));
    }

}
