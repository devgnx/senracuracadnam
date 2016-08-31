<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $page = [
        "title" => "Produto"
    ];

    public function index($id)
    {
        $page = $this->page;
        $product = Product::find($id);
        return view('product.index', compact(['product', 'page']));
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
        //$product->slug = str_slug($product->name);
        $product->save();

        return redirect()->route('products.index');
    }
}
