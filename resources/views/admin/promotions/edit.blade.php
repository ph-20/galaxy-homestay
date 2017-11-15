@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chương Trình Khuyến Mãi
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.errors')
                    @include('notification.success')
                    <form action="{{route('promotion.update',$promotion->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Tên Chương Trình Khuyến Mãi :</label>
                            <input type="text" class="form-control" name="txtName" value="{{$promotion->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Mức Độ Giảm (%) :</label>
                            <input type="number" class="form-control" name="txtDiscount" value="{{$promotion->discount}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Phòng Được Khuyến Mãi :</label>
                            <select class="form-control" name="sleRoomType">
                                @foreach($roomType as $list)
                                    <option @if($list->id == $promotion->room_type_id) selected @endif value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày Bắt Đầu(YYYY/mm/dd) :</label>
                            <input type="text" class="form-control" name="txtStartDate" value="{{$promotion->start_date}}"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Ngày Kết Thúc(YYYY/mm/dd) :</label>
                            <input type="text" class="form-control" name="txtEndDate" value="{{$promotion->end_date}}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-default">Thêm Chương Trình Khuyến Mãi</button>
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