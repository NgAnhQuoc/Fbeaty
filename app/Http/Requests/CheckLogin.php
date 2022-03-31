<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLogin extends FormRequest
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
            'coso'=> 'required|integer',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'coso.required'=> 'Bạn chưa chọn cơ sở',
            'coso.integer'=> 'Cơ sở phải là số',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Tài khoản không đúng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ];
    }

    public function attributes(){
        return [
            'coso' => 'Cơ Sở',
            'Email' => 'Email',
            'password' => 'Mật khẩu'
        ];
    }
}
