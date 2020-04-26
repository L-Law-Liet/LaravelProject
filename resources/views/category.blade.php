@section('head')
    <link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection
@extends('layouts.main')
@section('content')
<div class="min-vh-100">
    <div class="m-4">
        <h1 class="btn-outline-info text-center  rounded-lg text-center w-100 p-1">
            @if($category == '')
                All Categories
            @else
                {{$category->name}}
            @endif
        </h1>
    </div>
    @if($admin)
        <button onclick="window.location='{{url('product/add')}}'" class="position-fixed btn btn-success col-1 m-1">
            <img src="{{asset('img/plus-circle.svg')}}" alt="+"> Add a Product</button>
       @endif()

    <div class="d-flex justify-content-center">
        <div class="w-75">
            @if(count($products)>0)
                @foreach($products as $p)
                    <div class="card bg-light card-body m-5">
                       <div class="row">
                           <div class="col-7 m-2">
                               <div class="m-1"><h3>{{$p->name}}</h3></div>
                               <div class="m-1"><h4>Category: {{$p->category}}</h4></div>
                               <div class="m-1"><h5>Price: ${{$p->price}}</h5></div>
                               <div class="card card-body bg-light m-1">
                                   <h6 class="text-center">Description</h6>
                                   <article>
                                       {{$p->description}}
                                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam
                                       asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                       impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                       perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem?
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
                               <div class="Image rounded-lg m-1" style="background: url('{{asset('img/'.$p->path.'.jpg')}}') no-repeat">
                               </div>
                               <p class="m-2 bg-info p-1 rounded-lg">Discount: {{$p->discount}}%</p>
                               @if($p->hasDiscount)
                                   <p class="m-2 bg-warning p-1 rounded-lg border border-danger text-white"><s>Price: {{$p->price}}</s> <b class="text-danger">Discount price: $<u>{{$p->price-($p->discount*$p->price/100)}}</u></b></p>
                               @else
                                   <p class="m-2 bg-light p-1 rounded-lg border border-primary">Price: {{$p->price}}</p>
                               @endif
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
