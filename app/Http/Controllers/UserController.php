<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Feedback;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function favourites($id){
        $uid = Auth::id();
        $p = Product::find($id);
        $L = DB::table('favourites')->select('favourites.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'favourites.uid', '=', 'users.id')->
        join('products', 'favourites.pid', '=', 'products.id')->first();
        if (!$L) {
            DB::table('favourites')->insert([
                'uid' => $uid,
                'pid' => $id
            ]);
        }
        else{
            DB::table('favourites')->where('uid', $uid)->
            where('pid', $id)->delete();
        }
        $L = DB::table('favourites')->select('favourites.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'favourites.uid', '=', 'users.id')->
        join('products', 'favourites.pid', '=', 'products.id')->first();

//        $L = Favourites::all()->where('uid', '=', '$uid')->get();
        $fb = Feedback::all()->where('pId', $id);
        return view('product-details')->with('p', $p)->with('f', $L)->with('fbs', $fb);
    }
    function basket($id, Request $request){
        $uid = Auth::id();
        $p = Product::find($id);
        $L = DB::table('orders')->select('orders.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'orders.uid', '=', 'users.id')->
        join('products', 'orders.pid', '=', 'products.id')->first();
        if (!$L) {
            DB::table('orders')->insert([
                'uid' => $uid,
                'pid' => $id,
                'count'=>$request->input('count')
            ]);
        }
        else{
        }
        $L = DB::table('orders')->select('orders.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'orders.uid', '=', 'users.id')->
        join('products', 'orders.pid', '=', 'products.id')->first();

//        $L = Favourites::all()->where('uid', '=', '$uid')->get();

        $fb = Feedback::all()->where('pId', $id);
        return view('product-details')->with('p', $p)->with('b', $L)->with('fbs', $fb);
    }
    function destroyFromBasket($id){
        $uid = Auth::id();
        DB::table('orders')->where('uid', $uid)->
        where('pid', $id)->delete();
        $p = DB::table('products')->select('products.*')->
        join('orders', 'products.id', '=', 'orders.pid')->
        join('users', 'orders.uid', '=', 'users.id')->
        where('orders.uid',  $uid)->get();
//        $pr = Product::all()->whereIn('id', $p);
        return redirect('basket')->with('products', $p);
    }
    function destroyFromFavourites($id){
        $uid = Auth::id();
        DB::table('favourites')->where('uid', $uid)->
        where('pid', $id)->delete();
        $p = DB::table('products')->select('products.*')->
        join('favourites', 'products.id', '=', 'favourites.pid')->
        join('users', 'favourites.uid', '=', 'users.id')->
        where('favourites.uid',  $uid)->get();
//        $pr = Product::all()->whereIn('id', $p);
        return redirect('favourites')->with('products', $p);
    }
    function update(Request $request){
        $v = $request->validate([
            'firstname'  => 'required|max:190',
            'lastname'  => 'required|max:100',
            'phone' => 'required'
        ]);
        $u = Auth::user();
        $u->firstname = $request->input('firstname');
        $u->lastname = $request->input('lastname');
        $u->phone = $request->input('phone');
        $u->save();
        return view('layouts.profile')->with('u', $u)->with('m', 'Updated');
    }
    function profileImage(Request $request){
        if ($request->ajax()){
            $u = Auth::user();
            $u->photo = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('/img'), $u->photo);
            $u->save();
            $out = "<div style=\"background: url('".asset((is_null($u->photo))?'img/profile.jpg':'img/'.$u->photo) . "') no-repeat;
                            height: 300px;
                            width: 300px;
                            background-size: 300px 300px\" class=\"rounded-lg m-auto\"></div>";
            echo $out;
        }
    }
}
