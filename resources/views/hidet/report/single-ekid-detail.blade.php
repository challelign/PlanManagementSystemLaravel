@extends('layouts.hidet')


@section('css')
    <style>

    </style>

@endsection


@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-">
                    <h1 class="m-0 text-dark">
                        {{$ekidreport->user->name}}

                        የመስክና የከተማ እቅድ <small>


                            {{--                            የስራርእስ {!!$ekidreport->plan->title !!}--}}
                        </small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">   @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                            የስራርእስ: {{$ekidreport->title}}
                        @else
                            የስራርእስ:   {!! $ekidreport->plan->title !!}
                        @endif</h3>
                </div>
                <div class="card-header">
                    <h3 class="card-title">በእቅዱ ተይዘው የነበሩ ስራዎች <b> በ {{$ekidreport->nodate}}</b> ቀን  ውስጥ </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_on_list_done !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">በእቅዱ መሰረት የተከናዎኑ ስራዎች</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_on_list!!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">ከእቅዱ ውጭ የተከናዎኑ ስራዎች</h3>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_ont_on_list_done !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!! $ekidreport->not_done_reason !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"> የውሎ አበልና የትራንስፖርት</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped table-responsive" id="user_table">
                                <thead class="table-bordered table-primary text-center">
                                <tr>
                                    <TH rowspan="3">ተ፡ ቁ </TH>
                                    <TH colspan="2" rowspan="2">መነሻ</TH>


                                    <TH colspan="6">የደረሰበት ቦታ</TH>

                                    <TH rowspan="3">የደረሰበት ቀን እና ሰዓት</TH>

                                    {{--                                            <TH rowspan="3">የደረሰበት ሰዓት</TH>--}}

                                    <TH colspan="2" rowspan="2">ለስራ የታደረበት አገር/ቦታ/</TH>
                                </TR>
                                <TR>
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
                                </TR>
                                </thead>


                                @if ($i = 0)@endif
                                @foreach($abelinfo as $ab)
                                    {{--                                    @if(auth()->user()->id === $ab->user_id)--}}
                                    @if($ab->EkidReport->id === $ab->ekid_report_id)
                                        <tbody>
                                        @if ($i ++) @endif
                                        <Td>{{$i}}</Td>
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

                                        </tbody>


                                    @endif
                                    {{--                                    @endif--}}
                                @endforeach



                                {{--                                    <tfoot>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td colspan="2" align="right">&nbsp;</td>--}}

                                {{--                                    </tr>--}}
                                {{--                                    </tfoot>--}}
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="card-body">
                    <h3 class="card-title">



                        <h4 class="text-primary"> ይሄ እቅድ በ
                            <span class="font-italic">{{$ekidreport->sign_name }}
                                    <h3>ልዩ ፊርማ ፡<img src="{{asset($ekidreport->sign_name_image)}}"
                                                     class="align-content-center text-center"
                                                     style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;">  ተረጋግጧል :: </h3>
                            <br>
                                @if(($ekidreport->check_by_super_hidet == 0))
                                    ዋና አዘጋጅ አልተፈረመበትም  ፡    አልተረጋገጠም
                                @else
                                    {{$ekidreport->sign_name_wana}}
                                    <h3>ልዩ ፊርማ ፡<img src="{{asset($ekidreport->sign_name_wana_image)}}"
                                                     class="align-content-center text-center"
                                                     style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;">  ተረጋግጧል :: </h3>
                                @endif
                                <br>
                                @if(($ekidreport->check_by_finance == 0))
                                    ቅድመ ክፍያ አልተከፈለም
                                    <br>

                                @else
                                    {{--                                ቅድመ ክፍያ በ : {{$ekidreport->payment->approved_by}}--}}
                                    ቅድመ ክፍያ በ : {{$ekidreport->approved_by}}
                                    <h3>ልዩ ፊርማ ፡<img src="{{asset($ekidreport->sign_name_wana_image)}}"
                                                     class="align-content-center text-center"
                                                     style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;">  ተከፍሏል :: </h3> ::
                                @endif
                            </span>
                        </h4>
                    </h3>

                </div>
            </div>


            <a href="{{route('ekid-list-all')}}" type="submit" class="btn btn-info btn-sm">
                ተመለስ
            </a>
        </div>
    </div>
@endsection
