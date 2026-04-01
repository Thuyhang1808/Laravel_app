<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $this->student,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sinh viên không được để trống',
            'major.required' => 'Ngành học không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
        ];
    }
}