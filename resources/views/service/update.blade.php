@extends('layouts.base')

@section('title', 'Serviços')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="h3 mb-0 text-gray-800">Atualizar Serviço</h3>
        </div>
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="row">
                    <input type="hidden" name="idService" value="{{$service->id}}">
                    <div class="col-12 col-md-6">
                        <label>Descricao: </label>
                        <input type="text" class="form-control" name="descricao" @error('descricao') is-invalid @enderror value ="{{ old('descricao') ?? $service->descricao ?? 'default' }}" required autofocus><br>
                        @error('descricao')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Valor: </label>
                        <input type="number" class="form-control"  name="valor" @error('inicio_inscricao') is-invalid @enderror value ="{{ old('valor') ?? $service->valor ??'default'}}" required autofocus><br>
                        @error('valor')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                </div>

                <input class="btn btn-primary float-right mt-4" type="submit" value="Editar">
            </form>

        </div>
    </div>
@endsection
