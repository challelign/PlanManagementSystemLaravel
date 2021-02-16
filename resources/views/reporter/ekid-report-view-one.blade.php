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

                            @if($ekidreport->payment_id == null && $ekidreport->plan_id == null)
                                የስራርእስ: {{$ekidreport->title}}
                            @else
                                የስራርእስ:   {!! $ekidreport->plan->title !!}
                            @endif

{{--                            የስራርእስ {!!$ekidreport->plan->title !!}--}}
                        </small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">በእቅዱ ተይዘው የነበሩ ስራዎች</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_on_list!!}

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">በእቅዱ መሰረት የተከናዎኑ ስራዎች</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_on_list_done !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">ከእቅዱ ውጭ የተከናዎኑ ስራዎች</h3>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!!$ekidreport->ekid_ont_on_list_done !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {!! $ekidreport->not_done_reason !!}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>

            <a href="{{route('ekid-report-list')}}" type="submit" class="btn btn-info btn-sm">
                ተመለስ
            </a>
        </div>
    </div>
@endsection
