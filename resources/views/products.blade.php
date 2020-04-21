@section('head')
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection
@extends('layouts.main')
@section('content')
    <h1>Products</h1>
@if(count($products)>0)
    @foreach($products as $p)
        <div class="card card-body bg-light">
            <h4>
                {{$p->name}}
            </h4>
        </div>
        @endforeach
    @else
    <p>Not Found Products</p>
    @endif
@endsection
