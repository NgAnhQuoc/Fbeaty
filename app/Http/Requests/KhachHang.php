<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHang extends FormRequest
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
            'sdt' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
        ];
    }

    public function messages()
    {
        return [
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.regex' => 'Số điện thoại không đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'sdt' => 'Số điện thoại',
        ];
    }
}
