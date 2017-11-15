@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Đặt Phòng
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <div class="col-md-12">
                    @include('notification.success')
                    @include('notification.errors')
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Khách</th>
                        <th>Email Khách</th>
                        <th>Sđt Khách</th>
                        <th>Ngày Đến</th>
                        <th>Ngày Đi</th>
                        <th>Tổng Tiền</th>
                        <th>Mã Số Bảo Vệ</th>
                        <th>Trạng Thái</th>
                        <th>Chi Tiết</th>
                        <th>Hành Động</th>
                        <th>Hủy</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($booking as $list)
                        <tr class="even gradeC" align="center">
                            <td>{{$list->id}}</td>
                            <td>{{$list->customer_name}}</td>
                            <td>{{$list->customer_email}}</td>
                            <td>{{$list->customer_phone}}</td>
                            <td>{{$list->from_date}}</td>
                            <td>{{$list->to_date}}</td>
                            <td>{{number_format($list->total),0,".".","}} Vnđ</td>
                            <td>{{$list->protect_code}}</td>
                            <td>
                                @if($list->status == 1)
                                    Chưa Xác Minh
                                @elseif($list->status == 2)
                                    Đợi Check-in
                                @elseif($list->status == 3)
                                    Đã Check-in
                                @endif
                            </td>
                            <td><a href="{{route('booking.show',$list->id)}}">Chi Tiết</a></td>
                            
                            <td class="center">
                                @if($list->status == 1)
                                    <form action="{{route('booking.update',[$list->id,'status'=>2])}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-danger" style="padding: 2px">
                                            Xác Minh
                                            </button>
                                    </form>
                                @elseif($list->status == 2)
                                    <form action="{{route('booking.update',[$list->id,'status'=>3])}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-primary" style="padding: 2px">
                                            Check-in</button>
                                    </form>
                                @elseif($list->status == 3)
                                    <form action="{{route('booking.update',[$list->id,'status'=>4])}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-success" style="padding: 2px">
                                            Check-out</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('booking.update',[$list->id,'status'=>5])}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-danger" style="padding: 2px">
                                        <i class="fa fa-trash-o  fa-fw"></i></button>
                                </form>
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