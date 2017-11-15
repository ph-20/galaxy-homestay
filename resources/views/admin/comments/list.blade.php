@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đánh Giá
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-12">
                    @include('notification.success')
                    @include('notification.errors')
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Nội Dung</th>
                        <th>Ngày Đánh Giá</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comment as $list)
                    <tr class="odd gradeX" align="center">
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->content}}</td>
                        <td>{{$list->created_at}}</td>
                        <td class="center">
                            <form action="{{route('comment.destroy',$list->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
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