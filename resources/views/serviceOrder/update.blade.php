@extends('layouts.base')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="h3 mb-0 text-gray-800">Atualizar Ordem de Serviço</h3>
        </div>
        <div class="card-body">
            <form method="post" action="">
                @csrf
                <div class="row">
                    <input type="hidden" name="idServiceOrder" value="{{$so->id}}">
                    <div class="col-12 col-md-6">
                        <label>Serviço: </label>
                        <select name="service_id" class="form-control">
                            @foreach($services as $s)
                                @if(old('service_id') == $s->id || $so->service_id == $s->id)
                                    <option value="{{ old('service_id') ?? $so->service_id ?? 'default'}}" selected>{{$s->descricao}} </option>
                                @else
                                    <option value="{{$s->id}}">{{$s->descricao}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('service_id')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Quantidade: </label>
                        <input type="number" class="form-control" name="quantidade" @error('quantidade') is-invalid @enderror value ="{{ old('quantidade') ?? $so->quantidade ?? 'default'}}" required autofocus><br>
                        @error('quantidade')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Nome do Funcionário: </label>
                        <input type="text" class="form-control" name="nome_func" @error('nome_func') is-invalid @enderror value ="{{ old('nome_func') ?? $so->nome_func ?? 'default'}}" required autofocus><br>
                        @error('nome_func')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Data: </label>
                        <input type="date" class="form-control" name="data" @error('data') is-invalid @enderror" value ="{{ old('data') ?? $so->data ?? 'default'}}" required autofocus><br>
                        @error('data')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Início: </label>
                        <input type="time" id="hora_inicio" class="form-control timepicker" name="hora_inicio" @error('hora_inicio') is-invalid @enderror" value ="{{ old('hora_inicio') ?? $so->hora_inicio ?? 'default'}}" required autofocus><br>
                        @error('hora_inicio')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Término: </label>
                        <input type="time" class="form-control" name="hora_fim" @error('hora_fim') is-invalid @enderror" value ="{{ old('hora_fim') ?? $so->hora_fim ?? 'default'}}" required autofocus><br>
                        @error('hora_fim')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label>Detalhes: </label>
                        <textarea class="form-control" name="detalhes" @error('detalhes') is-invalid @enderror" value ="" >{{ old('detalhes') ?? $so->detalhes ?? 'default'}}</textarea>
                        @error('detalhes')
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

@section('js')

@endsection
