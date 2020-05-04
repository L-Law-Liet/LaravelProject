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
        $RandKeys = array_rand($p, 5);
        $arr = array();
        for ($i=0; $i<5; $i++){
            $arr[$i] = $p[$RandKeys[$i]];
        }
        return view('home.home')->with('ps', $arr);
    }
}
