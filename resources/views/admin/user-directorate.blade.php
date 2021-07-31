@extends('layouts.admin')
<title>የስራ ሒደት መዝግብ</title>

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('css')
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">

    {{--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> የስራ ሒደት ተቆጣጠር
                        <small></small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card ">
                <div class="row">
                    <div class="col-5">
                        <div class="card-header">{{isset($dept) ? 'የስራ ሒደት አስተካክል ':'የስራ ሒደት መዝግብ'}} </div>
                        <div class="card-body">


                            <form action="{{isset($dept) ? route('user-directorate-update',$dept->id):route('user-directorate-save')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name"
                                           class="col-md-12 col-form-label">{{ __('የሰራ ሒደት ስም ') }} {{isset($dept) ? 'አስተካክል ':' አሰገባ'}} </label>
                                    <div class="col-md-12">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{isset($dept) ? $dept->name : ''}}" required autocomplete="name"
                                               autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="slug"
                                               class="col-md-12 col-form-label">  {{ __('የስራ ሒደት ስም ') }} {{isset($dept) ? 'አስተካክል ':'ባጭሩ አሰገባ'}} </label>
                                        <div class="col-md-12">
                                            <input id="slug" type="text"
                                                   class="form-control @error('slug') is-invalid @enderror"
                                                   name="slug"
                                                   value="{{isset($dept) ? $dept->slug : ''}}" required autocomplete="slug"
                                                   autofocus>
                                            @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="">
                                            <a href="{{route('users-list')}}" class="btn btn-info">ተመለስ</a>
                                            <button type="submit" class="btn btn-primary">
                                               {{isset($dept) ? 'አስተካክል ':'መዝግብ'}}
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card-header">{{ __('የስራ ሒደት ዝርዝር') }}</div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                   style="width:100%">
                                <thead class="table-info table-bordered">
                                <tr>
                                    <th> ተ.ቁ</th>
                                    <th>የሰራ ሒደት</th>
                                    <th>የስራ ሒደት ስም ባጭሩ</th>
                                    <th colspan="2">ቀን</th>
                                    <th>አስተካክል</th>
                                    <th>ሰርዝ</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($di = 0) @endif
                                @foreach($department as $dept)
                                    @if($di ++) @endif
                                    <tr>
                                        <td>{{$di}}</td>
                                        {{--                                        <td><a href="{{route('user-profile',$user->id)}}"--}}
                                        {{--                                               class="text-info font-weight-bold"> {{$user->name}}</a></td>--}}
                                        <td>{{$dept->name}}</td>
                                        <td>{{$dept->slug}}</td>
                                        <td>{{$dept->created_at->diffForHumans()}}</td>
                                        <td>{{$dept->updated_at->diffForHumans()}}</td>

                                        <td>
                                            <a href="{{route('user-directorate-edit',$dept->id)}}"> <i
                                                    class="fa fa-pencil" style="font-size:24px;color:green"></i></a>
                                        </td>
                                        <td>
{{--                                            <form action="" method="post">--}}
{{--@csrf--}}
                                                <a href="{{route('user-directorate-delete',$dept->id)}}"> <i
                                                        class="fa fa-trash" style="font-size:24px;color:red"></i></a>
{{--                                            </form>--}}

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                 aria-labelledby="deleteModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post" id="deleteTransportForm">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete User </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold">
                                                    Are You sure You want to delete this user .?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">No,
                                                    Go back
                                                </button>
                                                <button type="submit" class="btn btn-danger">Yes , Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
{{--@endsection--}}


<script>
    // <script>
    $(document).ready(function () {
        $('#dataTableAdmin').DataTable({
            "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
        });
    });
</script>

{{--@section('js')--}}


@endsection
