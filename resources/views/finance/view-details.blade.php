@extends('layouts.finance')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$plan->user->name}}
                        <small>እቅድ ከ {{$plan->user->department->name}}</small></h1>
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
    <div class="container">
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$plan->title}}</h3>
                </div>
                <div class="card-body">
                    {!! $plan->task !!}

                    <h4 class="text-primary">
                        <div id="agent_commission_model" class="table" border="1" width="50%">
                            {{--                            {{$plan->payment->total}}--}}
                            ጠቅላላ ቅድመ ክፍያ የተከፈለ ፡
                            @if($plan->payment_id == '')
                                ቅድመ ክፍያ :    አልተከፈለም ፡፡
                            @else
                                {{$plan->payment->total}}
                            @endif
                        </div>
                    </h4>

                </div>
                <div class="card-header">
                    <h3 class="card-title">
                        <h4 class="text-primary">ይህ እቅድ በ
                            <span class="font-italic">{{$plan->sign_name }}
                                  <h3>ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_image)}}"
                                                   class="align-content-center text-center"
                                                   style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></h3>
                                እና  {{$plan->sign_name_wana}}
                                  <h3>ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_wana_image)}}"
                                                   class="align-content-center text-center"
                                                   style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;">ተረጋግጧል ፡፡</h3>

<br>
                                  @if($plan->payment_id == '')
                                    ቅድመ ክፍያ :    አልተከፈለም ፡፡
                                @else
                                    ቅድመ ክፍያ በ : {{$plan->payment->approved_by}}
                                    <h3>ልዩ ፊርማ ፡<img src="{{asset($plan->payment->approved_by_image)}}"
                                                     class="align-content-center text-center"
                                                     style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"> ተከፍሏል ፡፡ </h3>
                                @endif


                            </span></h4>
                    </h3>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{route('finance')}}" class="btn btn-info btn-sm" style="width: 120px;">ወደ ዋናው ገጽ </a>
                    @if($plan->check_by_finance == 0)
                        <td>
                            <a href="{{route('first-payment', $plan->id)}}"
                               class="btn btn-sm btn-warning" style="width: 110px;">ክፍያ ፈጽም
                            </a>
                        </td>
                    @endif


                </div>


                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
@section('js')
    <script>
        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

        $(document).ready(function () {
            $("#agent_commission_model ").each(function () {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
        });
    </script>
@endsection
