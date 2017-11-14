@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Phòng
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('roomtype.update',$roomType->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Tên Mới :</label>
                            <input type="text" class="form-control" name="txtName" value="{{$roomType->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá(Vnđ) :</label>
                            <input type="number" class="form-control" name="txtPrice" value="{{$roomType->price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả :</label>
                            <textarea class="form-control" name="txtDescription" placeholder="Nhập Mô Tả"  cols="30" rows="10">{{$roomType->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label >Hình Ảnh Cũ :</label>
                            <br>
                            <img class="img-thumbnail" src="{{asset('images/'.$roomType->thumbnail)}}" >
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh :</label>
                            <input type="file" class="form-control" name="fImage" />
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết :</label>
                            <textarea name="txtDetail" class="form-control ckeditor" id="demo" >{{$roomType->detail}}</textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-default">Sửa Loại Phòng</button>
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