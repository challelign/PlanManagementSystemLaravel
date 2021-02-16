@extends('layouts.hidet')
@section('css')

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">የመስክና የከተማ እቅድ ክንውን <small>ዝርዝር : {{Auth::user()->department->name}}
                            @if ($i = 0)@endif
                            @foreach($ekidreport as $elist)
                                @if( Auth::user()->department->id == $elist->user->department->id)
                                    @if($elist->check_by_hidet == 0
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
                            <h3 class="card-title">የመስክና የከተማ ክንውን</h3>
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
                                <table class="table table-hover table-striped table-bordered" id="dataTableAdmin" style="width:100%">
                                    <thead class="table-info">
                                    <th>ተ.ቁ</th>
                                    <th>ሙሉ ስም</th>
                                    <th>ቅድመ ክፍያ</th>
                                    <th>ቆይታ ቀን</th>
                                    <th>የስራርእስ</th>
                                    <th>ሂደት</th>
                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>
                                    <th></th>
                                    <th></th>
                                    {{--                                    <th></th>--}}
                                    </thead>
                                    <tbody>
                                    @if($i = 1)
                                        @endif
                                    @foreach($ekidreport as $elist)
                                        @if(($elist->check_by_hidet == 0 && $elist->check_by_super_hidet == 0 &&
                                                Auth::user()->department->id == $elist->user->department->id
                                                ))
                                            <tr>
                                                <td>{{$i++}}</td>
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


                                                    <a href="{{route('hidet-report-approve-details',$elist->id)}}"
                                                       class="btn btn-sm btn-info  my-0" style="width: 110px;" >ሙሉውን እይ </a>

                                                </td>

                                                @if($elist->check_by_finance == 0)
                                                    <td>
                                                        <form action="{{route('hidet-approve-report',$elist->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button
                                                                class="btn btn-sm btn-warning my-0" style="width: 110px;">አረጋግጥ
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
