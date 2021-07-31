




<div class="topnav container-fluid bg-info justify-content-center" id="myTopnav">
    <a class="{{'hidet/self/self-ekid-home' == request()->path()?'active':''}}"
       href="{{route('self-ekid-home')}}">አቅድ  </a>

        <a class="{{'hidet/self/self-ekid-canceled' == request()->path()?'active':''}}"
       href="{{route('self-ekid-canceled')}}">የተሰረዙ እቅዶች  </a>


    <a class="{{'hidet/self/self-ekid-create' == request()->path()?'active':''}}"
       href="{{route('self-ekid-create')}}">አቅድ መዝግብ </a>
    <a
       href="{{route('self-ekid-create')}}">አቅድ  </a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
{{--    {{request()->path()}}--}}
</div>
