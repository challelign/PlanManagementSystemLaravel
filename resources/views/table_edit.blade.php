@extends('layouts.finance')
@section('css')
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
@endsection
@section('content')
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

                        <TH rowspan="3">Action</TH>
{{--                        <TH colspan="6" rowspan="2">በፋይናንስ ሚሞላ</TH>--}}
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
                    </TR>
                    </thead>


                    {{--                    @if ($i = 0)@endif--}}

                    <tbody>
                    @foreach($data as $ab)
                        <tr>
                            <Td>{{$ab->id}}</Td>
                            <TD>{{$ab->splace}}</TD>
                            <TD>{{$ab->sdate}}</TD>
                            <TD>{{$ab->dkplace}}</TD>
                            <TD><input class="" value="{{$ab->dkbirr}}"/></TD>
                            <TD>{{$ab->dmplace}}</TD>
                            <TD>{{$ab->dmbirr}}</TD>
                            <TD>{{$ab->deplace}}</TD>
                            <TD>{{$ab->debirr}}</TD>
                            <TD>{{$ab->workddate}}</TD>
                            <TD>{{$ab->adarplace}}</TD>
                            <TD>{{$ab->adarbirr}}</TD>
                        </tr>


                    @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection


@section('js')

    {{--    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>--}}
    <script src="{{asset('js/tabledit.min.js')}}"></script>
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
@endsection
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


@section('js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $("input[name=_token]").val()
                }
            });
            $('#editable').Tabledit({
                {{--url:'{{ route('finance-report-approve-save', "$ekidreport->id") }}',--}}
                url: '{{ route("tabledit.action") }}',
                dataType: "json",
                columns: {
                    identifier: [0, 'id'],
                    editable: [
                        [1, 'splace'],
                        [2, 'dkplace'],
                        [3, 'dmbirr']
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
@section('js')
