@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
@endsection
@section('content')
    <div class="min-vh-100">
        <div>
                <h1 class=" p-2 m-3 text-center btn-primary rounded-lg">Your Basket</h1>

            <div class="d-flex justify-content-center">
                <div class="w-75">
                    @foreach($products as $p)
                        @foreach($b as $basket)
                            @if($basket->pId == $p->id)
                        <div class="card bg-light card-body m-5">
                            <div class="row">
                                <div class="col-7 m-2">
                                    <div class="m-1 btn-outline-primary btn w-100" onclick="window.location='{{url("product-details", $p->id)}}'">
                                        <h3>{{$p->name}}</h3></div>
                                    <div class="m-1"><h4>Category: {{$p->category}}</h4></div>
                                        @if($p->hasDiscount)
                                        <div class="m-1 btn-warning p-1 rounded-lg mt-3 mb-3">
                                            <h5 class="text-danger"><s class="text-white">Price: {{$p->price}}</s>
                                                <b class="text-danger">Discount price: $<u>{{$p->price-($p->discount*$p->price/100)}}</u></b></h5>
                                        </div>
                                            @else
                                        <div class="m-1 btn-success p-1 rounded-lg mt-2 mb-3">
                                            <h5 class="text-white">Price: {{$p->price}}</h5>
                                        </div>
                                        @endif

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
                                </div>
                                <div class="align-middle col m-1">
                                    <div class="Image rounded-lg m-1" onclick="window.location='{{url("product-details", $p->id)}}'"
                                         style="background: url('{{asset('img/'.$p->path)}}') no-repeat">
                                    </div>
                                    <h3 class="m-4 bg-warning text-danger text-center p-1 rounded-lg ">Discount: {{$p->discount}}%</h3>
                                </div>
                            </div>
                            <div class="text-center mt-3 m-2 row">

                                <div class="col-4">
                                    <h3 class=" bg-success text-white text-center p-1 rounded-lg ">Count: {{$basket->count}} pieces</h3>

                                </div>
                                <div class="col">
                                    <button onclick="window.location='{{action('UserController@destroy', $p->id)}}'" class="btn btn-danger">
                                        <img src="{{asset('img/trash.svg')}}" alt=""></button>
                                </div>
                                <div class="col-4">
                                    <h3 class=" bg-success text-white text-center p-1 rounded-lg "> Total: ${{($p->price*(1-$p->discount/100))*$basket->count}}</h3>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
