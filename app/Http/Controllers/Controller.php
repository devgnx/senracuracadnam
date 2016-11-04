<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $title;
    protected $page;

    protected $cart;
    protected $customer;

    public function __construct(Request $request)
    {
        if ($request->session()->get('cart') instanceof Cart) {
            $this->cart = $request->session()->get('cart');
        } else {
            $this->cart = new Cart;
            $request->session()->put('cart', $this->cart);
        }

        if ($request->session()->get('customer') instanceof Customer) {
            $this->customer = $request->session()->get('customer');
        } else {
            $this->customer = new Customer;
            $request->session()->put('customer', $this->customer);
        }
    }
}
