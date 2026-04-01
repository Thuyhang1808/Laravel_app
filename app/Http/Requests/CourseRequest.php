<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên môn học không được để trống',
            'credits.required' => 'Số tín chỉ không được để trống',
            'credits.integer' => 'Số tín chỉ phải là số nguyên',
            'credits.min' => 'Số tín chỉ tối thiểu là 1',
            'credits.max' => 'Số tín chỉ tối đa là 10',
        ];
    }
}