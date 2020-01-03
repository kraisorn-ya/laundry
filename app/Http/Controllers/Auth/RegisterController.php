<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:50'],
            'id_card' => ['required','string','max:20'],
            'tel' => ['required','string','max:20'],
            'birthday' => ['required'],
            'address' => ['required','string','max:255'],
            'image' => ['required', 'file', 'image', 'max:5000'],
        ],[
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว',
            'password.required' => 'กรุณาใส่รหัสผ่าน',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'password.min' => 'รหัสผ่านอย่างน้อย 6 ตัว',
            'email.required' => 'กรุณาใส่อีเมล',
            'email.unique' => 'อีเมลนี้มีผู้อื่นใช้งานแล้ว',
            'first_name.required'  => 'กรุณากรอกชื่อ',
            'last_name.required'  => 'กรุณากรอกนามสกุล',
            'gender.required'  => 'กรุณาเลือกเพศ',
            'id_card.required'  => 'กรุณากรอกเลขบัตรประชาชน',
            'tel.required'  => 'กรุณากรอกเบอร์โทรศัพท์',
            'birthday.required'  => 'กรุณาใส่วันเกิด',
            'address.required'  => 'กรุณากรอกที่อยู่',
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
        return User::create([
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
            'image' => $data['image']->store('uploads','public'),
            'status_id' => '1',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('register.register');
    }
}
