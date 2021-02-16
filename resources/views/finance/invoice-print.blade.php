@extends('layouts.finance')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$plan->user->name}}
                        <small>ደርሰኝ {{$plan->user->department->name}}</small>
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
        <div class="container">
            <!-- Main content -->

            <div class="invoice col-md-12 p-3 mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            በአማራ ብሄራዊ ክልላዊ መንግስት የብዙሃን መገናኛ ድርጅት
                            የመስክ የውሎ አበልና ትራንስፖርት ቅድመ ክፍያ
                            <small class="float-right">Date: {{$plan->payment->pdate}}
                                <hr>
                            </small>
                        </h4>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-md-2"></div>
                    {{--                    <div class="row">--}}
                    <div class="col-md-8">
                        <p class="lead">ቅድመ ክፍያ</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">ለውሎ አብል ብር :</th>
                                    <td>{{$plan->payment->wuloabel}}</td>

                                    <th>ለትራንስፐት ብር :</th>
                                    <td>{{$plan->payment->transport}}</td>
                                </tr>
                                <tr>
                                    <th>ለነዳጅና ለቅባት ብር :</th>
                                    <td>{{$plan->payment->nafta_oil}}</td>

                                    <th>ለመጠባብቂያ ብር:</th>
                                    <td>{{$plan->payment->metebabekiya}}</td>
                                </tr>
                                <tr>
                                    <th>ሌሎች ብር :</th>
                                    <td>{{$plan->payment->other}}</td>


                                    <th><h4>ድመር ብር : </h4></th>
                                    <td>
                                        <h4 style="border:1px solid #b7187a;">{{$plan->payment->total}}</h4>
                                    </td>
                                </tr>
                            </table>
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 invoice-col">
                    <hr>
                    <h3> ለ </h3>
                    <hr>
                    <address>
                        <strong>{{$plan->user->name}}</strong><br>
                        ሂደት ፡{{$plan->user->department->name}}<br>
                        ድመር ብር: {{$plan->payment->total}}<br>
                        ደረሰኝ ቁጥር :{{$plan->payment->voucher_no}}<br>
                        <b>ቀን : {{$plan->payment->pdate}}</b><br>
                    </address>
                </div>
                <div class="row form-group col-md-12">
                    <div class="co1-md-6 form-group">
                        <hr>
                        <h3> ከፋዩ ስም </h3>
                        <hr>
                        <address>
                            <strong>የፋይናን ባለሙያ ስምና ፊርማ ፡ {{$plan->payment->approved_by}} ፡ ልዩ ፊርማ ፡ <img
                                    src="{{asset($plan->payment->approved_by_image)}}"
                                    class="align-content-center text-center"
                                    style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong><br>
                        </address>
                        <hr>
                    </div>
                    <div class="col-md-1 align-content-center">
                        <div class="" style=" ;padding: 2px; border-left: 5px solid #93b8c1; height: 200px;"></div>

                    </div>
                    <div class="co1-md-6">
                        <hr>
                        <h3> እቅዱን ያረጋገጡት</h3>
                        <hr>
                        <address>
                            <strong>የምክትል ዋና አዘጋጅ ስምና ፊርማ ፡ {{$plan->sign_name}},
                                ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_image)}}"
                                             class="align-content-center text-center"
                                             style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong>
                            <br>
                            <strong>የዋና አዘጋጅ ስምና ፊርማ ፡{{$plan->sign_name_wana}} , ልዩ ፊርማ ፡<img
                                    src="{{asset($plan->sign_name_image)}}"
                                    class="align-content-center text-center"
                                    style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong>
                            <br>
                        </address>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <hr>
            <div class="row no-print">
                <div class="col-md-12">

                    <a href="{{route('pdf-echo', $plan->id)}}" target="_blank" class="btn btn-primary float-right"
                       style="margin-right: 5px;">
                        <i class="fas fa-download"></i>
                        ደረሰኝ ቁረጥ
                    </a>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </div>
@endsection
@section('js')

@endsection




