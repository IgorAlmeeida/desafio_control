<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOrder;
use App\Validator\ServiceOrderValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ServiceOrderController extends Controller
{
    public function createView(Request $request){
        $services = Service::all();
        return view('serviceOrder.create', ['services' => $services ]);
    }

    public function create(Request $request){
        try {
            ServiceOrderValidator::validate($request->all());
            $serviceOrder = new ServiceOrder($request->all());
            $serviceOrder->save();
            return redirect('/service_order');
        }catch (ValidationException $ve){
            $services = Service::all();
            return redirect('/service_order/create')
                ->with(['services'=> $services])
                ->withErrors($ve->getValidator())
                ->withInput();
        }
    }

    public function updateView(Request $request){
        $serviceOrder = ServiceOrder::find($request->idServiceOrder);
        $services = Service::all();
        return view('serviceOrder.update', ['services' => $services, 'so' => $serviceOrder]);
    }
    public function update(Request $request){
        try {
            ServiceOrderValidator::validate($request->all());
            $serviceOrder = ServiceOrder::find($request->idServiceOrder);
            $serviceOrder->quantidade = $request->quantidade;
            $serviceOrder->nome_func = $request->nome_func;
            $serviceOrder->data = $request->data;
            $serviceOrder->hora_inicio = $request->hora_inicio;
            $serviceOrder->hora_fim = $request->hora_fim;
            $serviceOrder->detalhes = $request->detalhes;
            $serviceOrder->service_id = $request->service_id;
            $serviceOrder->update();
            return redirect('/service_order');
        }catch (ValidationException $ve){
            $services = Service::all();
            return redirect('/service_order/update/'.$request->idServiceOrder)
                ->with(['services'=> $services])
                ->withErrors($ve->getValidator())
                ->withInput();
        }
    }

    public function delete(Request $request){
        $serciveOrder = ServiceOrder::find($request->idServiceOrder);
        $serciveOrder->delete();
        return redirect('/service_order');
    }

    public function list(Request $request){
        $serviceOrders = ServiceOrder::all();
        $tam = count($serviceOrders);
        for ($i = 0; $i < $tam; $i++){
            $serviceOrders[$i]['data'] = (new Carbon($serviceOrders[$i]['data'] ))->format('d/m/Y');
        }
        return view('serviceOrder.list', ['serviceOrders' => $serviceOrders]);
    }

    public function generateReport(Request $request){
        $serviceOrder = ServiceOrder::all();
        $totalSerDesc = 0;
        $totalFinal = 0;

        foreach ($serviceOrder as $so){
            $so->valorTotal = $so->service->valor * $so->quantidade;
            $totalSerDesc += $so->valorTotal;
            $so->desconto = $so->getDesconto();
            $so->valorFinal = $so->valorTotal - ($so->valorTotal * $so->desconto);
            $totalFinal += $so->valorFinal;
        }

        return view('serviceOrder.report',
            [
                'serviceOrders' => $serviceOrder,
                'totalSerDesc' => $totalSerDesc,
                'totalFinal' => $totalFinal
            ]
        );
    }
}
