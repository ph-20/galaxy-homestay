@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Phòng
                        <small>Thêm Mới</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('roomtype.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên Loại Phòng :</label>
                            <input type="text" class="form-control" name="txtName" placeholder="Nhập Tên Loại Phòng" value="{{old('txtName')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá :</label>
                            <input type="number" class="form-control" name="txtPrice" placeholder="Nhập Giá(Vnđ)" value="{{old('txtPrice')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả :</label>
                            <textarea class="form-control" name="txtDescription" placeholder="Nhập Mô Tả"  cols="30" rows="10">{{old('txtDescription')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh :</label>
                            <input type="file" class="form-control" name="fImage" />
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết :</label>
                            <textarea name="txtDetail" class="form-control ckeditor" id="demo" >{{old('txtDetail')}}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Thêm Loại Phòng</button>
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