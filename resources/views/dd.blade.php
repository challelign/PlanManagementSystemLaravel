@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <link href="{{asset ('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Users <small>List</small></h1>
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
                            <h3 class="card-title">Users </h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="{{route('user-register')}}" class="btn btn-sm btn-info">Add User</a>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-striped table-bordered" id="data-report"  style="width:100%">
                                <thead class="table-info table-bordered">
                                <tr>
                                    <th>Full name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Directorate</th>
                                    <th>User register</th>
                                    <th>User Updated</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{route('user-profile',$user->id)}}"
                                               class="text-info font-weight-bold"> {{$user->name}}</a></td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->department->name}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>{{$user->updated_at->diffForHumans()}}</td>


                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info btn-sm dropdown-toggle form-control"
                                                        type="button"
                                                        id="menu1"
                                                        data-toggle="dropdown">Status
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu form-group form-control" role="menu"
                                                    aria-labelledby="menu1">

                                                    <li>
                                                        @if($user->active == 1)
                                                            <form action="{{route('admin.make-inactive', $user->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="btn btn-default btn-sm form-control">Make
                                                                    Inactive
                                                                </button>

                                                            </form>
                                                        @endif
                                                    </li>

                                                    <li>
                                                        @if($user->active == 0)
                                                            <form action="{{route('admin.make-active', $user->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="btn btn-default btn-sm form-control">Make
                                                                    Active
                                                                </button>

                                                            </form>
                                                        @endif
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning my-1"
                                               href="{{route('edit',$user->id)}}">Edit</a>


                                        </td>
                                        <td> <button class="btn btn-sm btn-danger"
                                                     onclick="handelDelete({{$user->id}})">Delete
                                            </button></td>
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

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    {{--                    {{$users->links()}}--}}
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

    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
@endsection







<!-- End your project here-->

{{--@section('js')--}}

<!-- jQuery -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
{{--@endsection--}}
<!-- Bootstrap tooltips -->
{{--<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>--}}
<!-- Bootstrap core JavaScript -->
{{--<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>--}}
<!-- MDB core JavaScript -->
{{--<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>--}}
<!-- Your custom scripts (optional) -->

{{--<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>--}}

@section('js')
    <script>

        //start datatable
        $(document).ready( function () {
            $('#data-report').DataTable();
        } );
    </script>


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
