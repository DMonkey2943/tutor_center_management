<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parent1Controller;
use App\Http\Controllers\TutorController;
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

// Parent
Route::prefix('parent')->middleware(['auth', 'role:parent'])->group(function() {
    Route::get('/', [Parent1Controller::class, 'index'])->name('parent.account');
    Route::get('/register/class', [Parent1Controller::class, 'showFormRegisterClass'])->name('parent.registerClass.form');
    Route::post('/register/class', [Parent1Controller::class, 'registerClass'])->name('parent.registerClass');
    Route::get('/classes', [Parent1Controller::class, 'showRegisteredClasses'])->name('parent.classes');
    Route::get('/class/{class_id}', [Parent1Controller::class, 'showClassDetail'])->name('parent.class_details');
    Route::get('/class/edit/{class_id}', [Parent1Controller::class, 'editClassDetail'])->name('parent.class_details.edit');
    Route::PATCH('/class/update/{class_id}', [Parent1Controller::class, 'updateClassDetail'])->name('parent.class_details.update');
    Route::DELETE('/class/delete/{class_id}', [Parent1Controller::class, 'destroyClassDetail'])->name('parent.class_details.delete');
});

// Tutor
Route::prefix('tutor')->middleware(['auth', 'role:tutor'])->group(function() {
    Route::get('/', [TutorController::class, 'index'])->name('tutor.account');
    Route::post('/register/class', [TutorController::class, 'registerClass'])->name('tutor.registerClass'); //Dang ky nhan lop
    Route::get('/classes', [TutorController::class, 'showRegisteredClasses'])->name('tutor.classes'); //DS lop da dang ky nhan
});



// Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function() {
    
});



