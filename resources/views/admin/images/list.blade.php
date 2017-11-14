@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hình Ảnh
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
                        <th>Hình Ảnh</th>
                        <th>Loại Hình Ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($image as $list)
                        <tr class="even gradeC" align="center">
                            <td>{{$list->id}}</td>
                            <td><img width="400px" class="img-thumbnail" src="{{asset('image/'.$list->image)}}"></td>
                            <td>
                                @if($list->status == 1)
                                    Ảnh Slide
                                @else
                                    Ảnh Chính
                                @endif
                            </td>
                            
                            <td class="center">
                                <form action="{{route('image.destroy',$list->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" style="padding: 2px">
                                        <i class="fa fa-trash-o  fa-fw"></i></button>
                                </form>
                            </td>
                            <td class="center">
                                <a style="padding: 2px" class="btn btn-warning" href="{{url('admin/image/'.$list->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i></a>
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