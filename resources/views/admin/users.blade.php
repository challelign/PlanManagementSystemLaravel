@extends('layouts.admin')

@section('css')

    {{--    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">--}}
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
                            <table class="table table-hover table-striped table-bordered" id="dataTableAdmin"
                                   style="width:100%">
                                <thead class="table-info table-bordered">
                                <tr>
                                    <th>Full name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Directorate</th>
                                    <th>User register</th>
                                    <th>User Updated</th>
                                    <th>ተጠቃሚ አግድ</th>
                                    <th>ፊርማ አስገባ</th>
                                    <th>አጥፋ</th>
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
                                            <div class="dropdown form-group">
                                                <button class="btn btn-info btn-sm dropdown-toggle"
                                                        type="button"
                                                        id="menu1"
                                                        data-toggle="dropdown">ሁኔታ
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu"
                                                    aria-labelledby="menu1">

                                                    <li>
                                                        @if($user->active == 1)
                                                            <form action="{{route('admin.make-inactive', $user->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="btn btn-default btn-sm form-control">
                                                                    ተጠቃሚውን ከልክል
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
                                                                        class="btn btn-default btn-sm form-control">

                                                                    ተጠቃሚውን ፍቀድ
                                                                </button>

                                                            </form>
                                                        @endif
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning  my-1"
                                               href="{{route('edit',$user->id)}}">አስተካክል</a>


                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger"
                                                    onclick="handelDelete({{$user->id}})">ሰርዝ
                                            </button>
                                        </td>
                                        <td>
                                            @if($user->role->name == 'ዋና አዘጋጅ' || $user->role->name == 'ምክትል ዋና አዘጋጅ'|| $user->role->name == 'ዋና ስራ አስኪያጅ' || $user->role->name ==  'ፋይናንስ')
                                                <a href="{{route('user-upload-sign',$user->id)}}" class="btn btn-sm btn-danger" style="width: 110px"
                                                       >ፊርማ አስገባ
                                                </a>
                                            @endif
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

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

<script>
    function handelDelete(id) {
        // console.log('deleting .' + id);

        var form = document.getElementById('deleteTransportForm');
        form.action = '/admin/' + id + '/delete';
        // console.log('deleting .' , form);
        $('#deleteModal').modal('show')
    }

    // <script>
    $(document).ready(function () {
        $('#dataTableAdmin').DataTable();
    });
</script>

@section('js')



@endsection

