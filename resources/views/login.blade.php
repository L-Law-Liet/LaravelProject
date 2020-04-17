<?php
if (isset($_POST['login_b'])){
//    $connection = mysqli_connect('127.0.0.1 ', 'root', '', 'acc_db');
//    if (!$connection){
//        echo 'ERROR';
//        exit();
//    }
    $E = $_POST['e'];
    $P = $_POST['p'];
//    $res = mysqli_query($connection, "SELECT email, password, name, surname FROM accounts WHERE email='$E'");
//    $eq=mysqli_fetch_assoc($res);
//    if ($eq['password']==$P && !empty($P)){
//        $_SESSION['logged_f']=$eq['name'];
//        $_SESSION['logged_l']=$eq['surname'];
//        $_SESSION['logged_e']=$eq['email'];
//        $_SESSION['logged_p']=$eq['password'];
//        header('Location: http://localhost:63342/WEB/Main/');
//    }
    //else{
        $error = 'Username or Password not correct!';
    //}
}
?>
@section('head')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
    @endsection
@extends('layouts.main')
@section('content')
    <div class="m-5 pt-5">
        <div class="d-flex justify-content-center">
            <form class="box text-center align-text-bottom mb-2" action="{{url('  login')}}" method="post">
                <div class="Head mt-2">
                    <svg height="60" width="300" xmlns="http://www.w3.org/2000/svg">
                        <rect class="shape1" height="60" width="300" />
                        <rect class="shape2" height="60" width="300" />
                    </svg>
                    <img class="L d-inline" src="{{asset('img/L.png')}}" alt="L">
                    <h1 class="LOGIN d-inline">OGIN</h1>
                </div>
                <input type="text" name="e" placeholder="Username" value="">
                <input type="Password" name="p" placeholder="Password">

                <p style="font-size: 14px; color: tomato; margin: 5px">

                </p>
                <div>
                    <input type="submit" name="login_b" value="LOGIN">
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

