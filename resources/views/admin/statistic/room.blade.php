@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phòng
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <div class="col-md-12">
                    @include('notification.errors')
                    @include('notification.success')
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Mã Số Phòng</th>
                        <th>Loại Phòng</th>
                        <th>Giá</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($room as $list)
                        <tr class="odd gradeX" align="center">
                            <td>{{$list->id}}</td>
                            <td>{{$list->room_code}}
                                <img width="500px" class="img-thumbnail" src="{{asset('images/'.$list->thumbnail)}}" ></td>
                            <td>{{$list->roomTypes->name}}</td>
                            <td>{{ number_format($list->roomTypes->price),0,"."."," }} Vnđ</td>
                            <td>{{$list->description}}</td>
                            <td>
                                @if($list->status==1)
                                    Phòng Trống
                                @elseif($list->status==2)
                                    Phòng Đã Đặt
                                @else
                                    Phòng Đang Sử Dụng
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection