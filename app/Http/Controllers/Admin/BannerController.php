<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    use LayoutResolver;

    protected $page  = 'banner';
    protected $title = 'Banners';

    public function index(Request $request)
    {
        $this->addVar('banners', Banner::all());
        return view('admin.banner.list', $this->compactVars());
    }

    public function form(Request $request)
    {
        $this->addVar('banner', Banner::findOrNew($request->route('id')));
        return view('admin.banner.form', $this->compactVars());
    }

    public function save(Request $request)
    {
        $banner = Banner::findOrNew($request->route('id'));
        $banner->description = $request->input('description');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $path = public_path() . '/uploads/img/banners/';
            $file = str_slug($banner->description) . '.' . $request->image->extension();

            $request->image->move($path, $file);
            $banner->image = $file;
        }

        if ($banner->save()) {
            return redirect()->route('admin::banner:list')->with('success', [
                "Banner salvo com sucesso!"
            ]);
        } else {
            return redirect()->back()->withInput()->with('errors', [
                "Não foi possíval salvar o banner! Tente novamente."
            ]);
        }
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $redirect = redirect()->route('admin::banner:list');

        if ($banner->delete()) {
            return $redirect->with('success', [
                "O banner foi removido com sucesso!"
            ]);
        } else {
            return $redicet->with('errors', [
                "Não foi possível remover o banner! Tente novamente."
            ]);
        }
    }
}
