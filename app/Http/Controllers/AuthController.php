<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function showFormParentRegister() {
        return view('auth.register_parent');
    }

    public function parentRegister(Request $req) {

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'password' => Hash::make($req->password),
            'role' => 'parent',
        ]);

        return redirect()->route('login.form');
    }

    public function showFormTutorRegister() {
        return view('auth.register_tutor');
    }

    public function tutorRegister(Request $req) {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'password' => Hash::make($req->password),
            'role' => 'tutor',

        ]);

        return redirect()->route('login.form');
    }

    public function showFormLogin() {
        return view('auth.login');
    }

    public function login(Request $req) {
        if(Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
        ])) {
            $req->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return redirect()->route('login.form')->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
