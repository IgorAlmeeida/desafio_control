@extends('layouts.base')

@section('title', 'Serviços')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-11">
                    <h3>Serviços</h3>
                </div>
                <div class="col-1">
                    <a class="float-right btn btn-primary" href="{{route('createServiceView')}}"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($services as $s)
                        <tr>
                            <td>{{$s->descricao}}</td>
                            <td>@money($s->valor)</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{route('updateServiceView', ['idService'=>$s->id])}}"><i class="fa fa-pen"></i></a>
                                    <button class="btn btn-danger btn-delete" value="{{route('deleteService', ['idService'=>$s->id])}}"><i class="fa fa-trash"></i></button>
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

@section('modal')
    @include('layouts.modalDelete')

    @if(session('mensagem'))
        @include('layouts.modalMensagem')
    @endif
@endsection

@section('js')
    <script>
        $('.btn-delete').click(function (){
            $('.btn-confirm-delete').attr('href', $(this).val());
            $('#deleteModal').modal('show');
        });

    </script>

    @if(session('mensagem'))
        <script>
            $('#mensagemModal').modal('show');
        </script>
    @endif
@endsection
