<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use LayoutResolver;

    public function index(Request $request)
    {
        $categories = array_map(function($category) use ($request) {
            return array(
                'value' => $category['id'],
                'label' => $category['name'],
                'selected' => ($request->get('id') == $category['id'])
            );
        }, Category::orderBy('name')->get()->toArray());

        return response()->json($categories);
    }

    public function save(Request $request)
    {
        $category = Category::findOrNew($request->route('id'));
        $category->name  = $request->input('name');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $filename = str_slug($category->name) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/img/categories'), $filename);
            $category->image = $filename;
        }

        if ($category->save()) {
            $request->request->add(['id' => $category->id]);
            return $this->index($request);
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $product  = Category::findOrFail($id);
        $redirect = redirect()->route('admin::product:list');

        if ($product->delete()) {
            return $redirect->with('success', [
                "A categoria foi removida com sucesso!"
            ]);
        } else {
            return $redicet->with('errors', [
                "Não foi possível remover a categoria! Tente novamente."
            ]);
        }
    }
}
