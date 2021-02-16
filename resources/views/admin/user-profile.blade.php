@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> {{$users->name}} <small> Plans's</small></h1>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Plans </h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="" class="btn btn-sm btn-info">Search</a>

                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        @if($plans->count() == 0)
                            <h3 class="text-center"> NO PLANS'S YET </h3>
                        @else
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-striped table-bordered"  style="width:100%">
                                    <thead class="table-info table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        {{--                                    <th>Plan</th>--}}
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>No Days</th>
                                        <th>User Updated</th>
                                        <th>Status</th>
                                        <th rowspan="2">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{  $i = 1}}
                                        @foreach($plans as $plan)

{{--                                            @for ($i = 1; $i < $plans->count(); $i++)--}}
                                            @if($plan->user_id == $users->id)



                                                <tr>
                                                    <td>{{$i++}}</td>

                                                    <td><a href=""
                                                           class="text-info font-weight-bold">{{$plan->title}} </a>
                                                    </td>
                                                    <td>{{$plan->startdate}}</td>
                                                    <td>{{$plan->enddate}}</td>
                                                    <td>{{$plan->nodate}}</td>
                                                    <td>{{$plan->created_at->diffForHumans()}}</td>
                                                    <td>{{$plan->updated_at->diffForHumans()}}</td>


                                                    {{--                                        <td>--}}
                                                    {{--                                            <div class="dropdown">--}}
                                                    {{--                                                <button class="btn btn-info btn-sm dropdown-toggle form-control"--}}
                                                    {{--                                                        type="button"--}}
                                                    {{--                                                        id="menu1"--}}
                                                    {{--                                                        data-toggle="dropdown">Status--}}
                                                    {{--                                                    <span class="caret"></span></button>--}}
                                                    {{--                                                <ul class="dropdown-menu form-group form-control" role="menu"--}}
                                                    {{--                                                    aria-labelledby="menu1">--}}

                                                    {{--                                                    <li>--}}
                                                    {{--                                                        @if($user->active == 1)--}}
                                                    {{--                                                            <form action="{{route('admin.make-inactive', $plan->id)}}"--}}
                                                    {{--                                                                  method="post">--}}
                                                    {{--                                                                @csrf--}}
                                                    {{--                                                                <button type="submit"--}}
                                                    {{--                                                                        class="btn btn-default btn-sm form-control">Make--}}
                                                    {{--                                                                    Inactive--}}
                                                    {{--                                                                </button>--}}

                                                    {{--                                                            </form>--}}
                                                    {{--                                                        @endif--}}
                                                    {{--                                                    </li>--}}

                                                    {{--                                                    <li>--}}
                                                    {{--                                                        @if($user->active == 0)--}}
                                                    {{--                                                            <form action="{{route('admin.make-active', $user->id)}}"--}}
                                                    {{--                                                                  method="post">--}}
                                                    {{--                                                                @csrf--}}
                                                    {{--                                                                <button type="submit"--}}
                                                    {{--                                                                        class="btn btn-default btn-sm form-control">Make--}}
                                                    {{--                                                                    Active--}}
                                                    {{--                                                                </button>--}}

                                                    {{--                                                            </form>--}}
                                                    {{--                                                        @endif--}}
                                                    {{--                                                    </li>--}}

                                                    {{--                                                </ul>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                        </td>--}}
                                                    <td>
                                                        <a class="btn btn-sm btn-warning"
                                                           href="{{route('edit',$plan->id)}}">Edit</a>
                                                        <button class="btn btn-sm btn-danger"
                                                                onclick="handelDelete({{$plan->id}})">Delete
                                                        </button>

                                                    </td>
                                                </tr>

                                            @endif
{{--@endfor--}}
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
                    @endif


                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    {{$plans->links()}}
                    {{--                    {{$posts->appends(['search' =>request()->query('search')])->links()}}--}}
                    {{--                                        {{($plans->user()->id)->links()}}--}}

                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection

@section('js')
    <script>
        function handelDelete(id) {
            // console.log('deleting .' + id);

            var form = document.getElementById('deleteTransportForm');
            form.action = '/admin/' + id + '/delete';
            // console.log('deleting .' , form);
            $('#deleteModal').modal('show')
        }
    </script>

@endsection
