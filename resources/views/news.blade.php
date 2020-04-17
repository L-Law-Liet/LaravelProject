@extends('layouts.main')
@section('head')
    <link href="{{ asset('css/news.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
@endsection
@section('content')

    <div id="container1">
        <div id="container2">
            <div class="content">
                <section class="s1">
                    <h1 class="text-light">New</h1>
                </section>
                <section class="s2">
                    <h1 class="text-light">Waterfall</h1>
                </section>
                <section class="s3">
                    <h1 class="text-light">Design</h1>
                </section>

            </div>
        </div>
    </div>
@endsection
