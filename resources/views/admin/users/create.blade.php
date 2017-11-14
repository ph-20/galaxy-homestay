@extends('admin.layouts.index')
@section('content')
    
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân Viên
                        <small>Tạo Mới</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('user.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên :</label>
                            <input class="form-control" name="txtName" placeholder="Nhập Tên Nhân Viên" value="{{old('txtName')}}">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input class="form-control" name="txtEmail" placeholder="Nhập Địa Chỉ Mail" value="{{old('txtEmail')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu :</label>
                            <input class="form-control" name="txtPassword" type="password" placeholder="Nhập Mật Khẩu" value="{{old('txtPassword')}}">
                        </div>
                        <div class="form-group">
                            <label>Nhập Lại Mật Khẩu :</label>
                            <input class="form-control" name="txtRePassword" type="password" placeholder="Nhập Lại Mật Khẩu" value="{{old('txtRePassword')}}">
                        </div>
                        <div class="form-group">
                            <label>Quyền :</label>
                            <select class="form-control" name="sleRole">
                                <option value="3">Sale</option>
                                <option value="2">Manager</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đang Hoạt Động :</label>
                            <div class="form-control">
                                <label class="radio-inline">
                                    <input name="rdoActive" checked value="1" type="radio">Đang Làm Việc
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoActive" value="2" type="radio">Đã Nghỉ Việc
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Nhân Viên</button>
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