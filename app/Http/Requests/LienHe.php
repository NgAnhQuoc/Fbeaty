<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienHe extends FormRequest
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
            'namekh' => ['required', 'min:3', 'max:40'],
            'email' => ['required', 'min:3', 'max:50', 'email', 'regex:/(.+)@gmail.com/i'],
            'sdt' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'noidung' => ['required', 'min:3','max:255']
        ];
    }

    public function messages() {
        return [
            'namekh.required' => 'Bạn chưa nhập tên',
            'namekh.min' => 'Tên phải lớn hơn 3 kí tự',
            'namekh.max' => 'Tên phải nhỏ hơn 40 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.min' => 'Email phải lớn hơn 3 kí tự',
            'email.max' => 'Email phải nhỏ hơn 50 kí tự',
            'email.email' => 'Email phải đúng định dạng',
            'email.regex' => 'Email phải đúng định dạng(@gmail.com)',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.regex' => 'Số điện thoại không đúng định dạng',
            'noidung.required' => 'Bạn chưa nhập nội dung',
            'noidung.min' => 'Nội dung phải lớn hơn 3 kí tự',
            'noidung.max' => 'Nội dung phải nhỏ hơn 30 kí tự',        ];
    }

    public function attributes(){
        return [
            'namekh' => 'Tên khách hàng',
            'email' => 'Ảnh khách hàng',
            'sdt' => 'Số điện thoại',
            'noidung' => 'Nội dung'
        ];
    }
}
