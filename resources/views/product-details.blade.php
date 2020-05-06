@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{asset('css/pd.css')}}">
    @endsection
@section('content')
    <div class="min-vh-100">
        <div>
            <div class="justify-content-center d-flex">
                <div id="M" style="min-height: 50px; opacity: 80%; z-index: 10; display: {{($b ?? '')? 'block;' : 'none;'}}"
                     class="bg-success text-center text-white m-4 w-50 rounded-lg position-absolute">
                    <h4>Added To a Basket!</h4>
                </div>
                <div class="w-100 m-5 card bg-light">
                    <div class="row card-body m-5">
                        <div class="col-8 bg-info rounded-lg mr-3">
                            <h1 class="btn-outline-light rounded-lg m-2 text-center p-2">{{$p->name}}</h1>
                            <article class="text-light m-2 border-light border bg-dark rounded-lg">
                                <u><h4 class="text-center">Description</h4></u>
                                {{$p->description}}
                                @if(strlen($p->description)<50)
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam
                                    asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                    impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                    perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem?
                                @endif
                            </article>
                            <h4 class="bg-success text-white border border-light p-2 m-2 mt-4 rounded-lg">Category: {{$p->category}}</h4>
                           <h4 class="bg-warning text-primary border border-danger p-2 m-2 mb-3 rounded-lg">Discount: {{$p->discount}}%</h4>
                        </div>
                       <div class="col ml-3" >
                           <div style='height: 300px;
                               background: url("{{asset('img/'.$p->path)}}") no-repeat'></div>
                           @if($p->hasDiscount)
                               <h5 class="mt-2 bg-warning p-1 rounded-lg border border-danger text-white"><s>Price: {{$p->price}}</s> <b class="text-danger">Discount price: $<u>{{$p->price-($p->discount*$p->price/100)}}</u></b></h5>
                           @else
                               <h5 class="mt-2 bg-light p-1 rounded-lg border border-primary">Price: {{$p->price}}</h5>
                           @endif
                           @if(Auth::check() && !Auth::user()->isAdmin)
                               <div class="mt-3">


                                   <div class="">
                                       <form id="form" action="{{action('UserController@basket', $p->id)}}">
                                           <button onclick="decrement()" class="btn-outline-info btn" type="button" name="pbutton">
                                               -
                                           </button>
                                               <input class="rounded-lg col-2 text-center m-2 border-0 bg-light"
                                                      type="text" id="C"  readonly name="count" value="1">

                                           <button onclick="increment()" class="btn-outline-info btn" type="button" name="pbutton">
                                               +
                                           </button>
                                       </form>
                                   </div>

                               </div>
                           @endif
                       </div>
                        @if(Auth::check() && !Auth::user()->isAdmin)
                            <div class="row w-100 m-3">
                                <div class="text-center col-6 bg-primary m-2 p-4 rounded-lg">
                                    <h5 class="font-weight-light text-light mb-3">Add to Cart</h5>
                                    <a onclick="f()">
                                        <img class="order" src="{{asset('img/commerce.svg')}}" alt=""></a>
                                </div>
                                <div class="text-center col bg-success m-2 p-4 rounded-lg">
                                    <h5 class="font-weight-light text-light mb-3">Add to Favourites</h5>
                                    <a onclick="window.location='{{url('fav', $p->id)}}'">
                                        <img style="filter: invert{{($f ?? '')? '(100%);' : '(0);'}}"
                                             class="order" id="fav" src="{{asset('img/interface.svg')}}" alt=""></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(fade_out, 3000);

        function fade_out() {
            $("#M").fadeOut().empty();
        }
function f() {
    document.getElementById('form').submit();
}
        function increment() {
            $('#C').val( function(i, oldval) {
                return ++oldval;
            });
        }
        function decrement() {
            $('#C').val( function(i, oldval) {
                if (oldval == 1){
                    return oldval;
                }
                return --oldval;
            });
        }
        // function F() {
        //     if ($("#fav").css('filter') == 'invert(0)'){
        //         console.log('LLL');
        //         $('#fav').css('filter', 'invert(100%)')
        //     }
        //         else{
        //         console.log('NN');
        //         $('#fav').css('filter', 'invert(0%)')
        //     }
        // }
    </script>
@endsection
