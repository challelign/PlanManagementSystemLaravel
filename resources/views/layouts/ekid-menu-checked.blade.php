
@if ($i = 0)@endif
@foreach($planlist as $plist)
    @if( Auth::user()->department->id == $plist->user->department->id && Auth::user()->name == $plist->sign_name_wana)
        @if($plist->check_by_hidet == 1 && $plist->check_by_super_hidet == 1)
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
        && $plist->check_by_super_hidet == 1
        && $plist->check_by_finance == 0 )
            @if ($is ++) @endif
        @endif
    @endif
@endforeach

<div class="topnav container-fluid bg-info justify-content-center" id="myTopnav">
    <a class="{{'wanaazegaj/list-all' == request()->path()?'active':''}}"
       href="{{route('wanaazegaj-list-all')}}">ያረጋገጥሃቸው የሰራተኞች እቅድ
        <span class="badge badge-danger">{{$i}}</span></a>
    <a class="{{'wanaazegaj/hidet/list-all-mdirector'== request()->path()?'active':''}}"
       href="{{route('wanaazegaj-list-all-mdirector')}}">ያረጋገጥሃቸው የምክትል አዘጋጅ(ም/ዳይሬክተር) አቅድ
        <span class="badge badge-danger">{{$is}}</span> </a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
