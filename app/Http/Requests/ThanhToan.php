<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToan extends FormRequest
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
    public function rules() {
        return [
            'username' => ['required', 'min:3', 'max:45'],
            'phonenumber' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'diachi' => ['required', 'min:5'],
        ];
    }

    public function messages() {
        return [
            'username.required'=> 'Bạn chưa nhập tên',
            'username.min'=> 'Tên người nhận phải lớn hơn 3 ký tự',
            'username.max'=> 'Tên người nhận phải nhỏ hơn 45 ký tự',
            'phonenumber.required' => 'Bạn chưa nhập số điện thoại',
            'phonenumber.regex' => 'Số điện thoại không đúng định dạng',
            'diachi.required' => 'Bạn chưa nhập địa chỉ',
            'diachi.min' => 'Địa chỉ phải lớn hơn 5 ký tự',
        ];
    }

    public function attributes(){
        return [
            'username' => 'Tên người nhận',
            'phonenumber' => 'Số điện thoại',
            'diachi' => 'Địa chỉ'
        ];
    }
}
