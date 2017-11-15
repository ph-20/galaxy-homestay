@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dịch Vụ
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
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service as $list)
                        <tr class="even gradeC" align="center">
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{number_format($list->price,0,",",".") }} Vnđ</td>
                            <td>{{$list->description}}</td>
                            <td>@if($list->status == 1) Đang Hoạt Động @else Không Hoạt Động @endif</td>
                            <td class="center">
                                <form action="{{route('service.destroy',$list->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" style="padding: 2px">
                                        <i class="fa fa-trash-o  fa-fw"></i></button>
                                </form>
                            
                            </td>
                            <td class="center">
                                <a style="padding: 2px" class="btn btn-warning" href="{{url('admin/service/'.$list->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i></a>
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