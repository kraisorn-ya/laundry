<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return [
//            'username' => 'required|string|max:50|unique:admin'.$this->user->id,
            'username' => "required|string|max:50|unique:admin,username",
//            'password' => 'required|string|min:6|confirmed',
//            'email' => 'required|string|email|max:255|unique:admin'.$this->user->id,
            'email' => 'required|email|max:255',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|string|max:50',
            'id_card' => 'required|string|max:20',
            'tel' => 'required|string|max:20',
            'birthday' => 'required',
            'address' => 'required|string|max:255',
            'salary' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอก Username',
            'email.required' => 'กรุณากรอก Email',
            'first_name.required'  => 'กรุณากรอก First Name',
            'last_name.required'  => 'กรุณากรอก Last Name',
            'gender.required'  => 'กรุณาเลือกเพศ',
            'id_card.required'  => 'กรุณากรอก ID Card',
            'tel.required'  => 'กรุณากรอก Phone Number',
            'birthday.required'  => 'กรุณากรอกวันเกิด',
            'address.required'  => 'กรุณากรอกที่อยู่',
//            'salary.required'  => 'กรุณากรอกจำนวนเงิน',

        ];
    }
}
