<?php

namespace App\Http\Controllers\Cart;

use App\Cart;
use App\CartItem;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class CartController extends Controller
{
    use LayoutResolver;

    private $cart;

    public function __construct(Request $request)
    {
        if ($request->session()->has('cart')) {
            $this->cart = $request->session()->get('cart');
        } else {
            $this->cart = $request->session()->put('cart', new Cart);
        }
    }

    public function index()
    {
        $this->addVar('cart', $this->cart);
        return view('partial.cart.list', $this->compactVars());
    }

    public function add(Request $request)
    {
        $this->fillCustomerData($request);

        $item = new CartItem();
        $item->quantity = $request->input('quantity', 1);

        if ($request->has('id')) {
            $product = Product::find($request->input('id'));
            $item->name  = $product->name;
            $item->price = $product->price;
            $item->product()->associate($product);
        }

        if ($this->cart->save()) {
            $this->cart->items()->save($item);

            $message = "Produto adicionado ao carrinho!";
            if ($request->isXmlHttpRequest()) {
                session()->flash('success', [$message]);
                return $this->index();
            } else {
                return redirect()->route('cart.index')->with("success", [
                    $message
                ]);
            }
        } else {
            dd('Erro ao salvar carrinho!');
        }
    }

    public function remove(Request $request)
    {
        if (CartItem::find($request->route('id'))->delete()) {
            $message = "Produto removido do carrinho!";
            if ($request->isXmlHttpRequest()) {
                session()->flash('success', [$message]);
                return $this->index();
            } else {
                return redirect()->route('cart.index')->with("success", [
                    $message
                ]);
            }
        } else {
            dd('Erro ao remover item!');
        }
    }

    public function fillCustomerData(Request $request)
    {
        if ($request->has('name')) {
            $this->cart->name = $request->input('name');
        }

        if ($request->has('telephone')) {
            $this->cart->telephone = $request->input('telephone');
        }

        if ($request->has('address')) {
            $this->cart->address = $request->input('address');
        }
    }

    public function count()
    {
        return $this->cart->items()->count();
    }
}
