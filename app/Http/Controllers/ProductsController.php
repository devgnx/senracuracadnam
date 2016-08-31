<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $page = [
        "title" => "Produtos"
    ];

    public function index($id)
    {
        $page = $this->page;
        return view('products.index', [
            'category' => Category::find($id),
            'page' => $this->page
        ]);
    }
}
