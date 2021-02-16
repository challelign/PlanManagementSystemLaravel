@extends('layouts.wanaazegaj')

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
                                    @if($plist->check_by_hidet == 1
                                    && $plist->check_by_super_hidet == 0
                                    && $plist->check_by_finance == 0 )
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
                                    <th>መነሻ ቀን</th>
                                    <th>መመለሻ ቀን</th>
                                    <th>ቆይታ ቀን</th>
                                    <th>የስራርእስ</th>
                                    <th>ሂደት</th>
                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>
                                    <th>አስተካክል</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($planlist as $plist)
                                        @if(($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 0 &&
                                                Auth::user()->department->id == $plist->user->department->id
                                                ))
                                            <tr>
                                                <td>{{$plist->user->name}}</td>
                                                <td>{{$plist->startdate}}</td>
                                                <td>{{$plist->enddate}}</td>
                                                <td>{{$plist->nodate}}</td>
                                                <td>{{$plist->title}}</td>
                                                <td>{{$plist->user->department->name}}</td>
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


                                                    <a href="{{route('wanaazegaj-approve-details',$plist->id)}}"
                                                       class="btn btn-sm btn-info" style="width: 100px">ሙሉውን እይ </a>

                                                </td>

                                                @if($plist->check_by_finance == 0)
                                                    <td>
                                                        <form action="{{route('wana-approve-plan',$plist->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button
                                                                class="btn btn-sm btn-warning my-0">አረጋግጥ
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif


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


