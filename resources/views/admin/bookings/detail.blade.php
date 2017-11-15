@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Đặt Phòng
                        <small>Chi Tiết</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:50px">
                    <div class="col-md-6">
                        <h3>Thông Tin Khách Hàng :</h3>
                        <h4>Họ Tên: {{$booking->customer_name}}</h4>
                        <h4>Email: {{$booking->customer_email}}</h4>
                        <h4>Số Điện Thoại: {{$booking->customer_phone}}</h4>
                        <h4>Địa Chỉ: {{$booking->customer_address}}</h4>
                        <h4>Giới Tính: {{$booking->customer_gender}}</h4>
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid black">
                        <h3>Thông Tin Đơn Đặt Hàng :</h3>
                        <h4>Id : {{$booking->id}}</h4>
                        <h4>Tổng Tiền : {{ number_format($booking->total),0,",","." }} Vnđ</h4>
                        <h4>Ngày Đến : {{$booking->from_date}}</h4>
                        <h4>Ngày Đi : {{$booking->to_date}}</h4>
                        <h4>Ngày Check-in : @if($booking->check_in != null) {{$booking->check_in}} @else Chưa Check-in @endif</h4>
                        <h4>Ngày Check-out : @if($booking->check_out != null) {{$booking->check_out}} @else Chưa Check-out @endif</h4>
                        <h4>Trạng Thái Đơn : @if($booking->status == 1) Chưa Xác Minh @elseif($booking->status == 2) Đang Đợi Check-in @elseif($booking->status == 3) Đã Check-in @endif </h4>
                        <h4>Mã Bảo Vệ : {{$booking->protect_code}}</h4>
                    </div>
                </div>
                <div class="col-md-12" style="padding-bottom: 30px">
                    <h3>Thông Tin Phòng Đã Đặt</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Mã Số Phòng</th>
                            <th>Loại Phòng</th>
                            <th>Trạng Thái Phòng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking->rooms as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->room_code}}</td>
                                <td>{{$list->roomTypes->name}}</td>
                                <td>@if($list->status == 1) Phòng Trống @elseif($list->status == 2 ) Phòng Đã Đặt @else($list->status ==  3) Phòng Đang Sử Dụng @endif</td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                
                </div>
                <div class="col-md-12" style="padding-bottom: 30px">
                    <h3>Thông Tin Dịch Vụ Đi Kèm :</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên Dịch Vụ</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking->bookingRooms as $list)
                            @foreach($list->services as $listService)
                                <tr>
                                    <td>{{$listService->id}}</td>
                                    <td>{{$listService->name}}</td>
                                    <td>
                                        @foreach($listService->bookingRoomServices as $listQty)
                                            {{$listQty->qty}}
                                        @endforeach
                                    </td>
                                    <td>{{$listService->price}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection