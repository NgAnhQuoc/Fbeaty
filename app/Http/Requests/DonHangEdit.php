<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonHangEdit extends FormRequest
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
            'namenguoinhan' => ['required','min:3', 'max:25'],
            'diachi' => ['required','min:3', 'max:100'],
            'sodienthoai' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'tongtientruocgiamgia' => ['required','min:4'],
            'tongtiensaugiamgia' => ['required','min:4'],
            'phuongthucthanhtoan'=>'required',
            'phuongthucgiaohang'=>'required',
            'trangthai'=>'required',
            'trangthaithanhtoan'=>'required'
        ];
    }

    public function messages() {
        return [
            'namenguoinhan.required' => 'Bạn chưa nhập tên người nhận',
            'namenguoinhan.min' => 'Tên dịch vụ phải lớn hơn 3 kí tự',
            'namenguoinhan.max' => 'Tên dịch vụ phải nhỏ hơn 25 kí tự',
            'diachi.required' => 'Bạn chưa nhập địa chỉ khách hàng',
            'diachi.min' => 'Tên dịch vụ phải lớn hơn 3 kí tự',
            'diachi.max' => 'Tên dịch vụ phải nhỏ hơn 100 kí tự',
            'sodienthoai.required' => 'Bạn chưa nhập số điện thoại người nhận',
            'sodienthoai.regex' => 'Số điện thoại không đúng định dạng',
            'tongtientruocgiamgia.required' => 'Bạn chưa nhập tổng tiền trước khi giảm',
            'tongtientruocgiamgia.min' => 'Tổng tiền phải lớn hơn 1000 đồng',
            'tongtiensaugiamgia.required' => 'Bạn chưa nhập tổng tiền sau khi giảm',
            'tongtiensaugiamgia.min' => 'Tổng tiền phải lớn hơn 1000 đồng',
            'phuongthucthanhtoan.required' => 'Bạn chưa chọn phương thức thanh toán ',
            'phuongthucthanhtoan.required' => 'Bạn chưa chọn phương thức giao hàng ',
            'trangthai.required' => 'Bạn chưa chọn trạng thái',
            'trangthaithanhtoan.required' => 'Bạn chưa chọn trạng thái thanh toán ',

        ];
    }

    public function attributes(){
        return [
            'magiamgia' =>  'Tên mã giảm giá',
            'namenguoinhan' =>  'Tên Người nhận',
            'diachi' => 'địa chỉ người nhận',
            'sodienthoai' => 'số điện thoại người nhận',
            'tongtientruocgiamgia' => 'tổng số tiền trước khi giảm',
            'tongtiensaugiamgia' => 'tổng số tiền sau khi được giảm',
            'ghichukhachhang' => 'ghi chú giao hàng',
            'phuongthucthanhtoan'=> 'phương thức thanh toán',
            'phuongthucgiaohang'=> 'phương thức giao hàng',
            'trangthai'=> 'trạng thái đơn hàng',
            'trangthaithanhtoan'=> 'trạng thái thanh toán đơn hàng',
        ];
    }
}
