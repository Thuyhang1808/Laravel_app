<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Vui lòng chọn sinh viên',
            'student_id.exists' => 'Sinh viên không tồn tại',
            'course_id.required' => 'Vui lòng chọn môn học',
            'course_id.exists' => 'Môn học không tồn tại',
        ];
    }
}