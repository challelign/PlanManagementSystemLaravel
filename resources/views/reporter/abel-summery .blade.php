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
                        <form action="" class="form-group form-control">
                            <TABLE border="1" class="table-bordered form-control">
                                <CAPTION><EM>A test table with merged cells</EM></CAPTION>
                                <TR>
                                    <TH rowspan="3">date</TH>
                                    <TH colspan="3" rowspan="2">መነሻ</TH>


                                    <TH colspan="6">የደረሰበት ቦታ</TH>

                                    <TH rowspan="3">የደረሰበት ቀን</TH>

                                    <TH rowspan="3">የደረሰበት ሰዓት</TH>

                                    <TH colspan="2" rowspan="2">ለስራ የታደረበት አገር/ቦታ/</TH>
                                <TR>
                                    <TH colspan="2">ቁርስ</TH>
                                    <TH colspan="2">ምሳ</TH>
                                    <TH colspan="2">እራት</TH>



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

                                <TR>
                                    <Td>12/10/12</Td>

                                    <TD>BDR1</TD>
                                    <TD>10/12/20</TD>
                                    <TD>8:30</TD>


                                    <TD>BDR</TD>
                                    <TD>70</TD>
                                    <TD>DMarkos</TD>
                                    <TD>60</TD>
                                    <TD>Gonder</TD>
                                    <td>90</td>

                                    <td>17/12/12</td>
                                    <td>4:30</td>

                                    <td>AA</td>
                                    <td>200</td>
                            </TABLE>
                        </form>




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
