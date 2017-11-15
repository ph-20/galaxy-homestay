@extends('admin.layouts.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hình Ảnh
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @include('notification.success')
                    @include('notification.errors')
                    <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Hình Ảnh :</label>
                            <input type="file" class="form-control" name="fImage" placeholder="Chọn Hình Ảnh"/>
                        </div>
                        <div class="form-group">
                            <label>Loại Hình Ảnh</label>
                            <label class="radio-inline">
                                <input  name="rdoStatus" value="1" checked="" type="radio">Slide
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="2" type="radio">Ảnh Chính
                            </label>
                        </div>
               
                <button type="submit" class="btn btn-default">Thêm Hình Ảnh</button>
                <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection