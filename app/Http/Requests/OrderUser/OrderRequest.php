<?php

namespace App\Http\Requests\OrderUser;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'required|string|max:255',
            'pay' => 'required|string|max:255',
            'image' => ['nullable', 'file', 'image', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'กรุณาเกรอกที่อยู่',
            'pay.required' => 'กรุณาเลือกวิธีชำระเงิน',
        ];
    }
}
