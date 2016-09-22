<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\About;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\LayoutResolver;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    use LayoutResolver;

    protected $page  = "about";
    protected $title = "Sobre a Empresa";

    public function edit(Request $request)
    {
        $this->addVar('about', About::first());

        $services = Service::all();
        $this->addVar('services',  $services);

        return view('admin.about.form', $this->compactVars());
    }

    public function getService(Request $request)
    {
        if ($request->route('id')) {
            return Service::findOrFail($request->route('id'));
        } else {
            return new Service();
        }
    }

    public function editService(Request $request)
    {
       $request->session()->forget('warning');
       $service = $this->getService($request);

       if ($request->is('admin/servico/novo') || $service->id) {
           $this->addVar('service', $service);
           return view('admin.about.service-form', $this->compactVars());
       } else {
           return redirect()->route('admin::about:edit');
       }
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

    public function saveService(Request $request)
    {
        $service = $this->getService($request);
        $service->name = $request->input('name');
        $service->icon = $request->input('icon');
        $service->description = $request->input('description');

        if ($service->save()) {
            return redirect()->route('admin::about:edit')->with('success', ["Serviço salvo com sucesso!"]);
        } else {
            return redirect()->back()->withInput()->with('errors', ["Não foi possíval salvar o serviço! Tente novamente"]);
        }
    }
    public function deleteService($id)
    {
        $service  = Service::findOrFail($id);
        $redirect = redirect()->route('admin::about:edit');

        if ($service->delete()) {
            return $redirect->with('success', ["O serviço foi removido com sucesso!"]);
        } else {
            return $redicet->with('errors', ["Não foi possível remover o serviço! Tente novamente."]);
        }
    }
}
