@extends('layouts.hidet')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$plan->user->name}}
                        <small>እቅድ  {{$plan->user->department->name}}</small></h1>
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
{{--                        <h3 class="text-primary">This Plan is Aproved by--}}
{{--                            <span class="font-italic">{{$plan->sign_name }} {{$plan->check_by_super_hidet}} </span></h3>--}}
                    </h3>

                </div>
                <!-- /.card-body -->
                <div class="card-footer row">
                  <a href="{{route('hidet')}}" class="btn btn-info btn-sm">ተመለስ </a>
                    <form action="{{route('approve-plan',$plan->id)}}" method="post">
                        @csrf
                        <button
                            class="btn btn-sm btn-warning "> እረጋግጥ
                        </button>
                    </form>

                </div>

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
