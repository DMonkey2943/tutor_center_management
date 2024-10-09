<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home() {
        return view('home');
    }

    function classes() {
        return view('classes');
    }

    function class_detail() {
        return view('class_detail');
    }

    function tutors() {
        $tutors = Tutor::orderBy('updated_at', 'desc')->get();

        return view('tutors', compact('tutors',));
    }    

}
