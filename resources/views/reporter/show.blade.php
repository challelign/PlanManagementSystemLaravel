@extends('layouts.reporter')


@section('css')
    <style>

    </style>

@endsection


@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-">
                    <h1 class="m-0 text-dark">የመስክና የከተማ እቅድ <small>
                            የስራርእስ: {{$plan->title}}
                        </small></h1>
                    <hr>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="card card-default">
                <div class="card-header">
                    <h2>የስራ ዝርዝር</h2>
                </div>
                <div class="card-header">
                    <h3 class="card-title">መነሻ {{$plan->startdate }} እስክ {{$plan->enddate}} ለ {{$plan->nodate}} ቀን </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$plan->task !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <a href="{{route('plan')}}" type="submit" class="btn btn-info btn-sm">
                ተመለስ
            </a>
        </div>
    </div>
@endsection

