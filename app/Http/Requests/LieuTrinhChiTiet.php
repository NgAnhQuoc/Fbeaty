<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LieuTrinhChiTiet extends FormRequest
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
            'id' => 'required|integer',
            'iddichvu' => 'required|integer',
            'idnhanvien'=>'required|integer',
            'mota'=>'required|min:3|max:500',
            'ngay'=>'date|after:today',
        ];
    }


    public function messages() {
        return [
            'idlieutrinh.required' => 'Bạn chưa chọn id liệu trình',
            'idlieutrinh.integer' => 'Id liệu trình phải là số',
            'iddichvu.required' => 'Bạn chưa chọn id dịch vụ',
            'iddichvu.integer' => 'Id dịch vụ phải là số',
            'idnhanvien.required' => 'Bạn chưa chọn id nhân viên',
            'idnhanvien.integer' => 'Id nhân viên phải là số',
            'mota.required' => 'Bắt buộc nhập mô tả',
            'mota.min' => 'Mô tả quá ngắn',
            'mota.max' => 'Mô tả quá dài',
            'ngay.required'=>'Bắt buộc phải nhập ngày',
            'ngay.date'=>'Bạn nhập không đúng định dạng ngày',
            'ngay.after'=>'Ngày nhập phải lớn hơn ngày hiện tại',
          
        ];
    }

    public function attributes(){
        return [
            'idlieutrinh' => 'Id liệu trình',
            'iddichvu' => 'Id dịch vụ',
            'idnhanvien'=>'Id nhân viên',
            'mota'=>'Mô tả liệu trình chi tiết',
            'ngay'=>'Ngày bắt đầu liệu trình',
        ];
    }
}
