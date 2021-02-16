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
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">የተከናዎኑ እቅዶች <small>ዝርዝር</small></h1>
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
                            <table class="table table-hover table-striped table-bordered" id="dataTableAdmin" style="width:100%">
                                <thead class="table-info">
                                <th>ቆይታ ቀን</th>
                                <th>ቅድመ ክፍያ</th>
                                <th>የስራርእስ</th>
                                <th>በእቅዱ ተይዘው የነበሩ ስራዎች</th>
                                {{--                                <th>በእቅዱ መሰረት የተከናዎኑ ስራዎች</th>--}}
                                {{--                                <th>ከእቅዱ ውጭ የተከናዎኑ ስራዎች</th>--}}
                                {{--                                <th>ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች</th>--}}
                                <th></th>
                                <th></th>
                                <th></th>
{{--                                <th></th>--}}
                                {{--                                </tr>--}}
                                </thead>
                                <tbody>
                                {{--                                @foreach($plan as $p)--}}

                                {{--                                    {{$p->id}}--}}
                                {{--                                    @if($report->plan_id == $report->$p->id)--}}
                                {{--                                        {{$report->payment->total}}--}}
                                {{--                                    @else--}}
                                {{--                                        0.00--}}
                                {{--                                    @endif--}}

                                {{--                                @endforeach--}}
                                @foreach($ekidreport as $report)
                                    @if((auth()->user()->id === $report->user_id))
                                        <tr>
                                            {{--                                            <td>{{$report->nodate}}</td>--}}
                                            <td>
                                                <a href="{{route('ekid-report-view-one',$report->id)}}"
                                                   class="btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                                   title="ሙሉውን እቅድ ክንውን ለማየት ክሊክ አርግ">{!!$report->nodate !!}</a>
                                            </td>

                                            <td>
                                                @if($report->payment_id == null && $report->plan_id == null)
                                                    0.00
                                                @else
                                                    {{$report->payment->total}}
                                                @endif

                                            </td>
                                            <td>
                                                @if($report->payment_id == null && $report->plan_id == null)
                                                    {{$report->title}}
                                                @else
                                                    {!! $report->plan->title !!}
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('ekid-report-view-one',$report->id)}}"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="ሙሉውን እቅድ ክንውን ለማየት ክሊክ አርግ">{!!$report->ekid_on_list_done !!}</a>
                                            </td>
                                            {{--                                            <td>{!!$report->ekid_on_list!!}</td>--}}
                                            {{--                                            <td>{!!$report->ekid_ont_on_list_done !!}</td>--}}
                                            {{--                                            <td>{!! $report->not_done_reason !!}</td>--}}
                                            <td>
                                                <a href="{{route('ekid-report-edit', $report->id)}}"
                                                   class="btn btn-sm btn-info m-1 ">አስተካክል</a>
                                            </td>
                                            <td>
                                                <a href="{{route('abel-info',$report->id)}}" class="btn btn-sm btn-warning m-1 p-2"
                                                   style="width: 100px">
                                                    እቅድ ክንውን እይ
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('ekid-abel',$report->id)}}" type="submit"
                                                   class="btn btn-primary btn-sm m-1 p-2" style="width: 100px">
                                                    ትራንስፖርት አበለ መዝግብ
                                                </a>
                                            </td>
                                        </tr>

                                    @endif
{{--                                    @if((auth()->user()->id === $report->user_id))--}}
{{--                                        @if($report->payment_id == null && $report->plan_id == null))--}}
{{--                                       00.00--}}
{{--                                        @endif--}}
{{--                                    @endif--}}

                                @endforeach
                                </tbody>
                            </table>
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
