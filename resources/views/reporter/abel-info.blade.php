@extends('layouts.reporter')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> የውሎ አበልና የትራንስፖርት ክፍያ ማወራረጃ <small>ቅጽ</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('alert.errors')
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            የውሎ አበልና የትራንስፖርት ክፍያ ማወራረጃ
                        </div>
                        <div class="card-body table-responsive p-0">
                            <form method="post" id="dynamic_form">
                                <div class="form-group">
                                    <table class="table table-bordered table-striped table-responsive" id="user_table">
                                        <thead class="table-bordered table-primary text-center">
                                        <tr>
                                            <TH rowspan="3">NO</TH>
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
                                            @if(auth()->user()->id === $ab->user_id)
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

                                                    <td>
                                                        <a href="{{route('abel-edit',$ab->id)}}" name="save" id="save"
                                                           class="btn btn-primary btn-sm">Edit</a>
                                                    </td>
                                                    </tbody>


                                                @endif
                                            @endif
                                        @endforeach



                                        {{--                                    <tfoot>--}}
                                        {{--                                    <tr>--}}
                                        {{--                                        <td colspan="2" align="right">&nbsp;</td>--}}

                                        {{--                                    </tr>--}}
                                        {{--                                    </tfoot>--}}
                                    </table>
                                    <a href="{{route('ekid-report-list')}}" name="save" id="save"
                                       class="btn btn-info btn-sm">ወደ እቅድ ክንውን ተመለስ</a>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

    <script src="{{asset('js/jquery.plugin.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>
@endsection
