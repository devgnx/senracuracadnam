<?php

namespace App\Http\Controllers;

use App\About;
use App\Contact;
use App\Product;
use App\Service;
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
        $this->addVar('services', Service::all());
        $this->addVar('about', About::first());
        return view('home', $this->compactVars());
    }
}
