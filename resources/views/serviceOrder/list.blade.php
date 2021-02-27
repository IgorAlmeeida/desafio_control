@extends('layouts.base')

@section('title', 'Serviços')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-11">
                    <h3>Ordem de Serviço</h3>
                </div>
                <div class="col-1">
                    <a class="float-right btn btn-primary" href="{{route('createServiceOrderView')}}"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Serviço</th>
                        <th>Quantidade</th>
                        <th>Nome do Funcionário</th>
                        <th>Data</th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Detalhes</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($serviceOrders as $so)
                        <tr>
                            <td>{{$so->service->descricao}}</td>
                            <td>{{$so->quantidade}}</td>
                            <td>{{$so->nome_func}}</td>
                            <td>{{$so->data}}</td>
                            <td>{{$so->hora_inicio}}</td>
                            <td>{{$so->hora_fim}}</td>
                            <td>{{$so->detalhes}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{route('updateServiceOrderView', ['idServiceOrder' => $so->id])}}"><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-danger" href="{{route('deleteServiceOrder', ['idServiceOrder' => $so->id])}}" ><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
