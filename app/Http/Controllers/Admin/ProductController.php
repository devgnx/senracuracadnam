<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    use LayoutResolver;

    protected $page  = 'products';
    protected $title = 'Produto';

    public function index(Request $request)
    {
        $this->addVar('products', Product::all());
        return view('admin.product.list', $this->compactVars());
    }

    public function create(Request $request)
    {
        $request->session()->forget('warning');
        $this->addVar('product', new Product());
        $this->addVar('categories', Category::all());
        return view('admin.product.form', $this->compactVars());
    }

    public function edit(Request $request)
    {
        $request->session()->forget('warning');
        $this->addVar('product', Product::findOrFail($request->route('id')));
        $this->addVar('categories', Category::orderBy('name')->get());
        return view('admin.product.form', $this->compactVars());
    }

    public function save(Request $request)
    {
        if ($id = $request->route('id')) {
            $product = Product::find($id);
        }

        if (!isset($product)) {
            $product = new Product();
        }

        $product->name  = $request->input('name');
        $product->price = $request->input('price', 0);
        $product->description = $request->input('description');

        if ($request->has('category')) {
            $category = Category::find($request->input('category'));
            $product->category()->associate($category);
        }

        if ($product->save()) {
            return redirect()->route('admin::product:list')->with('success', [
                "Produto salvo com sucesso!"
            ]);
        } else {
            return redirect()->back()->withInput()->with('errors', [
                "Não foi possíval salvar o produto! Tente novamente"
            ]);
        }
    }

    public function delete($id)
    {
        $product  = Product::findOrFail($id);
        $redirect = redirect()->route('admin::product:list');

        if ($product->delete()) {
            return $redirect->with('success', [
                "O produto foi removido com sucesso!"
            ]);
        } else {
            return $redicet->with('errors', [
                "Não foi possível remover o produto! Tente novamente."
            ]);
        }
    }
}
