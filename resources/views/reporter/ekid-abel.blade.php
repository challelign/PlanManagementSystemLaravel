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
    <script src="{{asset('css/datetimepicker.css')}}"></script>

@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> የውሎ አበልና የትራንስፖርት ክፍያ ማወራረጃ  <small>ቅጽ</small></h1>
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
                            የውሎ አበልና የትራንስፖርት መጠየቂያ
                        </div>
                       <div class="card-body table-responsive">
                            <form method="post" id="dynamic_form" action="javascript:void(0)"
                                {{--                                  action="{{route('ekid-abel-save')}}"--}}
                            >
                                @csrf

                                @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                                    <input type="hidden" name="plan_id" id="plan_id" value="0">
                                    <input type="hidden" name="payment_id" id="payment_id" value="0">
                                @else
                                    <input type="hidden" name="plan_id" id="plan_id" value="{{$ekidreport->plan->id}}">
                                    <input type="hidden" name="payment_id" id="payment_id"
                                           value="{{$ekidreport->payment->id}}">
                                @endif


{{--                                <input type="hidden" name="plan_id" id="plan_id" value="{{$ekidreport->plan->id}}">--}}
{{--                                <input type="hidden" name="payment_id" id="payment_id"--}}
{{--                                       value="{{$ekidreport->payment->id}}">--}}


                                <div class="form-group">
                                    <label>ትራንስፖርት ክፍያ ማወራረጃ</label>
                                    <span id="result"></span>

                                    <table class="table table-bordered table-striped table-responsive" id="user_table">
                                        <thead class="table-bordered table-primary text-center">
                                        <tr>
                                            <TH rowspan="3">NO</TH>
                                            <TH colspan="2" rowspan="2">መነሻ</TH>


                                            <TH colspan="3">የደረሰበት ቦታ</TH>

                                            <TH rowspan="3">የደረሰበት ቀን እና ሰዓት</TH>

                                            {{--                                            <TH rowspan="3">የደረሰበት ሰዓት</TH>--}}

                                            <TH rowspan="3">ለስራ የታደረበት አገር/ቦታ/</TH>
                                        </TR>
                                        <TR>
                                            <TH colspan="1">ቁርስ</TH>
                                            <TH colspan="1">ምሳ</TH>
                                            <TH colspan="1">እራት</TH>

                                        </TR>
                                        <TR>

                                            <td>ቦታ</td>
                                            <td>ቀን እና ሰዓት</td>
                                            {{--                                            <td>ሰዓት</td>--}}

                                            <td>ቦታ</td>
{{--                                            <td>ብር</td>--}}

                                            <td>ቦታ</td>
{{--                                            <td>ብር</td>--}}

                                            <td>ቦታ</td>
{{--                                            <td>ብር</td>--}}

