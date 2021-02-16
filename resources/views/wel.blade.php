<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AMMA PMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        /*    table*/

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            AMMA PMS
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


        <form action="" class="form-group form-control">
            <div class="col-md-6">
                <fieldset>
                    <legend>Personalia:</legend>
                    <label for="fname" class="form-control">First name:</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </fieldset>
            </div>
        </form>

        <div class="links">
            <a href="#">Login</a>



        </div>
    </div>
</div>
<div class="content">


    <form action="" class="form-control">
        <TABLE class="table-bordered table-responsive table-info" style="width: 100%">

            <TR>
                <TH rowspan="3">date</TH>
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
                <Td><input type="text" placeholder="Enter ..."></Td>

                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>


                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
                <TD><input type="text" placeholder="Enter ..."></TD>
            </TR>

            {{--                                            <TD>BDR</TD>--}}
            {{--                                            <TD>70</TD>--}}
            {{--                                            <TD>DMarkos</TD>--}}
            {{--                                            <TD>60</TD>--}}
            {{--                                            <TD>Gonder</TD>--}}
            {{--                                            <td>90</td>--}}

            {{--                                            <td>17/12/12</td>--}}
            {{--                                            <td>4:30</td>--}}

            {{--                                            <td>AA</td>--}}
            {{--                                            <td>200</td>--}}
        </TABLE>
    </form>
    <div class="title m-b-md">
        AMMA PMS
    </div>
</div>



<div class="links">
    <a href="#">Login</a>
    <script >
        $(document).ready(function(){
            $("button").click(function(){
                var number_of_rows = $('#rows').val();
                var number_of_cols = $('#cols').val();
                var table_body = '<table border="1">';
                for(var i=0;i<number_of_rows;i++){
                    table_body+='<tr>';
                    for(var j=0;j<number_of_cols;j++){
                        table_body +='<td>';
                        table_body +='Table data';
                        table_body +='</td>';
                    }
                    table_body+='</tr>';
                }
                table_body+='</table>';
                $('#tableDiv').html(table_body);
            });
        });
    </script>



    <div style="margin-top: 50px; margin-left: 250px">
        Number of Rows:<input type="text"  id="rows">
        Number of Coloumn: <input type="text" id="cols">
        <button>Create Table</button>
        <div id="tableDiv" style="margin-top: 40px">
            Table will gentare here.
        </div>
    </div>


</div>
<!-- jQuery -->
<script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset ('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset ('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset ('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset ('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset ('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset ('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset ('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset ('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset ('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset ('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('dist/js/demo.js')}}"></script>

<style>

    input{
        width: 100px;
        height: 20px;
    }
    table{
        border-spacing: 2px;
    }
    fieldset {
        border-radius: 2px;
        /*background-color: #f2f2f2;*/
        padding: 5px;
        width: 100%;
        border: 1px solid #451515;
        /*width: 450px;*/
        margin: auto;
    }
</style>




<script >
    $(document).ready(function(){
        $("button").click(function(){
            var number_of_rows = $('#rows').val();
            var number_of_cols = $('#cols').val();
            var table_body = '<table border="1">';
            for(var i=0;i<number_of_rows;i++){
                table_body+='<tr>';
                for(var j=0;j<number_of_cols;j++){
                    table_body +='<td>';
                    table_body +='Table data';
                    table_body +='</td>';
                }
                table_body+='</tr>';
            }
            table_body+='</table>';
            $('#tableDiv').html(table_body);
        });
    });
</script>
</body>
</html>
