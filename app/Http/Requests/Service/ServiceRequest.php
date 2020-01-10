<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_type_id' => 'required|integer|max:255',
            'description' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'pay' => 'nullable|string|max:255',
            'image' => ['nullable', 'file', 'image', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'service_type_id.required' => 'กรุณาเลือกประเภทใช้การ',
        ];
    }
}
