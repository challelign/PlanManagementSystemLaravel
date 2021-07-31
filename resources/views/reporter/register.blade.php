@extends('layouts.reporter')

@section('content')


    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">

                    {{isset($plan) ? ' ውሎ አበልና ትራንስፖርት መጠየቂያ ቅጽ ማስተካል':" የመስክ የውሎ አበልና ትራንስፖርት መጠየቂያ "}}

                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('alert.errors')
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            {{isset($plan) ? ' ውሎ አበልና ትራንስፖርት መጠየቂያ ቅጽ ማስተካክል':" የመስክ : ውሎ አበልና ትራንስፖርት መጠየቂያ ቅጽ መመዝገብ"}}

                        </div>
                        <div class="card-body">

                            <form
                                action="{{ isset($plan) ? route('reporter.update',$plan->id) : route('reporter.store')}}"
                                method="POST">
                                @csrf
                                @if(isset($plan))
                                    @method('PUT')
                                @endif

                                {{--                                title--}}
                                <div class="form-group row">

                                    <label for="title"
                                           class="col-md-2 col-form-label text-md-right">የ ስ ራ ር እ ስ</label>
                                    <div class="col-md-8">
                                        <input id="title" type="text" placeholder="የ ስ ራ ር እ ስ"
                                               class="form-control @error('name') is-invalid @enderror" name="title"
                                               value="{{isset($plan) ? $plan->title:''}}" required autocomplete="title"
                                               autofocus>

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                                radio button--}}
                                {{--start date--}}
                                <div class="form-group row">
                                    <label for="startdate"
                                           class="col-md-2 col-form-label text-md-right">መነሻ ቀን</label>
                                    <div class="col-md-2">
                                        <input id="startdate" type="text"
                                               class="form-control @error('startdate') is-invalid @enderror"
                                               name="startdate" readonly
                                               value="{{isset($plan) ? $plan->startdate:''}}" required
                                               autocomplete="startdate"
                                               autofocus>
                                        @error('startdate')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    {{--end date--}}

                                    <label for="enddate"
                                           class="col-md-1 col-form-label ">መመለሻ ቀን</label>
                                    <div class="col-md-3">
                                        <input id="enddate" type="text"
                                               class="form-control @error('enddate') is-invalid @enderror"
                                               name="enddate" readonly
                                               value="{{isset($plan) ? $plan->enddate:''}}" required
                                               autocomplete="enddate" autofocus>

                                        @error('enddate')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <label for="nodate"
                                           class="col-md-1 col-form-label">የቀን ብዛት</label>
                                    <div class="col-md-1">
                                        <textarea class="form-control" name="nodate" readonly id='nodate'
                                                  style="height: 35px">{{isset($plan) ? $plan->nodate:''}}</textarea>

                                        {{--                                        <input id="nodate"--}}
                                        {{--                                               class="form-control  @error('nodate') is-invalid @enderror" min="1"--}}
                                        {{--                                               name="nodate" placeholder="ብዛት" readonly--}}
                                        {{--                                               value="{{isset($plan) ? $plan->nodate:''}}" required--}}
                                        {{--                                               autocomplete="nodate" autofocus>--}}

                                        {{--                                        @error('nodate')--}}
                                        {{--                                        <span class="invalid-feedback" role="alert">--}}
                                        {{--                                        <strong>{{ $message }}</strong>--}}
                                        {{--                                    </span>--}}
                                        {{--                                        @enderror--}}
                                    </div>
                                </div>

                                {{--                                የትራንስፖርት--}}
                                <div class="form-group row">
                                    <label for="transport"
                                           class="col-md-2 col-form-label text-md-right">የሚጠቀመው የትራንስፖርት ዓይነት </label>
                                    <div class="col-md-8">
                                        {{--                                        <span> Diff:</span> <span id='diff'> - </span> <span> Days</span>--}}
                                        <select class="form-control @error('transport_id') is-invalid @enderror"
                                                required
                                                name="transport_id">
                                            <option selected disabled>ይምረጡ</option>
                                            @foreach($transport as $trans)

                                                {{--                                                {{$trans->name}}--}}
                                                <option value="{{$trans->id}}"
                                                        @if(isset($plan))
                                                        @if($trans->id === $plan->transport_id)
                                                        selected
                                                    @endif
                                                    @endif >
                                                    {{$trans->name}}

                                                </option>
                                            @endforeach
                                        </select>

                                        @error('transport_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                    </div>
                                </div>


                                {{--pre_payment --}}
                                <div class="form-group row">
                                    <label for="pre_payment"
                                           class="col-md-2 col-form-label text-md-right">ቅድመ ክፍያ መውሰድ ትፈልጋለህ </label>
                                    <div class="col-md-8">
                                        {{--                                        <span> Diff:</span> <span id='diff'> - </span> <span> Days</span>--}}
                                        <select class="form-control @error('pre_payment') is-invalid @enderror"
                                                required
                                                name="pre_payment">
                                            <option selected disabled>ይምረጡ</option>

                                            <option value="0"
                                                    @if(isset($plan))
                                                    @if($plan->pre_payment === 0)
                                                    selected
                                                @endif
                                                @endif >
                                                ክፍያ አልፈልግም (-- NO --)
                                            </option>
                                            <option value="1"
                                                    @if(isset($plan))
                                                    @if($plan->pre_payment === 1)
                                                    selected
                                                @endif
                                                @endif >
                                                ቅድመ ክፍያ ይሰጠኝ (-- YES --)
                                            </option>
                                        </select>

                                        @error('pre_payment')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="task"> የእቅዱ ስራ ዝርዝር:</label>

                                    <div class="col-md-12">
                                    <textarea class="task form-control @error('plan') is-invalid @enderror"
                                              minlength="100" maxlength="1000"
                                              placeholder="Place some text here" name="task" style="width: 100%; height: 900px; font-size: 14px;
                                              border: 1px solid #dddddd; padding: 10px;" required>
                                        {{isset($plan) ? $plan->task:''}}</textarea>


                                        @error('task')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-2">
                                        <a href="{{route('plan')}}" type="submit" class="btn btn-info btn-sm">
                                            ተመለስ
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            ወደ ቅርብ ሀላፊ ላክ
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                {{--                <div class="col-12">--}}
                {{--                    <div class="col-md-12">--}}
                {{--                        <!-- general form elements disabled -->--}}
                {{--                        <div class="card card-warning">--}}
                {{--                            <div class="card-header">--}}
                {{--                                <h3 class="card-title">General Elements</h3>--}}
                {{--                            </div>--}}
                {{--                            <!-- /.card-header -->--}}
                {{--                            <div class="card-body">--}}


                {{--                                <form role="form" class="row form-group" method="post">--}}
                {{--                                    <div class="d-flex">--}}
                {{--                                        <div class="col-md-4">--}}
                {{--                                            <h4>መነሻ</h4>--}}
                {{--                                            <hr>--}}
                {{--                                            <div class="row">--}}
                {{--                                                <div class="col-md-6  form-group">--}}
                {{--                                                    <label>Text</label>--}}
                {{--                                                    <input type="text" class="form-control " placeholder="Enter ...">--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-6  form-group">--}}
                {{--                                                    <div class="co1-md-6">--}}
                {{--                                                        <label>Text</label>--}}
                {{--                                                        <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}


                {{--                                        </div>--}}

                {{--                                        <div class="col-md-6">--}}
                {{--                                            <h4>የደረሰበት ቦታ</h4>--}}

                {{--                                            <hr>--}}
                {{--                                            <div class="row">--}}
                {{--                                                <div class="col-md-4  ">--}}
                {{--                                                    <label>Text</label>--}}
                {{--                                                    <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    <label>Text</label>--}}
                {{--                                                    <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-4 ">--}}
                {{--                                                    <div class="co1-md-6">--}}
                {{--                                                        <label>Text</label>--}}
                {{--                                                        <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    </div>--}}
                {{--                                                    <div class="co1-md-4">--}}
                {{--                                                        <label>Text</label>--}}
                {{--                                                        <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-4 ">--}}
                {{--                                                    <div class="co1-md-4">--}}
                {{--                                                        <label>Text</label>--}}
                {{--                                                        <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    </div>--}}
                {{--                                                    <div class="co1-md-6">--}}
                {{--                                                        <label for="">Text</label>--}}
                {{--                                                        <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}


                {{--                                        </div>--}}


                {{--                                        <div class="col-md-2">--}}
                {{--                                            <p>የደረሰበት ቀን:ሰዓት</p>--}}
                {{--                                            <hr>--}}
                {{--                                            <div class="co1-md-12">--}}
                {{--                                                <label>Text</label>--}}
                {{--                                                <input type="text" class="form-control" placeholder="Enter ...">--}}
                {{--                                            </div>--}}

                {{--                                        </div>--}}

                {{--                                    </div>--}}


                {{--                                </form>--}}
                {{--                                <button type="submit" class="btn btn-primary btn-sm float-right">--}}
                {{--                                    Add--}}
                {{--                                </button>--}}
                {{--                            </div>--}}
                {{--                            <!-- /.card-body -->--}}
                {{--                        </div>--}}
                {{--                        <!-- /.card -->--}}

                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection
@section('js')
    <script>
        $(function () {
            // Summernote
            $('.task').summernote()
        })
        $('#configPicker').datepick({showTrigger: '#calImg'});
        $('#startdate').calendarsPicker({calendar: calendar, onSelect: showDate});
        $('#enddate').calendarsPicker({calendar: calendar, onSelect: showDate});
    </script>

    <script>
        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');
            $('#startdate').calendarsPicker({
                disableInput: true,
                calendar: calendar,
                dateFormat: "yyyy/mm/dd",
                minDate: 0,
                // miniDate:new Date(),
                // dateFormat: "mm-dd-yyyy",
                enableTime: true,
            });

        });
        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');
            $('#enddate').calendarsPicker({
                calendar: calendar,
                dateFormat: "yyyy/mm/dd",
                // dateFormat: "mm-dd-yyyy",
                minDate: 0,

                enableTime: true,
            });
        });

        // $('#startdate').datepick();
        // $('#enddate').datepick();
        $('#enddate').change(function () {


            var start = $('#startdate').val();
            var end = $('#enddate').val();
            console.log(start)
            var s_date = new Date(start);
            var e_date = new Date(end);

            var diffTime = Math.abs(s_date - e_date);
            console.log(diffTime)
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));


            // var calendar = $.calendars.instance('ethiopian', 'am');
            // var diff = $('#startdate').calendarsPicker("getDate") - $('#enddate').calendarsPicker("getDate");
            // var diff = $('#startdate').datepicker("getdate") - $('#enddate').datepicker("getDate");

            $('#nodate').text(diffDays);
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
