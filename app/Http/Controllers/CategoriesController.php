<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\View\Components\products;
use http\Env\Response;
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
        return view('category')->with('products', $products)->with('admin', $N)->with('category', $category)
       ->with('SortType', $request->input('sort'));
    }
    public function search(Request $request){
        if ($request->ajax()){
            $out = '';
            $ps = DB::table('products')->where('name', 'like', '%'.$request->search.'%')->
            orWhere('category', 'like', '%'.$request->search.'%')->get();
        if ($ps){
            $u = User::find(Auth::id());
           foreach ($ps as $p){
               $out .= "   <div class=\"card bg-light card-body m-5\">
                       <div class=\"row\">
                           <div class=\"col-7 m-2\">
                               <div class=\"m-1\">
                                   <h3 class=\"btn-outline-primary btn w-100 border-right-0 border-left-0 rounded-0 btn-lg\"
                                       onclick=\"window.location='".url("product-details",$p->id) ."'\">$p->name</h3>
                               </div>
                               <div class=\"m-1\"><h4>Category: $p->category</h4></div>
                               <div class=\"m-1\"><h5>Price: $$p->price</h5></div>
                               <div class=\"card card-body bg-light m-1\">
                                   <h6 class=\"text-center\">Description</h6>
                                   <article>".
                   $p->description;
                                       if(strlen($p->description)<50) {
                                           $out .= "Lorem ipsum dolor sit amet, consectetur adipisicing elit . Accusantium aperiam
                                           asperiores at beatae consectetur cupiditate debitis delectus, dolorem enim, facilis
                                           impedit incidunt ipsa iusto laboriosam, laudantium molestiae odio omnis optio pariatur
                                           perspiciatis quasi quidem repudiandae sapiente ullam unde velit voluptatem ?";
                                           }
                                 $out .= " </article>
                               </div>";
                   if ($u->isAdmin) {
                       $out .= "                                 <div class=\"text-center mt-3 m-2\">
                                       <button onclick=\"window.location='".action('ProductsController@destroy', $p->id)."'\" class=\"btn btn-danger col-2\">
                                           <img src=\"{{asset('img/trash.svg')}}\" alt=\"\"></button>

                                       <button class=\"btn btn-info col-2\" onclick=\"window.location='".url('product/edit', $p->id)."'\">
                                           <img src=\"{{asset('img/edit.svg')}}\" alt=\"\">
                                       </button>
                                   </div>";
                               }
                           $out .= "</div>
                           <div class=\"align-middle col m-1\">
                               <div class=\"Image rounded-lg m-1\"  onclick=\"window.location='".url("product-details", $p->id)."'\"
                                    style=\"background:  url('". url("img/$p->path") ."') no-repeat\">
                               </div>
                               <p class=\"m-2 bg-info p-1 rounded-lg\">Discount:
                   $p->discount%</p>";

                               if($p->hasDiscount) {
                                   $out .= "<p class=\"m-2 bg-warning p-1 rounded-lg border border-danger text-white\">
                                       <s>Price:
                   $p->price</s> <b class=\"text-danger\">Discount price: $<u>".($p->price - ($p->discount * $p->price / 100))."</u></b></p>";
                               }
                               else{
                                   $out .= "<p class=\"m-2 bg-light p-1 rounded-lg border border-primary\">Price:
                   $$p->price</p>";
                               }
                               $out .= "</div>
                       </div>
                    </div>";
            }
            return Response($out);
        }
        }
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
