@extends('layouts.reporter')



@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">

                        የመስክና የከተማ እቅድ : ክንውን ሪፓርት<small> መዝግብ፡</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('alert.errors')
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            የመስክና የከተማ እቅድ : ክንውን
                        </div>
                        <form method="post" id="dynamic_form" action="{{route('ekid-report-no-prepayment-save')}}">
                            @csrf
                            <div class="card-body">
                                <form id="quickForm" action="" method="post">

                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 row form-group">
                                                <label for="ekid_on_list_done" class="col-md-4"> እቅዱ የሚሽፍነው ጊዜ*</label>
                                                <input type="number" min="1" maxlength="2" required
                                                       class="col-md-8 form-control"
                                                       name="nodate" id="nodate"/>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label for="transport"
                                                       class="col-md-2">የሚጠቀመው የትራንስፖርት* </label>
                                                <div class="form-group col-md-10">
                                                    <select
                                                        class="form-control col-md-12 @error('transport_id') is-invalid @enderror"
                                                        required
                                                        name="transport_id">
                                                        <option selected disabled>ይምረጡ</option>
                                                        @foreach($transport as $trans)
                                                            {{--                                                                                                    {{$trans->name}}--}}
                                                            <option value="{{$trans->id}}">
                                                                {{$trans->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('transport_id')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                   </span>
                                                    @enderror
                                                </div>
                                            </div>



                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <label for="title" class="col-md-2"> የእቅዱ ርዕሰ ጉዳይ *</label>
                                                <input type="text" class="col-md-10 form-control" name="title"
                                                       id="title"/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="card-header font-weight-bold">

                                        </div>
                                        <label for="ekid_on_list">በእቅዱ ተይዘው የነበሩ ስራዎች*</label>
                                        <textarea class="form-control task  @error('ekid_on_list') is-invalid @enderror"
                                                  placeholder="Place some text here" rows="10" required minlength="50"
                                                  name="ekid_on_list" id="ekid_on_list">
                                    </textarea>
                                        @error('ekid_on_list')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <label for="ekid_on_list_done"> በእቅዱ መሰረት የተከናዎኑ ስራዎች*</label>
                                        <textarea
                                            class="ekid_on_list_done form-control task @error('ekid_on_list_done') is-invalid @enderror"
                                            placeholder="Place some text here" rows="10" minlength="50"
                                            name="ekid_on_list_done" id="ekid_on_list_done"
                                            required></textarea>
                                        @error('ekid_on_list_done')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="ekid_ont_on_list_done"> ከእቅዱ ውጭ የተከናዎኑ ስራዎች*</label>
                                        <textarea class="form-control "
                                                  name="ekid_ont_on_list_done" id="ekid_ont_on_list_done" required
                                                  minlength="50"
                                                  rows="5" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="not_done_reason">ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች*</label>
                                        <textarea class="form-control"
                                                  name="not_done_reason" id="not_done_reason" rows="5" minlength="50"
                                                  required placeholder="Enter ..."></textarea>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">መዝግብ</button>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script>


        $(function () {
            $('.task').summernote()
        })

        $(function () {


            $('#quickForm').validate({
                rules: {
                    ekid_on_list: {
                        required: true,
                        minlength: 20,
                    },
                    ekid_on_list_done: {
                        required: true,
                        minlength: 20,
                    },
                    ekid_ont_on_list_done: {
                        required: true,
                        minlength: 20,
                    },
                    not_done_reason: {
                        required: true,
                        minlength: 20,
                    },
                    nodate: {
                        required: true,
                        number: true,
                        min: 1,
                        maxlength: 2
                    },
                    title: {
                        required: true,
                        maxlength: 2
                    }
                },
                messages: {
                    ekid_on_list: {
                        required: "በቅዱ ተይዘው የነበሩ ስራዎች",
                        minlength: "Please Enter least 5 characters long"
                    },
                    ekid_on_list_done: {
                        required: "በቅዱ መሰረት የተከናዎኑ ስራዎች",
                        minlength: "Please Enter least 5 characters long"
                    },
                    ekid_ont_on_list_done: {
                        required: "ከእቅዱ ውጭ የተከናዎኑ ስራዎች",
                        minlength: "Please Enter least 5 characters long"
                    },
                    not_done_reason: {
                        required: "ያልተከናዎኑ ስራዎች የሚገኙበት ደረጃና ምክያቶች",
                        minlength: "Please Enter least 5 characters long"
                    },
                    nodate: {
                        required: "እቅዱ የሚሽፍነው ጊዜ",
                        maxlength: "Please Enter two characters long"
                    },
                    title: {
                        required: "የእቅዱ ርዕሰ ጉዳይ",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>

@endsection
