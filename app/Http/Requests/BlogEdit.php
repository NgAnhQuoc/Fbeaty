<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogEdit extends FormRequest
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


    public function rules()
    {
        return [
            'name' => ['required', 'min:6', 'max:120'],
            'noidung' => ['required', 'min:3'],
            // 'img' => ['required'],
            'motangan' => ['required', 'min:3','max:255'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Bạn chưa nhập tên bài viết',
            'name.min' => 'Tên bài viết phải lớn hơn 6 kí tự',
            'name.max' => 'Tên bài viết phải nhỏ hơn 120 kí tự',
            'noidung.required' => 'Bạn chưa nhập nội dung',
            'noidung.min' => 'Nội dung phải lớn hơn 3 kí tự',
            'motangan.required' => 'Bạn chưa nhập mô tả',
            'motangan.min' => 'Mô tả phải lớn hơn 3 kí tự',
            'motangan.max' => 'Mô tả phải bé hơn 255 kí tự',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên bài viết',
            'motangan' => 'Mô tả ngắn',
            'noidung' => 'Nội dung'
        ];
    }
}
