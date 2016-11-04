<?php
namespace App\Http\Controllers\Order;

use Mail;
use App\Contact;
use App\Order;
use App\OrderItem;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use LayoutResolver;

    protected $title = 'Pedidos';
    protected $page = 'order';

    public function index()
    {
        $this->addVar('orders', (object) [
            'undelivered' => Order::undelivered()->get(),
            'delivered' => Order::delivered()->get()
        ]);

        return view('admin.orders.list', $this->compactVars());
    }

    public function view($id)
    {
        $this->addVar('order', Order::find($id));
        return view('admin.orders.view', $this->compactVars());
    }

    public function saveStatus(Request $request)
    {
        $order = Order::findOrFail($request->input('id'));
        $order->delivered = $request->input('status');

        return response()->json([
            'success' => $order->save(),
            'redirect' => route('admin::order:list')
        ]);
    }

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

            $order->calcTotal();

            $this->sendMail($order);

            session()->forget('cart');

            $message = "O pedido foi enviado com sucesso!";

            if ($request->isXmlHttpRequest()) {
                session()->flash('success', [$message]);
                return redirect()->route('product.categories');
            } else {
                return redirect()->route('product.categories')->with("success", $message);
            }
        } else {
            $message = "Não foi possível finalizar o pedido!";
            if ($request->isXmlHttpRequest()) {
                return session()->flash('error', [$message]);
                return redirect()->route('product.categories');
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
            $m->to($contact->email, 'Mandacaru Carnes')->subject('Novo pedido!');
        });
    }
}
