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
        if ($id = $request->route('id')) {
            $category = Category::find($id);
        }

        if (!isset($category)) {
            $category = new Category();
        }

        $category->name  = $request->input('name');

        if ($category->save()) {

            if ($request->hasFile('image')) {
                $filename = $category->id . '.' . $request->image->extension();
                if ($request->image->isValid() &&
                    $image->move($filename, public_path('uploads/img/categories'))
                ) {
                    $category->image = $filename;
                }
            }

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
