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
@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> የእቅዶች <small>ዝርዝር</small></h1>
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
                            የመስክ : ውሎ አበልና ትራንስፖርት መጠየቂያ ቅጽ

                        </div>
                        <div class="card-body">

                            <form action="{{route('ekid-knwm-save')}}" id="surveyForm"
                                  method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="ekid_on_list">በቅዱ ተይዘው የነበሩ ስራዎች*</label>
                                    <div class="col-md-12">
                                    <textarea
                                        class="ekid_on_list form-control @error('ekid_on_list') is-invalid @enderror"
                                        minlength="100"
                                        placeholder="Place some text here" name="ekid_on_list" style="width: 100%; height: 200px; font-size: 14px;
                                              border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                        @error('ekid_on_list')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ekid_on_list_done"> በቅዱ መሰረት የተከናዎኑ ስራዎች*</label>
                                    <div class="col-md-12">
                                    <textarea
                                        class="ekid_on_list_done form-control @error('ekid_on_list_done') is-invalid @enderror"
                                        minlength="50"
                                        placeholder="Place some text here" name="ekid_on_list_done" style="width: 100%; height: 200px; font-size: 14px;
                                              border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                        @error('ekid_on_list_done')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="ekid_ont_on_list_done"> ከእቅዱ ውጭ የተከናዎኑ ስራዎች*</label>
                                    <textarea class="form-control @error('ekid_ont_on_list_done') is-invalid @enderror"
                                              name="ekid_ont_on_list_done" id="ekid_ont_on_list_done" required
                                              minlength="50"
                                              rows="5" placeholder="Enter ..."></textarea>
                                    @error('ekid_ont_on_list_done')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="not_done_reason">ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች*</label>
                                    <textarea class="form-control @error('not_done_reason') is-invalid @enderror"
                                              name="not_done_reason" id="not_done_reason" rows="5" minlength="50"
                                              required placeholder="Enter ..."></textarea>
                                    @error('not_done_reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>ትራንስፖርት ክፍያ ማወራረጃ</label>

                                    <TABLE class="table-bordered table-responsive">
                                        <thead class="table-bordered table-primary text-center">
                                        <TR>
                                            <TH rowspan="3">NO</TH>
                                            <TH colspan="3" rowspan="2">መነሻ</TH>


                                            <TH colspan="6">የደረሰበት ቦታ</TH>

                                            <TH rowspan="3">የደረሰበት ቀን</TH>

                                            <TH rowspan="3">የደረሰበት ሰዓት</TH>

                                            <TH colspan="2" rowspan="2">ለስራ የታደረበት አገር/ቦታ/</TH>
                                        </TR>
                                        <TR>
                                            <TH colspan="2">ቁርስ</TH>
                                            <TH colspan="2">ምሳ</TH>
                                            <TH colspan="2">እራት</TH>

                                        </TR>
                                        <TR>

                                            <td>ቦታ</td>
                                            <td>ቀን</td>
                                            <td>ሰዓት</td>

                                            <td>ቦታ</td>
                                            <td>ብር</td>

                                            <td>ቦታ</td>
                                            <td>ብር</td>

                                            <td>ቦታ</td>
                                            <td>ብር</td>

                                            <td>ቦታ</td>
                                            <td>ብር</td>
                                        </TR>

                                        <TR>
                                        </thead>
                                        <tbody>
                                        <TD><label for="1"></label></TD>

                                        <TD><input type="text" name="splace[]" required placeholder="ቦታ እስገብባ"></TD>
                                        <TD><input type="text" name="sdate[]" id="sdate" required readonly
                                                   placeholder="ቀን"
                                                   style="width: 80px"></TD>
                                        {{--                                        <TD><input type="text" data-inputmask='"mask": "99:99"' required name="stime[]" data-mask  style="width: 70px"></TD>--}}
                                        <TD><input type="text" required name="stime[]" style="width: 70px"></TD>


                                        <TD><input type="text" name="dkplace[]" required placeholder="ቦታ"></TD>
                                        <TD><input type="number" min="0" name="dkbirr[]" required placeholder="ብር"
                                                   style="width: 70px"></TD>
                                        <TD><input type="text" name="dmplace[]" required placeholder="ቦታ"></TD>
                                        <TD><input type="number" min="0" name="dmbirr[]" required placeholder="ብር"
                                                   style="width: 70px"></TD>
                                        <TD><input type="text" name="deplace[]" required placeholder="ቦታ"></TD>
                                        <TD><input type="number" min="0" name="debirr[]" required placeholder="ብር"
                                                   style="width: 70px"></TD>


                                        <TD><input type="text" name="workddate[]" required
                                                   placeholder="ቀን" readonly id="workddate" style="width: 80px"></TD>
                                        <TD><input type="text" name="workdtime[]" required
                                                   placeholder="ሰዓት" style="width: 70px"></TD>
                                        <TD><input type="text" name="adarplace[]" required placeholder="ቦታ"></TD>
                                        <TD><input type="number" min="0" name="adarbirr[]" required placeholder="ብር"
                                                   style="width: 70px"></TD>
                                        <TD>
                                            <button id="add_button" class=" btn btn-primary btn-sm" type="button">
                                                <b class="font-size-30">+</b>
                                            </button>
                                        </TD>
                                        </TR>
                                        </tbody>

                                    </TABLE>

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

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@endsection



@section('js')

    <script>

        var countForm = 0;
        $(document).ready(function () {
            $('#add_button').on('click', function () {
                var html = '';
                html += '<tr>';
                html += '<TD><label for="1"  ></label></TD>';
                html += '<TD><input type="text" name="splace[]" required placeholder="ቦታ እስገብባ"></TD>';
                html += '<TD><input type="text" name="sdate[]" id="sdate" required  placeholder="ቀን" ' +
                    'style="width: 80px"></TD>';

                html += ' <TD><input type="text"  name="stime[]" required data-mask style="width: 70px"></TD>';

                html += '<TD><input type="text" name="dkplace[]" required placeholder="ቦታ"></TD>';
                html += '<TD><input type="number" min="0" name="dkbirr[]" required placeholder="ብር" ' +
                    'style="width: 70px"></TD>';

                html += '<TD><input type="text" name="dmplace[]" required placeholder="ቦታ"></TD>';
                html += '<TD> <input type="number" name="dmbirr[]" min="0" required placeholder="ብር" ' +
                    ' style="width: 70px"></TD>';

                html += '<TD><input type="text" name="deplace[]" required placeholder="ቦታ"></TD>';
                html += '<TD><input type="number" min="0" name="debirr[]" required placeholder="ብር" ' +
                    'style="width: 70px"></TD>';

                html += '<TD><input type="text" name="workddate[]" required id="workddate" ' +
                    ' placeholder="ቀን"   style="width: 80px"></TD>';
                html += '<TD><input type="text" name="workdtime[]" ' +
                    ' placeholder="ሰዓት" style="width: 70px"></TD>';

                html += '<TD><input type="text" name="adarplace[]" required placeholder="ቦታ"></TD>';
                html += '<TD><input type="number" min="0" name="adarbirr[]" required placeholder="ብር" ' +
                    ' style="width: 70px"></TD>';

                html += '<TD><button class="btn btn-sm btn-danger" id="remove" type="button">-</button> </TD>';

                html += '</tr>';
                $('tbody').append(html);
                countForm
            })

        });

        $(document).on('click', '#remove', function () {
            $(this).closest('tr').remove();


        })




        $('[data-mask]').inputmask()

        $('#configPicker').datepick({showTrigger: '#calImg'});

    </script>
    <script>
        // date in ethiopia
        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');

            $('#sdate').calendarsPicker({
                calendar: calendar,
                // dateFormat: "yyyy-mm-dd",
                enableTime: true,

            });
            $('#sdate').calendarsPicker({calendar: calendar, onSelect: showDate});
        });


        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');

            $('#workddate').calendarsPicker({
                calendar: calendar,
                // dateFormat: "yyyy-mm-dd",
                enableTime: true,

            });
            $('#workddate').calendarsPicker({calendar: calendar, onSelect: showDate});
        });
    </script>




    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

    <script src="{{asset('js/jquery.plugin.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>
@endsection
