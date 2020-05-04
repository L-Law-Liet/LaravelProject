@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
    @endsection
@section('content')
    <div class="min-vh-100">
        <div>

            <div class="d-flex justify-content-center">
                <div class="w-75">
                        @foreach($products as $p)
                            <div class="card bg-light card-body m-5">
                                <div class="row">
                                    <div class="col-7 m-2">
                                        <div class="m-1"><h3>{{$p->name}}</h3></div>
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
                                    </div>
                                    <div class="align-middle col m-1">
                                        <div class="Image rounded-lg m-1" style="background: url('{{asset('img/'.$p->path.'.jpg')}}') no-repeat">
                                        </div>
                                        <h3 class="m-4 bg-warning text-danger text-center p-1 rounded-lg ">Discount: {{$p->discount}}%</h3>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
