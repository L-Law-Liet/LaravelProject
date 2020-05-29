<?

use App\Models\Category;

$categories = Category::all();
?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap-component/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <script src="{{asset('bootstrap-component/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('bootstrap-component/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('bootstrap-component/js/bootstrap.min.js')}}"></script>

    <style>
        .nav img{
            width: 20px;
            height: 20px;
        }
        .nav li, .Drop{
            font-size: 18px;
        }
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        .DropDown{
            left: 40px !important;
        }
        ::-webkit-scrollbar {
            width: 0;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
        .h1d{
            animation-name: h1d;
            animation-duration: 3s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            background: -webkit-linear-gradient(270deg, darkslateblue, darkred, darkgreen, darkorange);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes h1d {
            from {
                -webkit-filter: hue-rotate(0deg);
            }
            to {
                -webkit-filter: hue-rotate(-360deg);
            }
        }
        .h1w{
            animation-name: h1w;
            animation-duration: 3s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            background: -webkit-linear-gradient(270deg, lightskyblue, lightcyan, lightgoldenrodyellow, lightsalmon);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes h1w {
            from {
                -webkit-filter: hue-rotate(0deg);
            }
            to {
                -webkit-filter: hue-rotate(-360deg);
            }
        }
        footer {
            flex: 0 0 auto;
        }
    </style>
    @yield('head')
</head>
<body style="background-image: linear-gradient(270deg, lightskyblue, lightgrey);">
@include('layouts.navbar')
<!-- Start your project here-->
@yield('content')
@include('layouts.footer')
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('bootstrap-component/js/mdb.min.js')}}"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

</body>
</html>
