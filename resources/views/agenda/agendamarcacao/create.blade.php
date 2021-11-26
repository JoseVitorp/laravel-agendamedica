@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agenda - Marcações</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agenda.marcacao.store',$agenda_id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">Data</label>
                        
                            <div class="col-md-4">
                                <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data"
                                    value="{{ old('data') }}" required autofocus> 
                                @if ($errors->has('data'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora_inicial" class="col-md-4 col-form-label text-md-right">Hora</label>
                        
                            <div class="form-inline col-md-8">
                                <input id="hora_inicial" type="time" class="form-control{{ $errors->has('hora_inicial') ? ' is-invalid' : '' }}" name="hora_inicial" value="{{ old('hora_inicial') }}"
                                    required autofocus> 
                                @if ($errors->has('hora_inicial'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('hora_inicial') }}</strong>
                                    </span> 
                                @endif                                                      
                                
                                <label for="hora_inicial" class="col-md-1 col-form-label text-md-right">as</label>
                                
                                <input id="hora_final" type="time" class="form-control{{ $errors->has('hora_final') ? ' is-invalid' : '' }}" name="hora_final"
                                    value="{{ old('hora_final') }}" required autofocus> 
                                @if ($errors->has('hora_final'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('hora_final') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paciente_id" class="col-md-4 col-form-label text-md-right">Paciente</label>
                        
                            <div class="col-md-6">
                                <select name="paciente_id" class="form-control{{ $errors->has('paciente_id') ? ' is-invalid' : '' }}" name="paciente_id" value="{{ old('paciente_id') }}"
                                    required autofocus> 
                                
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nome ." - ". $paciente->email}}</option>
                                    @endforeach                              
                                </select> 
                                @if ($errors->has('paciente_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paciente_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-1 m-1">
                                <button type="submit" class="btn btn-primary">Marcar</button>
                            </div>
                        
                            <span class="col-md-1 m-0"></span>

                            <div class="col-md-1 m-1">
                                <a type="link" class="btn btn-info" href="{{ route('agenda.marcacao.index',$agenda_id)}}">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection