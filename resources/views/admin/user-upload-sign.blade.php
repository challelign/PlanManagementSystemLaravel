@extends('layouts.admin')

@section('css')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/croppie.min.css') }}"/>
@endsection

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$user->name}} <small>ፊርማን አስገባ </small></h1>
                    <span class="result"></span>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <div class="card-header">Crop and Upload Image</div>

                            <div class="card-body">
                                <div class="form-group">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="border-right:1px solid #ddd;">
                                            <div id="image-preview">

                                            </div>
                                        </div>
                                        <div class="col-md-4 align-content-center">
                                            <img src="{{asset($user->upload_image)}}" class="align-content-center text-center"
                                                 style=" ;width: 200px;  height: 200px;border:1px solid #cb3434;">
                                            <br>
                                            <div class="card card-primary">
                                                <div class="card-header text-center">
                                                    አሁን ያለው ፊርማ ለመቀየር " Choose File " ሚለውን ክሊክ አርገህ ቀይር ፡
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4" style="padding:75px;background-color: #333">
                                            <div id="uploaded_image" align="center">

                                            </div>

                                        </div>
                                        <div class="col-md-12 text-center">

                                            <span class="result text-center"></span>
                                        </div>
                                        <div class="col-md-4" style="padding:50px; border-right:1px solid #ddd;">
                                            <p><label>Select Image</label></p>
                                            <input type="file" class="form-control" name="upload_image"
                                                   id="upload_image"/>
                                            <br/>
                                            <button class="btn form-control btn-success crop_image">Crop & Upload
                                                Image
                                            </button>
                                        </div>
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

        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


        @section('js')
            <script src="{{ asset('js/croppie.min.js') }}"></script>



            <script>
                $(document).ready(function () {

                    $image_crop = $('#image-preview').croppie({
                        enableExif: true,
                        viewport: {
                            width: 200,
                            height: 200,
                            type: 'circle'
                        },
                        boundary: {
                            width: 300,
                            height: 300
                        }
                    });

                    $('#upload_image').change(function () {
                        var reader = new FileReader();

                        reader.onload = function (event) {
                            $image_crop.croppie('bind', {
                                url: event.target.result
                            }).then(function () {
                                console.log('jQuery bind complete');
                            });
                        }
                        reader.readAsDataURL(this.files[0]);
                    });

                    $('.crop_image').click(function (event) {
                        $image_crop.croppie('result', {
                            type: 'canvas',
                            size: 'viewport'
                        }).then(function (response) {
                            var _token = $('input[name=_token]').val();
                            $.ajax({
                                url: '{{ route("user-upload-sign.upload",+ "$user->id") }}',
                                type: 'post',
                                data: {"image": response, _token: _token},
                                dataType: "json",
                                success: function (data) {
                                    $('.result').html('<div class="alert alert-success">' + data.success + '</div>');
                                    var crop_image = '<img src="' + data.path + '" />';
                                    $('#uploaded_image').html(crop_image);
                                }
                            });
                        });
                    });
                });
            </script>
@endsection

