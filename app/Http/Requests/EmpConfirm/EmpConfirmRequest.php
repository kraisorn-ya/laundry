<?php

namespace App\Http\Requests\EmpConfirm;

use Illuminate\Foundation\Http\FormRequest;

class EmpConfirmRequest extends FormRequest
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
            'date_completed' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date_completed.required' => 'กรุณาใส่หลักฐานการโอนเงิน',
        ];
    }
}
