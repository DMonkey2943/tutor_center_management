<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use App\Models\Class1;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home() {
        return view('home');
    }

    function classes() {
        $classes = Class1::orderBy('updated_at', 'desc')->paginate(12);

        return view('classes', compact('classes',));
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
