<?php

namespace App\Http\Controllers;

class ProductsController extends Controllers
{
    public function index()
    {
        Products::all();
        $products = new Products;
        $products->get()->toArray();
    }
}
