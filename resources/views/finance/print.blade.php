<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <title>{{$plan->user->name}}</title>--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body class="py-15 my-5">
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="col-md-12">
                    <div class="float-right" style="padding-left: 550px">Date: {{$plan->payment->pdate}}</div>
                </div>
                {{--                <h2>--}}
                <div class="col-md-12 row">
                    <div class="col-md-1">
                        <img src="{{asset('img/ammalogo.png')}}" alt="" width="60px;">
                    </div>
                    <div class="col-md-10 ">
                        <h3 class="text-center"> በአማራ ብሄራዊ ክልላዊ መንግስት የብዙሃን መገናኛ ድርጅት የመስክ የውሎ አበልና ትራንስፖርት መጠየቂያና መፍቀጃ ቅጽ

                        </h3></div>

                    {{--                       <span--}}
                    {{--                           class="text-center py-5">  --}}
                    {{--                    </span>--}}
                </div>
                {{--                </h2>--}}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Main content -->


        <div class="invoice col-md-12 p-3 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="m-0 text-dark text-center"> {{$plan->user->name}}
                        <small class="text-center">ደርሰኝ {{$plan->user->department->name}}</small>
                        <hr>
                    </h3>
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
                <h5> ለ </h5>
                <hr>
              <h6>
                  <address class="font-size-40">
                      <strong>{{$plan->user->name}}</strong><br>
                      ሂደት ፡{{$plan->user->department->name}}<br>
                      ድመር ብር: {{$plan->payment->total}}<br>
                      ደረሰኝ ቁጥር :{{$plan->payment->voucher_no}}<br>
                      <b>ቀን : {{$plan->payment->pdate}}</b><br>
                  </address>
              </h6>
            </div>
            <div class="row form-group col-md-12">
                <div class="co1-md-6 form-group">
                    <hr>
                    <h5> ከፋዩ ስም </h5>
{{--                    <h7>--}}
                        <hr>
                        <address>
                            <strong>የፋይናን ባለሙያ ስምና ፊርማ ፡ {{$plan->payment->approved_by}} ፡ ልዩ ፊርማ ፡ <img
                                    src="{{asset($plan->payment->approved_by_image)}}"
                                    class="align-content-center text-center"
                                    style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong><br>
                        </address>
{{--                    </h7>--}}
                    <hr>
                </div>
                <div class="col-md-1 align-content-center">
                    <div class="" style="border-left: 5px solid #93b8c1; height: 200px;"></div>
                </div>
                <div class="co1-md-6">
                    <hr>
                    <h5> እቅዱን ያረጋገጡት</h5>
                    <hr>
{{--                   <h6>--}}
                       <address>
                           <strong>የምክትል ዋና አዘጋጅ ስምና ፊርማ ፡ {{$plan->sign_name}},
                               ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_image)}}"
                                            class="align-content-center text-center"
                                            style="width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong>
                           <br>
                           <strong>የዋና አዘጋጅ ስምና ፊርማ ፡{{$plan->sign_name_wana}} , ልዩ ፊርማ ፡<img
                                   src="{{asset($plan->sign_name_image)}}"
                                   class="align-content-center text-center"
                                   style="width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong>
                           <br>
                       </address>
{{--                   </h6>--}}
                </div>
            </div>
            <!-- /.col -->
        </div>




{{--        <div class="invoice p-3 mb-3">--}}
{{--            <!-- title row -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h4 class="m-0 text-dark text-center"> {{$plan->user->name}}--}}
{{--                        <small class="text-center">ደርሰኝ {{$plan->user->department->name}}</small>--}}
{{--                    </h4>--}}
{{--                </div>--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--            <div class="row invoice-info">--}}
{{--                <div class="col-sm-6 invoice-col">--}}
{{--                    <h3>ከፋዩ ስም</h3>--}}
{{--                    <hr>--}}
{{--                    <address>--}}
{{--                        --}}{{--                        <strong>{{Auth::user()->name}}</strong><br>--}}
{{--                        <strong>{{$plan->payment->approved_by}}</strong><br>--}}
{{--                        {{Auth::user()->department->name}}--}}
{{--                    </address>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--                <div class="col-sm-6 invoice-col">--}}
{{--                    <h3> ለ</h3>--}}
{{--                    <hr>--}}
{{--                    <address>--}}
{{--                        <strong>{{$plan->user->name}}</strong><br>--}}
{{--                        ሂደት ፡{{$plan->user->department->name}}<br>--}}
{{--                        ድመር ብር : {{$plan->payment->total}} ብር<br>--}}
{{--                       <b> ደረሰኝ ቁጥር :{{$plan->payment->voucher_no}}<br></b>--}}
{{--                        ቀን : {{$plan->payment->pdate}}<br>--}}
{{--                        <b>Invoice #{{$plan->payment->voucher_no}}</b>--}}
{{--                    </address>--}}
{{--                    <hr>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-sm-6 invoice-col">--}}
{{--                <h3> እቅዱን ያረጋገጡት</h3>--}}
{{--                <hr>--}}
{{--                <address>--}}
{{--                    <strong>{{$plan->sign_name}}</strong> : ምክትል ዋና አዘጋጅ<br>--}}
{{--                    <strong>{{$plan->sign_name_wana}}</strong> :ዋና አዘጋጅ--}}
{{--                </address>--}}
{{--                <hr>--}}
{{--                <!-- /.col -->--}}

{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--            <div class="col-md-6">--}}
{{--                <b class="lead text-center">ቅድመ ክፍያ</b>--}}

{{--                <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <tr>--}}
{{--                            <th style="width:50%">ለውሎ አብል ብር :</th>--}}
{{--                            <td>{{$plan->payment->wuloabel}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ለትራንስፐት ብር :</th>--}}
{{--                            <td>{{$plan->payment->transport}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ለነዳጅና ለቅባት ብር :</th>--}}
{{--                            <td>{{$plan->payment->nafta_oil}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ለመጠባብቂያ ብር:</th>--}}
{{--                            <td>{{$plan->payment->metebabekiya}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ሌሎች ብር :</th>--}}
{{--                            <td>{{$plan->payment->other}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ድመር ብር :</th>--}}
{{--                            <td>{{$plan->payment->total}}</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        --}}



    </div>
</div>
</body>
</html>
