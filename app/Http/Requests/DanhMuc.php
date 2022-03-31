<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMuc extends FormRequest
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
            'name' => 'required',
            'img' => 'required',
            'loai'=>'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'img.required' => 'Bạn chưa chọn ảnh',
            'loai.required' => 'Bạn chưa chọn loại',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên Danh Mục',
            'img' => 'Ảnh Danh Mục',
            'loai' => 'loại'
        ];
    }
}
