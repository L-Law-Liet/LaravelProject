<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\View\Components\products;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|\Illuminate\View\View
     */
    public function show($id=null, Request $request)
    {
        if (!empty($id)){
            $category = Category::all()->where  ('id', '=', "$id")->first->toArray();
            $name = $category['name'];
            switch ($request->input('sort')){
                case 'pricea':
                    $products = Product::orderBy('price')->where('category', '=', "$name")->paginate(6);
                    break;
                case 'priced':
                    $products = Product::orderBy('price', 'desc')->where('category', '=', "$name")->paginate(6);
                    break;
                case 'az':
                    $products = Product::orderBy('name')->where('category', '=', "$name")->paginate(6);
                    break;
                case 'za':
                    $products = Product::orderBy('name', 'desc')->where('category', '=', "$name")->paginate(6);
                    break;
                case 'new':
                    $products = Product::orderBy('created_at')->where('category', '=', "$name")->paginate(6);
                    break;
                default:
                        $products = Product::where('category', '=', "$name")->paginate(6);
            }
        }
        else{
            $category = '';

            switch ($request->input('sort')){
                case 'pricea':
                    $products = Product::orderBy('price')->paginate(6);
                    break;
                case 'priced':
                    $products = Product::orderBy('price', 'desc')->paginate(6);
                    break;
                case 'az':
                    $products = Product::orderBy('name')->paginate(6);
                    break;
                case 'za':
                    $products = Product::orderBy('name', 'desc')->paginate(6);
                    break;
                case 'new':
                    $products = Product::orderBy('created_at')->paginate(6);
                    break;
                default:
                    $products = Product::paginate(6);
            }
        }
        $u = Auth::id();
        $L = User::all()->where('id', '=', "$u")->first->toArray();
        $N = $L['isAdmin'];
        $m =array('', '');
        return view('category')->with('products', $products)->with('admin', $N)->with('category', $category)->
        with('m', $m)->with('SortType', $request->input('sort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
