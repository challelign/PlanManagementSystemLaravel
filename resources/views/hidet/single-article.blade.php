@extends('layouts.hidet')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$plan->user->name}}
                        <small>/ {{$plan->user->department->name}}</small></h1>
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

                </div>
                <div class="card-header">
                    <h3 class="card-title">
                        <h4 class="text-primary">ይሄ እቅድ በ
                            <span class="font-italic">{{$plan->sign_name }}  ፡ ተረጋግጧል
                                <h3>ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_image)}}"
                                                 class="align-content-center text-center"
                                                 style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></h3>
                                እና


                                @if(($plan->check_by_super_hidet == 0))
                                   በዋና እዘጋጅ  አልተፈረመበትም፡፡
                                @else
                                    {{$plan->sign_name_wana}} ተረጋግጧል ፡፡
                                    <h3>ልዩ ፊርማ ፡<img src="{{asset($plan->sign_name_wana_image)}}"
                                                     class="align-content-center text-center"
                                                     style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></h3>
                                @endif
 <br>
                                @if(($plan->check_by_finance == 0))
                                    ቅድመ ክፍያ አልተፈጸመም
                                    <br>

                                @else
                                    ቅድመ ክፍያ በ ፡  {{$plan->payment->approved_by}} ተከፍሏል ፡፡
                                @endif
                            </span>
                        </h4>
                    </h3>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{route('hidet-list-all')}}" class="btn btn-info btn-sm"> ወደ ዋናው ተመለስ </a>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
