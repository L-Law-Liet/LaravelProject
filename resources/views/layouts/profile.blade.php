@extends('layouts.main')
@section('head')
    <title>Profile</title>
    @endsection
@section('content')
    <div class="min-vh-100 p-5">
        <div class="container">
            <div class="card card-body">
                <div class="row p-4">
                    <div class="col-4 text-center p-2 border rounded-lg">
                        <div style='background: url("{{asset((is_null($u->photo))?'img/profile.jpg':'img/'.$u->photo)}}") no-repeat;
                            height: 300px;
                            width: 300px;
                            background-size: 300px 300px' class="rounded-lg m-auto"></div>
                        <div class="m-1">
                            <form action="" method="post">
                                <input name="image" class="p-1 border bg-light rounded-lg" type="file"
                                       accept=".jpg, .jpeg, .png, .gif">
                            </form>
                        </div>
                    </div>
                    <div class="col-8 border-left-0 border rounded-lg">
                        <div class="">
                            <form action="" method="post">
                                <div class=" rounded-lg">
                                    <div class="m-3">
                                        <label class="col-3">ID: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->id}}" readonly>
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">FirstName: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->firstname}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">LastName: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->lastname}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">Phone: </label><input class="rounded-lg p-2 col-9 border"  type="tel" name="phone"
                                        placeholder="8-777-444-4774" pattern="[8]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required value="{{$u->phone}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">Date of creation: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->created_at}}" readonly>
                                    </div>
                                    <div class="m-3">
                                        <input type="submit" value="Save" class="btn btn-outline-primary w-100">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
