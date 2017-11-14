@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Đặt Hàng
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
                        <th>Mã Số Phòng</th>
                        <th>Tổng Giá</th>
                        <th>Ngày Đến</th>
                        <th>Ngày Đi</th>
                        <th>Dịch Vụ</th>
                        <th>Mã Số Bảo Vệ</th>
                        <th>Tên Khách Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    {{--@foreach($order as $list)--}}
                        {{--<tr class="even gradeC" align="center">--}}
                            {{--<td>{{$list->id}}</td>--}}
                            {{--<td>{{$list->rooms->name}}</td>--}}
                            {{--<td>{{number_format($list->total),0,".".","}} Vnđ</td>--}}
                            {{--<td>{{$list->from_date}}</td>--}}
                            {{--<td>{{$list->to_date}}</td>--}}
                            {{--<td>{{$list->service}}</td>--}}
                            {{--<td>{{$list->protect_code}}</td>--}}
                            {{--<td>{{$list->customers->name}}</td>--}}
                            {{--<td>--}}
                                {{--@if($list->status == 1)--}}
                                    {{--Chưa Xác Minh--}}
                                {{--@elseif($list->status == 2)--}}
                                    {{--Đợi Nhận Phòng--}}
                                {{--@elseif($list->status == 3)--}}
                                    {{--Đang Sử Dụng--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{----}}
                            {{--<td class="center">--}}
                                {{--@if($list->status == 1)--}}
                                    {{--<form action="{{route('order.update',[$list->id,'status'=>2])}}" method="POST">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{{method_field('PUT')}}--}}
                                        {{--<button class="btn btn-danger" style="padding: 2px">--}}
                                            {{--Xác Minh--}}
                                            {{--</button>--}}
                                    {{--</form>--}}
                                {{--@elseif($list->status == 2)--}}
                                    {{--<form action="{{route('order.update',[$list->id,'status'=>3])}}" method="POST">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{{method_field('PUT')}}--}}
                                        {{--<button class="btn btn-danger" style="padding: 2px">--}}
                                            {{--Nhận Phòng</button>--}}
                                    {{--</form>--}}
                                {{--@elseif($list->status == 3)--}}
                                    {{--<form action="{{route('order.update',[$list->id,'status'=>4])}}" method="POST">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{{method_field('PUT')}}--}}
                                        {{--<button class="btn btn-danger" style="padding: 2px">--}}
                                            {{--Trả Phòng</button>--}}
                                    {{--</form>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<form action="{{route('order.destroy',$list->id)}}" method="POST">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--{{method_field('DELETE')}}--}}
                                    {{--<button class="btn btn-danger" style="padding: 2px">--}}
                                        {{--<i class="fa fa-trash-o  fa-fw"></i></button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                           {{----}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                    Some Content
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection