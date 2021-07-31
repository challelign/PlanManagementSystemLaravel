<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <title>AMMA PMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Font Awesome -->


    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


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

{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
<!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/nav-chalie.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{--> <style
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


    </style>--}}

    <link rel="stylesheet" href="{{asset('css/active.tab.menu.css')}}">

    @yield('css')

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md fixed-top  navbar-light navbar-white"
         style="background-color: #00aff0; text-color: white">
        <div class="container">
            <a href="{{route('admin')}}" class="navbar-brand">
                <img src="{{asset('img/ammalogo.png')}}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">PMS</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="{{route('users-list')}}" class="nav-link">ተጠቃሚወች</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user-register')}}" class="nav-link">ተጠቃሚ መዝብብ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user-directorate-create')}}" class="nav-link">የሰራ ሒደት መዝግብ</a>
                    </li>
                    {{--                    ekid  directorate--}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            እቅድ ዳይሬክቶሬት
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
                                                   href="{{route('admin.directorate-ekid-reset',$dep->id)}}">{{$dep->slug}}</a>
                                            </li>


                                        </ul> @endforeach
                                </div>
                            </div>
                        {{--                            </div>--}}
                        <!--  /.container  -->


                        </div>
                    </li>

                    {{--                    ekid reprt directorate--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            እቅድ ሪፖርት ዳይሬክቶሬት
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
                                                   href="{{route('admin.directorate-ekid-report-reset',$dep->id)}}">{{$dep->slug}}</a>
                                            </li>


                                        </ul> @endforeach
                                </div>
                            </div>
                        {{--                            </div>--}}
                        <!--  /.container  -->


                        </div>
                    </li>

                </ul>

            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto text-center">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown text-center" style="position: relative">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" style="color: #00b7ff;text-align: center"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{route('change-password')}}"
                           style="color: #00b7ff; text-align: center">

                            Change Password
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
                            <div class="alert alert-primary text-center" role="alert">
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

    </div>

    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-md-inline">
            PMS
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="">Challelign Tilahun</a>.</strong> All rights reserved.
    </footer>
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


    <script src="{{asset ('plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{asset ('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>


    <!-- ChartJS -->
    <script src="{{asset ('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <script src="{{asset ('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

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
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>


    <script src="{{asset ('js/nav-chalie.js')}}"></script>
    @yield('js')
</div>
</body>
</html>
