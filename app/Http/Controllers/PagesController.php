<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view('home.welcome');
    }
    public function news(){
        return view('news');
    }
    public function basket(){
        return view('basket');
    }
    public function category(){
        return view('category');
    }
    public function favourites(){
        return view('favourites');
    }
    public function login(){
        return view('login');
    }
    public function signup(){
        return view('signup');
    }
}