{{--                                            <td>ቦታ</td>--}}
{{--                                            <td>ብር</td>--}}
                                        </TR>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                        {{--                                    <tfoot>--}}
                                        {{--                                    <tr>--}}
                                        {{--                                        <td colspan="2" align="right">&nbsp;</td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <input type="submit" name="save" id="save" class="btn btn-primary"--}}
                                        {{--                                                   value="Save"/>--}}
                                        {{--                                        </td>--}}
                                        {{--                                    </tr>--}}
                                        {{--                                    </tfoot>--}}
                                    </table>
                                </div>


                                {{--                                <input id="appt-time" type="time" name="appt"--}}
                                {{--                                       min="12:00" max="18:00" required>--}}

                                {{--                                <input id="appt-time" type="time" name="appt-time" required>--}}
                                {{--                                <div>--}}
                                {{--                                    <label for="date">Date</label>--}}
                                {{--                                    <input id="date" data-inputmask="'alias': 'date'" />--}}
                                {{--                                </div>--}}

                                {{--                                <span class="sr-only col-md-2">DATE:</span>--}}
                                {{--                                <input class="form-control col-md-3" data-inputmask-alias="mm/dd/yyyy"--}}
                                {{--                                       data-inputmask="'yearrange': { 'minyear': '1917', 'maxyear': '2016' }"--}}
                                {{--                                       data-val="true" data-val-required="Required" id="DATE" name="DATE"--}}
                                {{--                                       placeholder="mm/dd/yyyy" type="text" value="" />--}}




                                {{--                                <input type="date" name="begin"--}}
                                {{--                                       placeholder="dd-mm-yyyy" value=""--}}
                                {{--                                       min="2012-01-01" max="2020-12-31">--}}


                                {{--                                i user this--}}
                                {{--                                <input type="datetime-local" id="meeting-time"--}}
                                {{--                                       name="meeting-time" value=""--}}
                                {{--                                       min="2013-06-07T00:00" max="2018-06-14T00:00">--}}
                                {{--end this i use--}}
                                {{--                                <input id="date" data-inputmask="'alias': 'date'" />--}}


                                {{--                                <input type="time" id="appt" name="appt"--}}
                                {{--                                       min="09:00" max="18:00" required>--}}
                                {{--                                <input id="input" data-inputmask="'mask': '99/99/9999', 'placeholder': 'mm/dd/yyyy'" />--}}


                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-2">
                                        <a href="{{route('plan')}}" type="submit" class="btn btn-info btn-sm">
                                            ተመለስ
                                        </a>
                                        <input type="submit" name="save" id="save" class="btn btn-primary btn-sm submit"
                                               value=" ወደ ቅርብ ሀላፊ ላክ"/>

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

    <script>
        // window.count = 1;
        var count = 1;
        $(document).ready(function () {



            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                count++;
                html += '<TD><label for="1"  ></label></TD>';
                html += '<TD><input type="text" name="splace[]" required  class="splace" placeholder="ቦታ እስገብባ"></TD>';
                // '+count+'
                // html += '<TD><input type="text" required  name="sdate[]"  id="sdate '+count+'"  class="sdate"></TD>';
                html += '<TD><input type="datetime-local" required value="2013-01-07T00:00" min="2013-01-07T00:00" max="2018-01-14T00:00"   name="sdate[]"   class="sdate" required></TD>';

                // html += '<TD><input type="time" min="01:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}"  name="stime[]" id="date" data-inputmask="\'alias\': \'date\'"  class="stime" required  ' +
                //     'style="width: 80px"></TD>';

                // html += ' <TD><input type="text"  name="stime[]"  data-mask style="width: 70px"></TD>';

                html += '<TD><input type="text" name="dkplace[]" required placeholder="ቦታ"></TD>';
                // html += '<TD><input type="number" min="0" name="dkbirr[]" hidden value="0" readonly required placeholder="ብር" ' +
                //     'style="width: 70px"></TD>';

                html += '<TD><input type="text" name="dmplace[]" required  placeholder="ቦታ"></TD>';
                // html += '<TD> <input type="number" name="dmbirr[]" hidden value="0" readonly min="0" required placeholder="ብር" ' +
                //     ' style="width: 70px"></TD>';

                html += '<TD><input type="text" name="deplace[]" required placeholder="ቦታ"></TD>';
                // html += '<TD><input type="number" min="0" name="debirr[]" hidden value="0" readonly required  placeholder="ብር" ' +
                //     'style="width: 70px"></TD>';

                html += '<TD><input type="datetime-local" required value="2013-01-07T00:00" min="2013-01-07T00:00" max="2018-06-14T00:00" name="workddate[]" class="sdate"   ' +
                    ' placeholder="ቀን"  ></TD>';
                // html += '<TD><input type="text" name="workdtime[]" ' +
                //     ' placeholder="ሰዓት" style="width: 70px"></TD>';

                html += '<TD><input type="text" name="adarplace[]"  required placeholder="ቦታ"></TD>';
                // html += '<TD><input type="number" min="0" name="adarbirr[]" hidden value="0" readonly required  placeholder="ብር" ' +
                //     ' style="width: 70px"></TD>';

                if (number > 1) {
                    html += '<td><button type="button" name="remove" id=""  class="btn btn-danger remove btn-sm">-</button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success btn-sm">+</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route('ekid-abel-save', "$ekidreport->id") }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    // beforeSend: function () {
                    //     $('#save').attr('disabled', 'disabled');
                    // },
                    success: function (data) {
                        if (data.error) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<p>' + data.error[count] + '</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                        } else {
                            dynamic_field(1);

                            // dynamic_field.hide();
                            $('#result').html('<div class="alert alert-success">' + data.success +
                                '<a href="{{route('abel-info',$ekidreport->id)}}" type="button" class="btn btn-primary">View Summery</a>' +

                                '</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });


            // $('#configPicker').datepick({showTrigger: '#calImg'});

            // '+count+''
        });
        //
        // $( function() {
        //     $( '#sdate'+count+' ' ).datepicker();
        // } );

    </script>
    <script>
        /*jslint browser:true*/
        /*global jQuery, document*/

        // jQuery(document).ready(function () {
        //     jQuery('#sdate').datepicker();
        // });
    </script>
    <script>
        // +count+'
        // $(function () {
        //     for(var calendar = 0 ; calendar < count ; calendar++){
        //         // $val[$i]
        //         // {“dynamic”.$i} = $val[$i];
        //        var  calendar= $.calendars.instance('ethiopian', 'am');
        //         $('#sdate'+count+'').calendarsPicker({
        //             calendar: calendar,
        //             dateFormat: "yyyy/mm/dd",
        //             // dateFormat: "mm-dd-yyyy",
        //             minDate:0,
        //
        //             enableTime: true,
        //         });
        //     }
        //     $('#sdate'+count+'').calendarsPicker({calendar: calendar, onSelect: showDate});
        //
        // });
        jQuery(document).ready(function () {
            'use strict';

            // jQuery('#sdate').datetimepicker();
            // format:'d.m.Y H:i',
            // inline:true,
            // lang:'ru'

        });
    </script>
    <script>

    </script>

    <script src="{{asset('js/jquery.min.js')}}"></script>
{{--    <script src="{{asset('js/datetimepicker.full.js')}}"></script>--}}

    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

    <script src="{{asset('js/jquery.plugin.js')}}"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

{{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>



    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>



@endsection
@section('js')

@endsection
