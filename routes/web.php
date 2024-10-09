<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/classes', [HomeController::class, 'classes'])->name('classes');

Route::get('/class_detail/{class_id}', [HomeController::class, 'class_detail'])->name('class_detail');

Route::get('/tutors', [HomeController::class, 'tutors'])->name('tutors');

// Authentication
Route::middleware(['guest'])->group(function () {
    Route::get('/register/parent', [AuthController::class, 'showFormParentRegister'])->name('parentRegister.form');
    Route::post('/register/parent', [AuthController::class, 'parentRegister'])->name('parentRegister');

    Route::get('/register/tutor', [AuthController::class, 'showFormTutorRegister'])->name('tutorRegister.form');
    Route::post('/register/tutor', [AuthController::class, 'tutorRegister'])->name('tutorRegister');

    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/wards/{district_id}', [AuthController::class, 'getWards']);