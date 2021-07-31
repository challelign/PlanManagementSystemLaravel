@if ($i = 0)@endif
@foreach($planlist as $plist)
    @if( Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 3)
        @if($plist->check_by_hidet == 1
        && $plist->cancel == 0
        && $plist->check_by_super_hidet == 0
         && $plist->check_by_smanager == 0
        && $plist->check_by_finance == 0 )
            @if ($i ++) @endif
        @endif

    @endif

@endforeach

@if ($is = 0)@endif
@foreach($planlist as $plist)
    @if( Auth::user()->department->id == $plist->user->department->id && $plist->user->role_id == 4)
        @if(
        $plist->check_by_hidet == 0
        && $plist->cancel == 0
        && $plist->check_by_super_hidet == 0
        && $plist->check_by_finance == 0 )
            @if ($is ++) @endif
        @endif
    @endif
@endforeach

<div class="col-md-12 topnav container-fluid bg-info justify-content-center" id="myTopnav">
    <a  class=" {{'wanaazegaj/home' == request()->path()?'active':''}}"
       href="{{route('self-ekid-home')}}">ያልታዩ የሰራተኞች አቅድ
        <span class="badge badge-danger">{{$i}}</span></a>
    <a class="{{'wanaazegaj/hidet-ekid-list' == request()->path()?'active':''}}"
       href="{{route('hidet-ekid-list')}}">ያልታዩ የምክትል አዘጋጅ(ም/ዳይሬክተር) አቅድ  <span class="badge badge-danger">{{$is}}</span> </a>
{{--    <a href="javascript:void(0);" class="icon" onclick="myFunction()">--}}
{{--        <i class="fa fa-bars"></i>--}}
{{--    </a>--}}


    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
