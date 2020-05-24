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
    function sortCategory($request, $category=null){
        if (($category?$category->id:null)){

            $name = $category->name;
            switch ($request){
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
            switch ($request){
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
        return $products;
    }
    function sortSearchedCategory($request, $category=null, $search){
        if (!is_null($category)){

            $name = $category->name;
            switch ($request){
                case 'pricea':
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->orderBy('price')->get();
                    break;
                case 'priced':
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->orderBy('price', 'desc')->get();
                    break;
                case 'az':
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->orderBy('name')->get();
                    break;
                case 'za':
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->orderBy('name', 'desc')->get();
                    break;
                case 'new':
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->orderBy('created_at')->get();
                    break;
                default:
                    $products = Product::where('category', '=', "$name")->where('name', 'like', '%'.$search.'%')->paginate(6);
            }
        }
        else{
            switch ($request){
                case 'pricea':
                    $products = Product::where('name', 'like', '%'.$search.'%')->orderBy('price')->get();
                    break;
                case 'priced':
                    $products = Product::where('name', 'like', '%'.$search.'%')->orderBy('price', 'desc')->get();
                    break;
                case 'az':
                    $products = Product::where('name', 'like', '%'.$search.'%')->orderBy('name')->get();
                    break;
                case 'za':
                    $products = Product::where('name', 'like', '%'.$search.'%')->orderBy('name', 'desc')->get();
                    break;
                case 'new':
                    $products = Product::where('name', 'like', '%'.$search.'%')->orderBy('created_at')->get();
                    break;
                default:
                    $products = Product::where('name', 'like', '%'.$search.'%')->paginate(6);
            }
        }
        return $products;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|\Illuminate\View\View
     */
    public function show($id=null, Request $request)
    {
        $category = Category::all()->where('id', '=', "$id")->first->get();
        $products = $this->sortCategory($request->input('sort'), $category);
        $u = Auth::id();
        $L = User::all()->where('id', '=', "$u")->first->toArray();
        $N = $L['isAdmin'];
        return view('category')->with('products', $products)->with('admin', $N)->with('category', $category)
            ->with('SortType', $request->input('sort'));
    }
    public function search($c=null, $sortType=null, Request $request){

        if ($request->ajax()){
            if ($c){
                $category = Category::all()->where  ('name', '=', "$c")->first->get();
            }
            else $category = null;
            $out = '';
            if (!$request->search){
                $ps = $this->sortCategory($sortType, $category);
            }
            else $ps = $this->sortSearchedCategory($sortType, $category, $request->search);
            if ($ps){
                $u = -1;
                if (Auth::user()){
                    $u = User::find(Auth::id());
                    $u = $u->isAdmin;
                }
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
                    if ($u == 1) {
                        $out .= "
                                        <div class=\"text-center mt-3 m-2 \">
                                            <div class=\"d-inline\">
                                                <form class=\"d-inline\" action=\"".action('ProductsController@destroy', $p->id)."\" method=\"post\">".
                                                    method_field('DELETE').
                                                    csrf_field()
                                                    ."<button type=\"submit\" class=\"btn btn-danger col-2\">
                                                        <img src=\"".asset('img/trash.svg')."\" alt=\"\">
                                                    </button>
                                                </form>
                                            </div>
                                            <div class=\"d-inline\">
                                                <form class=\"d-inline\" action=\"".url('product/edit', $p->id)."\" method=\"post\">".
                                                    csrf_field()
                                                    ."<button class=\"btn btn-info col-2\" type=\"submit\">
                                                        <img src=\"".asset('img/edit.svg')."\" alt=\"\">
                                                    </button>
                                                </form>
                                            </div>
                                        </div>";
                    }
                    $out .= "</div>
                           <div class=\"align-middle col m-1\">
                               <div class=\"Image rounded-lg m-1\"  onclick=\"window.location='".url("product-details", $p->id)."'\"
                                    style=\"background:  url('". url("img/$p->path") ."') no-repeat\">
                               </div>
                               <p class=\"m-2 border p-1 rounded-lg ". (($p->hasDiscount)?'Dper':'') ."\">Discount: $p->discount%</p>
                                <p class=\"m-2 p-1 rounded-lg border ". (($p->hasDiscount)?'Discount':''). "\">
                                        Discount price: $<u>". ($p->price-($p->discount*$p->price/100))."</u></p>";

                    $out .= "</div>
                       </div>
                    </div>";
                }
                if ($out == ''){
                    $out = '<div class="bg-light text-secondary m-5 text-center font-weight-bold border border-info
                        p-2 rounded-lg">Products Not Found</div>';
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
