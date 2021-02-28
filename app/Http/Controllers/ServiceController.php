<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOrder;
use App\Validator\ServiceValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function createView(Request $request){
        return view('service.create');
    }

    public function create(Request $request){
        try {
            ServiceValidator::validate($request->all());
            $service = new Service($request->all());
            $service->save();
            return redirect('/service');
        } catch (ValidationException $ve){
            return redirect('/service/create')
                ->withErrors($ve->getValidator())
                ->withInput();
        }
    }

    public function updateView(Request $request){
        $service = Service::find($request->idService);
        return view('service.update',['service' => $service]);
    }

    public function update(Request $request){
        try {
            ServiceValidator::validate($request->all());
            $service = Service::find($request->idService);
            $service->descricao = $request->descricao;
            $service->valor = $request->valor;
            $service->update();
            return redirect('/service');
        } catch (ValidationException $ve){
            return redirect('/service/update/'.$request->idService)
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }

    public function delete(Request $request){
        $service = Service::find($request->idService);
        $service->delete();
        return redirect('/service');
    }

    public function list(Request $request){
        $services = Service::all();
        return view('service.list', ['services' => $services]);
    }


}
