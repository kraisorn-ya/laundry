<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceTypeEditRequest extends FormRequest
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
            'name' => 'required|string|max:40|unique:service_types,name,'. $this->route('id'),
//            'name' => 'required|string|max:40|unique:service_types,name,'. $this->route('id'),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชประเภทบริการ',
            'name.unique' => 'ประเภทขบริการซ้ำ',
        ];
    }
}
