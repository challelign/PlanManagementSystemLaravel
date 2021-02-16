@extends('layouts.admin')
@section('title')
    {{$ekidreport->user->department->name}}
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">የመስክና የከተማ እቅድ ክንውን ዝርዝር <small> በቅደም ተከተል ሪሴት አድርግ</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">ፋይናንስን ሪሴት አድርግ </h5>
                        </div>
                        <div class="card-body">
                            <b>{{$ekidreport->user->name}} - {{$ekidreport->department->name}}
                            </b>
                            <h4 class="card-text">የቀን ብዛት {{$ekidreport->nodate}} - ጠቅላላ ወጪ የተደረገ ብር
                                ፡ {{$ekidreport->abel_total}}</h4>
                            @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                                የስራርእስ: {{$ekidreport->title}}
                                <h4 class="card-text">ርእስ :{{$ekidreport->title}}</h4>
                            @else
                                <h4 class="card-text">ርእስ :{!! $ekidreport->plan->title !!}</h4>
                            @endif
                            @if($ekidreport->payment_id != 0)
                                <form action="{{route('reset-finance',$ekidreport->id)}}" method="post">
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

                            <b>{{$ekidreport->user->name}} - {{$ekidreport->department->name}}
                            </b>
                            <h4 class="card-text">የቀን ብዛት {{$ekidreport->nodate}} - ጠቅላላ ወጪ የተደረገ ብር
                                ፡ {{$ekidreport->abel_total}}</h4>
                            @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                                የስራርእስ: {{$ekidreport->title}}
                                <h4 class="card-text">ርእስ :{{$ekidreport->title}}</h4>
                            @else
                                <h4 class="card-text">ርእስ :{!! $ekidreport->plan->title !!}</h4>
                            @endif
                            @if($ekidreport->payment_id == 0 && $ekidreport->sign_name != null && $ekidreport->sign_name_wana != null)
                                <form action="{{route('reset-wana',$ekidreport->id)}}" method="post">
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
