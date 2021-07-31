@extends('layouts.wanaazegaj')
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
                    <h1 class="m-0 text-dark">የምክትል አዘጋጅ(ም/ዳይሬክተር) አቅድ <small>ዝርዝር {{Auth::user()->department->name}}
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
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    @if ($i = 0)@endif
                                    @foreach($planlist as $plist)
                                        @if( Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 4)
                                            @if($plist->check_by_super_hidet == 0
                                            && $plist->cancel == 0
                                            && $plist->check_by_hidet == 0
                                            && $plist->check_by_smanager == 0
                                            && $plist->check_by_finance == 0 )
                                                @if ($i ++) @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                        <div class="card-body table-responsive p-0">
                            @if($i === 0)
                                <div class="card-header text-center">
                                    <h3 class="text-center text-info">የተመዘገበ አቅድ የለም </h3>
                                </div>
                            @else
                                @include('layouts.ekid-menu')
                                <div class="table pt-4">
                                    <table class="table table-hover table-striped table-bordered"
                                           id="dataTableAdmin"
                                           style="width:100%">
                                        <thead class="table-info">
                                        <th>ሙሉ ስም</th>
                                        <th>መነሻ ቀን</th>
                                        <th>መመለሻ ቀን</th>
                                        <th>ቆይታ ቀን</th>
                                        <th>የስራርእስ</th>
                                        <th>ሂደት</th>
                                        <th>የሂደት መሪ ፊርማ</th>
                                        <th>ም/ስራ አስኪያጅ(ዋና ስራ አስኪያጅ)</th>
                                        <th>ፋየይናንስ ፊርማ</th>
                                        <th>የእቅዱ ሂደት</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($planlist as $plist)
                                            @if(($plist->check_by_super_hidet == 0 && $plist->user->role_id == 4
                                          && Auth::user()->department->id == $plist->user->department->id &&
                                                    $plist->cancel == 0
                                                    ))
                                                <tr>
                                                    <td>{{$plist->user->name}}</td>
                                                    <td>{{$plist->startdate}}</td>
                                                    <td>{{$plist->enddate}}</td>
                                                    <td>{{$plist->nodate}}</td>
                                                    <td>{{$plist->title}}</td>
                                                    <td>{{$plist->user->department->name}}</td>

                                                    <td>@if($plist->check_by_super_hidet == 0)
                                                            <strong class="text-info">በሂደት
                                                                ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>
                                                    <td>@if($plist->check_by_smanager == 0)
                                                            <strong class="text-info">በሂደት
                                                                ላይ</strong>
                                                        @else
                                                            <strong
                                                                class="text-info">{{$plist->sign_name_smanager}}</strong>
                                                        @endif
                                                        @if($plist->check_by_wmanager == 0)
                                                            {{--                                                        <strong class="text-info">በሂደት ላይ</strong>--}}
                                                        @else
                                                            <strong
                                                                class="text-info">{{$plist->sign_name_wmanager}}</strong>
                                                        @endif
                                                    </td>
                                                    <td>@if($plist->check_by_finance == 0)
                                                            <strong class="text-info">በሂደት
                                                                ላይ</strong>
                                                        @else
                                                            <strong class="text-info">ጸድቋል</strong>

                                                        @endif
                                                    </td>

                                                    <td>@if($plist->cancel == 0)
                                                            <strong class="text-info">በመጠባበቅ
                                                                ላይ</strong>
                                                        @else
                                                            <strong class="text-info">
                                                                ውድቅ ተደርጓል በ ፡
                                                                {{$plist->cancel_name_smanager}}
                                                                {{$plist->cancel_name_manager}}
                                                                {{$plist->cancel_name_wana}}

                                                                {{$plist->cancel_name}}
                                                            </strong>

                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{route('wanaazegaj-approve-details',$plist->id)}}"
                                                           class="btn btn-sm btn-info"
                                                           style="width: 100px">ሙሉውን እይ </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('self-edit-ekid',$plist->id)}}"
                                                           class="btn btn-sm btn-primary">አስተካክል </a>
                                                    </td>
                                                    <td>@if($plist->cancel == 0)
                                                            @if($plist->check_by_finance == 0)
                                                                <form
                                                                    action="{{route('wana-approve-plan',$plist->id)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button
                                                                        class="btn btn-sm btn-info my-0">
                                                                        ማጽደቅ
                                                                    </button>
                                                                </form>

                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($plist->cancel == 0)
                                                            <form
                                                                action="{{route('wana-cancel-plan',$plist->id)}}"
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

@endsection
@section('js')

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }


        function handelDelete(id) {
            // console.log('deleting .' + id);

            var form = document.getElementById('deleteTransportForm');
            form.action = '/hidet/self/' + id + '/self-delete-ekid';
            // console.log('deleting .' , form); /hidet/self/{selfid}/self-delete-ekid
            $('#deleteModal').modal('show')
        }

        $(document).ready(function () {
            $('#dataTableAdmin').DataTable();
        });
    </script>
@endsection
@section('js')

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

@endsection


