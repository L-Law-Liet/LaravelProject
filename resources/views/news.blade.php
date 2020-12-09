@extends('layouts.main')
@section('head')
    <title>News</title>
    <link href="{{ asset('css/news.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
@endsection
@section('content')

    <div id="container1">
        <div id="container2">
            <div class="content">
                @foreach($News as $k => $n)
                    <section class="s"
                    style='background: url("{{asset(url("img/news".(3-$k).".png"))}}") no-repeat;
                        background-size: cover;
                        width: 100%;
                        height: 100%;
                        overflow: hidden;
                        background-attachment: fixed;
                        display: flex;
                        justify-content: center;
                        align-items: center;'>
                        <h1 onclick="window.location='{{url('product-details/45')}}'" class="h1w text-light">{{$n}}</h1>
                    </section>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
