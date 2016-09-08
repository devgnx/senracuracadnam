<?php

namespace App\Http\Controllers;

use App\About;
use App\Product;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\LayoutResolver;

class HomeController extends Controller
{
    use LayoutResolver;
    
    public $page = [
        "title" => "Mandacaru Carnes",
        "page" => "home"
    ];

    public function index()
    {
        return view('home', $this->compactVars());
    }
}
