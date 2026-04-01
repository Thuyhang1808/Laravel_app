<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.product_name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'items.required' => 'Phải có ít nhất một sản phẩm',
            'items.min' => 'Phải có ít nhất một sản phẩm',
            'items.*.product_name.required' => 'Tên sản phẩm không được để trống',
            'items.*.quantity.required' => 'Số lượng không được để trống',
            'items.*.quantity.min' => 'Số lượng phải lớn hơn 0',
            'items.*.price.required' => 'Giá không được để trống',
            'items.*.price.min' => 'Giá không được âm',
        ];
    }
}