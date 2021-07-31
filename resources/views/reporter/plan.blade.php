@extends('layouts.reporter')
@section('css')

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> የእቅዶች <small>ዝርዝር</small></h1>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ዝርዝር</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        <a href="{{route('plan-register')}}" class="btn btn-primary  float-right">እቅድ
                                            መዝግብ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                   style="width:100%">
                                <thead class="table-info">
                                {{--                                <tr>--}}
                                <th>መነሻ ቀን</th>
                                <th>መመለሻ ቀን</th>
                                <th>ቆይታ ቀን</th>
                                <th>የስራርእስ</th>
                                <th>የአስተባባሪ ፊርማ</th>
                                <th>የሂደት መሪ ፊርማ</th>
                                <th>የም/ስራ አስኪያጅ ፊርማ</th>
                                <th>ፋየይናንስ ፊርማ</th>
                                <th>የእቅዱ ሂደት</th>
                                <th>አስተካክል</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                {{--                                </tr>--}}
                                </thead>
                                <tbody>
                                @foreach($planlist as $plist)
                                    @if((auth()->user()->id === $plist->user_id))
                                        <tr>
                                            <td>{{$plist->startdate}}</td>
                                            <td>{{$plist->enddate}}</td>
                                            <td>{{$plist->nodate}}</td>
                                            {{--                                            {{ \Illuminate\Support\Str::limit($product, 500, '...') }}--}}
                                            <td>{{ \Illuminate\Support\Str::limit($plist->title ,15, '...') }}</td>{{--                                            <td>{{str_limit($plist->title ,$limit=15) }}</td>--}}
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
                                                        {{$plist->cancel_name_wana_image}}
                                                        {{$plist->cancel_name}}
                                                    </strong>

                                                @endif
                                            </td>


                                            <td>
                                                <a href="{{route('reporter.edit', $plist->id)}}"
                                                   class="btn btn-sm bg-red my-2">አስተካክል</a>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-red"
                                                        onclick="handelDelete({{$plist->id}})">ሰርዝ
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{route('reporter.show',$plist->id)}}"
                                                   class="btn btn-sm  btn-red border-0 my-2"
                                                   style="width: 100px">እቅዱን እይ </a>
                                            </td>
                                            <td>
                                                @if($plist->check_by_hidet == 1  && $plist->check_by_super_hidet == 1 && $plist->check_by_finance == 1)
                                                    @if($plist->payment->total > 0 && $plist->status == 0)
                                                        <a href="{{route('ekid-report',$plist->id)}}" type="submit"
                                                           class="btn btn-red btn-sm">
                                                            ሒሳብ እወራርድ
                                                            {{--                                                            {{$plist->payment->total}}--}}
                                                        </a>
                                                    @endif
                                                @endif

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
                                    <form action="" method="post" id="deleteTransportForm"> //form.action =
                                        '/categories/' + id;
                                        below
                                        have script file
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Plan /እቅድ ሰርዝ </h5>
                                                <button type="button" class="close" data-dismiss="modal"
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,
                                                    Go back
                                                </button>
                                                <button type="submit" class="btn btn-danger">Yes , Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


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
    <script>
        function handelDelete(id) {
            // console.log('deleting .' + id);

            var form = document.getElementById('deleteTransportForm');
            form.action = '/reporter/' + id;
            // console.log('deleting .' , form);
            $('#deleteModal').modal('show')
        }
    </script>

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
    </script>

@section('js')
