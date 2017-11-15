@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dịch Vụ
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
               
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('service.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên :</label>
                            <input class="form-control" name="txtName" value="{{old('txtName')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá :</label>
                            <input type="number" class="form-control" name="txtPrice" value="{{old('txtPrice')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả :</label>
                            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-control">
                                <label class="label-inline">
                                    <input type="radio" name="rdoStatus" value="1"> Đang Hoạt Động
                                </label>
                                <label class="label-inline">
                                    <input type="radio" name="rdoStatus" value="2"> Bảo Trì
                                </label>
                            </div>
                           
                        </div>
                      
                        <button type="submit" class="btn btn-default">Thêm Dịch Vụ</button>
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