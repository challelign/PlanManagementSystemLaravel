@extends('layouts.finance')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">{{$plan->user->name}} <small>ቅድመ ክፍያ Step 1</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"> ቅድመ ክፍያ step 1</div>
                        <div class="card-body">
                            <form action="" id="myform" method="post" action="{{route('payment-save-step1',$plan->id)}}">
                                @include('layouts.errors')
                                <input type="text" hidden name="plan_id" id="plan_id" value="{{$plan->id}}"
                                       class='form-control txtCal'/>

                                @csrf
{{--                                <div class="col-md-12  row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label>ቀን :</label>--}}
{{--                                        <div class="form-group "><input type="text" name="pdate" readonly required--}}
{{--                                                                        id="pdate"--}}

{{--                                                                        class="form-control @error('pdate') is-invalid @enderror"--}}
{{--                                                                        autocomplete="pdate" autofocus/>--}}
{{--                                            @error('pdate')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="col-md-6 ">--}}
{{--                                        <label><span>ደረሰኝ ቁጥር :</span></label>--}}
{{--                                        <div class="form-group"><input type="text"--}}
{{--                                                                       name="voucher_no"--}}
{{--                                                                       class="form-control @error('voucher_no') is-invalid @enderror"--}}
{{--                                                                       required autocomplete="voucher_no" autofocus/>--}}

{{--                                            @error('voucher_no')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="" id="myTable">
                                    <div class="col-md-12  row">
                                        <div class="col-md-6">
                                            <label>ለውሎ አብል ብር :</label>
                                            <div class="form-group "><input id="wuloabel" name="wuloabel"
                                            value="{{{ $plan->wuloabel or '' }}}"    class="txtCal form-control @error('wuloabel') is-invalid @enderror"
                                                                            required autocomplete="wuloabel" autofocus/>
                                                @error('wuloabel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6 ">
                                            <label><span>ለትራንስፐት ብር :</span></label>
                                            <div class=" form-group"><input type="text" value="{{{ $plan->transport or '' }}}"
                                                                            name="transport"
                                                                            class="txtCal form-control @error('transport') is-invalid @enderror"
                                                                            required autocomplete="transport"
                                                                            autofocus/>
                                                @error('transport')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12  row">

                                        <div class="col-md-6">
                                            <label><span>ለነዳጅና ለቅባት ብ</span></label>
                                            <div class="form-group"><input type="text" name="nafta_oil" value="{{{ $plan->nafta_oil or '' }}}"
                                                                           class="txtCal form-control @error('nafta_oil') is-invalid @enderror"
                                                                           required autocomplete="nafta_oil" autofocus/>
                                                @error('nafta_oil')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label><span>ለመጠባብቂያ ብር :</span></label>
                                            <div class="form-group"><input type="text" min="0" name="metebabekiya"
                                                                           value="{{{ $plan->metebabekiya or '' }}}"
                                                                           class="txtCal form-control @error('metebabekiya') is-invalid @enderror"
                                                                           required autocomplete="metebabekiya"
                                                                           autofocus/>
                                                @error('metebabekiya')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group row">

                                        <div class="col-md-6 form-group">
                                            <table><span>ሌሎች ብር</span></table>
                                            <div class="form-group"><input type="text" name="other" step =".01"  value="{{{ $plan->other or '' }}}"
                                                                           class="txtCal form-control @error('other') is-invalid @enderror"
                                                                           required autocomplete="other" autofocus/>
                                                @error('other')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label><span>ድመር ብር :</span></label>

                                            <textarea readonly class='form-control'  step =".01" name="total"
                                                      id="total_sum_value"> {{{ $plan->total or '' }}}</textarea>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4 offset-md-2">
                                            <a href="{{route('finance')}}" class="btn btn-info">ተመለስ</a>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('ክፍያ መዝግብ') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
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

            $('#pdate').calendarsPicker({
                calendar: calendar,
// dateFormat: "yyyy-mm-dd",
// enableTime: true,

            });
            $('#pdate').calendarsPicker({calendar: calendar, onSelect: showDate});
        });


        // <script>
        $(document).ready(function () {

            $("#myTable").on('input', '.txtCal', function () {
                var calculated_total_sum = 0.00;

                $("#myTable .txtCal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }
                });
                $("#total_sum_value").html(calculated_total_sum);
            });
        });


        $(document).ready(function () {

            $("#sumOf").on('input', '.txtCal', function () {
                var calculated_total_sum = 0.00;

                $("#myTable .txtCal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }
                });
                $("#total").html(calculated_total_sum);
            });
        });


        {{--    </script>--}}

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


    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
        }

    </style>
@endsection


@section('js')


@endsection


