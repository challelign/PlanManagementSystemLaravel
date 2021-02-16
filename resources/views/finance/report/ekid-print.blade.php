@extends('layouts.finance')
@section('css')

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$ekidreport->user->name}}
                        <small>ደርሰኝ {{$ekidreport->user->department->name}}</small>
                    </h1>
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
    <div class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <h3>ከፋዩ ስም</h3>
                        <hr>
                        <address>
                            <strong>{{$ekidreport->approved_by}}</strong><br>
                            {{Auth::user()->department->name}}
                        </address>
                        <hr>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <h3> ለ</h3>
                        <hr>
                        <address>
                            <strong>{{$ekidreport->user->name}}</strong><br>
                            ሂደት ፡{{$ekidreport->user->department->name}}<br>
                            @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                                ቅድመ ክፍያ የወሰድከው  0.00
                            @else
                                ቅድመ ክፍያ የወሰድከው {{$ekidreport->payment->total}} ብር
                            @endif
                            <br>
                            ውሎ አበል ድመር ብር : {{$ekidreport->abel_total}} ብር<br>
                            ተወራርዶ የተከፈለ ብር : {{$ekidreport->yetekefel}} ብር<br>
                            ደረሰኝ ቁጥር :{{$ekidreport->voucher_no}}<br>
                            ቀን : {{$ekidreport->datef}}<br>
{{--                            <b>Invoice #{{$ekidreport->voucher_no}}</b>--}}
                        </address>
                        <hr>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <h3>እቅዱን ያረጋገጡት</h3>
                        <hr>
                        <address>
                            <strong>{{$ekidreport->sign_name}}</strong> , ምክትል ዋና አዘጋጅ<br>
                            <strong>{{$ekidreport->sign_name_wana}}</strong> , ዋና አዘጋጅ
                        </address>
                        <hr>
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->


                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"> የውሎ አበልና የትራንስፖርት</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

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
                                            <Td>{{$i++}}</Td>
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
                                        </tr>


                                    @endforeach
                                    </tbody>


                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

            </div>
        </div>
        <div class="row no-print">
            <div class="col-md-12">

                <a href="{{route('final-print', $ekidreport->id)}}" target="_blank"  class="btn btn-primary btnprn float-right"
                   style="margin-right: 5px;">
                    <i class="fas fa-download"></i>
                    ደረሰኝ ቁረጥ
                </a>
            </div>
        </div>
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection



@section('js')


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{--    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>




@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTableAdmin').DataTable();


            $(".btnprn").printPage({
                attr: "href",
                message:"Your document is being created"
            })
        });


    </script>



@section('js')
