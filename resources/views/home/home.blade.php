@extends('layouts.main')
@section('head')

<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
@endsection
@section('content')
       <div class="d-flex justify-content-center m-2 p-2">
           <div class="card bg-light">
               <div class="card-body rounded-lg">
                  @foreach($ps as $p)
                   <div class="bg-info rounded-lg p-2 m-3">
                       <div class="m-4">
                           <h3 class="text-center btn-outline-warning mb-5 rounded-lg p-1" onclick="window.location='{{url("product-details", $p['id'])}}'">{{$p['name']}}</h3>
                           <img onclick="window.location='{{url("product-details", $p['id'])}}'" class="rounded-lg" src="{{asset('img/'. $p['path'] .'.jpg')}}" alt="">
                       </div>
                   </div>
                   @endforeach

               </div>
           </div>
       </div>

@endsection
