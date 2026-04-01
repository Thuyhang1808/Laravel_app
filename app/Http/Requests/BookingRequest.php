<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'date.required' => 'Ngày đặt không được để trống',
            'date.after_or_equal' => 'Không thể đặt lịch trong quá khứ',
            'time.required' => 'Giờ đặt không được để trống',
            'time.date_format' => 'Giờ không đúng định dạng',
        ];
    }
}