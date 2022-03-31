<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucEdit extends FormRequest
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
            'name' => 'required',
            'loai'=>'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục',
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
