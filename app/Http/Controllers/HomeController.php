<?php

namespace App\Http\Controllers;

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
        return view('tutors');
    }    

}
