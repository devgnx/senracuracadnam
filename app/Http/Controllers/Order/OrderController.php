<?php
namespace App\Http\Controllers\Order;

use Mail;
use App\Contact;
use App\Order;
use App\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function save(Request $request)
    {
        $cart = session('cart');
        $order = new Order;
        $order->name = $cart->name;
        $order->telephone = $cart->telephone;
        $order->address = $cart->address;
        $order->total = $cart->total;

        if ($order->save()) {
            foreach ($cart->items as $item) {
                $product = $item->product()->first();
                $orderItem = new OrderItem;
                $orderItem->name  = $product->name;
                $orderItem->price = $product->price;
                $orderItem->quantity = $item->quantity;
                $orderItem->product()->associate($product);
                $order->items()->save($orderItem);
            }

            $this->sendMail($order);

            session()->forget('cart');

            $message = "O pedido foi enviado com sucesso!";

            if ($request->isXmlHttpRequest()) {
                session()->flash('success', [$message]);
                return redirect()->route('cart.list');
            } else {
                return redirect()->route('product.categories')->with("success", $message);
            }
        } else {
            $message = "Não foi possível finalizar o pedido!";
            if ($request->isXmlHttpRequest()) {
                return session()->flash('error', [$message]);
                return redirect()->route('cart.list');
            } else {
                return redirect()->route('product.categories')->with("error", $message);
            }
        }
    }

    private function sendMail($order)
    {
        $contact = Contact::first();
        Mail::send('emails.new-order', ['order' => $order], function ($m) use (
            $order,
            $contact
        ) {
            $m->from('naoresponder@mandacarucarnes.com.br', 'Site');
            $m->to($contact->email, 'Mandacaru Carnes')->subject('Novo pedido!');
        });
    }
}
