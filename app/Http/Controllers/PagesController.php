<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){

        return view('home.home');
    }
    public function news(){
        return view('news');
    }
    public function basket(){

        return view('basket');
    }
    public function favourites(){

        return view('favourites');
    }
    public function login(){

        return view('auth.login');
    }
    public function signup(){

        return view('auth.register');
    }
    public function product(){

        return view('signup');
    }
}
