@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agendas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Marcações</li>
                </ol>
            </nav>

            <div class="col-md-8 p-0">
                <h2>Agenda - Marcações</h2>
            </div>

            <hr />

            <div class="row m-2 pl-0">
                <div class="col-sm-8 col-md-8 pl-0">
                    <a href="{{action('AgendaMarcacaoController@create',$agenda_id)}}" class="btn btn-primary pull-right h2">Nova marcação</a>
                </div>            

                <div class="col-sm-6 col-md-4 float-right">                        
                    <form action="{{ action('AgendaMarcacaoController@index', $agenda_id) }}" method="get">
                        <div class="input-group">                            
                            <input type="date" name="busca_data" id="busca_data" value="{{$busca_data}}">
                            <span class="input-group-btn">
                        		<button class="btn btn-primary" type="submit">
                        		    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>                
                    </form>
                </div>
            </div>

            <div class="card-deck justify-content-center">
                @foreach($marcacoes as $marcacao)
                    <div class="row col-xs-12 col-md-8 p-1">
                        <div class="card border-primary col-xs-12 col-md-10 p-0">                                                                                   
                            <div id="cardheard{{$marcacao->id}}" class="card-header border-primary bg-primary text-white col-md-12 p-1">                                
                                <strong>{{ date('d-m-Y',strtotime($marcacao->data)) . " (" . date('H:i',strtotime($marcacao->hora_inicial)) ." as ". date('H:i',strtotime($marcacao->hora_final))  . ') '}}</strong>
                            </div>    

                            <div id="cardbody{{$marcacao->id}}" class="card-body">                   
                                <div class="col-md-6 float-left">                                
                                    <p>{{ $marcacao->nome }}</p>
                                </div>

                                <div class="col-md-6 float-right">
                                    <div class="form-inline float-right">                                    
                                        <span class="input-group-btn m-1">
                                            <a class="btn btn-warning btn-xs" href="{{ action('AgendaMarcacaoController@edit',[$agenda_id, $marcacao->id]) }}" style="color:white; max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Alterar">
                                                <span class="fa fa-edit"></span>
                                            </a>                                            
                                        </span>

                                        <span class="input-group-btn m-1">
                                            <form action="{{action('AgendaMarcacaoController@destroy',[$agenda_id,$marcacao->id])}}" method="POST">
                                                @csrf                                                                                                                                                        
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px" title="Excluir">
                                                        <span class="fa fa-trash-alt"></span>
                                                    </button>                                                                                                            
                                            </form>
                                        </span>                        
                                    </div>
                                </div>
                            </div>    

                            @if($marcacao->paciente_solicita_cancelar != null)
                                <div class="card-footer pb-0 pt-0">
                                    @if($marcacao->paciente_solicita_cancelar != null)
                                        <span class="badge badge-pill badge-danger">Paciente solicita cancelamento</span> 
                                    @endif
                                </div>
                            @endif

                        </div>                        
                    </div>                         

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

