<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Feedback;
use App\Models\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{
    public function home(){
        $p = Product::all()->toArray();
        $RandKeys = array_rand($p, 8);
        $arr = array();
        for ($i=0; $i<8; $i++){
            $arr[$i] = $p[$RandKeys[$i]]['id'];
        }
        $p = Product::all()->whereIn('id', $arr);
        return view('home.home')->with('ps', $p);
    }
    public function news(){
        $news = ['Phone: 8-777-476-71-17', 'Address: Uralsk, 7mkr', 'Email: a.kadirov.17.06@gmail.com'];
        return view('news')->with('News', $news);
    }
    public function basket(){
        $u = Auth::user();
        $p = $u->order;
        $b = Order::where('uid', $u->id)->get();
        return view('basket')->with('products', $p)->with('b', $b);
    }
    public function favourites(){
        $u = Auth::user();
        $p = $u->favourites;
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
        $fb = Feedback::all()->where('pId', $id);
        return view('product-details')->with('p', $p)->with('f', $L)->with('fbs', $fb);
    }
    public function profile(){
        $u = Auth::user();
        return view('layouts.profile')->with('u', $u);
    }
}
