@section('head')
    <title>Sales</title>
    <link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection
@extends('layouts.main')
@section('content')
    <div class="min-vh-100">
        <div class="m-4">
            <h1 class="btn-danger text-center text-warning rounded-lg text-center w-100 p-2">
                    {{$title}}

            </h1>
        </div>


        <div class="d-flex justify-content-center">
            <div class="w-75">
                @if(count($products)>0)
                    @foreach($products as $p)
                        <div class="card bg-light card-body m-5">
                            <div class="row">
                                <div class="col-7 m-2">
                                    <div class="m-1 btn-outline-primary btn w-100" onclick="window.location='{{url("product-details", $p->id)}}'">
                                        <h3>{{$p->name}}</h3></div>
                                    <div class="m-1"><h4>Category: {{$p->category}}</h4></div>
                                    <div class="m-1 btn-warning p-1 rounded-lg"><h5 class="text-danger"><s class="text-white">Price: {{$p->price}}</s>
                                            <b class="text-danger">Discount price: $<u>{{$p->price-($p->discount*$p->price/100)}}</u></b></h5></div>
                                    <div class="card card-body bg-light m-1">
                                        <h6 class="text-center">Description</h6>
                                        <article>
                                            {{$p->description}}
                                            @if(strlen($p->description)<50)
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam
                                                asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                                impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                                perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem?
                                            @endif
                                        </article>
                                    </div>

                                    @if($admin)
                                        <div class="text-center mt-3 m-2">
                                            <button onclick="window.location='{{action('ProductsController@destroy', $p->id)}}'" class="btn btn-danger col-2">
                                                <img src="{{asset('img/trash.svg')}}" alt=""></button>

                                            <button class="btn btn-info col-2" onclick="window.location='{{url('product/edit', $p->id)}}'">
                                                <img src="{{asset('img/edit.svg')}}" alt="">
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="align-middle col m-1">
                                    <div class="Image rounded-lg m-1" onclick="window.location='{{url("product-details", $p->id)}}'"
                                         style="background: url('{{asset('img/'.$p->path)}}') no-repeat; background-position: center">
                                    </div>
                                    <h3 class="m-4 bg-warning text-danger text-center p-1 rounded-lg ">Discount: {{$p->discount}}%</h3>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $products->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
