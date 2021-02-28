@extends('layouts.base')

@section('title', 'Relatório')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-11">
                    <h3>Relatório</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Serviço</th>
                        <th>Valor Unitário</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                        <th>Desconto</th>
                        <th>Valor Final</th>
                    </tr>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($serviceOrders as $so)
                        <tr>
                            <td>{{$so->service->descricao}}</td>
                            <td>@money($so->service->valor)</td>
                            <td>{{$so->quantidade}}</td>
                            <td> @money($so->valorTotal)</td>
                            <td>{{$so->desconto == 1 ? '0' : $so->desconto*100}}%</td>
                            <td>@money($so->valorFinal)</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                        <td> @money($totalSerDesc)</td>
                        <td></td>
                        <td>@money($totalFinal)</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
