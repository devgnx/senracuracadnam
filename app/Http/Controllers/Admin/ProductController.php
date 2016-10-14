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

    protected $page  = 'product';
    protected $title = 'Produto';

    public function index(Request $request)
    {
        $this->addVar('products', Product::all());
        return view('admin.product.list', $this->compactVars());
    }

    public function form(Request $request)
    {
        $request->session()->forget('warning');
        $this->addVar('product', Product::findOrNew($request->route('id')));
        $this->addVar('categories', Category::orderBy('name')->get());
        return view('admin.product.form', $this->compactVars());
    }

    public function save(Request $request)
    {
        $product = Product::findOrNew($request->route('id'));
        $product->name  = $request->input('name');
        $product->price = $request->input('price', 0);
        $product->description = $request->input('description');

        if ($request->has('category')) {
            $category = Category::find($request->input('category'));
            $product->category()->associate($category);
        }

        if ($request->hasFile('image') && $request->image->isValid()) {
            $filename = str_slug($product->name) . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads/img/products/'), $filename);
            $product->image = $filename;
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
