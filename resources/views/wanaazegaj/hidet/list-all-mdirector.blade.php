@extends('layouts.wanaazegaj')
@section('css')
    <link href="{{asset ('css/self-home.css')}}" rel="stylesheet">
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">ያረጋገጥሃቸው እቅዶች <small>ዝርዝር {{Auth::user()->department->name}}
                            @if ($is = 0)@endif
                            @foreach($planlist as $plist)
                                @if( Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 4)
                                    @if(
                                    $plist->check_by_hidet == 0
                                    && $plist->cancel == 0
                                    && $plist->check_by_super_hidet == 1
                                    && $plist->check_by_finance == 0 )
                                        @if ($is ++) @endif
                                    @endif
                                @endif
                            @endforeach


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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            @if($is === 0)

                                <div class="card-header text-center">
                                    <h3 class="text-center text-info"> ምንም አቅድ የለም </h3>

                                </div>
                            @else
                                @include('layouts.ekid-menu-checked')
                                <div class="card-header">
                                    <h3 class="card-title">ዝርዝር </h3>
                                </div>
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
                                        {{--                                        <th>የአስተባባሪ ፊርማ</th>--}}
                                        <th>የሂደት መሪ ፊርማ</th>
                                        <th>ም/ስራ አስኪያጅ(ስራ አስኪያጅ)</th>
                                        <th>ፋየይናንስ ፊርማ</th>
                                        {{--                                    <th>አስተካክል</th>--}}
                                        <th>የእቅዱ ሂደት</th>
                                        {{--                                    <th></th>--}}
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($planlist as $plist)
                                            @if(($plist->check_by_hidet == 0 && $plist->check_by_super_hidet == 1
                                               && $plist->cancel == 0   &&
                                                    Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 4
                                                    ))
                                                <tr>
                                                    <td>{{$plist->user->name}}</td>
                                                    <td>{{$plist->startdate}}</td>
                                                    <td>{{$plist->enddate}}</td>
                                                    <td>{{$plist->nodate}}</td>
                                                    <td>{{$plist->title}}</td>
                                                    <td>{{$plist->user->department->name}}</td>
                                                    {{--                                                    <td>@if($plist->check_by_hidet == 0)--}}
                                                    {{--                                                            <strong class="text-info">አልተፈረመበትም</strong>--}}
                                                    {{--                                                        @else--}}
                                                    {{--                                                            <strong class="text-info">ተፈርምበታል</strong>--}}

                                                    {{--                                                        @endif--}}
                                                    {{--                                                    </td>--}}
                                                    <td>@if($plist->check_by_super_hidet == 0)
                                                            <strong class="text-info">አልተፈረመበትም</strong>
                                                        @else
                                                            <strong class="text-info">ተፈርምበታል</strong>

                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($plist->check_by_smanager == 0)
                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                        @else
                                                            <strong
                                                                class="text-info">{{$plist->sign_name_smanager}}</strong>
                                                        @endif
                                                        @if($plist->check_by_wmanager == 0)
                                                        @else
                                                            <strong
                                                                class="text-info">{{$plist->sign_name_wmanager}}</strong>
                                                        @endif
                                                    </td>

                                                    <td>@if($plist->check_by_finance == 0)
                                                            <strong class="text-info">አልተፈረመበትም</strong>
                                                        @else
                                                            <strong class="text-info">ተፈርምበታል</strong>

                                                        @endif
                                                    </td>
                                                    <td>@if($plist->cancel == 0)
                                                            <strong class="text-info">በመጠባበቅ ላይ</strong>
                                                        @else
                                                            <strong class="text-info">
                                                                ውድቅ ተደርጓል በ ፡
                                                                {{$plist->cancel_name_smanager}}
                                                                {{$plist->cancel_name_manager}}
                                                                {{$plist->cancel_name_wana_image}}
                                                                {{$plist->cancel_name}}
                                                            </strong>

                                                        @endif
                                                    </td>

                                                    <td>


                                                        <a href="{{route('wanaazegaj-single-details',$plist->id)}}"
                                                           class="btn btn-sm btn-info" style="width: 100px">ሙሊውን እይ </a>

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


