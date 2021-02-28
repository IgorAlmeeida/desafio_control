<?php

namespace App\Http\Controllers;

use App\Constantes\Constantes;
use App\Models\Service;
use App\Validator\ServiceValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Exception;
class ServiceController extends Controller
{
    public function createView(Request $request){
        return view('service.create');
    }

    public function create(Request $request){
        try {
            ServiceValidator::validate($request->all());
            try {
                $service = new Service($request->all());
                $service->save();

                return redirect('/service')
                    ->with('mensagem', Constantes::SUCESSO_CREATE_SERVICE);

            } catch (Exception $ex){
                return redirect('/service/create')
                    ->with('mensagem', Constantes::ERROR_CREATE_SERVICE);
            }

        } catch (ValidationException $ve){
            return redirect('/service/create')
                ->with('mensagem', Constantes::ERROR_CREATE_SERVICE)
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
            try {
                $service = Service::find($request->idService);
                $service->descricao = $request->descricao;
                $service->valor = $request->valor;
                $service->update();
                return redirect('/service')
                    ->with('mensagem', Constantes::SUCESSO_UPDATE_SERVICE);
            } catch (Exception $exception){
                return redirect('/service/update/'.$request->idService)
                    ->with('mensagem', Constantes::ERROR_UPDATE_SERVICE);
            }

        } catch (ValidationException $ve){
            return redirect('/service/update/'.$request->idService)
                ->with('mensagem', Constantes::ERROR_UPDATE_SERVICE)
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }

    public function delete(Request $request){
        try{
            $service = Service::find($request->idService);
            if ($service == null){
                throw new Exception(Constantes::ERROR_DELETE_SERVICE);
            }
            $service->delete();
            return redirect('/service')
                ->with('mensagem', Constantes::SUCESSO_DELETE_SERVICE);;
        } catch (Exception $ex){
            return redirect('/service')
                ->with('mensagem', Constantes::ERROR_DELETE_SERVICE);
        }

    }

    public function list(Request $request){
        $services = Service::all();
        return view('service.list', ['services' => $services]);
    }


}
