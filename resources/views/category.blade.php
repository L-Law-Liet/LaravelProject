@section('head')
    <link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection
@extends('layouts.main')
@section('content')
<div class="min-vh-100">
    @if(session()->has('ms'))
        <div class="justify-content-center d-flex">
            <h4 class="bg-primary text-center align-middle text-white m-4 p-3 w-50 rounded-lg position-absolute" id="M1"
                style="opacity: 80%; z-index: 10;">{{session()->get('ms')}}</h4>
        </div>
    @endif
    <div class="m-4">
        <h1 class="btn-outline-info text-center  rounded-lg text-center w-100 p-1">
            @if($category == '')
                All Categories
            @else
                {{$category->name}}
            @endif
        </h1>
    </div>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" type="text" id="search" placeholder="Product Name / Category">
                    <a class="search_icon"><img src="{{asset('img/search.svg')}}" alt=""></a>
                </div>
            </div>
        </div>

    <div class="text-center">
        <div class="container btn-warning w-50 rounded-lg p-4 mt-5">
            <h3 class="text-primary">Sorting: </h3>
            <form action="{{(!empty($category->id)) ? url('category', $category->id) : url('category')}}" method="get">
                <div class="input-group">
                    <select name="sort" class="custom-select">
                        <option {{($SortType == 'default')? 'selected' : ''}} class="additional-option" value="default">Default</option>
                        <option {{($SortType == 'pricea')? 'selected' : ''}} value="pricea">Price Ascending</option>
                        <option {{($SortType == 'priced')? 'selected' : ''}} value="priced">Price Descending</option>
                        <option {{($SortType == 'az')? 'selected' : ''}} value="az">A → Z</option>
                        <option {{($SortType == 'za')? 'selected' : ''}} value="za">Z → A</option>
                        <option {{($SortType == 'new')? 'selected' : ''}} value="new">New items</option>
                    </select>
                    <div class="input-group-append ml-1">
                        <input type="submit" class="btn btn-outline-primary" value="Apply">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if($admin)
        <button onclick="window.location='{{url('product/add')}}'" class="position-fixed btn btn-success col-1 m-1">
            <img src="{{asset('img/plus-circle.svg')}}" alt="+"> Add a Product</button>
       @endif()
    <div class="d-flex justify-content-center">

        @if(session()->has('m'))
            <div id="M" style="min-height: 30px; opacity: 80%; z-index: 10;"
                 class="bg-danger text-center text-white m-4 w-50 rounded-lg position-fixed">
                <h4>Product Deleted</h4>
            </div>
        @endif
        <div id="ns" class="w-75">
            @if(count($products)>0)
                @foreach($products as $p)
                    <div class="card bg-light card-body m-5">
                       <div class="row">
                           <div class="col-7 m-2">
                               <div class="m-1">
                                   <h3 class="btn-outline-primary btn w-100 border-right-0 border-left-0 rounded-0 btn-lg"
                                       onclick="window.location='{{url("product-details", $p->id)}}'">{{$p->name}}</h3>
                               </div>
                               <div class="m-1"><h4>Category: {{$p->category}}</h4></div>
                               <div class="m-1"><h5>Price: ${{$p->price}}</h5></div>
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
                               <div class="Image rounded-lg m-1"  onclick="window.location='{{url("product-details", $p->id)}}'"
                                    style="background: url('{{asset('img/'.$p->path.'.jpg')}}') no-repeat">
                               </div>
                               <p class="m-2 bg-info p-1 rounded-lg">Discount: {{$p->discount}}%</p>
                               @if($p->hasDiscount)
                                   <p class="m-2 bg-warning p-1 rounded-lg border border-danger text-white">
                                       <s>Price: {{$p->price}}</s> <b class="text-danger">Discount price: $
                                           <u>{{$p->price-($p->discount*$p->price/100)}}</u></b></p>
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
        <div id="s" class="w-75" style="display: none">
        </div>
    </div>
</div>
<script>
    setTimeout(fade_out, 3000);

    function fade_out() {
        $("#M").fadeOut().empty();
        $("#M1").fadeOut().empty();
    }
    $('#search').on('keyup', function () {
        $v = $(this).val();
       if($v != '' && $v != ' '){
           $.ajax({
               type : 'get',
               url : '{{URL::to('search')}}',
               data : {'search': $v},
               success:function (data) {
                   $('#s').html(data);
                   $('#s').show();
                   $('#ns').hide();
               }
           });
       }
       else{
           $('#ns').show();
           $('#s').hide();
       }
    })
</script>
@endsection
