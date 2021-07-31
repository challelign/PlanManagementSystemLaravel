




<div class="topnav container-fluid bg-info justify-content-center" id="myTopnav">
    <a class="{{'wanaazegaj/self/self-ekid-home-wana' == request()->path()?'active':''}}"
       href="{{route('self-ekid-home-wana')}}">አቅድ  </a>
    <a class="{{'wanaazegaj/self/self-ekid-canceled-wana' == request()->path()?'active':''}}"
       href="{{route('self-ekid-canceled-wana')}}">የተሰረዙ እቅዶች</a>

    <a class="{{'wanaazegaj/self/self-ekid-create-wana' == request()->path()?'active':''}}"
       href="{{route('self-ekid-create-wana')}}">አቅድ መዝግብ </a>
    <a
       href="{{route('self-ekid-create-wana')}}">አቅድ  </a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
{{--    {{request()->path()}}--}}
</div>
