<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/classes', function () {
    return view('classes');
})->name('classes');

Route::get('/class_detail', function () {
    return view('class_detail');
})->name('class_detail');

Route::get('/tutors', function () {
    return view('tutors');
})->name('tutors');

Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::get('/register/parent', function () {
    return view('register_parent');
})->name('register_parent');

Route::get('/register/tutor', function () {
    return view('register_tutor');
})->name('register_tutor');
