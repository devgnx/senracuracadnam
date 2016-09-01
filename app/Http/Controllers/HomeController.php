<?php

namespace App\Http\Controllers;

use App\About;
use App\Product;
use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
          //'about' => About::first(),
          //'services' => Service::all(),
          //'contact'  => Contact::first()
        ]);
    }
}
