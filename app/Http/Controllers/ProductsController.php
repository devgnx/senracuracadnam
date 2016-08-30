<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controllers
{
    public function index()
    {
        echo 'to na listagem';
    }

    public function save(Request $request)
    {
        if ($request->has('id')) {
            $product = Product::find($request->input('id'));
        } else {
            $product = new Product();
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->name = $request->input('name');
        $prodict->category_id = $request->input('category_id');
        $product->save();

        return redirect()->route('products.index');
    }
}
