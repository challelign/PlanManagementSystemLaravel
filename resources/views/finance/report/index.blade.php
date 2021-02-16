@extends('layouts.finance')

@section('content')

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> እቅድ ክንውን የእቅዶች <small>ዝርዝር {{Auth::user()->department->name}}
                            @if ($i = 0)@endif
                            @foreach($ekidreport as $elist)
                                @if( Auth::user()->department->id == $elist->user->department->id)
                                    @if($elist->check_by_hidet == 1
                                    && $elist->check_by_super_hidet == 0
                                    && $elist->check_by_finance == 0
                                     && $elist->ekid_status == 1)
                                        @if ($i ++) @endif
                                    @endif

                                @endif

                            @endforeach
                            <span
                                class="badge badge-danger">
                                 {{$i}}
                            </span>


                        </small>
                    </h1>
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
                            @if($i === 0)

                                <div class="card-header text-center">
                                    <h3 class="text-center text-info"> NO PLANS'S YET </h3>

                                </div>
                            @else
                                <table class="table table-hover table-striped table-bordered" style="width:100%">
                                    <thead class="table-info">

                                    <th>ሙሉ ስም</th>
                                    <th>ቅድመ ክፍያ</th>
                                    <th>ቆይታ ቀን</th>
                                    <th>የስራርእስ</th>
                                    <th>ሂደት</th>
                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>
                                    <th>አስተካክል</th>
                                    <th></th>
                                    {{--                                    <th></th>--}}
                                    </thead>
                                    <tbody>
                                    @foreach($ekidreport as $elist)
                                        @if(($elist->check_by_hidet == 1 && $elist->check_by_super_hidet == 0 &&
                                                Auth::user()->department->id == $elist->user->department->id
                                                ))
                                            <tr>
                                                <td>{{$elist->user->name}}</td>
                                                <td>{{$elist->startdate}}</td>
                                                <td>{{$elist->enddate}}</td>
                                                <td>{{$elist->nodate}}</td>
                                                <td>{{$elist->title}}</td>
                                                <td>{{$elist->user->department->name}}</td>
                                                <td>@if($elist->check_by_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>
                                                <td>@if($elist->check_by_super_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>
                                                <td>@if($elist->check_by_finance == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">ተፈርምበታል</strong>

                                                    @endif
                                                </td>


                                                <td>


                                                    <a href="{{route('wanaazegaj-approve-details',$elist->id)}}"
                                                       class="btn btn-sm btn-info">View</a>

                                                </td>

                                                @if($elist->check_by_finance == 0)
                                                    <td>
                                                        <form action="{{route('approve-plan',$elist->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button
                                                                class="btn btn-sm btn-warning my-0">Approve
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <a type="submit" class="btn btn-primary btn-sm">
                                                        ተጠናቋል
                                                    </a>
                                                </td>


                                                </td>

                                            </tr>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
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


