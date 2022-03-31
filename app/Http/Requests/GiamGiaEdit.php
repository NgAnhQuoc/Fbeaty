<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiamGiaEdit extends FormRequest
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
            'name' => 'required|between:3,100',
            'ma'=>'required|between:3,30',
            'number'=>'required|max:9',
            'max'=>'required||max:9',
            'loai'=>'required|',
            'ngaytao'=>'required',
            'ngayhethan'=>'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Bạn chưa nhập tên mã giảm giá',
            'ma.required'=>'Bạn chưa nhập mã giảm giá',
            'name.between' => 'vui lòng nhập tên mã trong khoảng từ 3 tới 100 kí tự',
            'ma.between'=>'vui lòng nhập mã trong khoảng từ 3 tới 30 kí tự',
            'number.required'=>'Bạn chưa nhập giảm giá trong khoảng',
            'max.required'=>'Bạn chưa nhập giảm giá tối đa',
            'loai.required'=>'Bạn chưa chọn loại giảm giá',
            'number.max'=>'Vui lòng nhập loại giá tương ứng ',
            'max.max'=>'Vui lòng nhập số tiền tương ứng ',
            'loai.numeric'=>'Vui lòng chọn loại bạn mong muốn',
            'ngaytao.required'=>'Bạn chưa chọn ngày áp dụng ',
            'ngayhethan.required'=>'Bạn chưa chọn ngày hết hạn',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên Giảm Giá',
            'ma'=>'Mã Giảm Giá',
            'number'=>' Giảm Giá Từ',
            'max'=>'Giảm Giá Đến',
            'loai'=>'Loại Giảm Giá ',
            'ngaytao'=>'Ngày Tạo Mã',
            'ngayhethan'=>'Ngày Hết Hạn'
        ];
    }
}
