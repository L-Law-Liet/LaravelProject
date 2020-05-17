@section('head')
    <title>Update</title>
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection
@extends('layouts.main')
@section('content')
<div class="min-vh-100">
    <a class="btn btn-info m-1 mt-5 position-fixed" href="{{url()->previous()}}"><img src="{{asset('img/undo.svg')}}" alt=""></a>
    <div class="d-flex justify-content-center">
        <div id="M" style="min-height: 18px; opacity: 80%; z-index: 10; display: {{($m ?? '')? 'block;' : 'none;'}}"
             class="bg-primary text-center text-white m-4 w-50 rounded-lg position-absolute">
            <h4>Product Updated Successfully!</h4>
        </div>
        <div class="col-8 m-5 border border-info rounded-lg bg-light ">
            <div class="m-3">
                <h1 class="btn-outline-info w-100 rounded-lg text-center">Product Details</h1>
            </div>
            <form action="{{action('ProductsController@update', $product->id)}}"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div>
                    <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Name: </label>
                        <input name="name" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->name}}"></div>
                    <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Price: </label>
                        <input name="price" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->price}}"></div>
                    <div class="rounded-lg border-info border p-3 m-3 text-center"><label class="col-2 font-weight-bold">Description: </label>
                        <textarea style="resize: none; height: 200px"  name="description" class="p-1 col rounded-lg d-block border bg-light">{{$product->description}}</textarea></div>
                    <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Discount: </label><input name="discount" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->discount}}"></div>
                    <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">Category: </label><input name="category" class="col-9 p-1 rounded-lg border bg-light d-inline" type="text" value="{{$product->category}}"></div>
                    <div class="rounded-lg border-info border p-1 m-3"><label class="col-2 font-weight-bold">
                            <abbr class="text-decoration-none mark" title="JPG PNG JPEG">Image:</abbr>
                        </label><input name="image" class="col-8 p-1 rounded-lg border bg-light d-inline" type="file" accept=".jpg, .jpeg, .png, .gif"></div>
                </div>
                <div class="m-3 text-center">
                    <button type="submit" class="btn btn-success col-3"><img src="{{asset('img/save.svg')}}" alt=""></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    setTimeout(fade_out, 3000);

    function fade_out() {
        $("#M").fadeOut().empty();
    }
</script>
@endsection
