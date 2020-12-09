@extends('layouts.main')
@section('head')
    <title>Checkout</title>
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
@endsection
@section('content')
    <div class="min-vh-100 d-flex justify-content-center container">
        <div class="m-5 p-5 card card-body bg-light w-100 my-5">
                <h1 class="btn btn-primary rounded-lg text-center">Order Success</h1>

            <table class="table table-hover table-bordered m-3">
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach($orders??[] as $o)
                    @php
                        $p = App\Models\Product::find($o->pId);
                    @endphp
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$o->count}}</td>
                        <td>{{$p->price*(1-$p->discount/100)}}$</td>
                        @php
                            $total += ($p->price*(1-$p->discount/100))*$o->count;
                        @endphp
                    </tr>
                @endforeach
                <tr>
                    <td class="alert-success text-center font-weight-bold" colspan="3">Total: {{$total}}$</td>
                </tr>
            </table>
                <a class="text-center w-100 bg-info rounded-lg p-2 text-white" href="/">Home</a>
        </div>
    </div>
    @endsection
