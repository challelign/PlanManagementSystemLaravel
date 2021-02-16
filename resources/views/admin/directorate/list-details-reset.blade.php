@extends('layouts.admin')

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

                    <h4 class="text-primary">Total Payment:
                        @if($plan->payment_id == '')
                            No payment done
                    @else
                        {{$plan->payment->total}}
                    @endif
                </div>
                <div class="card-header">
                    <h3 class="card-title">
                        <h4 class="text-primary">ይህ እቅድ በ
                            <span class="font-italic">{{$plan->sign_name }} እና  {{$plan->sign_name_wana}} ተረጋግጧል ፡፡
<br>
                                  @if($plan->payment_id == '')
                                    ቅድመ ክፍያ :    አልተከፈለም ፡፡
                                @else

                                    ቅድመ ክፍያ : {{$plan->payment->approved_by}}
                                @endif


                            </span></h4>
                    </h3>

                </div>
                <!-- /.card-body -->



                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
