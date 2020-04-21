<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $categories = Category::all();
        return view('home.home')->with('categories', $categories);
    }
    public function news(){
        $categories = Category::all();
        return view('news')->with('categories', $categories);
    }
    public function basket(){
        $categories = Category::all();
        return view('basket')->with('categories', $categories);
    }
    public function favourites(){
        $categories = Category::all();
        return view('favourites')->with('categories', $categories);
    }
    public function login(){
        $categories = Category::all();
        return view('auth.login')->with('categories', $categories);
    }
    public function signup(){
        $categories = Category::all();
        return view('signup')->with('categories', $categories);
    }
    public function product(){
        $categories = Category::all();
        return view('signup')->with('categories', $categories);
    }
}
