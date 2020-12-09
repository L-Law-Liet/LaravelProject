@extends('layouts.main')
@section('head')
    <title>Basket</title>
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
@endsection
@section('content')
    <div class="min-vh-100">
        <div>
            <h1 class="h1d text-center font-weight-bold rounded-lg p-2 m-4">Your Basket</h1>

            <div class="d-flex justify-content-center">
                <div class="w-75">
                    @php
                        $total = 0;
                    @endphp
                    @foreach($products as $p)
                        @foreach($b as $basket)
                            @if($basket->pId == $p->id)
                        <div class="card bg-light card-body m-5">
                            <div class="row">
                                <div class="col-7 m-2">
                                    <div class="m-1 btn-outline-primary btn w-100" onclick="window.location='{{url("product-details", $p->id)}}'">
                                        <h3>{{$p->name}}</h3></div>
                                    <div class="m-1"><h4>Category: {{$p->category}}</h4></div>
                                        <div class="m-1 rounded-lg mt-2 mb-3">
                                            <h5 class="{{($p->hasDiscount)? 'Discount': ''}}
                                                font-weight-normal border p-1 rounded-lg"> Price:
                                                @if($p->hasDiscount)
                                                    <s class="text-muted">${{$p->price}}</s>
                                                @endif
                                                ${{$p->price-$p->discount*$p->price/100}}</h5>
                                        </div>
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
                                         style="background: url('{{asset('img/'.$p->path)}}') no-repeat; background-position: center">
                                    </div>
                                    <h3 class="m-4 border font-weight-normal text-center p-1 rounded-lg
                                        {{($p->hasDiscount)?'Dper text-light':'border-dark'}}">
                                        Discount: {{$p->discount}}%
                                    </h3>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center m-2 row">

                                <div class="col-4">
                                    <p class="border text-center p-1 rounded-lg " style="font-size: 20px">Count: {{$basket->count}} pieces</p>

                                </div>
                                <div class="col">
                                    <form action="{{action('UserController@destroyFromBasket', $p->id)}}" method="post">
                                        @method('DELETE')
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger">
                                            <img src="{{asset('img/trash.svg')}}" alt=""></button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <p class="border text-center p-1 rounded-lg" style="font-size: 20px">
                                        Total: ${{($p->price*(1-$p->discount/100))*$basket->count}}
                                        @php
                                          $total += ($p->price*(1-$p->discount/100))*$basket->count;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    @endforeach
                    @if(!(count($products)>0 || count($b)>0))
                            <div class="card bg-light text-center card-body m-5"
                            style="font-size: 30px">
                                Your basket is empty
                            </div>
                        @else

                        <a href="{{route('checkout.show')}}" class="btn btn-primary text-light mb-3 w-100">Make order</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
