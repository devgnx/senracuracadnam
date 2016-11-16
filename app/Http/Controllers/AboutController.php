<?php

namespace App\Http\Controllers;

use App\Banner;
use App\About;
use App\Contact;
use App\Product;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\LayoutResolver;

class AboutController extends Controller
{
    use LayoutResolver;

    public $page  = "about";
    public $title = "Mandacaru Carnes";

    public function index()
    {
        $this->addVar('services', Service::all());
        $this->addVar('banners', Banner::all());
        $this->addVar('about', About::firstOrNew([]));
        $this->title = $this->getVar('about')->title;

        return view('about', $this->compactVars());
    }
}
