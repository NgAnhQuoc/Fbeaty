<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVien extends FormRequest
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
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'min:3', 'max:50', 'email', 'regex:/(.+)@gmail.com/i'],
            'password' => ['required', 'min:3', 'max:30'],
            'sdt' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'urlHinh'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập tên nhân viên',
            'username.min' => 'Tên nhân viên phải lớn hơn 3 kí tự',
            'username.max' => 'Tên nhân viên phải nhỏ hơn 50 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.min' => 'Email phải lớn hơn 3 kí tự',
            'email.max' => 'Email phải nhỏ hơn 50 kí tự',
            'email.email' => 'Email phải đúng định dạng',
            'email.regex' => 'Email phải đúng định dạng (...@gmail.com)',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn 3 kí  tự',
            'password.max' => 'Mật khẩu phải nhỏ hơn 30 kí tự',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.regex' => 'Số điện thoại không đúng định dạng',
            'urlHinh.required' => 'Bạn chưa cập nhật avatar'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên nhân viên',
            'email' => 'Email nhân viên',
            'password' => 'Mật khẩu',
            'sdt' => 'Số điện thoại',
            'urlHinh'=>'avatar nhân viên'
        ];
    }
}
