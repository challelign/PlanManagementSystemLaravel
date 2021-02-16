@extends('layouts.app')

<style>
    @import url('https://fonts.googleapis.com/css?family=Coustard:300,400&display=swap');
    @import url(https://fonts.googleapis.com/css?family=Lato:300,900);




    .item{
        width: 360px;
        height: 370px;
        background-color: white;
        position: relative;
        display: inline-block;
        margin: 1% 2% 1% 0%;
        overflow: hidden;
        box-shadow: 2px 2px 10px #444444;
    }

    .item .overlay{
        color: #ffffff;
        width: 100%;
        height: 100%;
        background-color: #2e6e61;
        opacity: 0;
        transition: all 0.5s ease;
        position: absolute;
        top: 0;
        bottom: 0;
    }

    /* effect-clean*/
    .clean .overlay span:nth-child(1){
        position: absolute;
        left: 30%;
        top: 35%;
        font-size: 60px;
        font-weight: bold;
        font-family: coustard;
        transform: translateX(-50%);
    }

    .clean .overlay span:nth-child(2){
        position: absolute;
        top: 40%;
        left: 40%;
        font-size: 14px;
        transform: translateX(-50%);
    }

    .clean .overlay span:nth-child(3){
        height: 2px;
        background-color: #000;
        position: absolute;
        top: 60%;
        left: 0;
    }

    .clean .overlay:hover{
        opacity: 0.93;
    }

    .clean .overlay:hover span:nth-child(1){
        animation: slide 0.4s;
    }

    .clean .overlay:hover span:nth-child(2){
        animation: slide 0.7s;
    }

    .clean .overlay:hover span:nth-child(3){
        animation: line 0.5s forwards;
    }

    @keyframes slide{
        0%   {transform:translateX(-10%);}
        100% {transform:translateX(-50%);}
    }

    @keyframes line{
        0%   {width: 0;}
        100% {width: 50%}
    }

    /* effect-uncover*/

    .uncover .overlay span:nth-child(1){
        position: absolute;
        left: 50%;
        top: 35%;
        font-size: 80px;
        font-weight: bold;
        font-family: coustard;
        transform: translateX(-50%);
        opacity: 0;
    }

    .uncover .overlay span:nth-child(2){
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 17px;
        transform: translateY(-50%);
        transform: translateX(-50%);
        opacity: 0;
    }

    .uncover .overlay span:nth-child(3){
        height: 30px;
        background-color: #000;
        position: absolute;
        top: 38%;
        opacity: 0;
    }

    .uncover .overlay span:nth-child(4){
        height: 30px;
        background-color: #000;
        position: absolute;
        top: 50%;
        left: 25%;
        opacity: 0;
    }

    .uncover .overlay:hover{
        opacity: 0.9;
    }

    .uncover .overlay:hover span:nth-child(1){
        animation: fadein 0.6s forwards;
        animation-delay: 0.5s;
    }

    .uncover .overlay:hover span:nth-child(2){
        animation: fadein 0.6s forwards;
        animation-delay: 0.75s;
    }

    .uncover .overlay:hover span:nth-child(3){
        animation: draw-left 0.7s;
    }

    .uncover .overlay:hover span:nth-child(4){
        animation: draw-right 0.7s;
        animation-delay: 0.6s;
    }

    @keyframes draw-left{
        0%   {
            opacity: 0;
            width: 0px;
            left: 75%}
        50% {
            opacity: 1;
            left: 25%;
            width: 200px;}

        100% {
            opacity: 0;
            width: 0px;
            left: 25%;}
    }

    @keyframes draw-right{
        0%   {
            opacity: 0;
            width: 0px;
        }
        50% {
            opacity: 1;
            width: 200px;
        }

        100% {
            opacity: 0;
            width: 0px;
        }
    }

    @keyframes fadein{
        0%   {
            opacity: 0;}
        100%   {
            opacity: 1; }
    }

    /* effect-explode */
    .explode .overlay span:nth-child(1){
        position: absolute;
        left: 10%;
        top: 45%;
        font-size: 200px;
        font-weight: bold;
        font-family: coustard;
        transform: translateX(-50%);
        opacity: 0;
    }

    .explode .overlay span:nth-child(2){
        position: absolute;
        top: 80%;
        left: 10%;
        font-size: 17px;
        opacity: 0;
    }

    .explode .overlay span:nth-child(3){
        position: absolute;
        top: 90%;
        left: 0;
        height: 60px;
        background-color: #000;
    }

    .explode .overlay:hover{
        opacity: 0.9;
    }

    .explode .overlay:hover span:nth-child(1){
        animation: focus 0.4s forwards;
        animation-delay: 0.2s;
    }

    .explode .overlay:hover span:nth-child(2){
        animation: focus 0.4s forwards;
        animation-delay: 0.4s;
    }

    .explode .overlay:hover span:nth-child(3){
        animation: block 0.3s forwards;
        animation-delay: 0.15s;
    }

    @keyframes focus{
        0%   {
            transform:scale(1.4) translateX(-30%);
            filter: blur(10px);
            opacity: 0;
        }
        100% {
            transform:scale(1) translateX(0%);
            filter: blur(0px);
            opacity: 1;
        }
    }

    @keyframes block{
        0%   {
            width:0;
            filter: blur(5px);
            opacity: 0;
        }
        100% {
            width: 100%;
            filter: blur(0px);
            opacity: 1;
        }
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center row">
            <div class="col-md-4 my-5">
                <div class="item uncover">
                    <img src="{{asset('img/ammalogo.png')}}" alt="image" width="330px;" height="370px;">
                    <div class="overlay">
                        <span>"</span>
                        <span>Developed by Challelign Tilahun.</span>
                        <span></span>
                        <span></span>
                    </div>
                </div>


                {{--                <img src="{{asset('img/ammalogo.png')}}" alt="" width="330px;" height="370px;"--}}
                {{--                     style="border-radius: 2px; color: #0b51c5; border-style: solid">--}}
            </div>
            <div class="col-md-8 my-5">
                <div class="card-warning">
                    <div class="card-header">
                        <h4 class="text-center text-primary">

                            <b>
                                የአማራ ብዙሃን መገናኛ ድርጅት
                                የመስክ የውሎ አበልና ትራንስፖርት መጠየቂያና መፍቀጃ

                            </b>

                        </h4>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
