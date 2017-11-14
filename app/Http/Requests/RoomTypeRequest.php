<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
        if($this->method()=='POST'){
            return [
                'txtName'=>'required',
                'txtPrice'=>'required|min:6',
                'txtDetail'=>'required',
                'txtDescription'=>'required',
                'fImage'=>'required'
            ];
        }elseif($this->method() == 'PUT'){
            return [
                'txtName'=>'required',
                'txtPrice'=>'required|min:6',
                'txtDetail'=>'required',
                'txtDescription'=>'required'
            ];
        }
        
    }
    public function messages(){
        return[
            'txtName.required'=>'Chưa Nhập Tên Loại Phòng',
            'txtPrice.required'=>'Chưa Nhập Giá Phòng',
            'txtPrice.min'=>'Giá Phòng Quá Thấp',
            'txtDetail.required'=>'Chưa Nhập Nội Dung Chi Tiết',
            'txtDescription.required'=>'Chưa Nhập Mô Tả',
            'fImage.required'=>'Chưa Nhập Hình Ảnh'
        ];
    }
}
