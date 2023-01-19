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


                @if(auth()->user()->roles->pluck("name")->first() == "Student")
                    <li class="nav-item">
                        <a href="{{route('studentSynopsisThesis.show',auth()->user()->id)}}" class="nav-link @if(request()->routeIs('studentSynopsisThesis.show',auth()->user()->id)) active  @endif">
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


                    <li class="nav-item">
                        <a href="{{route('course.viewRegisterCourses')}}" class="nav-link @if(request()->routeIs('course.viewRegisterCourses')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Register Courses</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->roles->pluck("name")->first() == "Supervisor")
                    <li class="nav-item">
                        <a href="{{route('viewRegisterStudentDetail')}}" class="nav-link @if(request()->routeIs('viewRegisterStudentDetail')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                View Registered Student
                            </p>
                        </a>
                    </li>
                @endif



                {{--                 @if(request()->routeIs('course.*')) menu-open  @endif              --}}
                {{--                @if(request()->routeIs('course.*')) active  @endif                  --}}
                @if(auth()->user()->roles->pluck("name")->first() == "Supervisor")
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
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


                        </ul>
                    </li>
                @endif
                @if(auth()->user()->roles->pluck("name")->first() == "Student")
                    <li class="nav-item">
                        <a href="{{route('course.index')}}" class="nav-link  @if(request()->routeIs('course.index')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->roles->pluck("name")->first() == "Supervisor")
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
                            @if(auth()->user()->roles->pluck("name")->first() == "Super-Admin")
                                <li class="nav-item">
                                    <a href="{{route('users.userProfile')}}" class="nav-link  @if(request()->routeIs('users.userProfile')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Profile</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if(auth()->user()->roles->pluck("name")->first() == "Evaluator")

                    <li class="nav-item">
                        <a href="{{route('viewThesisSynopsis')}}" class="nav-link @if(request()->routeIs('viewThesisSynopsis')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                View Thesis / Synopsis
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('manageSchedule')}}" class="nav-link @if(request()->routeIs('manageSchedule')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Manage Schedule
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('generateEvaluationReport')}}" class="nav-link @if(request()->routeIs('generateEvaluationReport')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Evaluation Report
                            </p>
                        </a>
                    </li>
                @endif




                @if(auth()->user()->roles->pluck("name")->first() == "In-charge")

                    <li class="nav-item">
                        <a href="{{route('viewThesisSynopsis')}}" class="nav-link @if(request()->routeIs('viewThesisSynopsis')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                View Thesis / Synopsis
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('reportSendByEvaluator')}}" class="nav-link @if(request()->routeIs('reportSendByEvaluator')) active  @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Report send By Evaluator
                            </p>
                        </a>
                    </li>
                @endif



                {{--                    menu-open               --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
