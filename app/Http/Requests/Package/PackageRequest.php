<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' => 'required|string|max:40|unique:packages,name',
            'number' =>'required|integer|max:500',
            'price' => 'required|numeric|max:1000|between:,99999.99',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อแพ็คเกจ',
            'name.unique' => 'ชื่อแพ็คเกจนี้มีอยู่ในระบบแล้ว',
            'number.required' => 'กรุณาใส่จำนวน',
            'number.integer' => 'ต้องเป็นตัวเลขเท่านั้น',
            'price.required' => 'กรุณาใส่ราคา(บาท)',
            'price.numeric' => 'ต้องเป็นตัวเลขเท่านั้น',
        ];
    }
}
