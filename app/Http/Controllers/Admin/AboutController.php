<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    use LayoutResolver;

    protected $page  = "about";
    protected $title = "Sobre a Empresa";

    public function edit()
    {
        $this->addVar('about', About::first());
        return view('admin.about.form', $this->compactVars());
    }

    public function save(Request $request)
    {
        $about = About::firstOrNew(['id' => 1]);
        $about->title = $request->input('title');
        $about->description = $request->input('description');

        if ($about->save()) {
            return redirect()->route('admin::about:edit')->with('success', [
                "Dados salvos com sucesso!"
            ]);
        }
    }
}
