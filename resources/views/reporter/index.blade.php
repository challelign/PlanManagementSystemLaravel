@extends('layouts.reporter')

@section('css')
    <style>
        body {
            background: #F9F9F9;
        }

        .myaccordion {
            /*max-width: 500px;*/
            /*margin: 50px auto;*/
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
        }

        .myaccordion .card,
        .myaccordion .card:last-child .card-header {
            border: none;
        }

        .myaccordion .card-header {
            border-bottom-color: #EDEFF0;
            background: transparent;
        }

        .myaccordion .fa-stack {
            font-size: 25px;
        }

        .myaccordion .btn {
            width: 100%;
            font-weight: bold;
            color: #004987;
            padding: 0;
        }

        .myaccordion .btn-link:hover,
        .myaccordion .btn-link:focus {
            text-decoration: none;
        }

        .myaccordion li + li {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> መረጃ ከታች የተቀመጠውን መረጃ መሰረት አርገህ እቅድና ውሎ አበል ሪፖርት አርግ </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">መረጃ </h3>
                        </div>
                        <div class="card-body">
                            <div id="accordion" class="myaccordion">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button
                                            class="d-flex align-items-center justify-content-between btn btn-link"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne" style="font-size: 30px">
                                            > እቅድ ለመመዝገብ የሚከተሉትን ቅደም ተከተል ተጠቀም
                                            <span class="fa-stack fa-sm">
                                                    <i class="fas fa-circle fa-stack-2x"></i>
                                                    <i class="fas fa-minus fa-stack-1x fa-inverse"></i>
                                                  </span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="card-header" style="font-size: 20px">እቅድ ለመመዝገብ</div>
                                    <div class="card-body">
                                        <ol>
                                            <li>"እቅድ መዝግብ" ሚለውን ክሊክ ማድረግ</li>
                                            <li>ወይም "እቅዶች" ሚለውን ክሊክ በማረግ በስተቀኝ በኩል "እቅድ መዝግብ" ሚለውን ክሊክ ማድረግ</li>
                                            <li>ሁሉንም መረጃወች መሙላት</li>
                                            <li>ወደ ቅርብ ሀላፊ መላክ</li>
                                            <li>ማስተካክል ካስፈለገ "እቅዶች" ሚለውን ክሊክ በማድረግ</li>
                                            <li>ከዛ ከተዘረዘሩት ውስጥ በመምረጥ "EDIT" በማድረግ ማስተካከል ወይም "DELETE" በማድረግ እንደገና
                                                መመዝገብ
                                            </li>
                                            <li>ወደ ቅርብ ሀላፊው ተልኮ ከሆነ እና ከታየ "EDIT" ወይም "DELETE" በማድረግ አይቻልም</li>
                                            <li>ቅድመ ክፍያ ወስደህ ከሆን እቅድ መመዝገብ አትችልም ፤ የግድ ሂሳብ ማወራረድ አለብህ</li>


                                        </ol>
                                    </div>
                                </div>
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button
                                            class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo" style="font-size: 30px">
                                            > እቅድ ክንውን ለመመዝገብ የሚከተሉትን ቅደም ተከተል ተጠቀም
                                            <span class="fa-stack fa-2x">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                              </span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-header" style="font-size: 20px">እቅድ ክንውን ለመመዝገብ</div>
                                    <div class="card-body">
                                        <ol>

                                            <li>ቅድመ ክፍያ ወስደህ ከሆን ከእቅዶች ውስጥ ያላወራረድኸውን መርጠህ "ሂሳብ አወራርደው " ሚለውን ክሊክ ማድረግ እና
                                                ፍርሙን መሙላትቅ መሙላት
                                            </li>

                                            <li> እዳ ከለለብህ "እቅድ ክንውን መዝግብ" ሚለውን ክሊክ በማድረግ መሙላት</li>
                                            <li> ሁሉንም መረጃ መሙላት</li>
                                            <li> ሁሉንም መረጃ ከተሞላ በኋላ እቅድ "ክንውን" ሚለውን ክሊክ በማድረግ የተመዘገበውን
                                            እቅድ ክንውን በመምረጥ "ትራንስፖርት አበል መዝግብ" ሚለውን ክሊክ ማድረግ

                                            </li>
                                            <li>ትራንስፖርትና  አበል ሁሉንም መረጃ መሙላት</li>

                                        </ol>
                                    </div>
                                </div>

                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button
                                            class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                            data-toggle="collapse" data-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree" style="font-size: 30px">
                                            > ውሎ አበል ለመመዝገብ የሚከተሉትን ቅደም ተከተል ተጠቀም
                                            <span class="fa-stack fa-2x">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                              </span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordion">
                                    <div class="card-header" style="font-size: 20px"> ውሎ አበል ለመመዝገብ</div>

                                    <div class="card-body">
                                        <ol>
                                            <li>እቅድ ክንውን ከተመዘገበ በኋላ "ትራንስፖርት አበል መዝግብ" ሚለውን ክሊክ ማድረግ </li>
                                            <li>ከዛ ሁሉንም ፎርሞች መሙላት </li>
                                            <li>ወደ ቅርብ ኋላፊ መላክ </li>
                                            <li>ወይም እቅድ ክንውን ሚለውን ክሊክ በማድረግ </li>
                                            <li>"ትራንስፖርት አበል መዝግብ" ሚለውን ክሊክ ማድረግ </li>
                                            <li>ከዛ ሁሉንም ፎርሞች መሙላት </li>
                                            <li>ወደ ቅርብ ኋላፊ መላክ </li>
                                            <li>እቅድ ክንውን እና ትራንስፖርት አበል  ከተመዘገበ ፤ ለቅርብ ሀላፊ በመንገር ፋይናንስ ሂዶ ሂሳብ ማወራረድ /መቀበል፡፡  </li>
                                        </ol>
                                    </div>
                                </div>
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
            $(e.target)
                .prev()
                .find("i:last-child")
                .toggleClass("fa-minus fa-plus");
        });
    </script>


    <script src="{{asset('plugins/filterizr/jquery.filterizr.min.js')}} "></script>
@endsection
