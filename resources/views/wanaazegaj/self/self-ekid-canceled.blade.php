@extends('layouts.wanaazegaj')
@section('css')

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset ('css/self-home.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">የተሰረዙ እቅዶች <small>ዝርዝር {{Auth::user()->department->name}}
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
            @include('layouts.self-wana')
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="content-header">
                            <div class="container">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        @if ($i = 0)@endif
                                        @foreach($planlist as $plist)
                                            @if( Auth::user()->department->id == $plist->user->department->id)
                                                @if(Auth::user()->id == $plist->user_id
                                                && $plist->user->role_id == 2
                                                &&  $plist->check_by_hidet == 0
                                                && $plist->cancel == 1
                                                && $plist->check_by_smanager == 0
                                                && $plist->check_by_finance == 0 )
                                                    @if ($i ++) @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
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
                                                @if($i === 0)
                                                    <div class="card-header text-center">
                                                        <h3 class="text-center text-info">የተሰረዘ አቅድ የለም </h3>
                                                    </div>
                                                @else
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
                                                        {{--                                                        <th>የሂደት መሪ ፊርማ</th>--}}
                                                        <th>ም/ስራ አስኪያጅ(ዋና ስራ አስኪያጅ)</th>
                                                        <th>ፋየይናንስ ፊርማ</th>
                                                        <th>የእቅዱ ሂደት</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        {{--                                                        <th></th>--}}
                                                        {{--                                                        <th></th>--}}
                                                        </thead>
                                                        <tbody>
                                                        @foreach($planlist as $plist)
                                                            @if(( $plist->check_by_hidet == 0
                                                          && Auth::user()->id == $plist->user_id &&
                                                                    Auth::user()->department->id == $plist->user->department->id &&
                                                                    $plist->cancel == 1
                                                                     && $plist->user->role_id == 2
                                                                    ))
                                                                <tr>
                                                                    <td>{{$plist->user->name}}</td>
                                                                    <td>{{$plist->startdate}}</td>
                                                                    <td>{{$plist->enddate}}</td>
                                                                    <td>{{$plist->nodate}}</td>
                                                                    <td>{{$plist->title}}</td>
                                                                    <td>{{$plist->user->department->name}}</td>
                                                                    <td>@if($plist->check_by_smanager == 0)
                                                                            <strong class="text-info">በሂደት ላይ</strong>
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
                                                                            <strong class="text-info">በሂደት ላይ</strong>
                                                                        @else
                                                                            <strong class="text-info">ጸድቋል</strong>

                                                                        @endif
                                                                    </td>

                                                                    <td>@if($plist->cancel == 0)
                                                                            <strong class="text-info">በመጠባበቅ ላይ</strong>
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
                                                                           class="btn btn-sm btn-primary">እይ </a>

                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-red my-0 "
                                                                                onclick="handelDelete({{$plist->id}})">
                                                                            ሰርዝ
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('self-edit-ekid-wana',$plist->id)}}"
                                                                           class="btn btn-sm btn-primary">አስተካክል </a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                         aria-labelledby="deleteModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="" method="post" id="deleteTransportForm">
                                                                //form.action =
                                                                '/categories/' + id;
                                                                below
                                                                have script file
                                                                @method('delete')
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                                            Delete Plan /እቅድ ሰርዝ </h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-center text-bold">
                                                                            እርግጠኛነህ ይሄ እቅድ ይሰርዝ .?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">No,
                                                                            Go back
                                                                        </button>
                                                                        <button type="submit" class="btn btn-danger">Yes
                                                                            , Delete
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
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


