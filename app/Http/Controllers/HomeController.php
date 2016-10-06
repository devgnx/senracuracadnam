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

    public $page  = "home";
    public $title = "Mandacaru Carnes";

    public function index()
    {
        $this->addVar('about', About::firstOrNew([]));
        $this->title = $this->getVar('about')->title;
        return view('home', $this->compactVars());
    }
}
