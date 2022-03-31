<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheoDoi extends FormRequest
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
            'email' => ['required', 'min:3', 'max:50', 'email', 'regex:/(.+)@gmail.com/i']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.min' => 'Email phải lớn hơn 3 kí tự',
            'email.max' => 'Email phải nhỏ hơn 50 kí tự',
            'email.email' => 'Email phải đúng định dạng',
            'email.regex' => 'Email phải đúng định dạng (...@gmail.com)'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email theo dõi'
        ];
    }
}
