{{--reporter--}}
@if ($r = 0)@endif
@foreach($planlist as $plist)
    @if($plist->user->role_id == 3)
        @if($plist->check_by_hidet == 1
        && $plist->cancel == 0
        && $plist->check_by_super_hidet == 1
         && $plist->check_by_smanager == 1
        && $plist->check_by_finance == 0 )
            @if ($r ++) @endif
        @endif
    @endif

@endforeach
{{--miktl azegaj--}}
@if ($h = 0)@endif
@foreach($planlist as $plist)
    @if($plist->user->role_id == 4)
        @if( $plist->check_by_hidet == 0
        && $plist->cancel == 0
        && $plist->check_by_super_hidet == 1
           && $plist->check_by_smanager == 1
        && $plist->check_by_finance == 0 )
            @if ($h ++) @endif
        @endif
    @endif
@endforeach
{{--wana azegaji--}}
@if ($sh = 0)@endif
@foreach($planlist as $plist)
    @if($plist->user->role_id == 2)
        @if($plist->check_by_hidet == 0
        && $plist->cancel == 0
        && $plist->check_by_super_hidet == 0
           && $plist->check_by_smanager == 1
        && $plist->check_by_finance == 0 )
            @if ($sh ++) @endif
        @endif
    @endif
@endforeach


<div class="col-md-12 topnav container-fluid bg-info justify-content-center" id="myTopnav">
    <a class="{{'smanager/list-all' == request()->path()?'active':''}}"
       href="{{route('smanager-list-all')}}">ያረጋገጥሃቸው የሰራተኞች አቅድ
        <span class="badge badge-danger">{{$r}}</span></a>

    <a class=" {{'smanager/mazegaj-ekid-checked' == request()->path()?'active':''}}"
       href="{{route('mazegaj-ekid-checked')}}">ያረጋገጥሃቸው  የምክትል አዘጋጅ(ም/ዳይሬክተር) አቅድ
        <span class="badge badge-danger">{{$h}}</span></a>

    <a class="{{'smanager/wanaazegaj-ekid-checked' == request()->path()?'active':''}}"
       href="{{route('wanaazegaj-ekid-checked')}}">ያረጋገጥሃቸው  ዋና አዘጋጅ(ዋና ዳይሬክተር) አቅድ <span class="badge badge-danger">{{$sh}}</span>
    </a>
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
