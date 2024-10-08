<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Parent1;
use App\Models\Class1;
use App\Models\Level;
use App\Models\Tuition;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\District;
use App\Models\Ward;
use App\Models\Address;
use App\Models\TutorDistrict;
use App\Models\TutorGrade;
use App\Models\TutorSubject;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showFormParentRegister() {
        $districts = District::all();
        $wards = Ward::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();

        return view('auth.register_parent', compact('districts', 'wards', 'levels', 'subjects', 'grades'));
    }

    public function parentRegister(Request $req) {

        $validatedData = $req->validate(
            [
                'name' => ['required', 'string', ],
                'phone' => ['required', 
                            'regex:/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/', 
                            'unique:App\Models\User,phone'],
                'email' => ['required', 'email', 'unique:App\Models\User,email'],
                'password' => ['required','string', 'min:8'],
                'district_id' => ['required'],
                'ward_id' => ['required',],
                'addr_detail' => ['required',],
                'subjects' => ['required'],
                'grade' => ['required'],
                'num_of_sessions' => ['required'],
                'num_of_students' => ['required'],
                'time' => ['required'],
                'tuition' => ['required'],
                'gender_tutor' => ['required'],
                'level' => ['required'],
                'request' => [],
            ],
            [
                'required' => 'Không được để trống.',
                'phone.regex' => 'SĐT không hợp lệ.',
                'phone.unique' => 'SĐT đã được đăng ký.',
                'email' => 'Email không đúng định dạng.',
                'email.unique' => 'Email đã được đăng ký.',
                'password.min' => 'Mật khẩu phải ít nhất :min ký tự.',
            ],
        );

        $data = $req->all();
        $data['password'] = Hash::make($req->password);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'role' => 'parent',
        ]);

        $parent = Parent1::create([
            'pr_gender' => 0,
            'user_id' => $user->id,
        ]);

        $address = Address::create([
            'addr_detail' => $data['addr_detail'], 
            'ward_id' => $data['ward_id'],
        ]);

        $class = Class1::create([
            'class_num_of_students' => $data['num_of_students'], 
            'class_num_of_sessions' => $data['num_of_sessions'], 
            'class_time' => $data['time'], 
            'class_gender_tutor' => $data['gender_tutor']=='0' ? null : $data['gender_tutor'], 
            'class_request' =>  $data['request'] ?? null,
            'class_tuition' => $data['tuition'],  
            'class_status' => 0, 
            'class_address' => $address->addr_id, 
            'class_grade' => $data['grade'], 
            'class_level' => $data['level']=='0' ? null : $data['level'], 
            'class_tutor' => null, 
            'class_parent' => $parent->pr_id,
        ]);

        $class_id = $class->class_id;
        foreach($data['subjects'] as $subject) {
            ClassSubject::create([
                'class_id' => $class_id,
                'subject_id' => $subject,
            ]);
        };

        return redirect()->route('login.form');
    }

    public function showFormTutorRegister() {
        $districts = District::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $grades = Grade::all();
        $tuitions = Tuition::all();

        return view('auth.register_tutor', compact('districts', 'levels', 'subjects', 'grades', 'tuitions'));
    }

    public function tutorRegister(Request $req) {
        // Validate data
        $validatedData = $req->validate(
            [
                'name' => ['required', 'string', ],
                'phone' => ['required', 
                            'regex:/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/', 
                            'unique:App\Models\User,phone'],
                'email' => ['required', 'email', 'unique:App\Models\User,email'],
                'password' => ['required','string', 'min:8'],
                'tt_birthday' => ['required', 'date', 'before:today'],
                'tt_address' => ['required',],
                'tt_districts' => ['required'],
                'tt_major' => ['required',],
                'tt_school' => ['required',],
                'tt_subjects' => ['required'],
                'tt_grades' => ['required'],
                'tt_experiences' => [],
                'tt_avatar' => ['required', 'image', 'max:2048'],
                'tt_degree' => ['required', 'image', 'max:2048'],
            ],
            [
                'required' => 'Không được để trống.',
                'phone.regex' => 'SĐT không hợp lệ.',
                'phone.unique' => 'SĐT đã được đăng ký.',
                'email' => 'Email không đúng định dạng.',
                'email.unique' => 'Email đã được đăng ký.',
                'password.min' => 'Mật khẩu phải ít nhất :min ký tự.',
                'tt_birthday.date' => 'Ngày sinh không đúng định dạng.',
                'tt_birthday.before' => 'Ngày sinh không hợp lệ.',
                'image' => 'Ảnh không hợp lệ.',
                'tt_avatar.max' => 'Ảnh không quá 2MB.',
                'tt_degree.max' => 'Ảnh không quá 2MB.',                
            ],
        );

        $data = $req->all();
        // Mã hóa mật khẩu
        $data['password'] = Hash::make($req->password);
        // Xử lý ảnh Avatar
        $fileAvt = $req->file('tt_avatar'); // Lấy file hình ảnh từ request
        $originalAvtName = pathinfo($fileAvt->getClientOriginalName(), PATHINFO_FILENAME); // Lấy tên file gốc
        $avtExtension = $fileAvt->getClientOriginalExtension();// Lấy phần mở rộng của file (jpg, png...)
        $newAvtName = $originalAvtName . '_' . Carbon::now()->format('Ymd_His') . '.' . $avtExtension;// Tạo tên mới cho file: avatar01_YYYYMMDD_HHMMSS.jpg
        $avtPath = $fileAvt->storeAs('images', $newAvtName, 'public'); // Lưu file vào thư mục 'images' trong 'public' disk
        $data['avatar_img'] = $avtPath;
        // Xử lý ảnh Degree
        $fileDeg = $req->file('tt_degree');
        $originalDegName = pathinfo($fileDeg->getClientOriginalName(), PATHINFO_FILENAME);
        $degExtension = $fileDeg->getClientOriginalExtension();
        $newDegName = $originalDegName . '_' . Carbon::now()->format('Ymd_His') . '.' . $degExtension;
        $degPath = $fileDeg->storeAs('images', $newDegName, 'public');
        $data['degree_img'] = $degPath;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'role' => 'tutor',
        ]);

        $tutor = Tutor::create([
            'tt_gender' => $data['tt_gender'],
            'tt_birthday' => $data['tt_birthday'],
            'tt_address' => $data['tt_address'],
            'tt_major' => $data['tt_major'],
            'tt_school' => $data['tt_school'],
            'tt_experiences' => $data['tt_experiences'] ?? null,
            'tt_avatar' => $data['avatar_img'],
            'tt_degree' => $data['degree_img'],
            'tt_status' => 0,
            'level_id' => $data['tt_level'],
            'tuition_id' => $data['tt_tuition'],
            'user_id' => $user->id,
        ]);

        $tt_id = $tutor->tt_id;
        foreach($data['tt_districts'] as $district) {
            TutorDistrict::create([
                'tt_id' => $tt_id,
                'district_id' => $district,
            ]);
        };

        foreach($data['tt_subjects'] as $subject) {
            TutorSubject::create([
                'tt_id' => $tt_id,
                'subject_id' => $subject,
            ]);
        };

        foreach($data['tt_grades'] as $grade) {
            TutorGrade::create([
                'tt_id' => $tt_id,
                'grade_id' => $grade,
            ]);
        };

        return redirect()->route('login.form');
    }

    public function showFormLogin() {
        return view('auth.login');
    }

    public function login(Request $req) {
        $validatedData = $req->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'required' => 'Không được để trống.',
                'email' => 'Email không đúng định dạng.',             
            ],
        );

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

    public function getWards($district_id)
    {
        return Ward::where('district_id', $district_id)->get();
    }
}
