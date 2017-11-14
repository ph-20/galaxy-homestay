@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phòng
                        <small>Thêm Phòng</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12" style="padding-bottom:120px">
                    @include('notification.success')
                    @include('notification.errors')
                    <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã Số Phòng :</label>
                            <input type="number" class="form-control" name="txtName" placeholder="Nhập Mã Số" value="{{old('txtName')}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Phòng :</label>
                            <select class="form-control" name="idKindRoom" id="">
                                @foreach($roomType as $list)
                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả :</label>
                            <textarea class="form-control" rows="3" name="txtDescription">{{old('txtDescription')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh Đại Diện</label>
                            <input name="fImage" class="form-control" type="file"  >
                        </div>
                        
                        <div class="form-group">
                            <label>Trạng Thái Phòng</label>
                            <div class="form-control">
    
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Phòng Trống
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Phòng Đã Đặt
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Phòng Đang Sử Dụng
                                </label>
                            </div>
                           
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Phòng</button>
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