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
                            <label>Mức Độ Giảm (%) :</label>
                            <input type="number" class="form-control" name="txtPrice" value="{{$promotion->price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Phòng Được Khuyến Mãi :</label>
                            <select class="form-control" name="kindRoom">
                                @foreach($kindRoom as $list)
                                    <option @if($promotion->id_kind_room == $list->id) selected @endif value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa Chương Trình Khuyến Mãi</button>
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