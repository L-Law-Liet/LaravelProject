<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products')->with('products', $products);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::all()->where('id', '=', "$id")->first->get();

    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::all()->where('id', '=', "$id")->first->get();
        return view('products')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $product = Product::all()->where('id', $id);
        DB::table('products')->update(['name' => $request->name, 'price' => $request->input('price') ,
                'description' => $request->input('description'),
                'discount' => $request->discount]
        );
//        foreach ($product as $item) {
//            $item->name = $request->input('name');
//            $item->price = $request->get('price');
//            $item->description = $request->get('description');
//            $item->discount = $request->get('discount');
//            $item->category = $request->get('category');
//        }
//
//        $product->save();
        return redirect()->route('products')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::table('products')->delete();
        $product = DB::table('products')->where('id', '=', $id)->delete();
        return redirect('category');
    }
}
