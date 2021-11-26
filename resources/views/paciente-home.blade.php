@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header text-white bg-dark">Consultas agendadas</div>
                <div class="card-body ">
                    @foreach($marcacoes as $marcacao)
                    <form method="POST" action="{{ route('marcacao.cancela',$marcacao->id) }}">
                        @csrf                         
                        @method('PUT')
                        <div class="row p-1 justify-content-center">                        
                            <div class="card border-info">
                                <div class="card-header text-white bg-info">
                                    {{ date('d/m/Y',strtotime($marcacao->data)) . ' - ' . date('H:i',strtotime($marcacao->hora_inicial)) ." as ". date('H:i',strtotime($marcacao->hora_final)) }}
                                </div>
                                <div class="card-body">
                                <p>Médico</p>
                                <h5 class="card-title"><strong>{{ Auth::user()->getTratamento($marcacao->medico_id) . ' ' . $marcacao->nome }}</strong></h5>                                     
                                <button type="submit" class="btn btn-danger">Solicitar cancelamento</a>
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