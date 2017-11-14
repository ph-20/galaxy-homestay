<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'txtEmail'=>'required|email|unique:users,email',
                'txtPassword'=>'required',
                'txtRePassword'=>'required|same:txtPassword'
            ];
        }elseif($this->method()=='PUT'){
            return [
                'txtName'=>'required',
                'txtEmail'=>'required|email'
            ];
        }
       
    }
    public function messages()
    {
        return [
            'txtName.required'=>'Chưa Nhập Tên Nhân Viên',
            'txtEmail.required'=>'Chưa Nhập Địa Chỉ Email',
            'txtEmail.email'=>'Địa Chỉ Email Sai Định Dạng',
            'txtEmail.unique'=>'Địa Chỉ Email Đã Tồn Tại',
            'txtPassword.required'=>'Chưa Nhập Mật Khẩu',
            'txtRePassword.required'=>'Chưa Nhập Lại Mật Khẩu',
            'txtRePassword.same'=>'Mật Khẩu Nhập Lại Không Khớp Với Mật Khẩu Ban Đầu'
        ];
    }
}
