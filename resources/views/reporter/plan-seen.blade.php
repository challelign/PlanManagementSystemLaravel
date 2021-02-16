@extends('layouts.reporter')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
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
                            <table class="table table-hover table-striped table-bordered" style="width:100%">
                                <thead class="table-info">
                                {{--                                <tr>--}}
                                <th>መነሻ ቀን</th>
                                <th>መመለሻ ቀን</th>
                                <th>ቆይታ ቀን</th>
                                <th>የስራርእስ</th>
                                <th>የአስተባባሪ ፊርማ</th>
                                <th>የሂደት መሪ ፊርማ</th>
                                <th>ፋየይናንስ ፊርማ</th>
                                <th>አስተካክል</th>
                                <th></th>
                                <th></th>
                                {{--                                </tr>--}}
                                </thead>
                                <tbody>
                                @foreach($planlist as $plist)
                                    @if((auth()->user()->id === $plist->user_id))
                                        @if($plist->check_by_hidet == 1 && $plist->check_by_finance == 1 && $plist->check_by_super_hidet == 1)
                                            <tr>
                                                <td>{{$plist->startdate}}</td>
                                                <td>{{$plist->enddate}}</td>
                                                <td>{{$plist->nodate}}</td>
                                                <td>{{$plist->title}}</td>
                                                <td>@if($plist->check_by_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>
                                                <td>@if($plist->check_by_super_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>
                                                <td>@if($plist->check_by_finance == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('reporter.edit', $plist->id)}}"
                                                       class="btn btn-sm btn-info my-2" style="width: 100px">አስተካክል</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning"
                                                            onclick="handelDelete({{$plist->id}})"  style="width: 100px" >ሰርዝ
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="{{route('reporter.show',$plist->id)}}" class="btn btn-sm btn-warning border-0 my-2"
                                                       style="width: 100px">እቅዱን እይ </a>
                                                </td>
                                                <td>
                                                    @if($plist->check_by_hidet == 1  && $plist->check_by_super_hidet == 1 && $plist->check_by_finance == 1)
                                                        @if($plist->payment->total > 0 && $plist->status == 0)
                                                            <a href="{{route('ekid-report',$plist->id)}}" type="submit"
                                                               class="btn btn-primary btn-sm  py-2" style="width: 100px">
                                                                እቅድ ክንውን መዝግብ
                                                                {{--                                                            {{$plist->payment->total}}--}}
                                                            </a>
                                                        @endif
                                                    @endif

                                                </td>
                                            </tr>
                                        @endif

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

@endsection
