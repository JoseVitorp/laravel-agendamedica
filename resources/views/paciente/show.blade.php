@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "Paciente - Histórico"}}</div>
                <div class="card-body">
                    <div class="col-md-2 m-1 p-0">
                        <a type="link" class="btn btn-primary" href="{{ route('paciente.index')}}">Voltar</a>
                    </div>


                    <div class="accordion" id="accordionGrid">
                        @foreach($evolucoes as $evolucao)
                            <div class="card border-0">
                                <div class="card-header border-0 p-1">                             
                                    <h5 class="mb-0">
                                    <button class="btn btn-info btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapse{{$evolucao->id}}" aria-expanded="true" aria-controls="collapse{{$evolucao->id}}">
                                              <strong>{{ date('d-m-Y',strtotime($evolucao->data)) . " - " . date('H:i',strtotime($evolucao->hora_inicial)) ." as ". date('H:i',strtotime($evolucao->hora_final)) }}</strong>
                                            </button>
                                    </h5>
                                </div>

                                <div id="collapse{{$evolucao->id}}" class="collapse" aria-labelledby="heading{{$evolucao->id}}" data-parent="#accordionGrid">
                                    <div class="card-body p-0">                    
                                            <div class="form-group row m-0 p-0">
                                                <label for="evolucao_paciente" class="col-md-4 col-form-label text-md-left"><strong>Evolução</strong></label>
                                            
                                                <div class="col-md-12">
                                                    <textarea name="evolucao_paciente" id="evolucao_paciente" rows="10" class="form-control border-0 bg-light" readonly>{{ trim($evolucao->evolucao_paciente) }}</textarea>                                                    
                                                </div>
                                            </div>                                                          
                                    </div>

                                    <div class="card-footer mt-2 mb-1 pb-0 pt-0">                                    
                                        <p class="text-right text-muted"><em>Atualizado em {{ date('d-m-Y H:i',strtotime($evolucao->updated_at))}}</em></p> 
                                    </div>
                                </div>                
                            </div>

                        @endforeach                    
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection