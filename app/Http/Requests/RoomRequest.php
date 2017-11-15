<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'txtName'=>'required',
                'txtDescription'=>'required',
                'fImage'=>'required'
            ];
        } elseif ($this->method() == 'PUT') {
            return [
                'txtName'=>'required',
                'txtDescription'=>'required'
            ];
        }
    }
    
    public function messages(){
        return[
            'txtName.required'=>'Chưa Nhập Mã Số Phòng',
            'txtDescription.required'=>'Chưa Nhập Mô Tả Phòng',
            'fImage.required'=>'Chưa Chọn Hình Ảnh'
        ];
    }
}
