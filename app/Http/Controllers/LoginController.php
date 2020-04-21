<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('auth.login')->with('categories', $categories);
    }
    public function checkLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alpha_dash'
            ]);
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        User::show([
           'name' => User::all()->where('email', '=', '$request->email')
        ]);
    }
}
