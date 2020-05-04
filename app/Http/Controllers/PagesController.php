<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{
    public function home(){
        $p = Product::all()->toArray();
        $RandKeys = array_rand($p, 5);
        $arr = array();
        for ($i=0; $i<5; $i++){
            $arr[$i] = $p[$RandKeys[$i]];
        }
        return view('home.home')->with('ps', $arr);
    }
    public function news(){
        return view('news');
    }
    public function basket(){
        $u = Auth::id();
        $fids = DB::table('orders')->select('orders.pid')->where('uid', $u);
        $p = DB::table('products')->select('products.*')->
        join('orders', 'products.id', '=', 'orders.pid')->
        join('users', 'orders.uid', '=', 'users.id')->
        where('orders.uid',  $u)->get();
//        $pr = Product::all()->whereIn('id', $p);
        return view('basket')->with('products', $p);
    }
    public function favourites(){
        $u = Auth::id();
        $fids = DB::table('favourites')->select('favourites.pid')->where('uid', $u);
        $p = DB::table('products')->select('products.*')->
        join('favourites', 'products.id', '=', 'favourites.pid')->
        join('users', 'favourites.uid', '=', 'users.id')->
        where('favourites.uid',  $u)->get();
//        $pr = Product::all()->whereIn('id', $p);
        return view('favourites')->with('products', $p);
    }
    public function login(){
        return view('auth.login');
    }
    public function add()
    {
        return view('product-add');
    }
    public  function  product($id){
        $uid = Auth::id();
        $p = Product::find($id);
        $L = DB::table('favourites')->select('favourites.*')->
        where('uid',  $uid)->where('pid', $id)->
        join('users', 'favourites.uid', '=', 'users.id')->
        join('products', 'favourites.pid', '=', 'products.id')->
        first();
//        $L = Favourites::all()->where('uid', '=', '$uid')->get();
        return view('product-details')->with('p', $p)->with('f', $L);
    }
}
