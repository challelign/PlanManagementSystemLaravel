@extends('layouts.finance')
@section('title')
    {{$ekidreport->user->department->name}}
@endsection
@section('css')
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>--}}
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>--}}

    <style>
        .form-control {
            width: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">{{$ekidreport->user->name}}
                        <small>ክፍያ ፈጽም {{$ekidreport->user->department->name}}</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3>
                        @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                            የስራርእስ :   {{$ekidreport->title}}
                        @else
                            የስራርእስ :    {!! $ekidreport->plan->title !!}
                        @endif
                    </h3>
                </div>
                <div class="card-header">
                    <h3 class="card-title">
                        @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                            ይሄን ስራ ለመስራት የወሰደው ቅድመ ክፍያ ብር ፡ <b>የለም</b>
                        @else
                            ይሄን ስራ ለመስራት የተሰጠው  ቅድመ ክፍያ ብር ፡   <b>{{$ekidreport->payment->total}}</b> <b>ደረሰኝ ቁጥር
                                ፤ {{$ekidreport->payment->voucher_no}} </b>

                            {{--                            ይሄን ስራ ለመስራት የወሰደው ቅድመ ክፍያ ብር ፡   <b>{{$ekidreport->payment->total}}</b>--}}
                        @endif

                        @if($ekidreport->payment_id == null && $ekidreport->plan_id == null && $ekidreport->transport_id == null)
                            የተጠቀመው ትራንስፖርት ዓይነት :   {{$ekidreport->transport->name}}
                        @else
                            የተጠቀመው ትራንስፖርት ዓይነት  :   {{$ekidreport->transport->name}} በ  <b>{{$ekidreport->nodate}}</b> ውስጥ
                        @endif
                    </h3>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"> የውሎ አበልና የትራንስፖርት</h3>
                </div>
                @include('alert.errors')

                <div class="content-header">
                    <div class="card-body">
                        <div class="col-12">
                            @csrf
                            <table class="table table-bordered table-striped table-responsive" id="editable">
                                <thead class="table-bordered table-primary text-center">
                                <tr>
                                    <TH rowspan="3">NO</TH>
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
{{--                                        <Td>{{$i++}}</Td>--}}
                                        <Td>{{$ab->id}}</Td>
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


                                        {{--                                            <TD><input type="number" name="nodatef" min="0" required value="{{$ab->nodatef}}"--}}
                                        {{--                                                       style="width: 50px">--}}
                                        {{--                                            </TD>--}}
                                        {{--                                            <TD><input type="number" class="expenses" name="wuloabel_meten" min="0"--}}
                                        {{--                                                       required value="{{$ab->wuloabel_meten}}"--}}
                                        {{--                                                       style="width: 80px"></TD>--}}
                                        {{--                                            <TD><input type="number" class="expenses" name="transport_birr" min="0"--}}
                                        {{--                                                       required value="{{$ab->transport_birr}}"--}}
                                        {{--                                                       style="width: 80px"></TD>--}}
                                        {{--                                            <TD><input type="number" class="expenses" name="nedaje_qibat" min="0"--}}
                                        {{--                                                       required value="{{$ab->nedaje_qibat}}"--}}
                                        {{--                                                       style="width: 80px"></TD>--}}
                                        {{--                                            <TD><input type="number" class="expenses" value="" name="alga" min="0" required--}}
                                        {{--                                                       style="width: 80px"></TD>--}}
                                        {{--                                            <TD><input type="number" name="total[]" class="expenses_sum" min="0"--}}
                                        {{--                                                       required--}}
                                        {{--                                                       readonly style="width: 110px"></TD>--}}

                                    </tr>


                                @endforeach
                                </tbody>


                            </table>
                        </div>

                        <form action="{{route('finance-report-approve-save-final',$ekidreport->id)}}" method="post">
{{--                        <form action="" method="post">--}}
                            @csrf
                            <div class="row">
                                <div class="row col-md-12">
                                    <div class=" col-md-6 nopadding">
                                        <div class="col-md-12 col-md-offset-12 pull-right nopadding">
                                            <div class="col-md-12 pull-right nopadding">
                                                <div class="col-md-12 pull-right">
                                                    <div class="form-group">
                                                        <label>ቀን አስገባ ፡ </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">



                                                        <input class="form-control datef " id='datef' required
                                                           type='text' readonly
                                                           name="datef" style="width: 500px"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class=" row col-md-12 nopadding">
                                            <div class="col-md-12 pull-right nopadding">
                                                <div class="col-md-12 pull-right">
                                                    <div class="form-group">
                                                        <label>ደረሰኝ ቁጥር አስገባ : </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input class="voucher_no form-control" type='text' required
                                                           id='voucher_no'
                                                           name='voucher_no' style="width: 500px"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-12 nopadding">
                                            <div class="col-md-12 col-md-offset-12 pull-right nopadding">
                                                <div class="col-md-12 pull-right nopadding">
                                                    <div class="col-md-12 pull-right">
                                                        <div class="form-group">
                                                            <label>የውሎ አበልና የትራንስፖርት ጠቅላላ ወጪ(ጠ/ወጪ ተደምሮ) : </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input class="form-control subtotal " id='subtotal' required
                                                               type='number'
                                                               name="abel_total" style="width: 500px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 nopadding">
                                            <div class="col-md-12  nopadding">
                                                <div class="col-md-12 pull-right nopadding">
                                                    <div class="col-md-12 pull-right">
                                                        <div class="form-group">
                                                            <label> የወሰደው ቅድመ ክፍያ ብር :</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input class="form-control kidmekifya" type='text' readonly
                                                               name='kidmekifya' id="kidmekifya" style="width: 500px"
                                                               value="@if($ekidreport->payment_id == null && $ekidreport->plan_id == null){{trim(00.00)}}@else{{trim($ekidreport->payment->total)}}@endif"/>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-12 nopadding">
                                            <div class="col-md-12 col-md-offset-12 pull-right nopadding">
                                                <div class="col-md-12 pull-right nopadding">
                                                    <div class="col-md-12 pull-right">
                                                        <div class="form-group">
                                                            <label> ለመንግስት ተመላሽ ብር(የወሰደው ቅድመ ክፍያ ብር - የውሎ አበልና የትራንስፖርት
                                                                ጠቅላላ
                                                                ወጪ)
                                                                :</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input class="form-control tmelash" type='number'
                                                               pattern="^[^ ].+[^ ]$"
                                                               name='temelash' style="width: 500px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 nopadding">
                                            <div class="col-md-12 col-md-offset-12 pull-right nopadding">
                                                <div class="col-md-12 pull-right nopadding">
                                                    <div class="col-md-12 pull-right">
                                                        <div class="form-group">
                                                            <label>የተከፈለ ብር (የውሎ አበልና የትራንስፖርት ጠቅላላ ወጪ - የወሰደው ቅድመ ክፍያ
                                                                ብር): </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input class="form-control subtotal" type='number'
                                                               id='yetekefel'
                                                               name='yetekefel' style="width: 500px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('finance-ekid-report-list')}}" type="submit"
                                           class="btn btn-info btn-sm">
                                            ተመለስ
                                        </a>
                                        <button  class="btn btn-primary btn-sm submit">
{{--                                                onclick="handelDelete({{$ekidreport->id}})">--}}
                                            ክፍያ ፈጽም
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Modal -->

{{--                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"--}}
{{--                             aria-labelledby="deleteModalLabel"--}}
{{--                             aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <form action="" method="post" id="deleteTransportForm">--}}
{{--                                    @method('post')--}}
{{--                                    @csrf--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="deleteModalLabel">እርግጠኛ ነህ ሁሉንም አበል--}}
{{--                                                ሞልተሀል ..? </h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                    aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <p class="text-center text-bold">--}}
{{--                                                ተመልሰህ ማረጋግጥ ትችላልህ:--}}
{{--                                                <br>--}}
{{--                                                አንድ ጊዜ ከመዘገብህ በኋላ፣ ድጋሚ ማስተካክል አትችልም .?--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary"--}}
{{--                                                    data-dismiss="modal">--}}
{{--                                                ተመለስና አስተካክል--}}
{{--                                            </button>--}}
{{--                                            <button type="submit" class="btn btn-danger">እርግጠኛ ነኝ , መዝግብልኝ--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





@section('js')

    <script>

        $('#configPicker').datepick({showTrigger: '#calImg'});

    </script>


    <script>
        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');

            $('#datef').calendarsPicker({
                calendar: calendar,
                // showAnim:'drop',
                minDate:0,
                maxDate:0,
                keyboard:false,
                // maxDate:new Date()
            });
            $('#datef').calendarsPicker({calendar: calendar, onSelect: showDate});
        });

    </script>




    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

    {{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    <script src="{{asset('js/jquery.plugin.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>




    {{--    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>--}}
    <script src="{{asset('js/tabledit.min.js')}}"></script>
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
@endsection
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


@section('js')
    {{--    <script>--}}
    {{--        (function () {--}}
    {{--            $('form > div> input').keyup(function () {--}}

    {{--                var empty = false;--}}

    {{--                if ($()) {--}}
    {{--                    empty = true;--}}
    {{--                }--}}
    {{--            });--}}

    {{--            if (empty) {--}}
    {{--                $('#submit').attr('disable', 'disable');--}}
    {{--            } else {--}}
    {{--                $('#submit').removeAttr('disable');--}}
    {{--            }--}}


    {{--        }) ()--}}
    {{--    </script>--}}
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $("input[name=_token]").val()
                }
            });
            $('#editable').Tabledit({
                deleteButton: false,

                buttons: {
                    edit: {
                        class: 'btn btn-sm btn-info',
                        html: 'አስትካክል',
                        action: 'edit'
                    }
                },
                {{--url:'{{ route('finance-report-approve-save', "$ekidreport->id") }}',--}}
                {{--url: '{{ route('finance-report-approve-save', "$ab->id") }}',--}}
                url: '{{ route('finance-report-approve-save') }}',
                dataType: "json",
                columns: {
                    identifier: [0, 'id'],
                    // identifier: [0, 'id'],
                    editable: [
                        // [1, 'splace'],
                        // [2, 'sdate'],
                        // [3, 'dkplace'],
                        [4, 'dkbirr'],
                        // [5, 'dmplace'],
                        [6, 'dmbirr'],
                        // [7, 'deplace'],
                        [8, 'debirr'],
                        // [9, 'workddate'],
                        // [10, 'adarplace'],
                        [11, 'adarbirr'],
                        [12, 'nodatef'],
                        [13, 'wuloabel_meten'],
                        [14, 'transport_birr'],
                        [15, 'nedaje_qibat'],
                        [16, 'alga'],
                        [17, 'total'],
                    ]
                    // ]
                },
                restoreButton: false,
                onSuccess: function (data, textStatus, jqXHR) {
                    if (data.action == 'delete') {
                        $('#' + data.id).remove();
                    }
                }
            });


        });
    </script>
{{--    <script>--}}
    {{--        function handelDelete(id) {--}}
    {{--            // console.log('deleting .' + id);--}}

    {{--            var form = document.getElementById('deleteTransportForm');--}}
    {{--            // finance-report-approve-save-final--}}
    {{--            form.action = '/finance/report/' + id + '/finance-report-approve-final';--}}
    {{--            // console.log('deleting .' , form);--}}
    {{--            $('#deleteModal').modal('show')--}}
    {{--        }--}}
    {{--    </script>
    {{--   --}}
    {{--@section('js')--}}

    {{--@endsection--}}
