@extends('layouts.admin')

@section('title')
    {{$ekidreport->user->department->name}}
@endsection
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
                    <h3 class="card-title">በእቅዱ ተይዘው የነበሩ ስራዎች <b> በ {{$ekidreport->nodate}}</b>  ቀን ውስጥ </h3>
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="card-header">
                <h3 class="card-title">
                    <h4 class="text-primary">This Plan is Aproved by
                        <span class="font-italic">{{$ekidreport->sign_name }}  and


                                @if(($ekidreport->check_by_super_hidet == 0))
                                Wana Azegaji   Alteferemebetm
                            @else
                                {{$ekidreport->sign_name_wana}}
                            @endif
 <br>
                                @if(($ekidreport->check_by_finance == 0))
                                Kifiyal slaltesera Alteferemebetm
                                <br>

                            @else
                                Kifiya by  {{$ekidreport->approved_by}}
{{--                                Kifiya by  {{$ekidreport->payment->approved_by}}--}}
                            @endif
                            </span>
                    </h4>
                </h3>

            </div>
{{--            {{$ekidreport->user->department->name}}--}}

            <a href="{{route('admin.directorate-ekid-report-reset',$ekidreport->user->department->id)}}" type="submit" class="btn btn-info btn-sm">
                ተመለስ
            </a>
        </div>
    </div>
@endsection
