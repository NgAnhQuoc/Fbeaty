<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPham extends FormRequest
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
            'iddanhmuc' => ['required','integer'],
            'idthuonghieu' => ['required','integer'],
            'name' => ['required','min:3','max:100'],
            'mota' => ['required','min:3','max:255'],
            'noidung'=>['required'],
            'giamgia'=>['gt:-1','lt:100'],
            'trangthai'=>['integer'],
        ];
    }

    public function messages()
    {
        return [
            'iddanhmuc.required' => 'Bạn chưa chọn danh mục',
            'iddanhmuc.integer' => 'Danh mục phải là số',
            'idthuonghieu.required' => 'Bạn chưa chọn thương hiệu',
            'idthuonghieu.integer' => 'Thương hiệu phải là số',
            'name.required' => 'Bạn phải nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải trên 3 kí tự',
            'name.max' => 'Tên sản phẩm phải dướI 100 kí tự',
            'mota.required' => 'Mô tả bắt buộc nhập',
            'mota.min' => 'Mô tả phải trên 3 kí tự',
            'mota.max' => 'Mô tả giới hạn 255 kí tự',
            'noidung.required' => 'Nội dung bắt buộc nhập',
            'giamgia.gt' => 'giảm giá phải lớn hơn hoặc bằng 0 ',
            'giamgia.lt' => 'giảm giá phải nhỏ hơn 100',
            'trangthai.integer' => 'Trạng thái phải là số nguyên',
        ];
    }

    public function attributes()
    {
        return [
            'iddanhmuc' => 'id danh mục',
            'idthuonghieu'=>'id thương hiệu',
            'name' => 'Tên sản phẩm',
            'mota' => 'Mô tả sản phẩm',
            'noidung'=> 'Nội dung sản phẩm',
            'giamgia'=> 'Giảm giá sản phẩm',
            'trangthai'=>'Trạng thái sản phẩm',
            'img'=>'Ảnh sản phẩm',
        ];
    }
}
