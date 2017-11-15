<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.users.list', compact('user'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->email = $request->txtEmail;
        $user->name = $request->txtName;
        $user->password = bcrypt($request->txtRePassword);
        $user->role = $request->sleRole;
        $user->active = $request->rdoActive;
        $user->save();
        return redirect()->back()->withSuccess('Tạo Nhân Viên Thành Công');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withSuccess('Xóa Nhân Viên Thành Công');
    }
    
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->txtName;
        if ($request->txtEmail != $user->email) {
            $this->validate($request, ['txtEmail' => 'unique:users,email'], ['txtEmail.unique' => 'Địa Chỉ Email Đã Tồn
            Tại']);
        }
        $user->email = $request->txtEmail;
        if ($request->checkChangePassword == 'on') {
            $this->validate($request, [
                    'txtPassword' => 'required',
                    'txtRePassword' => 'required|same:txtPassword'
                ], [
                    'txtPassword.required' => 'Chưa Nhập Mật Khẩu',
                    'txtRePassword.required' => 'Chưa Lại Mật Khẩu',
                    'txtRePassword.same' => 'Mật Khẩu Nhập Lại Không Khớp Với Mật Khẩu Ban Đầu'
                ]);
            $user->password = bcrypt($request->txtRePassword);
        };
        $user->role = $request->sleRole;
        $user->active = $request->rdoActive;
        $user->update();
        return redirect()->back()->withSuccess('Sửa Nhân Viên Thành Công');
    }
    
}
