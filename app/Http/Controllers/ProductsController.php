<?php

namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
use App\Models\Product;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Validation\Validator;
    use Symfony\Component\Console\Input\Input;

    class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        return view('product-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $v = $request->validate([
            'name'  => 'required|max:50',
            'price' => 'required|numeric',
            'description'  => 'required',
            'discount'  => 'required|numeric',
            'category' => 'required|min:3'
        ]);
        if ($request->input('discount')>0){
            $hasD = 1;
        }
        else{
            $hasD = 0;
        }
        DB::table('products')->insert([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'category'=>$request->input('category'),
            'discount'=>$request->input('discount'),
            'hasDiscount'=>$hasD,
            'path' => $request->input('path')
        ]);
//        $p = new Product();
//        $p->name = $request->input('name');
//        $p->price = $request->input('price');
//        $p->description = $request->input('description');
//        $p->discount = $request->input('discount');
//        if ($p->discount>0){
//            $p->hasDiscount = 1;
//        }
//        else{
//            $p->hasDiscount = 0;
//        }
//        $p->category = $request->input('category');
//        $p->save();
        $m = array('success', 'Product Created Successfully');
        return redirect('category')->with('m', $m);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::all()->where('id', '=', "$id")->first->get();

    }
        public function sale()
        {
            $products = Product::where('discount', '>', '0')->orderBy('discount', 'desc')->paginate(6);
            $u = Auth::id();
            $a = User::all()->where('id', '=', $u)->first->toArray();
            $L = $a['isAdmin'];
            return view('sales')->with('products', $products)->with('title', 'Sales Products $$')->with('admin', $L);
        }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->discount = $request->input('discount');
        $product->category = $request->input('category');
        if ($request->input('discount')>0){
            $product->hasDiscount = 1;
        }
        else{
            $product->hasDiscount = 0;
        }
        $product->path = $request->input('path');
        $product->save();
        return view('products')->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        $m = array('warning', 'Product Deleted Successfully');
        return redirect('category')->with('m', $m);
    }
}
