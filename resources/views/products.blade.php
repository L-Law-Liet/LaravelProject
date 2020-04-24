@section('head')
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection
@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-8 m-5 border border-info rounded-lg bg-light ">
        <div class="m-3">
            <h1 class="btn btn-outline-info w-100">Product Details</h1>
        </div>
        <form action="{{action('ProductsController@update', $product->id)}}" method="get">
            {{csrf_field()}}
            <div>
                <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Name: </label><input name="name" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->name}}"></div>
                <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Price: </label><input name="price" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->price}}"></div>
                <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Description: </label><input class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->description}}"></div>
                <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Discount: </label><input class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->discount}}"></div>
                <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Category: </label><input class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->category}}"></div>
            </div>
            <div class="m-3 text-center">
                <button onclick="window.location='{{action('ProductsController@destroy', $product->id)}}'" class="btn btn-danger col-3"><img src="{{asset('img/trash.svg')}}" alt=""></button>
                <button type="submit" class="btn btn-success col-3"><img src="{{asset('img/save.svg')}}" alt=""></button>
            </div>
        </form>
    </div>
</div>
@endsection
