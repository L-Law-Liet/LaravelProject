<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public  function create($pid, Request $request){
        $fb = new Feedback();
        $u = Auth::user();
        $p = Product::find($pid);
        $fb->name = $u->firstname.' '.$u->lastname;
        $fb->image = $u->photo;
        $fb->comment = $request->input('comment');
        $fb->rate = $request->input('rating');
        $fb->pId = $pid;
        $fb->save();
        $fb = Feedback::all()->where('pId', $pid);
        return view('product-details')->with('p', $p)->with('fbs', $fb);
    }
}
