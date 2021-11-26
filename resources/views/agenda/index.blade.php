@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agendas</li>
                </ol>
            </nav>

            <div class="col-md-8 p-0">
                <h2>Gerenciamento de agendas</h2>
            </div>
        
            <hr />

            <div class="col-md-8 pl-0">
                <a href="{{action('AgendaController@create')}}" class="btn btn-primary pull-right h2">Nova agenda</a>
            </div>
        
            
            <div class="card-deck justify-content-center">
                @foreach($agendas as $agenda)

                    <div class="row col-xs-8 col-md-6 p-2">
                        <div class="card col-xs-8 col-md-12 p-0">                    
                            <h5 class="card-header {{ $agenda['ativa'] == 'Não' ? "bg-dark" : "bg-info"}} text-white"> <strong>{{ $agenda['nome'] }}</strong></h5>
                            <div class="card-body align-itens-bottom">                                                        

                                <div class="form-inline justify-content-center">
                                    <span class="input-group-btn m-1">
                                        <a class="btn btn-success {{ $agenda['ativa'] == 'Não' ? "disabled" : ''}} btn-xs" href="{{ action('AgendaMarcacaoController@index', $agenda['id']) }}" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Marcações">
                                            <span class="fa fa-calendar-check"></span>
                                        </a>
                                    </span>
                                
                                    <span class="input-group-btn m-1">
                                        <a class="btn btn-warning btn-xs" href="{{action('AgendaController@edit', $agenda['id'])}}" style="color:white; max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Alterar">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </span>
                                
                                    <span class="input-group-btn m-1">
                                        <form action="{{action('AgendaController@destroy', $agenda['id'])}}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                            <span class="fa fa-trash-alt"></span>
                                            </button>
                                        </form>
                                    </span>
                                </div>

                                @if ($agenda['tot_cancelar'] > 0)
                                    <p class="alert-danger mt-2 mb-0 text-center">{{ "Atenção"}}</p>
                                    <p class="alert-danger m-0 text-center">{{ $agenda['tot_cancelar'] . " cancelamento(s)" }}</p>
                                @elseif ($agenda['ativa'] == "Não")
                                    <p class="alert-warning mt-2 mb-0 text-center">{{"Aviso"}}</p>
                                    <p class="alert-warning m-0 text-center">Agenda desativada</p>                                
                                @endif
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $agenda['tot_marcacao'] . " marcações pendentes"}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>               
        </div>
    </div>
</div>
@endsection