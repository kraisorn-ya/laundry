<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesEditRequest extends FormRequest
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
            'articles_category_id' => 'required|string|max:50',
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
        ];

        if (!empty($data['image'])) {
            $rules += ['image' => ['required', 'file', 'image', 'max:5000'],];
        };

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'กรุณาเเขียนชื่อเรื่อง',
            'articles_category_id.required' => 'กรุณาเลือกประเภทข่าว',
            'short_description.required'  => 'กรุณาเขียนรายละเอียดสั้น',
            'description.required'  => 'กรุณาเขียนรายละเอียด',
            'image.required'  => 'กรุณาใส่รูปภาพ',
        ];
    }
}
