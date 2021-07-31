@extends('layouts.wanaazegaj')
@section('css')
    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/sign-table.css')}}">
    <link href="{{asset ('css/self-home.css')}}" rel="stylesheet">

    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> የእቅዶች <small>ዝርዝር {{Auth::user()->department->name}}
                            @if ($i = 0)@endif
                            @foreach($planlist as $plist)
                                @if( Auth::user()->department->id == $plist->user->department->id)
                                    @if($plist->check_by_hidet == 1 && $plist->user->role_id == 3
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 0
                                     && $plist->check_by_smanager == 0
                                    && $plist->check_by_finance == 0 )
                                        @if ($i ++) @endif
                                    @endif

                                @endif
                            @endforeach

                            @if ($is = 0)@endif
                            @foreach($planlist as $plist)
                                @if( Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 4)
                                    @if(
                                    $plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 0
                                    && $plist->check_by_finance == 0 )
                                        @if ($is ++) @endif
                                    @endif

                                @endif

                            @endforeach


                            <span class="badge badge-danger navbar-badge">
                                {{$i + $is}}
                                @if ($sum = $i + $is )@endif

                            </span>

                        </small>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        {{--                        <li class="breadcrumb-item"><a href="#">Layout</a></li>--}}
                        {{--                        <li class="breadcrumb-item active">Top Navigation</li>--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ዝርዝር </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            @if($sum === 0)
                                <div class="card-header text-center">
                                    <h3 class="text-center text-info"> የተላከ አቅድ የለም </h3>
                                </div>
                            @else
                                @include('layouts.ekid-menu')
                                <div class="table pt-4">
                                    <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                           style="width:100%">
                                        <thead class="table-info">

                                        <th>ሙሉ ስም</th>
                                        <th>መነሻ ቀን</th>
                                        <th>መመለሻ ቀን</th>
                                        <th>ቆይታ ቀን</th>
                                        <th>የስራርእስ</th>
                                        <th>ሂደት</th>
                                        <th>የአስተባባሪ ፊርማ</th>
                                        <th>የሂደት መሪ ፊርማ</th>
                                        <th>የም/ስራ አስኪያጅ ፊርማ</th>
                                        <th>ፋየይናንስ ፊርማ</th>
                                        {{--                                    <th>የእቅዱ ሂደት</th>--}}

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($planlist as $plist)
                                            @if(($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 0 &&
                                                    Auth::user()->department->id == $plist->user->department->id && $plist->cancel == 0 && $plist->user->role_id == 3
                                                    ))
                                                <tr>
                                                    <td>{{$plist->user->name}}</td>
                                                    <td>{{$plist->startdate}}</td>
                                                    <td>{{$plist->enddate}}</td>
                                                    <td>{{$plist->nodate}}</td>
                                                    <td>{{$plist->title}}</td>
                                                    <td>{{$plist->user->department->name}}</td>
                                                    <td>@if($plist->check_by_hidet == 0)
                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>
                                                    <td>@if($plist->check_by_super_hidet == 0)
                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>
                                                    <td>@if($plist->check_by_smanager == 0)
                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>
                                                    <td>@if($plist->check_by_finance == 0)
                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('wanaazegaj-approve-details',$plist->id)}}"
                                                           class="btn btn-sm btn-info" style="width: 100px">ሙሉውን እይ </a>
                                                    </td>
                                                    <td>@if($plist->cancel == 0)
                                                            @if($plist->check_by_finance == 0)
                                                                <form action="{{route('wana-approve-plan',$plist->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <button
                                                                        class="btn btn-sm btn-info my-0">ማጽደቅ
                                                                    </button>
                                                                </form>

                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($plist->cancel == 0)
                                                            <form action="{{route('wana-cancel-plan',$plist->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <button
                                                                    class="btn btn-sm btn-red my-0"
                                                                    style="width: 100px">ውድቅ
                                                                    አድርግ
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection

@section('js')


    {{--@endsection--}}
    {{--@section('js')--}}

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endsection

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTableAdmin').DataTable();
        });

        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

@section('js')
