<div id="wrapper">
    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand lead">Quản Lý Khách Sạn</a>
        </div>
        <!-- /.navbar-header -->
        
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a><i class="fa fa-user fa-fw"></i>@if(Auth::check()) {{Auth::user()->name}} @endif</a>
                    </li>
                    <li><a> <i class="fa fa-anchor fa-fw"></i>
                            @if(Auth::check())
                                @if(Auth::user()->role == 1)
                                    Admin
                                @elseif(Auth::user()->role == 2)
                                    Manager
                                @else()
                                    Sale
                                @endif
                            @endif
                        </a>
                    </li>
                    
                    
                    <li class="divider"></li>
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            {{csrf_field()}}
                            <input type="submit" value="Đăng Xuất" class="form-control btn btn-primary">
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    
    @include('admin.layouts.menu')
    <!-- /.navbar-static-side -->
    </nav>


</div>
