<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\LayoutResolver;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use LayoutResolver;

    public $title = "Produtos";
    public $page = "product";

    public function index($id)
    {
        $product = Product::find($id);
        $this->title = $product->name;
        $this->addVar("product", $product);
        return view('product.index', $this->compactVars());
    }

    public function list($id)
    {
        $this->addVar("category", Category::find($id));
        return view('product.list', $this->compactVars());
    }
}
