@extends('layouts.wanaazegaj')

@section('content')


    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Profile Details</div>
                        <div class="card-body">
                            <h3>ሙሉ ስም ፡ {{Auth::user()->name}} </h3>
                            <h3>ልዩ ስም ፡ {{Auth::user()->username}} </h3>
                            <h3>ዳይሬክቶሬት፡ {{Auth::user()->department->name}} </h3>
                            <h3>ያለህ ላፊነት ፡ {{Auth::user()->role->name}} </h3>
                            <h3>ልዩ ፊርማህ ፡<img src="{{asset(Auth::user()->upload_image)}}"
                                              class="align-content-center text-center"
                                              style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></h3>


                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
