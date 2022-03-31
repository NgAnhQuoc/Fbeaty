<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DichVu extends FormRequest
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
            'name' => ['required', 'min:3', 'max:25'],
            'dongia' => ['required', 'min:2', 'max:10'],
            'giamgia' => ['required', 'max:3'],
            'motangan' => ['required', 'min:3','max:255'],
            'noidung' => ['required', 'min:3'],
            'urlHinh'=>['required']

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên dịch vụ',
            'name.min' => 'Tên dịch vụ phải lớn hơn 3 kí tự',
            'name.max' => 'Tên dịch vụ phải nhỏ hơn 25 kí tự',
            'dongia.required' => 'Bạn chưa nhập don gia',
            'dongia.min' => 'don gia phải lớn hơn 2 kí tự',
            'dongia.max' => 'don gia phải nhỏ hơn 10 kí tự',
            'giamgia.required' => 'Bạn chưa nhập Giảm giá',
            'giamgia.max' => 'Giảm giá phải nhỏ hơn 3 kí tự',
            'motangan.required' => 'Bạn chưa nhập mô tả',
            'motangan.min' => 'Mô tả phải lớn hơn 3 kí tự',
            'motangan.max' => 'Mô tả phải nhỏ hơn 255 kí tự',
            'noidung.required' => 'Bạn chưa nhập Nội dung',
            'noidung.min' => 'Nội dung phải lớn hơn 3 kí tự',
            'urlHinh.required' => 'Bạn chưa cập nhật hình ảnh '
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên dịch vụ',
            'dongia' => 'Đơn giá',
            'giamgia' => 'Giảm giá',
            'motangan' => 'Mô tả',
            'noidung' => 'Nội dung',
            'urlHinh'=>'Hình ảnh'
        ];
    }
}
