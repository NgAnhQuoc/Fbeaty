<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'sdt' => 'required|regex:/((09|03|07|08|05)+([0-9]{8})\b)/g',
            'password' => ['required', 'size:6'],
        ];
    }

    public function messages()
    {
        return [
            'sdt.required' => 'Không được bỏ trống',
            'sdt.regex' => 'Không đúng định dạng',
            'password.size' => 'Mật khẩu phải đủ 6 ký tự',
            'password.required' => 'Không được bỏ trống',
        ];
    }

    public function attributes()
    {
        return [
            'sdt' => 'Số điện thoại',
            'password' => 'Mật khẩu',
        ];
    }
}
