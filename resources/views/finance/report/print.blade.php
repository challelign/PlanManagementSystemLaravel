<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="text/html;  content=" ie="edge">

{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}

    <title>{{$ekidreport->user->name}} </title>
    {{--    <title>{{$ekidreport->user->name}}</title>--}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>


        table.table th, table.table td {
            padding: 1px;
        }

        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 1px;
        }
    </style>
</head>
<body class="py-15 my-5">
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="col-md-12">
                    <div class="float-right" style="padding-left: 550px">Date: {{$ekidreport->datef}}</div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-1">
                        <img src="{{asset('img/ammalogo.png')}}" alt="" width="60px;">
                    </div>
                    <div class="col-md-10 ">
                        <h3 class="text-center"> በአማራ ብሄራዊ ክልላዊ መንግስት የብዙሃን መገናኛ ድርጅት የመስክ የውሎ አበልና ትራንስፖርት መጠየቂያና መፍቀጃ ቅጽ
                        </h3>
                    </div>
                    {{--                       <span--}}
                    {{--                           class="text-center py-5">  --}}
                    {{--                    </span>--}}
                </div>
{{--                <h2>--}}
{{--                    <img src="{{asset('img/ammalogo.png')}}" alt="" width="50px;" height="50px"><span--}}
{{--                        class="text-center py-6">--}}
{{--                        በአማራ ብሄራዊ ክልላዊ መንግስት የብዙሃን መገናኛ ድርጅት የመስክ የውሎ አበልና  ትራንስፖርት መጠየቂያና መፍቀጃ ቅጽ--}}
{{--                    </span>--}}
{{--                </h2>--}}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid py-10">
        <!-- Main content -->
        <div class="invoice p-10 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 text-dark text-center"> {{$ekidreport->user->name}}
                        <small class="text-center">ደርሰኝ {{$ekidreport->user->department->name}}</small>
                    </h4>
                </div>
                <hr>
            </div>
            <!-- info row -->


            <hr>
            <div class="card card-default">
                <div class="card-header p-0 m-0">
                    <h3 class="card-title text-center"> የውሎ አበልና የትራንስፖርት</h3>
                </div>
                {{--                <div class="card-body">--}}
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-responsive" id="editable">
                            <thead class="table-bordered table-primary text-center">
                            <tr>
                                <TH rowspan="3">ተ.ቁ</TH>
                                <TH colspan="2" rowspan="2">መነሻ( ዓዓዓዓ/ወወ/ቀን)</TH>


                                <TH colspan="6">የደረሰበት ቦታ</TH>

                                <TH rowspan="3">የደረሰበት ቀን እና ሰዓት</TH>

                                {{--                                            <TH rowspan="3">የደረሰበት ሰዓት</TH>--}}

                                <TH colspan="2" rowspan="2">ለስራ የታደረበት አገር/ቦታ</TH>

                                <TH colspan="6" rowspan="2">በፋይናንስ ሚሞላ</TH>
                            </TR>
                            <TR readonly>
                                <TH colspan="2">ቁርስ</TH>
                                <TH colspan="2">ምሳ</TH>
                                <TH colspan="2">እራት</TH>
                            </TR>
                            <TR>
                                <td>ቦታ</td>
                                <td>ቀን እና ሰዓት</td>
                                {{--                                            <td>ሰዓት</td>--}}
                                <td>ቦታ</td>
                                <td>ብር</td>

                                <td>ቦታ</td>
                                <td>ብር</td>

                                <td>ቦታ</td>
                                <td>ብር</td>

                                <td>ቦታ</td>
                                <td>ብር</td>

                                <td>ቀን ብዛት</td>
                                <td>ውሎ አበል</td>
                                <td>አልጋ</td>
                                <td>ት/ፖርት</td>
                                <td>ነዳጅናቅባት</td>
                                <td>ጠ/ወጪ</td>

                            </TR>
                            </thead>


                            @if ($i = 1)@endif
                            <tbody>
                            @foreach($abelinfo as $ab)
                                <tr>
                                    <Td>{{$i++}}</Td>
                                    {{--                                        <Td>{{$ab->id}}</Td>--}}
                                    <TD>{{$ab->splace}}</TD>
                                    <TD>{{$ab->sdate}}</TD>
                                    <TD>{{$ab->dkplace}}</TD>
                                    <TD>{{$ab->dkbirr}}</TD>
                                    <TD>{{$ab->dmplace}}</TD>
                                    <TD>{{$ab->dmbirr}}</TD>
                                    <TD>{{$ab->deplace}}</TD>
                                    <TD>{{$ab->debirr}}</TD>
                                    <TD>{{$ab->workddate}}</TD>
                                    <TD>{{$ab->adarplace}}</TD>
                                    <TD>{{$ab->adarbirr}}</TD>

                                    <TD>{{$ab->nodatef}}</TD>
                                    <TD>{{$ab->wuloabel_meten}}</TD>
                                    <TD>{{$ab->transport_birr}}</TD>
                                    <TD>{{$ab->nedaje_qibat}}</TD>
                                    <TD>{{$ab->alga}}</TD>
                                    <TD>{{$ab->total}}</TD>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <h3> ለ</h3>
                    <hr>
                    <address>
                        <strong>{{$ekidreport->user->name}}</strong><br>
                        ሂደት ፡{{$ekidreport->user->department->name}}<br>

                        @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                            ቅድመ ክፍያ የወሰድከው 0.00 ብር
                        @else
                            ቅድመ ክፍያ የወሰድከው :   {{$ekidreport->payment->total}}
                        @endif
                        <br>

{{--                        ቅድመ ክፍያ የወሰድከው {{$ekidreport->payment->total}} ብር--}}
                        ተቅላላ ለውሎ አበል የወጣ ድመር ብር : {{$ekidreport->abel_total}} ብር<br>
                        ደረሰኝ ቁጥር :{{$ekidreport->voucher_no}}<br>
                        ቀን : {{$ekidreport->datef}}<br>
{{--                        <b>Invoice #{{$ekidreport->voucher_no}}</b>--}}
                    </address>
                    <hr>
                </div>
                <div class="col-sm-4 invoice-col">
                    <h3>ከፋዩ ስም</h3>
                    <hr>
                    <address>
                        <strong>የፋይናን ባለሙያ ስምና ፊርማ ፡ {{$ekidreport->approved_by}} <br>
                            ልዩ ፊርማ ፡ <img src="{{asset($ekidreport->approved_by_image)}}"
                                class="align-content-center text-center"
                                style="width: 50px;  height: 50px;border:1px solid #f2f4f7;"></strong><br>
                    </address>
                    <hr>
                </div>
                <div class="col-sm-4 invoice-col">
                    <h3> እቅዱን ያረጋገጡት</h3>
                    <hr>
                    <address>
                        <strong>የምክትል ዋና አዘጋጅ ስምና ፊርማ  ፡{{$ekidreport->sign_name}}</strong> <br>
                        ልዩ ፊርማ ፡<img src="{{asset($ekidreport->sign_name_image)}}"
                                     class="align-content-center text-center"
                                     style="width: 50px;  height: 50px;border:1px solid #f2f4f7;"> <br>
                        <strong>የዋና አዘጋጅ ስምና ፊርማ ፡{{$ekidreport->sign_name_wana}} <br>
                            ልዩ ፊርማ ፡<img
                                src="{{asset($ekidreport->sign_name_image)}}"
                                class="align-content-center text-center"
                                style="width: 50px;  height: 50px;border:1px solid #f2f4f7;">
                        </strong>
                    </address>
                    <hr>
                </div>
            </div>
            <!-- /.row -->



        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
</body>
</html>
