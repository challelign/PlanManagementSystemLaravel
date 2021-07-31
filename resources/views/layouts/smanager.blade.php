<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>የእቅዶች ዝርዝር</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->


    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/nav-chalie.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/active.tab.menu.css')}}">

    {{-- <style>
         .note-editable, .note-editor.note-airframe .note-editing-area .note-editable {
             height: 300px;
         }

         .navbar-light .navbar-nav .nav-link {
             color: white;
             font-family: "Segoe UI Semibold";
         }

         .note-editable, .note-editor.note-airframe .note-editing-area .note-editable {
             height: 300px;
         }

         .dropdown-item {
             color: #00baff;
         }

         .navbar-no-expand .dropdown-menu {
             background-color: whitesmoke;
         }

         .navbar.navbar-light .breadcrumb .nav-item .nav-link, .navbar.navbar-light .navbar-nav .nav-item .nav-link {
             color: whitesmoke;
             -webkit-transition: .35s;
             transition: .35s;
         }

         .navbar .dropdown-menu a:not(.active) {
             color: #00baff;
         }
     </style>--}}



    @yield('css')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header  fixed-top  navbar navbar-expand-md navbar-light navbar-white "
         style="background-color: #33b4e4; text-color: white; font-size: larger;">
        <div class="container-fluid">
            <a href="{{route('smanager')}}" class="navbar-brand">
                <img src="{{asset('img/ammalogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .9">
                <span class="brand-text font-weight-light">PMS</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class=" {{'smanager/home' == request()->path()?'active':''}} nav-item">
                        <a href="{{route('smanager')}}" class="nav-link">ያልታዩ እቅዶች <i class="far fa-comments"></i>


                            {{--reporter--}}
                            @if ($r = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 3)
                                    @if($plist->check_by_hidet == 1
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 1
                                     && $plist->check_by_smanager == 0
                                    && $plist->check_by_finance == 0 )
                                        @if ($r ++) @endif
                                    @endif
                                @endif

                            @endforeach
                            {{--miktl azegaj--}}
                            @if ($h = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 4)
                                    @if( $plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 1
                                       && $plist->check_by_smanager == 0
                                    && $plist->check_by_finance == 0 )
                                        @if ($h ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            {{--wana azegaji--}}
                            @if ($sh = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 2)
                                    @if($plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 0
                                       && $plist->check_by_smanager == 0
                                    && $plist->check_by_finance == 0 )
                                        @if ($sh ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            <span class="badge badge-danger navbar-badge">
                                {{$r + $sh + $h}}
                            </span></a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="{{route('wanaazegaj-list-all')}}" class="nav-link">የፈረምክባቸው</a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('w1-ekid-report-list')}}" class="nav-link">ያልታዩ እቅድ ክንውኖች <i
                                class="far fa-comments"></i>
                            @if ($x = 0)@endif
                            @foreach($ekidreport as $elist)
                                @if( Auth::user()->department->id == $elist->user->department->id)
                                    @if($elist->check_by_hidet == 1
                                    && $elist->check_by_super_hidet == 1
                                       && $plist->check_by_smanager == 0
                                    && $elist->check_by_finance == 0
                                    && $elist->ekid_status == 1)
                                        @if ($x ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            <span class="badge badge-info navbar-badge">
                                {{$x}}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ዳ/እቅድ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            {{--                            <div class="container">--}}
                            <div class="row text-center">
                                <div class="col-md-12 row">
                                    @foreach($department as $dep)
                                        <ul class="nav flex-column float-right">
                                            <li class="nav-item"
                                                style="width: 300px;padding-left: 80px; text-align: justify">
                                                <a class="nav-link"
                                                   href="{{route('smanager-directorate-ekid-list',$dep->id)}}">{{$dep->slug}}</a>
                                            </li>


                                        </ul> @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ዳ/እቅድ ክንውን
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="row text-center">
                                <div class="col-md-12 row">
                                    @foreach($department as $dep)
                                        <ul class="nav flex-column float-right">
                                            <li class="nav-item"
                                                style="width: 300px;padding-left: 80px; text-align: justify">
                                                <a class="nav-link"
                                                   href="{{route('directorate-ekid-report-list',$dep->id)}}">{{$dep->slug}}</a>
                                            </li>


                                        </ul> @endforeach
                                </div>

                            </div>
                        </div>
                    </li>


                    {{--                    የተፈረመባቸው እቅዶች--}}
                    <li class="nav-item dropdown text-center" style="text-align: center;position: relative">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" class="nav-link dropdown-toggle">የተፈረመባቸው እቅዶች </a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li>
                                <a class="{{'smanager/list-all' == request()->path()?'active':''}} dropdown-item"
                                   href="{{route('smanager-list-all')}}"
                                   style="text-wrap: inherit; text-align: center">እቅዶች</a>
                            </li>
                            <li>

                                <a href="{{route('wanaazegaj-ekid-list-all')}}" class="dropdown-item"
                                   style="text-wrap: inherit; text-align: center">እቅድ
                                    ክንውኖች</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item" style="text-wrap: inherit; text-align: center"></a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('smanager-cancel-ekid-list')}}" class="nav-link">የተሰረዙ እቅዶች
                        </a>
                    </li>
                </ul>


            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto"
                style="text-align: center;position: relative">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown" style="text-align: center;position: relative">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                         style="text-align: center;position: relative">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{route('change-password-smanager')}}">

                            Change Password
                        </a>
                        <a class="dropdown-item" href="{{route('profile-sign-smanager')}}">

                            Profile
                        </a>

                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <div class="content-wrapper pt-5">

        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @if(session()->has('success'))
                            <div class="alert alert-info text-center" role="alert">
                                {{session()->get('success')}}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{session()->get('error')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>


            @yield('content')

        </div>

        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-md-inline">
                PMS
            </div>
            <!-- Default to the left -->
            <strong> Developed by <a href="">Challelign Tilahun</a>. </strong> &copy;2020.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset ('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset ('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset ('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset ('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset ('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset ('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset ('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset ('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset ('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset ('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset ('dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset ('dist/js/demo.js')}}"></script>
    <script src="{{asset ('js/nav-chalie.js')}}"></script>


@yield('js')
</body>
</html>
