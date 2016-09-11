<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\LayoutResolver;

class AuthController extends Controller
{
    use LayoutResolver;

    protected $page  = 'services';
    protected $title = 'Serviços';

    public function login()
    {
        if (Auth::check()) {
          return redirect()->route('admin::product:list');
        } else {
          return view('admin.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin::login');
    }

    public function auth(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('admin::product:list');

        } else if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->intended(route('admin::product:list'));

        } else {
            return redirect()->back()->with('errors', ['Email e/ou senha inválidos!']);
        }
    }
}
