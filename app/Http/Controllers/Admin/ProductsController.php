<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\LayoutResolver;

class ProductsController extends Controller
{
    use LayoutResolver;

    protected $page  = 'products';
    protected $title = 'Produto';

    public function index(Request $request)
    {
        $this->addVar('products', Product::all());

        if ($this->getVar('products')->count() >= 3) {
            $request->session()->flash('warning', ["Limite de cadastros atingido!"]);
        }

        return view('admin.product.list', $this->compactVars());
    }

    public function create(Request $request)
    {
        $request->session()->forget('warning');
        $this->addVar('categories', Category::all());

        return view('admin.product.form', $this->compactVars());
    }

    public function edit(Request $request)
    {
        $request->session()->forget('warning');
        $this->addVar('product', Product::findOrFail($request->route('id')));
        return view('admin.products.form', $this->compactVars());
    }

    public function save(Request $request)
    {
        if ($request->has('id')) {
            $product = Product::find($request->input('id'));
        }

        if (!isset($product)) {
            $product = new Product();
        }

        $product->name  = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $prodict->category_id = $request->input('category_id');
        $product->save();

        if ($product->save()) {
            return redirect()->route('admin::products:list')->with('success', ["Produto salvo com sucesso!"]);
        } else {
            return redirect()->back()->withInput()->with('errors', ["Não foi possíval salvar o produto! Tente novamente"]);
        }
    }

    public function delete($id)
    {
        $product  = Product::findOrFail($id);
        $redirect = redirect()->route('admin::product:list');

        if ($product->delete()) {
            return $redirect->with('success', ["O serviço foi removido com sucesso!"]);
        } else {
            return $redicet->with('errors', ["Não foi possível remover o serviço! Tente novamente."]);
        }
    }
}
