@extends('layouts.reporter')


@section('css')
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> የውሎ አበልና የትራንስፖርት ክፍያ ማወራረጃ  ማስተካከል <small></small></h1>
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('alert.errors')
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            የውሎ አበልና የትራንስፖርት ክፍያ ማወራረጃ
                        </div>
                        <div class="card-body table-responsive">
                            <form method="post" action="{{route('ekid-edit-save',$abelinfo->id)}}">
                                @csrf
{{--                                <input type="hidden" name="plan_id" id="plan_id" value="{{$ekidreport->plan->id}}">--}}
{{--                                <input type="hidden" name="payment_id" id="payment_id"--}}
{{--                                       value="{{$ekidreport->payment->id}}">--}}
                                <div class="form-group">
                                    <span id="result"></span>

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
                                        <tbody>
                                        <TD><label>{{$abelinfo->id}}</label></TD>
                                        <TD><input type="text" name="splace" required  class="splace" placeholder="ቦታ እስገብባ" value="{{$abelinfo->splace}}"></TD>

{{--                                        <TD><input type="text" required  name="sdate[]" value="{{$abelinfo->sdate}}"  class="sdate"></TD>--}}
                                        <TD><input type="text"  value="{{$abelinfo->sdate}}"    required value="2013-06-07T00:00"
                                                 max="2018-06-14T00:00"   name="sdate"   class="sdate" ></TD>


                                        <TD><input type="text" value="{{$abelinfo->dkplace}}"  name="dkplace" required placeholder="ቦታ"></TD>
                                        <TD><input type="number"  value="{{$abelinfo->dkbirr}}" value="0" readonly min="0" name="dkbirr" required placeholder="ብር" style="width: 70px"></TD>

                                        <TD><input type="text" value="{{$abelinfo->dmplace}}"  name="dmplace" required  placeholder="ቦታ"></TD>
                                        <TD> <input type="number"  value="{{$abelinfo->dmbirr}}" value="0" readonly  name="dmbirr" min="0" required placeholder="ብር" style="width: 70px"></TD>

                                        <TD><input type="text" value="{{$abelinfo->deplace}}"  name="deplace" required placeholder="ቦታ"></TD>
                                        <TD><input type="number" value="{{$abelinfo->debirr}}" value="0" readonly  min="0" name="debirr" required  placeholder="ብር" style="width: 70px"></TD>

                                        <TD><input type="text" value="{{$abelinfo->workddate}}"  required
                                                   max="2018-06-14T00:00" name="workddate" class="sdate"
                                             placeholder="ቀን"  ></TD>
                                        <TD><input type="text"  value="{{$abelinfo->adarplace}}" name="adarplace"  required placeholder="ቦታ"></TD>
                                        <TD><input type="number"  value="{{$abelinfo->adarbirr}}" value="0" readonly min="0" name="adarbirr" required  placeholder="ብር"
                                             style="width: 70px"></TD>


                                        </tbody>

                                    </table>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-2">
                                        <a href="{{route('ekid-report-list')}}" type="submit" class="btn btn-info btn-sm">
                                            ተመለስ
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-sm submit">አስተካክል</button>

                                        {{--                                        <button type="submit" name="save" id="save" class="btn btn-primary btn-sm">--}}
                                        {{--                                           --}}
                                        {{--                                        </button>--}}

                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>



    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>



@endsection
@section('js')

@endsection
