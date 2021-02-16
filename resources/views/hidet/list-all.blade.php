@extends('layouts.hidet')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">ያረጋገጥሃቸው እቅዶች <small>ዝርዝር {{Auth::user()->department->name}}
                            @if ($i = 0)@endif
                            @foreach($planlist as $plist)
                                @if( Auth::user()->department->id == $plist->user->department->id && Auth::user()->name == $plist->sign_name )
                                    @if($plist->check_by_hidet == 1)
                                        @if ($i ++) @endif
                                    @endif
                                @endif
                            @endforeach
                            {{--                            <span--}}
                            {{--                                class="badge badge-danger">--}}
                            {{--                                 {{$i}}--}}
                            {{--                            </span>--}}


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
                                    <th>የስራርእስ</th>
                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>
                                    {{--                                    <th>አስተካክል</th>--}}

                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($planlist as $plist)
                                        @if(($plist->check_by_hidet == 1 &&
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
                                                        <strong class="text-info">{{$plist->sign_name}}</strong>


                                                    @endif
                                                </td>
                                                <td>@if($plist->check_by_super_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">{{$plist->sign_name_wana}}</strong>

                                                    @endif
                                                </td>
                                                <td>@if($plist->check_by_finance == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong
                                                            class="text-info">{{$plist->payment->approved_by}}</strong>


                                                    @endif
                                                </td>


                                                <td>


                                                    <a href="{{route('hidet-single-details',$plist->id)}}"
                                                       class="btn btn-sm btn-info p-2 mx-3" style="width: 100px">ሙሉው እቅድ እይ </a>

                                                </td>

                                                {{--                                                @if($plist->check_by_finance == 0)--}}
                                                {{--                                                    <td>--}}
                                                {{--                                                        <form action="{{route('approve-plan',$plist->id)}}"--}}
                                                {{--                                                              method="post">--}}
                                                {{--                                                            @csrf--}}
                                                {{--                                                            <button--}}
                                                {{--                                                                class="btn btn-sm btn-warning my-0">Payment--}}
                                                {{--                                                            </button>--}}
                                                {{--                                                        </form>--}}
                                                {{--                                                    </td>--}}
                                                {{--                                                @endif--}}

                                                <td>
{{--                                                    @if($plist->is_plan_compated == 0 && $plist->check_by_hidet == 0)--}}
{{--                                                        <a href="{{route('h1-ekid-report',$plist->id)}}" type="submit" class="btn btn-primary btn-s mx-0 m px-0 " style="width: 100px">--}}
{{--                                                            እቅድ ክንውን ተልኳል--}}
{{--                                                        </a>--}}
{{--                                                    @else--}}
{{--                                                        ተጠናቋል--}}
{{--                                                    @endif--}}

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


