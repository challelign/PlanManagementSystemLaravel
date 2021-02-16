@extends('layouts.admin')

@section('content')


    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Edit <strong class="text-info"> {{$users->name}}</strong>
                        <small>Profile</small></h1>
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
                        <div class="card-header">{{ __('ተጠቃሚ መዝግብ') }}</div>
                        <div class="card-body">
                            @include('alert.errors')

                            <form action="{{route('update',$users->id)}}" method="POST">
                                @csrf

                                {{--Full name --}}
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-2 col-form-label text-md-right">{{ __('ሙሉ ስም እሰገባ') }}</label>
                                    <div class="col-md-4">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{isset($users)?$users->name:''}}" required autocomplete="name"
                                               autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    {{--User name--}}

                                    <label for="username"
                                           class="col-md-1 col-form-label text-md-right ">{{ __('ልዩ ስም') }}</label>
                                    <div class="col-md-3">
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username"
                                               value="{{isset($users)?$users->username:''}}" required
                                               autocomplete="username"
                                               autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                {{--ሂደት--}}
                                <div class="form-group row">
                                    <label for="department"
                                           class="col-md-2 col-form-label text-md-right">የሚሰሩበትሒ ደት </label>
                                    <div class="col-md-8">
                                        <select class="form-control @error('department') is-invalid @enderror"
                                                required
                                                name="department">
                                            <option class="form-control" selected disabled>ይምረጡ</option>

                                            @foreach($department as $dept)

                                                {{$dept->name}}
                                                <option value="{{$dept->id}}"
                                                        @if(isset($users))
                                                        @if($dept->id === $users->department_id)
                                                        selected
                                                    @endif
                                                    @endif

                                                >
                                                    {{$dept->name}}

                                                </option>
                                            @endforeach
                                        </select>

                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--ሃላፊንተ--}}
                                <div class="form-group row">
                                    <label for="halafinet"
                                           class="col-md-2 col-form-label text-md-right">ሀላፊነት </label>
                                    <div class="col-md-8">
                                        <select class="form-control @error('halafinet') is-invalid @enderror"
                                                required
                                                name="halafinet">
                                            <option class="form-control" selected disabled>ይምረጡ</option>

                                            {{--                                            <option value="">3</option>--}}
                                            {{--                                            <option value="">4</option>--}}
                                            @foreach($roles as $ro)
                                                <option value="{{$ro->id}}"
                                                {{$ro->name}}
                                                <option value="{{$ro->id}}"
                                                        @if(isset($users))
                                                        @if($ro->id === $users->role_id)
                                                        selected
                                                    @endif
                                                    @endif
                                                >
                                                    {{$ro->name}}

                                                </option>
                                            @endforeach
                                        </select>

                                        @error('halafinet')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-2 col-form-label text-md-right">ፓስወርድ </label>
                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-2 col-form-label text-md-right">ፓስወርድ እረጋግጥ</label>
                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">

                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('መዝግብ') }}
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
@section('js')
    <script>
        $(function () {
            // Summernote
            $('.plan').summernote()
        })
    </script>
@endsection

