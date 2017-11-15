@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân Viên
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('user.update',$user->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Tên :</label>
                            <input class="form-control" name="txtName" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input class="form-control" name="txtEmail" value="{{$user->email}}"/>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="checkChangePassword" id="checkChangePassword"> Đổi Mật Khẩu</label>
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu :</label>
                            <input disabled class="form-control" name="txtPassword" type="password" placeholder="Nhập Mật Khẩu" value="{{old('txtPassword')}}">
                        </div>
                        <div class="form-group">
                            <label>Nhập Lại Mật Khẩu :</label>
                            <input disabled class="form-control" name="txtRePassword" type="password" placeholder="Nhập Lại Mật Khẩu" value="{{old('txtRePassword')}}">
                        </div>
                        <div class="form-group">
                            <label>Quyền :</label>
                            <select class="form-control" name="sleRole">
                                <option @if($user->role == 3 )  selected @endif value="3">Sale</option>
                                <option @if($user->role == 2 )  selected @endif value="2">Manager</option>
                                <option @if($user->role == 1 )  selected @endif value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đang Hoạt Động :</label>
                            <div class="form-control">
                                <label class="radio-inline">
                                    <input name="rdoActive" @if($user->active == 1) checked @endif value="1" type="radio">Đang Làm Việc
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoActive" @if($user->active == 2) checked @endif value="2" type="radio">Đã Nghỉ Việc
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa Nhân Viên</button>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                    </form>
                </div>
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script>
        $('document').ready(function () {
            $("#checkChangePassword").change(function () {
                if ($(this).is(":checked")){
                    $("input[type='password']").removeAttr('disabled');
                }else{
                    $("input[type='password']").attr('disabled','');
                }
            });
        });
    </script>

@endsection