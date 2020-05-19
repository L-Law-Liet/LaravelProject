@extends('layouts.main')
@section('head')
    <title>Favourites</title>
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
    @endsection
@section('content')
    <div class="min-vh-100">
        <div>
            <h1 class="h1d text-center font-weight-bold rounded-lg p-2 m-4">Favourites</h1>
            <div class="d-flex justify-content-center">
                <div class="w-75">
                        @foreach($products as $p)
                            <div class="card bg-light card-body m-5">
                                <div class="row">
                                    <div class="col-7 m-2">
                                        <div class="m-1 btn-outline-primary btn w-100" onclick="window.location='{{url("product-details", $p->id)}}'">
                                            <h3>{{$p->name}}</h3>
                                        </div>
                                        <div class="m-1">
                                            <h4>Category: {{$p->category}}</h4>
                                        </div>
                                        <div class="m-1">
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
                                        <h3 class="m-4 border font-weight-normal text-center
                                        p-1 rounded-lg {{($p->hasDiscount)?'Dper text-light':'border-dark'}}">
                                            Discount: {{$p->discount}}%
                                        </h3>

                                    </div>
                                </div>
                                <hr>
                                <div class="text-center m-2 row">

                                    <div class="col">
                                        <button onclick="window.location='{{action('UserController@destroyFromFavourites', $p->id)}}'" class="btn btn-danger">
                                            <img src="{{asset('img/trash.svg')}}" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
