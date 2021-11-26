@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agenda</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agenda.update',$agenda->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $agenda->nome }}"
                                    required autofocus> 
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ativa" class="col-md-4 col-form-label text-md-right">Ativa</label>
                            <div class="col-md-4">
                                <select name="ativa" id="ativa" class="form-control" value="{{ $agenda->ativa }}">
                                        <option value="0" @if ($agenda->ativa == 0) selected @endif>Não</option>
                                        <option value="1" @if ($agenda->ativa == 1) selected @endif>Sim</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-2 m-1">
                                <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>
                        
                            <div class="col-md-2 m-1">
                                <a type="link" class="btn btn-info" href="{{ route('agenda.index')}}">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection