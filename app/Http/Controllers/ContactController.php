<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    use Traits\LayoutResolver;

    public function index()
    {
        return view("contact", $this->compactVars());
    }
}
