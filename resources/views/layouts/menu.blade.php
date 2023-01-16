<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{url('AdminLTE-3.2.0/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UGP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link @if(request()->routeIs('dashboard')) active  @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('studentSynopsisThesis.show',auth()->user()->id)}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.index')) active  @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thesis Submission
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('viewSupervisor')}}" class="nav-link @if(request()->routeIs('viewSupervisor')) active  @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            View Supervisor
                        </p>
                    </a>
                </li>

                <li class="nav-item @if(request()->routeIs('course.*')) menu-open  @endif ">
                    <a href="#" class="nav-link @if(request()->routeIs('course.*')) active  @endif">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Course Creations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('course.create')}}" class="nav-link  @if(request()->routeIs('course.create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('course.index')}}" class="nav-link  @if(request()->routeIs('course.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Courses</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('course.viewRegisterCourses')}}" class="nav-link @if(request()->routeIs('course.viewRegisterCourses')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Register Courses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(request()->routeIs('users.*')) menu-open  @endif ">
                    <a href="#" class="nav-link @if(request()->routeIs('users.*')) active  @endif">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link  @if(request()->routeIs('users.create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link  @if(request()->routeIs('users.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('users.userProfile')}}" class="nav-link  @if(request()->routeIs('users.userProfile')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--                    menu-open               --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>