<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'txtName'=>'required',
            'txtDiscount'=>'required|max:2',
            'txtStartDate'=>'required|date_format:Y-m-d',
            'txtEndDate'=>'required|date_format:Y-m-d|after:txtStartDate'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required'=>'Chưa Nhập Tên Chương Trình Khuyến Mãi',
            'txtDiscount.required'=>'Chưa Nhập Mức Độ Giảm',
            'txtDiscount.max'=>'Mức Độ Giảm Quá Cao',
            'txtStartDate.required'=>'Chưa Nhập Ngày Bắt Đầu',
            'txtStartDate.date_format'=>'Ngày Bắt Đầu Phải Ở Định Dạng : YYYY-mm-dd',
            'txtEndDate.required'=>'Chưa Nhập Ngày Kết Thúc',
            'txtEndDate.date_format'=>'Ngày Kết Thúc Phải Ở Định Dạng : YYYY-mm-dd',
            'txtEndDate.after'=>'Ngày Kết Thúc Phải Lớn Hơn Ngày Bắt Đầu'
        ];
    }
}
