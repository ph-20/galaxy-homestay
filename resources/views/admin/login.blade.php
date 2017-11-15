<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    
    <title>Admin - Đăng Nhập</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('adminAsset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="{{ asset('adminAsset/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('adminAsset/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="{{ asset('adminAsset/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Vui Lòng Đăng Nhập</h2>
                </div>
                @include('notification.errors')
                @include('notification.success')
                @if(Auth::check())
                    @if(Auth::user()->active==2)
                        <p class="text-danger lead text-center">Bạn Đã Nghỉ Việc Vui Lòng Liên Hệ Admin</p>
                        <form action="{{route('logout')}}" method="POST">
                            {{csrf_field()}}
                            <input class="form-control btn btn-primary" type="submit" value="Đăng Xuất">
                        </form>
                    @else
                        @if(Auth::user()->role == 1)
                            <div class="alert-warning alert">
                                <p>Bạn Đã Đăng Nhập Với Quyền Admin</p>
                                <p>Nhấn Vào <a href="{{ url('admin/user') }}">Đây</a> Để Đến Trang Quản Lý Tương Ứng</p>
                            </div>
                        @elseif(Auth::user()->role == 2)
                            <p>Bạn Đã Đăng Nhập Với Quyền Manager</p>
                            <p>Nhấn Vào <a href="{{ url('admin/roomtype') }}">Đây</a> Để Đến Trang Quản Lý Tương Ứng</p>
                        @elseif(Auth::user()->role == 3)
                            <p>Bạn Đã Đăng Nhập Với Quyền Sale</p>
                            <p>Nhấn Vào <a href="{{ url('admin/booking') }}">Đây</a> Để Đến Trang Quản Lý Tương Ứng</p>
                        @endif
                    @endif
                
                @else
                    <div class="panel-body">
                        <form role="form" action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập E-mail" name="txtEmail" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập Mật Khẩu" name="txtPassword" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
                            </fieldset>
                        </form>
                    </div>
                @endif
            
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('adminAsset/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('adminAsset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('adminAsset/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('adminAsset/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
