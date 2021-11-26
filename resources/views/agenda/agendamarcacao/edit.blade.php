@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "Agenda - Evolução do paciente ". $nome_paciente}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('agenda.marcacao.update',[$agenda_id,$marcacao->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row m-0">
                            <label for="data" class="col-md-4 col-form-label text-md-right">Data</label>
                        
                            <div class="col-md-4 col-form-label">
                                <p id="data" name="data">{{ date('d-m-Y',strtotime($marcacao->data))}}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row m-0">
                            <label for="hora_inicial" class="col-md-4 col-form-label text-md-right">Hora</label>
                        
                            <div class="col-form-label col-md-4">
                                <p>{{ date('H:i',strtotime($marcacao->hora_inicial)) ." as ". date('H:i',strtotime($marcacao->hora_final))  }}</p>
                            </div>
                        </div> 
                        
                        <div class="form-group row m-0">
                            <label for="evolucao_paciente" class="col-md-4 col-form-label text-md-right">Evolução</label>
                        
                            <div class="col-md-8">
                                <textarea name="evolucao_paciente" id="evolucao_paciente" rows="15" class="form-control">{{ trim($marcacao->evolucao_paciente) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="realizado" name="realizado" {{ $marcacao->realizado ? 'checked' : '' }}>
                                    <label class="form-check-label" for="realizado">Atendimento realizado</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-0">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Atualizado em</label>
                        
                            <div class="col-md-4 col-form-label">
                                <p id="updated_at" name="updated_at"><strong>{{ date('d-m-Y H:i',strtotime($marcacao->updated_at))}}</strong></p>
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-2 m-1">
                                <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>
                        
                            <div class="col-md-2 m-1">
                                <a type="link" class="btn btn-info" href="{{ route('agenda.marcacao.index',[$agenda_id])}}">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection