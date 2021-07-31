@extends('layouts.hidet')
@section('css')
    <link rel="stylesheet" href="{{asset('css/sign-table.css')}}">

@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> {{$plan->user->name}}
                        <small>እቅድ {{$plan->user->department->name}}</small></h1>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->department->id == $plan->user->department->id)
        <div class="container">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3>የስራ ዝርዝር - <i>{{$plan->title}}</i></h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('img/amico.jpg')}}"
                                             alt="user image">
                                        <span class="username">
                                  <a href="#">  {{ $plan->user->name}} .</a>
                                        <span class="time float-right">
                                            <i class="fas fa-clock"> <td>updated {{$plan->updated_at->diffForHumans()}}</td> </i>
                                        </span>
                                      </span>
                                        <h3 class="card-title"></h3>
                                        <b> <span class="description">መነሻ - {{$plan->startdate }} እስክ {{$plan->enddate}} ለ {{$plan->nodate}} ቀን
                                            <i class="fas fa-clock"> <td>Posted {{$plan->created_at->diffForHumans()}}</td> </i>
                                        </span>
                                        </b></div>
                                    <p>
                                        {!!$plan->task !!}
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                        <div class="table-responsive">
                            <table class="table table-shopping">
                                <thead>
                                <tr>
                                    <th class="td-name text-center">የጠያቂው ስም</th>
                                    @if( Auth::user()->id != $plan->user_id)
                                        <th class="td-name th-description text-center">የም/አዘጋጅ(ም/ዳይሬክተር) ስምና ፊርማ</th>
                                    @endif
                                    <th class="td-name th-description text-center">ዋና አዘጋጅ(ዋና ዳይሬክተር) ስምና ፊርማ</th>
                                    <th class="td-name th-description text-center">ም/ስራ አስኪያጅ (ዋና ስራ አስኪያጅ) ስምና ፊራማ</th>
                                    <th class="td-name th-description text-center">ሒሳቡን የከፈለው የፋይናንሰ ባለሙያ ስምና ፊርማ</th>
                                    <th class="td-name th-description text-center"> የእቅዱ ሒደት</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="td-name text-center">
                                        <a href="#amico">{{$plan->user->name}}</a>
                                        <br><small>{{$plan->user->department->name}}</small>
                                        <br><small>{{$plan->user->role->name}}</small>
                                    </td>


                                    @if( Auth::user()->id != $plan->user_id)
                                        <td class="td-name text-center">
                                            <a href="#amico">
                                                @if($plan->check_by_hidet == 0)
                                                    በሂደት ላይ
                                                @else
                                                    {{$plan->sign_name}} </a>
                                            <br><small>{{$plan->user->department->name}}</small>
                                            <br><small>ፊርማ - <img src="{{asset($plan->sign_name_image)}}"
                                                                  class="align-content-center text-center"
                                                                  style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></small>
                                            @endif
                                        </td>
                                    @endif


                                    <td class="td-name text-center">
                                        <a href="#amico">
                                            @if($plan->check_by_super_hidet == 0)
                                                በሂደት ላይ
                                            @else
                                                {{$plan->sign_name_wana}} </a>
                                        <br><small>{{$plan->user->department->name}}</small>
                                        <br><small>ፊርማ - <img src="{{asset($plan->sign_name_wana_image)}}"
                                                              class="align-content-center text-center"
                                                              style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></small>
                                        @endif
                                    </td>


                                    <td class="td-name text-center">
                                        <a href="#amico">
                                            @if($plan->check_by_smanager == 0)
                                                በሂደት ላይ
                                            @else
                                                {{$plan->sign_name_smanager}} {{$plan->sign_name_wmanager}} </a>
                                        {{--                                    <br><small>{{$plan->user->department->name}}</small>--}}
                                        <br><small>ፊርማ - <img src="{{asset($plan->sign_name_smanager_image)}}"
                                                              class="align-content-center text-center"
                                                              style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></small>
                                        @endif
                                        <a href="#amico">
                                            @if($plan->check_by_wmanager == 0  )

                                            @else
                                                {{$plan->sign_name_wmanager}} </a>
                                        {{--                                    <br><small>{{$plan->user->department->name}}</small>--}}
                                        <br><small>ፊርማ - <img
                                                src="{{asset($plan->sign_name_wmanager_image)}}"
                                                class="align-content-center text-center"
                                                style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></small>
                                        @endif
                                    </td>
                                    <td class="td-name text-center">
                                        <a href="#amico">
                                            @if($plan->check_by_finance == 0)
                                                በሂደት ላይ
                                            @else
                                                {{$plan->payment->approved_by}} </a>
                                        <br><small>{{$plan->user->department->name}}</small>
                                        <br><small>ፊርማ - <img src="{{asset($plan->payment->approved_by_image)}}"
                                                              class="align-content-center text-center"
                                                              style=" ;width: 50px;  height: 50px;border:1px solid #f2f4f7;"></small>
                                        @endif
                                    </td>

                                    <td class="td-name text-center">

                                        @if($plan->cancel == 0 && $plan->check_by_finance == 0)
                                            አላለቀም
                                        @elseif($plan->cancel == 0 && $plan->check_by_finance == 1)
                                            ቅድመ ክፍያ ተከፍሎ ተጠናቋል
                                        @else
                                            እቅዱ ተሰርዟል
                                            <br><small>
                                                {{$plan->cancel_name_smanager}}
                                                {{$plan->cancel_name_manager}}
                                                {{$plan->cancel_name_wana}}
                                                {{$plan->cancel_name}}
                                            </small>

                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="card-footer row">
                            <a href="{{route('hidet')}}" class="btn btn-info btn-sm">ወደ ዋናው ተመለስ </a>

                            @if( Auth::user()->id != $plan->user_id)
                                <form action="{{route('approve-plan',$plan->id)}}" method="post">
                                    @csrf
                                    <button
                                        class="btn btn-sm btn-red "> ማጽደቅ
                                    </button>
                                </form>
                            @endif




                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

@endsection
