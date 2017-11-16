@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống Kê Doanh Thu
                    
                    </h1>
                </div>
                <div class="col-md-12">
                    @include('notification.errors')
                    @include('notification.success')
                </div>
                <!-- /.col-lg-12 -->
                <form class="col-md-12" action="{{route('statisticRevenue')}}" method="GET" role="form" style="margin-bottom: 20px">
                    
                    <legend>Chọn Thời Gian Muốn Thống Kê</legend>
                    <div class="form-group col-md-6">
                        <label for="">Nhập Ngày Bắt Đầu :</label>
                        <input type="date" class="form-control" name="txtStartDate" id="" placeholder="Nhập Ngày Bắt Đầu (YYYY-mm-dd) :">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nhập Ngày Kết Thúc :</label>
                        <input type="date" class="form-control" name="txtEndDate" id="" placeholder="Nhập Ngày Bắt Đầu (YYYY-mm-dd) :">
                    </div>
                    <button type="submit" class="btn btn-primary col-md-push-5  col-md-2">Thống Kê</button>
                </form>
                <h3>Thông Tin :</h3>
                @if(isset($startDate) && isset($endDate))
                    <h4>Ngày Bắt Đầu : {{$startDate}}</h4>
                    <h4>Ngày Kết Thúc : {{$endDate}}</h4>
                @else
                    <h4>Tất Cả Hóa Đơn </h4>
                @endif
                <h5>Tổng Số Hóa Đơn : {{count($booking)}}</h5>
                <h5>Tổng Doanh Thu : {{number_format($total),0,".".","}} Vnđ</h5>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Khách</th>
                        <th>Loại Phòng</th>
                        <th>Tổng Giá</th>
                        <th>Ngày Check-in</th>
                        <th>Ngày Check-out</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booking as $list)
                        <tr class="odd gradeX" align="center">
                            <td>{{$list->id}}</td>
                            <td>{{$list->customer_name}}</td>
                            <td>
                                @foreach($list->rooms as $bookingRoom)
                                    {{$bookingRoom->roomTypes->name}}
                                @endforeach
                            </td>
                            <td>{{number_format($list->total),0,".".","}} Vnđ</td>
                            <td>{{$list->check_in}}</td>
                            <td>{{$list->check_out}}</td>
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