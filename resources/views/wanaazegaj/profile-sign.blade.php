@extends('layouts.wanaazegaj')

@section('content')


    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-3"></div>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><strong class="text-info"> {{Auth::user()->name}} :</strong> <small>All
                            Profile Details</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('img/amico.jpg')}}"
                                     alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                            <p class="text-muted text-center">{{Auth::user()->department->name}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ሙሉ ስም</b> <a class="float-right">{{Auth::user()->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ያለህ ላፊነት</b> <a class="float-right">{{Auth::user()->role->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ልዩ ስም</b> <a class="float-right">{{Auth::user()->username}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ዳይሬክቶሬት</b> <a class="float-right">{{Auth::user()->department->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ልዩ ፊርማህ</b> <a class="float-right"><img
                                            src="{{asset(Auth::user()->upload_image)}}"
                                            class="align-content-center text-center"
                                            style=" ;width: 60px;  height: 60px;border:1px solid #f2f4f7;"></a>
                                </li>
                            </ul>
                            <a href="{{route('wanaazegaj')}}" class="btn btn-primary btn-block"><b>ተመለስ</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
