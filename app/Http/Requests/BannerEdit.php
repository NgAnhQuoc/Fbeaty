<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerEdit extends FormRequest
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
            'tieude' => ['required', 'min:3', 'max:50'],
            'noidung' => ['required', 'min:10', 'max:100']
        ];
    }

    public function messages()
    {
        return [
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'tieude.min' => 'Tiêu đề phải lớn hơn 3 kí tự',
            'tieude.max' => 'Tiêu đề phải nhỏ hơn 50 kí tự',
            'noidung.required' => 'Bạn chưa nhập nội dung',
            'noidung.min' => 'Nội dung phải lớn hơn 10 kí tự',
            'noidung.max' => 'Nội dung phải nhỏ hơn 100 kí tự'
        ];
    }

    public function attributes()
    {
        return [
            'tieude' => 'Tiêu đề',
            'noidung' => 'Nội dung',
        ];
    }
}
