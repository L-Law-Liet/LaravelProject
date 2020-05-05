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
    <title>Beta</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap-component/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap-component/js/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap-component/js/bootstrap.min.js')}}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
<body style="background-color: lightblue; background-image: linear-gradient(to bottom right, lightblue, lightgreen);">
@include('layouts.navbar')
<!-- Start your project here-->
@yield('content')
@include('layouts.footer')
<!-- jQuery -->
<script type="text/javascript" src="{{asset('bootstrap-component/js/jquery.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('bootstrap-component/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('bootstrap-component/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('bootstrap-component/js/mdb.min.js')}}"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

</body>
</html>
