<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LieuTrinh extends FormRequest
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
            
            'idnhanvien' => 'required|integer',
            'ngaybatdau'=>'date|after:today',
            'dukienketthuc'=>'date|after:today|after_or_equal:ngaybatdau',
        ];
    }

    public function messages() {
        return [
            'idnhanvien.required' => 'Bạn chưa chọn khách hàng',
            'idnhanvien.integer' => 'Id khách hàng phải là số',
            'ngaybatdau.date' => 'Ngày bắt đầu phải định dạng ngày tháng',
            'ngaybatdau.after' => 'Ngày bắt đầu phải là tương lai',
            'dukienketthuc.date' => 'Ngày bắt đầu phải định dạng ngày tháng',
            'dukienketthuc.after' => 'Dự kiến kết thúc phải là tương lai',
            'dukienketthuc.after_or_equal' => 'Dự kiến kết thúc phải lớn hơn hoặc bằng thời gian bắt đầu',
        ];
    }

    public function attributes(){
        return [
            'idnhanvien'=>'Id nhân viên',
            'ngaybatdau'=>'Ngày bắt đầu ',
            'dukienketthuc'=>'Dự kiến kết thúc',
            'ghichu'=>'Ghi chú',
        ];
    }


}
