@extends('layouts.finance')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">{{$plan->user->name}} <small>ቅድመ ክፍያ Step 2</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"> ቅድመ ክፍያ Step 2</div>
                        <div class="card-body">
                            <form action="" id="myform" method="post" action="{{route('payment-save-step1',$plan->id)}}">
                                @include('layouts.errors')
                                <input type="text" hidden name="plan_id" id="plan_id" value="{{$plan->id}}"
                                       class='form-control txtCal'/>

                                @csrf
                                <div class="col-md-12  row">
                                    <div class="col-md-6">
                                        <label>ቀን :</label>
                                        <div class="form-group "><input type="text" name="pdate" readonly required
                                                                        id="pdate"  value="{{{ $plan->pdate or '' }}}"

                                                                        class="form-control @error('pdate') is-invalid @enderror"
                                                                        autocomplete="pdate" autofocus/>
                                            @error('pdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 ">
                                        <label><span>ደረሰኝ ቁጥር :</span></label>
                                        <div class="form-group"><input type="text" value="{{{ $plan->voucher_no or '' }}}"
                                                                       name="voucher_no"
                                                                       class="form-control @error('voucher_no') is-invalid @enderror"
                                                                       required autocomplete="voucher_no" autofocus/>

                                            @error('voucher_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="" id="myTable">
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


