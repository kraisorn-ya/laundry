<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function showRegistrationForm()
    {
      $roles =  Role::where('id','!=',"1")
          ->get();
        return view('admin.register' ,compact('roles'));
    }

    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:admin'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:50'],
            'id_card' => ['required','string','max:20'],
            'tel' => ['required','string','max:20'],
            'birthday' => ['required'],
            'address' => ['required','string','max:255'],
//            'salary' => ['nullable','string','max:100'],
            'image' => ['required', 'file', 'image', 'max:5000'],
            'role_id' => ['required'],
        ],[
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'ใส่รหัสผ่าน 6 ตัวขึ้นไป',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
            'first_name.required'  => 'กรุณากรอกชื่อ',
            'last_name.required'  => 'กรุณากรอกนามสกุล',
            'gender.required'  => 'กรุณาเลือกเพศ',
            'id_card.required'  => 'กรุณากรอกเลขบัตรประชาชน',
            'tel.required'  => 'กรุณากรอกเบอร์โทรศัพท์',
            'birthday.required'  => 'กรุณาใส่วันเกิด',
            'address.required'  => 'กรุณากรอกที่อยู่',
            'role_id.required'  => 'กรุณากรอกตำแหน่ง',
            'image.required'  => 'กรุณาใส่รูปภาพ',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'id_card' => $data['id_card'],
            'tel' => $data['tel'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'role_id' => $data['role_id'],
//            'salary' => $data['salary'],
            'image' => $data['image']->store('uploads','public'),
        ]);
    }
}
