<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Feedback;
use App\Models\Product;
use App\Order;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function favourites($id){
        $u = Auth::user();
        $p = Product::find($id);
        $f = Favourites::where('pid', $p->id)->where('uid', $u->id)->first();
        if ($f){
            $u->favourites()->detach($p->id);
        }
        else{
            $u->favourites()->attach($p->id);
        }
        $f = Favourites::where('pid', $p->id)->where('uid', $u->id)->first();
        $fb = Feedback::all()->where('pId', $id);
        return view('product-details')->with('p', $p)->with('f', $f)->with('fbs', $fb);
    }
    function basket($pid, Request $request){
        $u = Auth::user();
        $p = Product::find($pid);
        $order = Order::where('pid', $pid)->where('uid', $u->id)->first();
        if ($order){
            $order->count += $request->input('count');
            $order->save();
        }
        else {
            $order = new Order;
            $order->uId = $u->id;
            $order->pId = $pid;
            $order->count = $request->input('count');
            $order->save();
        }
        $fb = Feedback::all()->where('pId', $pid);
        return view('product-details')->with('p', $p)->with('order', $order)->with('fbs', $fb);
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
        $u = Auth::user();
        $p = Product::where('id', $id)->get();
        $u->favourites()->detach($p);
        return redirect('favourites')->with('products', $p);
    }
    function update(Request $request){
        $v = $request->validate([
            'firstname'  => 'required|max:190',
            'lastname'  => 'required|max:100',
            'phone' => 'required|unique:users'
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
