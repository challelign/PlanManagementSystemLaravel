@extends('layouts.wanaazegaj')

@section('content')


    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><strong class="text-info"> {{Auth::user()->name}} :</strong> <small>Changing
                            Password </small></h1>
                </div><!-- /.col -->
                {{--                <div class="col-sm-6">--}}
                {{--                    <ol class="breadcrumb float-sm-right">--}}
                {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--                        <li class="breadcrumb-item"><a href="#">Layout</a></li>--}}
                {{--                        <li class="breadcrumb-item active">Top Navigation</li>--}}
                {{--                    </ol>--}}
                {{--                </div><!-- /.col -->--}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Password</div>
                        <div class="card-body">

                            @include('alert.errors')
                            <form action="{{route('change-password')}}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label for="current_password"
                                           class="col-md-2 col-form-label text-md-right">የድሮ ፓስወርድ </label>
                                    <div class="col-md-8">
                                        <input id="current_password" type="password"
                                               class="form-control @error('current_password') is-invalid @enderror"
                                               name="current_password" required autocomplete="new-password">

                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password"
                                           class="col-md-2 col-form-label text-md-right">እዲስ ፓስወርድ </label>
                                    <div class="col-md-8">
                                        <input id="new_password" type="password" class="form-control"
                                               name="new_password" required autocomplete="new-password" min="6">
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password-confirm"
                                           class="col-md-2 col-form-label text-md-right">እረጋግጥ </label>
                                    <div class="col-md-8">
                                        <input id="new_password_confirmation" type="password" class="form-control" min="6"
                                               name="new_password_confirmation" required>

                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </form>


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
