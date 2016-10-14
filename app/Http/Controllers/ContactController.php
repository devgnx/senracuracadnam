<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    use Traits\LayoutResolver;

    public function index()
    {
        return view("contact", $this->compactVars());
    }

    public function sendMail(Request $request)
    {
        if ($request->has('email') && filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            Mail::send('emails.contact', [
                'sender' => [
                    'name'  => $request->input('name'),
                    'email' => $request->input('email'),
                    'message' => $request->input('message')
                ]
            ], function($m) use ($request) {
                $m->to($this->maile_receiver, "Mandacaru Carnes")->subject("Nova mensagem pelo site");
            });
        }

        return redirect()->route('home');
    }
}
