<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Models\Product;
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
    function basket($id){
        $uid = Auth::id();
        $p = Product::find($id);
        $L = DB::table('orders')->select('orders.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'orders.uid', '=', 'users.id')->
        join('products', 'orders.pid', '=', 'products.id')->first();
        if (!$L) {
            DB::table('orders')->insert([
                'uid' => $uid,
                'pid' => $id
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
    function destroy($id){
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

}
