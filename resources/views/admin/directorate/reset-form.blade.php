@extends('layouts.admin')
@section('title')

    {{$plan->department->name}}
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">የእቅዶች ዝርዝር <small>በቅደም ተከተል ሪሴት አድርግ </small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">ፋይናንስን ሪሴት አድርግ </h5>
                        </div>
                        <div class="card-body">
                            <b>{{$plan->user->name}} - {{$plan->department->name}}
                            </b>
                            <h4 class="card-text">መነሻና መድረሻ ቀን {{$plan->startdate}} - {{$plan->enddate}}</h4>
                            <h4 class="card-text">ርእስ :{{$plan->title}}</h4>
                            @if($plan->payment_id != 0)
                                <form action="{{route('reset-finance',$plan->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <b> ፋይናንስን ሪሴት
                                        </b>
                                    </button>
                                </form>
                            @else
                                <button type="submit" class="btn btn-info disabled">
                                    <b> ፋይናንስን ሪሴት አድርገሀል
                                    </b>
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">ዋና አዘጋጅ እና ምክትል ዋና አዘጋጅ ሪሴት አድርግ</h5>
                        </div>
                        <div class="card-body">
                            <b>{{$plan->user->name}} - {{$plan->department->name}}
                            </b>
                            <h4 class="card-text">መነሻና መድረሻ ቀን {{$plan->startdate}} - {{$plan->enddate}}</h4>
                            <h4 class="card-text">ርእስ :{{$plan->title}}</h4>

                            @if($plan->payment_id == 0 && $plan->sign_name != null && $plan->sign_name_wana !=null)
                                <form action="{{route('reset-wana',$plan->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ">
                                        <b> ሪሴት አድርግ </b>
                                    </button>
                                </form>
                            @else
                                <button type="submit" class="disabled btn btn-info">
                                    <b> ዋና አዘጋጅ ሪሴት አድርገሀል</b>
                                </button>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
