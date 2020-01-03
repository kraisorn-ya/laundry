<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClothesRequest extends FormRequest
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
            'service_type_id' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'price' => 'required|numeric|max:1000|between:,99999.99',
//            'email' => 'required|string|email|max:255|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อเสื้อผ้า',
            'price.required' => 'กรุณาใส่ราคา(บาท)/ต่อชิ้น',
        ];
    }
}
