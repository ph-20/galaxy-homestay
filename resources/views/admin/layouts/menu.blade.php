@if(Auth::check())
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                {{--<li class="sidebar-search">--}}
                {{--<div class="input-group custom-search-form">--}}
                {{--<input type="text" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">--}}
                {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--<!-- /input-group -->--}}
                {{--</li>--}}
                <li>
                    <a href="/"><i class="fa fa-dashboard fa-fw"></i> Trang Chủ</a>
                </li>
                @if(Auth::user()->role==2)
                    <li>
                        <a href="{{url('admin/roomtype')}}"><i class="fa fa-list-ol fa-fw"></i> Loại Phòng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/roomtype')}}">Danh Sách Loại Phòng</a>
                            </li>
                            <li>
                                <a href="admin/roomtype/create ">Thêm Loại Phòng</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/room"><i class="fa  fa-home fa-fw"></i> Phòng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/room">Danh Sách Phòng</a>
                            </li>
                            <li>
                                <a href="admin/room/create">Thêm Phòng</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/service"><i class="fa fa-cogs fa-fw"></i> Dịch Vụ<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/service">Danh Sách Dịch Vụ</a>
                            </li>
                            <li>
                                <a href="admin/service/create">Thêm Dịch Vụ</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/promotion"><i class="fa fa-usd fa-fw"></i> Chương Trình Khuyến Mãi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/promotion">Danh Sách Chương Trình Khuyến Mãi</a>
                            </li>
                            <li>
                                <a href="admin/promotion/create ">Thêm Chương Trình Khuyễn Mãi</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/comment"><i class="fa fa-pencil-square-o fa-fw"></i> Đánh Giá<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/comment">Danh Sách Đánh Giá </a>
                            </li>
                        
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/image"><i class="fa fa-picture-o fa-fw"></i> Hình Ảnh<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/image">Danh Sách Hình Ảnh</a>
                            </li>
                            <li>
                                <a href="admin/image/create ">Thêm Hình Ảnh</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                @endif
                @if(Auth::user()->role==3)
                    <li>
                        <a href="admin/booking"><i class="fa fa-book fa-fw"></i> Đơn Đặt Phòng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/booking">Danh Sách Đơn Đặt Phòng</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/statistic-room"><i class="fa fa-line-chart fa-fw"></i> Thống Kê Phòng</a>
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="admin/promotion">Danh Sách Chương Trình Khuyến Mãi</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="admin/promotion/create ">Thêm Chương Trình Khuyễn Mãi</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    <!-- /.nav-second-level -->
                    </li>
                @endif
                {{--<li>--}}
                    {{--<a href="admin/customer"><i class="fa fa-users fa-fw"></i> Khách Hàng<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                            {{--<a href="admin/customer">Danh Sách Khách Hàng</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
                @if(Auth::user()->role==1)
                    <li>
                        <a href="admin/user"><i class="fa fa-user fa-fw"></i> Nhân Viên<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/user">Danh Sách Nhân Viên </a>
                            </li>
                            <li>
                                <a href="admin/user/create ">Thêm Nhân Viên</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="admin/statistic-revenue"><i class="fa fa-line-chart fa-fw"></i> Thống Kê Doanh Thu</a>
                    {{--<ul class="nav nav-second-level">--}}
                    {{--<li>--}}
                    {{--<a href="admin/promotion">Danh Sách Chương Trình Khuyến Mãi</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="admin/promotion/create ">Thêm Chương Trình Khuyễn Mãi</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    <!-- /.nav-second-level -->
                    </li>
                @endif
                {{--<li>--}}
                {{--<a href="admin/promotion"><i class="fa fa-users fa-fw"></i> Chương Trình Khuyến Mãi<span class="fa arrow"></span></a>--}}
                {{--<ul class="nav nav-second-level">--}}
                {{--<li>--}}
                {{--<a href="admin/promotion">Danh Sách Chương Trình Khuyến Mãi</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="admin/promotion/create ">Thêm Chương Trình Khuyễn Mãi</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.nav-second-level -->--}}
                {{--</li>--}}
            
            
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
@endif