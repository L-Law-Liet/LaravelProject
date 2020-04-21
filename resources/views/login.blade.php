@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
    @endsection
@extends('layouts.main')
@section('content')
    <div class="m-5 pt-5">
        @if($message = Session::get('error'))
            <div class="alert alert-danger d-block">
                <button type="button" class="close">x</button>
                <strong>{{$message}}</strong>
            </div>
            @endif
        <div class="d-flex justify-content-center">
            <form class="box text-center align-text-bottom mb-2" action="{{route('login')}}" method="post" novalidate>
                @csrf
                <div class="Head mt-2">
                    <svg height="60" width="300" xmlns="http://www.w3.org/2000/svg">
                        <rect class="shape1" height="60" width="300" />
                        <rect class="shape2" height="60" width="300" />
                    </svg>
                    <img class="L d-inline" src="{{asset('img/L.png')}}" alt="L">
                    <h1 class="LOGIN d-inline">OGIN</h1>
                </div>
                <input type="text" name="email" placeholder="Username" value="{{Request::old('email')?:''}}">
                @if($errors->has('email'))
                    <span class="text-danger">
                                    {{$errors->first('email')}}
                                </span>
                @endif
                <input type="Password" name="password" placeholder="Password">
                @if($errors->has('password'))
                    <span class="text-danger">
                                    {{$errors->first('password')}}
                                </span>
                @endif

                <p style="font-size: 14px; color: tomato; margin: 5px">

                </p>
                <div>
                    <input type="submit" name="login" value="LOGIN">
                </div>
                <div>
                    <a class="text-decoration-none" href="">Forgot the password?</a>
                </div>
                <div class="mt-2">
                    <a class="text-decoration-none text-warning" href="{{url('signup')}}">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection

