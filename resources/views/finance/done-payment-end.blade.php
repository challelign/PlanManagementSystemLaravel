@extends('layouts.finance')
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
                    <h1 class="m-0 text-dark"> የተጠናቀቁ ፋይሎች /<small>እቅዶች ዝርዝር</small>


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
                            <h3 class="card-title">ሙሉ ለሙሉ ክፍያቸው የተጠናቀቀ </h3>

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


                            @if ($i = 0)@endif
                            @foreach($planlist as $plist)
                                @if($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 1 && $plist->check_by_finance == 1 )
                                    @if ($i ++) @endif
                                @endif
                            @endforeach
                            @if($i == 0)
                                <div class="card-header text-center">
                                    <h3 class="text-center text-info"> NO PLAN'S YET </h3>

                                </div>
                            @else
                                <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                       style="width:100%">
                                    <thead class="table-info">

                                    <th>Name</th>
                                    <th>መነሻ ቀን</th>
                                    <th>መመለሻ ቀን</th>
                                    <th>የስራርእስ</th>
                                    <th>ሂደት</th>

                                    <th>የአስተባባሪ ፊርማ</th>
                                    <th>የሂደት መሪ ፊርማ</th>
                                    <th>ፋየይናንስ ፊርማ</th>
                                    <th>አስተካክል</th>
                                    {{--                                    <th></th>--}}
                                    {{--                                    <th></th>--}}
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($donePayment as $plist)
                                        @if(($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 1
                                                 && $plist->check_by_finance == 1 ))
                                            {{--    && $plist->is_plan_complated == 1--}}
                                            <tr>
                                                <td>{{$plist->user->name}}</td>
                                                <td>{{$plist->startdate}}</td>
                                                <td>{{$plist->enddate}}</td>
                                                <td>{{$plist->title}}</td>
                                                <td>{{$plist->department->name}}</td>
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


                                                    <a href="{{route('list-details',$plist->id)}}"
                                                       class="btn btn-sm btn-info" style="width: 110px;">ሙሉውን እይ </a>

                                                </td>

                                                @if($plist->check_by_finance == 0)
                                                    <td>
                                                        <a href="{{route('first-payment', $plist->id)}}"
                                                           class="btn btn-sm btn-warning" style="width: 110px;">Payment
                                                        </a>
                                                    </td>
                                                @endif

                                                <td>
                                                    @if($plist->is_plan_complated == 1)

                                                        እቅዱ ተጠናቆ ክፍያ ተወራራዷል
                                                    @endif
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


{{--@section('js')--}}


