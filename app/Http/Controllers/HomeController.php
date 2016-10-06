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

    public $page  = "home";
    public $title = "Mandacaru Carnes";

    public function index()
    {
        $this->addVar('services', Service::all());
        $this->addVar('about', About::firstOrNew([]));
        $this->title = $this->getVar('about')->title;
        return view('home', $this->compactVars());
    }
}
