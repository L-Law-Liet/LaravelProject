@section('head')
    <link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection
@extends('layouts.main')
@section('content')
<div class="min-vh-100">
    @if(count($products)>0)
        @foreach($products as $p)
            <div class="card bg-light card-body">
                <h3>{{$p->name}}</h3>

                @if($admin)
                    <button class="btn btn-info col-1" onclick="window.location='{{url('product', $p->id)}}'">
                        <img src="{{asset('img/edit.svg')}}" alt="">
                    </button>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
