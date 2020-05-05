<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $p = Product::all()->toArray();
        $RandKeys = array_rand($p, 4);
        $arr = array();
        for ($i=0; $i<4; $i++){
            $arr[$i] = $p[$RandKeys[$i]];
        }
        $i = random_int(0, 5);
        return view('home.home')->with('ps', $arr)->with('i', $i);
    }
}
