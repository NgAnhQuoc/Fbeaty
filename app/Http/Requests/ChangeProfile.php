<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeProfile extends FormRequest
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
            'username' => ['required', 'min:3', 'max:40'],
            'email' => ['required', 'min:3', 'max:50', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập tên.',
            'username.min' => 'Tên phải lớn hơn 3 kí tự.',
            'username.max' => 'Tên phải nhỏ hơn 40 kí tự.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.min' => 'Email phải lớn hơn 3 kí tự.',
            'email.max' => 'Email phải nhỏ hơn 50 kí tự.',
            'email.email' => 'Email phải đúng định dạng.',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên nhân viên',
            'email' => 'Email nhân viên',
        ];
    }
}
