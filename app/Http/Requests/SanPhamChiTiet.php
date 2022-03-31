<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamChiTiet extends FormRequest
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
            'ml' => 'required',
            'tonkho' => 'required',
            'dongia' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ml.required' => 'Số ml là bắt buộc',
            'tonkho.required' => 'Mời bạn nhập số lượng tồn kho',
            'dongia.required' => 'Mời bạn nhập đơn giá',
        ];
    }

    public function attributes()
    {
        return [
            'ml' => 'Số ml',
            'tonkho' => 'Số lượng tồn kho',
            'dongia'=> 'Số lượng đơn giá',
        ];
    }
}
