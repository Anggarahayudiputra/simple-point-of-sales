<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('product.index',[
            'products'=> $products
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required|int',
        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;

        $products->save();

        return redirect()->route('product.index');
    }

    public function edit(Product $product){

        return view('product.edit',[
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product){

        $request->validate([
            'name'=> 'required',
            'price'=>'required|int',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product updated success!');
    }

    public function destroy(Product $product){
        $product->delete();

        return redirect()->route('product.index');
    }
}
