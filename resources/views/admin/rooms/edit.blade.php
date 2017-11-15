@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phòng
                        <small>Sửa Phòng</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.success')
                    @include('notification.errors')
                    <form action="{{route('room.update',$room->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Mã Số Phòng :</label>
                            <input type="number" class="form-control" name="txtName" value="{{$room->room_code}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Phòng :</label>
                            <select class="form-control" name="idKindRoom" id="">
                                @foreach($roomType as $list)
                                    
                                    <option @if($list->id == $room->room_type_id) selected @endif value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả :</label>
                            <br>
                            <textarea class="form-control" rows="3" name="txtDescription">{{$room->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh Đại Diện Cũ :</label>
                            <img width="600px" class="img-thumbnail" src="{{asset('images/'.$room->thumbnail)}}">
                        </div>
                        <div class="form-group">
                            <label>Ảnh Đại Diện Mới :</label>
                            <input name="fImage" class="form-control" type="file">
                        </div>
                        
                        <div class="form-group">
                            <label>Trạng Thái Phòng</label>
                            <div class="form-control">
                                
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" @if($room->status == 1)   checked @endif type="radio">Phòng Trống
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" @if($room->status == 2)   checked @endif type="radio">Phòng Đã Đặt
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="3" @if($room->status == 3)   checked @endif type="radio">Phòng Đang Sử Dụng
                                </label>
                            </div>
                        
                        </div>
                        <button type="submit" class="btn btn-default">Sửa Phòng</button>
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