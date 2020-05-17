@extends('layouts.main')
@section('head')
    <title>Home</title>
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
@endsection
@section('content')
    <h1 class="text-center font-weight-normal rounded-lg p-2 m-4">In our store you will find</h1>
    <div class="m-5">
        <?$i = 0?>
        @foreach($ps as $k => $p)
            @if($i%2 == 0)
                <div>
                @endif
            <div class="bg-light border rounded-lg p-2 m-3 {{($i%2 == 0)? 'Dleft':'Dright'}}">
              <div>
                  <div class="m-4">
                      <div class="text-center mb-5 p-1">
                          <h4 class="font-weight-normal">{{$p->name}}</h4></div>
                      <div class="Cont">
                        <div class="mb-4 {{($i%2 == 0)? 'float-left': 'float-right'}}" style="width: 350px; height: 300px">
                          <div onclick="window.location='{{url("product-details", $p->id)}}'" class="Img rounded-lg"
                               style="background: url('{{asset('img/'. $p->path)}}') no-repeat"></div>
                        </div>
                        <div class="Art {{($i%2 == 0)? 'float-left': 'float-right'}} position-absolute">
                           <article class="card p-2 rounded-lg text-center">
                               <h4><u>Description</u></h4>
                               {{(strlen($p->description)>600)?substr($p->description, 0, 600).'...':$p->description}}
                               @if(strlen($p->description)<50)
                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam
                                   asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                   impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                   perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem?
                               @endif
                           </article>
                           <div class="Cost">
                               <h4 style="margin-top: 1%"
                                   class="border p-2 rounded-lg font-weight-normal
                            {{($p->hasDiscount)? 'Discount': ''}}">
                                   Cost: ${{$p->price}}</h4>
                           </div>
                        </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="Cont {{($i%2 == 0)? 'ml-4': 'mr-4'}}">
                      <a id="Ref" href="{{url("product-details", $p->id)}}"
                         class="btn p-2 rounded-lg text-decoration-none text-white">More >></a>
                  </div>
              </div>
            </div>
            @if($i%2 != 0)
                <div class="clearfix"></div>
                @endif
                    @if($i%2 != 0)
                        </div>
                            @endif
           <?$i++?>
        @endforeach
    </div>
    <h1 onclick="window.location='{{url('category')}}'" class="text-center btn-primary rounded-lg p-2 m-4">Click to More...</h1>
@endsection
