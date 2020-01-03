<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:40|unique:articles_categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชประเภทข่าวสาร',
            'name.unique' => 'ประเภทข่าวสารซ้ำ',
        ];
    }
}
