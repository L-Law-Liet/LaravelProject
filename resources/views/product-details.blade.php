@extends('layouts.main')
@section('head')
    <title>{{$p->name}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="row mt-4 mb-3">
                    <div class="col-1"></div>
                    <div class="col-10 card bg-light">
                        <div class="card-body m-4">
                            <div  style="float: left; width: 70%; box-sizing: border-box">
                                <div class="card mr-2 p-2 rounded-lg">
                                    <h1 class="text-center font-weight-normal rounded-lg m-2"
                                        style="background-color: #00b0ff; color: whitesmoke">{{$p->name}}</h1>
                                <article class=" m-2 border rounded-lg"
                                style="background-color: lightcyan">
                                    <u><h4 class="text-center">Description</h4></u>
                                    {{$p->description}}
                                    @if(strlen($p->description)<50)
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam
                                        asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                        impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                        perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem?
                                    @endif
                                </article>
                                <h4 class="font-weight-normal p-2 m-2 rounded-lg border"
                                    style="background-color: lightcyan">Category: {{$p->category}}</h4>
                            </div>
                            </div>
                            <div style="float: left; width: 30%; box-sizing: border-box">
                                <div class="m-2 w-100" style="width: 380px;">
                                <div style='height:300px; background: url("{{asset('img/'.$p->path)}}") no-repeat'></div>
                                   @if($p->hasDiscount)
                                        <h5 class="font-weight-light bg-warning text-primary border border-danger p-1 m-1 rounded-lg">Discount: {{$p->discount}}%</h5>
                                        <h5 class="font-weight-light m-1 bg-warning p-1 rounded-lg border border-danger text-white"><s>Price: ${{$p->price}}</s> <b class="text-danger">Discount price: $<u>{{$p->price-($p->discount*$p->price/100)}}</u></b></h5>
                                @else
                                        <h5 class="font-weight-light m-1 bg-light p-1 rounded-lg border border-primary">Discount: {{$p->discount}}%</h5>
                                        <h5 class="font-weight-light m-1 bg-light p-1 rounded-lg border border-primary">Price: ${{$p->price}}</h5>
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
                            </div>
                            <div class="clearfix"></div>
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
                            @elseif(!Auth::check())
                                <div class="m-3 p-3 border border-info rounded-lg text-center">
                                    <h4 class="font-weight-normal">In order to buy products or to mark them, you must
                                        <a class="text-decoration-none" href="{{url('login')}}"><em>login</em></a> or
                                        <a class="text-decoration-none" href="{{url('register')}}"><em>register</em></a></h4>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div>
            <div class="justify-content-center d-flex">
                <div class="mt-3 mb-4 w-100">
                    <div class="row">
                        <div class="col-1 p-0"></div>
                        <div class="col-10 card bg-light">

                            <h2 class="text-center font-weight-normal p-1 rounded-lg m-2 text-muted">Comments</h2>
                                <div class="justify-content-center d-flex">
                                    <div class="w-100">
                                        <div class="container p-4">
                                            <form class="p-3 rounded-lg card" action="">

                                                <h1 class="text-center font-weight-normal rounded-lg"
                                                style="background-color: #00b0ff; color: whitesmoke">Your Feedback</h1>
                                                <div>
                                                    <div class="rating">
                                                        <input type="radio" name="rating" value="5" id="5">
                                                        <label for="5">☆</label>
                                                        <input type="radio" name="rating" value="4" id="4">
                                                        <label for="4">☆</label>
                                                        <input type="radio" name="rating" value="3" id="3">
                                                        <label for="3">☆</label>
                                                        <input type="radio" name="rating" value="2" id="2">
                                                        <label for="2">☆</label>
                                                        <input type="radio" name="rating" value="1" id="1">
                                                        <label for="1">☆</label>
                                                    </div>
                                                    <div>
                                                        <div class="form-group">
                                                            <label for="comment">Your Comment:</label>
                                                            <textarea style="resize: none" class="form-control" rows="5" id="comment"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <div class="justify-content-center d-flex">
                                <div class="container m-2">
                                    <h2 class="text-center font-weight-normal p-1 rounded-lg m-2"
                                        style="background-color: #00b0ff; color: whitesmoke">Feedbacks</h2>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                    <p class="text-secondary text-center">15 Minutes Ago</p>
                                                </div>
                                                <div class="col-md-10">
                                                    <p>
                                                        <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <div>
                                                        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic
                                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                                                            release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                    <div>
                                                        <p>
                                                            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                                            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 p-0"></div>
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


        var $star_rating = $('.star-rating .fa');

        var SetRatingStar = function() {
            return $star_rating.each(function() {
                if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                    return $(this).removeClass('fa-star-o').addClass('fa-star');
                } else {
                    return $(this).removeClass('fa-star').addClass('fa-star-o');
                }
            });
        };

        $star_rating.on('click', function() {
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
        });

        SetRatingStar();
        $(document).ready(function() {

        });
    </script>

@endsection
