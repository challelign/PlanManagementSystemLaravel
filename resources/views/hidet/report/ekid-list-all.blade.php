@extends('layouts.hidet')
@section('css')

{{--    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">ያረጋገጥሃቸው የመስክና የከተማ <small>እቅድ ክንውን : {{Auth::user()->department->name}}
                            @if ($i = 0)@endif
                            @foreach($ekidreport as $elist)
                                @if( Auth::user()->department->id == $elist->user->department->id && Auth::user()->name == $elist->sign_name )
                                    @if($elist->check_by_hidet == 1)
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
                                <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                       style="width:100%">                                    <thead class="table-info">

                                    <th>ሙሉ ስም</th>
                                    <th>ቅድመ ክፍያ</th>
                                    <th>ቆይታ ቀን</th>
                                    <th>የስራርእስ</th>
                                    <th>ሂደት</th>
                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>


{{--                                    <th></th>--}}
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($ekidreport as $elist)
                                        @if(($elist->check_by_hidet == 1 &&
                                             Auth::user()->department->id == $elist->user->department->id
                                             ))

                                            <tr>
                                                <td>{{$elist->user->name}}</td>
                                                <td>
                                                    @if($elist->payment_id == null && $elist->plan_id == null)
                                                        0.00
                                                    @else
                                                        {{$elist->payment->total}}
                                                    @endif

                                                </td>
                                                <td>{{$elist->nodate}}</td>
                                                <td>
                                                    @if($elist->payment_id == null && $elist->plan_id == null)
                                                        {{$elist->title}}
                                                    @else
                                                        {!! $elist->plan->title !!}
                                                    @endif
                                                </td>
                                                <td>{{$elist->user->department->name}}</td>

                                                <td>@if($elist->check_by_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">{{$elist->sign_name}}</strong>


                                                    @endif
                                                </td>
                                                <td>@if($elist->check_by_super_hidet == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong class="text-info">{{$elist->sign_name_wana}}</strong>

                                                    @endif
                                                </td>
                                                <td>@if($elist->check_by_finance == 0)
                                                        <strong class="text-info">አልተፈረመበትም</strong>
                                                    @else
                                                        <strong  class="text-info">{{$elist->approved_by}}</strong>
{{--                                                        <strong  class="text-info">{{$elist->payment->approved_by}}</strong>--}}


                                                    @endif
                                                </td>

                                                <td>


                                                    <a href="{{route('single-ekid-detail',$elist->id)}}"
                                                       class="btn btn-sm btn-info  my-0" style="width: 110px;">ሙሉውን እይ </a>

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





@section('js')

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endsection

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

{{--@section('js')--}}
    <script>
        $(document).ready(function () {
            $('#dataTableAdmin').DataTable();
        });
    </script>

{{--@endsection--}}
{{--@section('js')--}}

