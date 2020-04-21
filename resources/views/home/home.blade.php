@extends('layouts.main')
@section('head')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
@endsection
@section('content')

       <div class="d-flex justify-content-center m-2 p-2">
           <div class="card bg-light">
               <div class="card-body rounded-lg">
                   <div class="m-4">
                       <img src="{{asset('img/s1.jpg')}}" alt="">
                   </div>
                   <div class="m-4">
                       <img src="{{asset('img/s2.jpg')}}" alt="">
                   </div>
                   <div class="m-4">
                       <img src="{{asset('img/s3.jpg')}}" alt="">
                   </div>
               </div>
           </div>
       </div>

@endsection
