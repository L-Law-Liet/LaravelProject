@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">
@endsection
@extends('layouts.main')
@section('content')
    <div class="m-5 p-5 text-center">
        <div class="justify-content-center d-flex">
            <div class="content">
                <div id="regform">
                    <div class="Head">
                        <svg height="50" width="300" xmlns="http://www.w3.org/2000/svg">
                            <rect class="shape1" height="50" width="300" />
                            <rect class="shape2" height="50" width="300" />
                        </svg>
                        <h5>Sign up now</h5>
                    </div>
                    <form action="{{route('signup')}}" method="post" novalidate>
                        @csrf
                        <div>
                            <input class="t {{$errors->has('name') ? 'border border-danger' : ''}}" type="text"
                                   placeholder="First Name" name="name" autocomplete="on" value="{{Request::old('name')?:''}}" maxlength="20">
                            @if($errors->has('name'))
                                <span class="text-danger">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                            <input class="t mt-3 {{$errors->has('email') ? 'border border-danger' : ''}}" type="email"
                                   placeholder="E-mail" name="email" autocomplete="on" value="{{Request::old('email')?:''}}" maxlength="30">
                            @if($errors->has('email'))
                                <span class="text-danger">
                                    {{$errors->first('email')}}
                                </span>
                            @endif
                            <input class="t mt-3 {{$errors->has('password') ? 'border border-danger' : ''}}" type="password" placeholder="Password" name="password" maxlength="20">
                            @if($errors->has('password'))
                                <span class="text-danger">
                                    {{$errors->first('password')}}
                                </span>
                            @endif
                            <input class="t mt-3 {{$errors->has('cpassword') ? 'border border-danger' : ''}}" type="password" placeholder="Confirm the password" name="cpassword" maxlength="20">
                            @if($errors->has('cpassword'))
                                <span class="text-danger">
                                    {{$errors->first('cpassword')}}
                                </span>
                            @endif
                            <p class="log mt-3">I agree to <a class="log text-decoration-none text-warning" href="#"> terms and conditions</a></p>
                        </div>
                        <div>
                            <input id="btn" type="submit" value="Register" name="r">
                        </div>
                        <div>
                            <a class="text-decoration-none text-warning" id="old" href="{{url('login')}}">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
