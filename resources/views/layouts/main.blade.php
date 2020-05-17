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
        ::-webkit-scrollbar {
            width: 0;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
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
