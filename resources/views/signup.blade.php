@section('head')
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
                    <form action="" method="post">
                        <div>
                            <input class="t" type="text" placeholder="First Name" name="fn" autocomplete="on" value="" maxlength="20"> <p class="error"></p>
                            <input class="t" type="text" placeholder="Last Name" name="ln" autocomplete="on" value="" maxlength="20"> <p class="error"></p>
                            <input class="t" type="email" placeholder="E-mail" name="e" autocomplete="on" value="" maxlength="30"> <p class="error"></p>
                            <input class="t" type="password" placeholder="Password" name="p" maxlength="20"> <p class="error"></p>
                            <input class="t" type="password" placeholder="Confirm the password" name="p1" maxlength="20"> <p class="error"></p>
                            <p class="log">I agree to <a class="log text-decoration-none text-warning" href="#"> terms and conditions</a></p>
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
