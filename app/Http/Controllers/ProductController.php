<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\LayoutResolver;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use LayoutResolver;

    public $page = [
        "title" => "Produtos",
        "page"  => "procuts"
    ];

    public function index($id)
    {
        $this->addVar("category", Category::find($id));
        return view('products.index', $this->compactVars());
    }
}
