@extends('layouts.main')
@section('head')
    <title>Checkout</title>
    <link rel="stylesheet" href="{{asset('css/favourites.css')}}">
@endsection
@section('content')
    <div class="min-vh-100 d-flex justify-content-center container">
        <form class="m-5 pt-5 card card-body bg-light" action="{{route('checkout.do')}}" method="post">
            @csrf
            <div class="d-flex justify-content-between">
                <div class="w-100 mr-2">
                    <input name="card" placeholder="Card Number" class="credit-card form-control text-center" style="font-size: 1.5rem; width: 80%; margin-left: 10%;" type="text" maxlength="19">
                    <div class="mt-3 d-flex justify-content-center">
                        <input name="month" placeholder="Month" class="m-2 form-control" style="width: 15%;" type="text" maxlength="2"> <h1>/</h1> <input name="year" style="width: 15%;" placeholder="Year" class="m-2 form-control w-25" type="text"  maxlength="4">
                    </div>
                    <div class="m-4 d-flex justify-content-center">
                        <input name="cvv" class="form-control" style="width: 20%;" placeholder="CVV" type="text" maxlength="3">
                    </div>
                    <div class="m-4 d-flex justify-content-center">
                        <input name="name" class="form-control" placeholder="Fullname" style="font-size: 1.2rem; width: 90%; margin-left: 5%;" type="text">
                    </div>
                    <div class="m-4 d-flex justify-content-center">
                        <input name="email" class="form-control" placeholder="Email" style="font-size: 1.2rem; width: 90%; margin-left: 5%;" type="email">
                    </div>
                    <div class="d-flex justify-content-between m-4 mt-5 pt-5">
                        <a class="p-2 pl-5 pr-5 btn btn-info" href="{{route('basket')}}">Back</a>
                        <input class="btn btn-danger p-2 pl-5 pr-5" type="reset" value="Clear">
                        <input class="btn btn-success p-2 pl-5 pr-5" type="submit" value="Submit">
                    </div>
                </div>
                <div class="w-100 ml-2">
                    <h2 class="text-center btn-primary rounded-lg p-2">Your Products</h2>

                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                    @foreach(\App\Order::where('uId', auth()->id())->get() as $o)
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
                            <td class="alert-danger text-center font-weight-bold" colspan="3">Total: {{$total}}$</td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <script !src="">
        $('.credit-card').keyup(function() {
            var foo = $(this).val().split("-").join(""); // remove hyphens
            if (foo.length > 0) {
                foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
            }
            $(this).val(foo);
        });
    </script>
    @endsection
