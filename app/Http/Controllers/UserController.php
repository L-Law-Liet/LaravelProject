<?php

namespace App\Http\Controllers;

use App\Favourites;
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
        return view('product-details')->with('p', $p)->with('f', $L);
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
        return view('product-details')->with('p', $p)->with('b', $L);
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
    function update($id, Request $request){
        $v = $request->validate([
            'firstname'  => 'required|max:190',
            'lastname'  => 'required|max:100',
            'phone' => 'required|numeric|size:11'
        ]);
        $u = User::find($id);
        $u->firstname = $request->input('firstname');
        $u->lastname = $request->input('lastname');
        $u->phone = $request->input('phone');
        if (is_null(request()->file('image')) ){

        }
        else {
            $u->photo = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('/img'), $u->photo);
        }
        $u->save();
        return view('profile')->with('u', $u)->with('m', 'Updated');
    }
}
