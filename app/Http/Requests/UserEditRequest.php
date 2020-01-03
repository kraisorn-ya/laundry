<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        $password = $this->request->all();

        $rules = [
            'username' => 'required|string|max:40|unique:users,username,'. $this->route('id'),
            'password' => 'nullable|string|min:6|confirmed',
            'email' => 'required|string|max:255|unique:users,email,'. $this->route('id'),
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|string|max:50',
            'id_card' => 'required|string|max:20',
            'tel' => 'required|string|max:20',
            'birthday' => 'required',
            'address' => 'required|string|max:255',
//            'status_id' => 'required',
        ];

//        if (!empty($password['password'])) {
//            $rules += ['password' => 'required|string|min:6|confirmed',];
//        };
        if (!empty($data['image'])) {
            $rules += ['image' => ['required', 'file', 'image', 'max:5000'],];
        };

        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว',
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
//            'username.required' => 'กรุณากรอก Username',
//            'username.unique' => 'ชื่อผู้ใช้นี้ มีผู้อื่นใช้งานแล้ว',
//            'password.confirmed' => 'กรุณากรอก password',
//            'email.required' => 'กรุณากรอก Email',
//            'email.unique' => 'Email นี้มีผู้อื่นใช้งานแล้ว',
//            'first_name.required'  => 'กรุณากรอก First Name',
//            'last_name.required'  => 'กรุณากรอก Last Name',
//            'gender.required'  => 'กรุณาเลือกเพศ',
//            'id_card.required'  => 'กรุณากรอก ID Card',
//            'tel.required'  => 'กรุณากรอก Phone Number',
//            'birthday.required'  => 'กรุณากรอกวันเกิด',
//            'address.required'  => 'กรุณากรอกที่อยู่',
        ];
    }
}
