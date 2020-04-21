<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    public function getSignup(){
        $categories = Category::all();
        return view('signup')->with('categories', $categories);
    }
    public function postSignup(Request $request){
        $this->validate($request, [
           'name' => 'required|alpha|max:40',
           'email' => 'required|unique:users|email|max:100',
           'password' => 'required|alpha_dash|max:30',
           'cpassword' => 'required|required_with:password|same:password'
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>bcrypt($request->input('password')),
            'isAdmin' => false,
        ]);
        return redirect()->action('PagesController@home')->with('info', 'You are registered successfully!');
    }

}
