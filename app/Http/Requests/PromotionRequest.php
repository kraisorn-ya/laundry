<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:100',
            'discount' => 'required|integer|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'กรุณาเเขียนชื่อโปรโมชั่น',
            'discount.required' => 'กรุณาใส่ส่วนลด',
            'discount.integer' => 'ใส่ได้เฉพาะตัวเลขเท่านั้น',
            'description.required'  => 'กรุณาเขียนรายละเอียด',
            'start_date.required'  => 'กรุณาใส่วันเริ่ม',
            'end_date.required'  => 'กรุณาใส่วันสิ้นสุด',
        ];
    }
}
