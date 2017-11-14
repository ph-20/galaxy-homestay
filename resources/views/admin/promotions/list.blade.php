@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chương Trình Khuyến Mãi
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
                        <th>Mức Độ Giảm</th>
                        <th>Loại Phòng Áp Dụng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotion as $list)
                        <tr class="even gradeC" align="center">
                            <td>{{$list->id}}</td>
                            <td>{{$list->price}} %</td>
                            <td>{{$list->kindrooms->name}}</td>
                            <td class="center">
                                <form action="{{route('promotion.destroy',$list->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" style="padding: 2px">
                                        <i class="fa fa-trash-o  fa-fw"></i></button>
                                </form>
                            </td>
                            <td class="center">
                                <a style="padding: 2px" class="btn btn-warning" href="{{url('admin/promotion/'.$list->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i></a>
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