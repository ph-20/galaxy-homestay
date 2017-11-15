<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    
    public function postLogin(LoginRequest $request)
    {
        
        if (Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPassword])) {
            if (Auth::user()->role == 1) {
                return redirect('admin/user')->withSuccess('Đăng Nhập Thành Công Với Quyền Admin');
            } elseif (Auth::user()->role == 2) {
                return redirect('admin/roomtype')->withSuccess('Đăng Nhập Thành Công Với Quyền Manager');
            } elseif (Auth::user()->role == 3) {
                return redirect('admin/booking')->withSuccess('Đăng Nhập Thành Công Với Quyền Sale');
            }
        } else {
            return redirect()->back()->withErrors('Sai Địa Chỉ Mail Hoặc Mật Khẩu');
        }
    }
    
    public function postLogout()
    {
        Auth::logout();
        return redirect('admin')->withSuccess('Đăng Xuất Thành Công');
    }
}
