@extends('layouts.smanager')
@section('css')
    <link href="{{asset ('css/self-home.css')}}" rel="stylesheet">

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">ያረጋገጥሃቸው የሰራተኞች እቅድ <small>ዝርዝር {{Auth::user()->department->name}}
                            {{--reporter--}}
                            @if ($r = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 3)
                                    @if($plist->check_by_hidet == 1
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 1
                                     && $plist->check_by_smanager == 1
                                    && $plist->check_by_finance == 0 )
                                        @if ($r ++) @endif
                                    @endif

                                @endif

                            @endforeach
                            {{--miktl azegaj--}}
                            @if ($h = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 4)
                                    @if(
                                    $plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 1
                                       && $plist->check_by_smanager == 1
                                    && $plist->check_by_finance == 0 )
                                        @if ($h ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            {{--wana azegaji--}}
                            @if ($sh = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->user->role_id == 2)
                                    @if(
                                    $plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 0
                                       && $plist->check_by_smanager == 1
                                    && $plist->check_by_finance == 0 )
                                        @if ($sh ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            <span class="badge badge-danger">
                                 {{$r + $sh + $h}}
                                @if ($sum = $r + $sh + $h)@endif
                            </span>
                        </small>
                    </h1>


                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ዝርዝር </h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        {{--                                        <a href="{{route('plan-register')}}" class="btn btn-primary  float-right">እቅድ--}}
                                        {{--                                            መዝግብ--}}
                                        {{--                                        </a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if($sum === 0)
                                <div class="card-header text-center">
                                    <h3 class="text-center text-info">ያረጋገጥሃቸው  እቅዶች የሉም </h3>
                                </div>
                            @else

                                @include('layouts.ekid-menu-smanager-checked')
                                <div class="table pt-4">
                                    <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                           style="width:100%">
                                        <thead class="table-info">

                                        <th>ሙሉ ስም</th>
                                        <th>መነሻ ቀን</th>
                                        <th>መመለሻ ቀን</th>
                                        <th>ቆይታ ቀን</th>
                                        <th>የስራርእስ</th>
                                        <th>ዳይሬክቶሬት/ሂደት</th>
                                        <th>የአስተባባሪ ፊርማ</th>
                                        <th>የሂደት መሪ ፊርማ</th>
                                        <th>የም/ስራ አስኪያጅ ፊርማ</th>
                                        <th>ፋየይናንስ ፊርማ</th>
                                        {{--                                    <th>አስተካክል</th>--}}

                                        {{--                                    <th></th>--}}
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($planlist as $plist)
                                            @if(($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 1
                                                    && $plist->check_by_smanager == 1
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
                                                        <a href="{{route('smanager-single-details',$plist->id)}}"
                                                           class="btn btn-sm btn-info" style="width: 100px">ሙሊውን እይ </a>

                                                    </td>

                                                    {{--                                                @if($plist->check_by_finance == 0)
                                                                                                        <td>
                                                                                                            <form action="{{route('approve-plan',$plist->id)}}"
                                                                                                                  method="post">
                                                                                                                @csrf
                                                                                                                <button
                                                                                                                    class="btn btn-sm btn-warning my-0">Payment
                                                                                                                </button>
                                                                                                            </form>
                                                                                                        </td>
                                                                                                    @endif--}}

                                                </tr>
                                            @endif

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @endif


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection

@section('js')

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endsection

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTableAdmin').DataTable();
        });
    </script>

@section('js')


