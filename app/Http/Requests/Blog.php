<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Blog extends FormRequest
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
            'name' => ['required', 'min:6', 'max:120'],
            'noidung' => ['required', 'min:11'],
            // 'img' => ['required'],
            'motangan' => ['required', 'min:3','max:255'],
            'urlHinh'=>['required']

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên bài viết',
            'name.min' => 'Tên bài viết phải lớn hơn 6 kí tự',
            'name.max' => 'Tên bài viết phải nhỏ hơn 120 kí tự',
            'noidung.required' => 'Bạn chưa nhập nội dung',
            'noidung.min' => 'Nội dung phải lớn hơn 3 kí tự',
            'motangan.required' => 'Bạn chưa nhập mô tả',
            'motangan.min' => 'Mô tả phải lớn hơn 3 kí tự',
            'motangan.max' => 'Mô tả phải bé hơn 255 kí tự',
            'urlHinh.required' => 'Bạn chưa cập nhật hình ảnh ',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên bài viết',
            'noidung' => 'Nội dung',
            'motangan' => 'Mô tả ngắn',
            'urlHinh'=>'hình ảnh'
        ];
    }
}
