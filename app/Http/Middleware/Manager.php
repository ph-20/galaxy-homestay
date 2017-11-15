<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role == 2 && Auth::user()->active == 1) {
            return $next($request);
        } else {
            if(Auth::user()->role == 1) {
                return redirect('admin/user')->withErrors('Hệ Thống Tự Động Chuyển Bạn Về Trang Với Quyền
                 Quản Lý Tương Ứng');
            } elseif(Auth::user()->role == 3) {
                return redirect('admin/booking')->withErrors('Hệ Thống Tự Động Chuyển Bạn Về Trang Với Quyền
                 Quản Lý Tương Ứng');
            }
            if (Auth::user()->active == 2) {
                return redirect('admin')->withErrors('Bạn Đã Nghỉ Việc Vui Lòng Liên Hệ Admin');
            }
        }
    }
}
