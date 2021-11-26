@extends('layouts.app') 
@section('content')
<div id="main" class="container justify-content-center">
    
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
        </ol>
    </nav>    
    
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Cadastro de pacientes</h2>
        </div>
    </div>    

    <hr />

    <div class="row m-0 pl-0 pr-0">
        <div class="col-sm-8 col-md-8 m-0 pl-0 pr-0">
            <a href="{{action('PacienteController@create')}}" class="btn btn-primary pull-right h2">Nova paciente</a>
        </div>
    
        <div class="col-sm-6 col-md-4 float-right">
            <form action="{{ action('PacienteController@index') }}" method="get">
                <div class="input-group">
                    <input name="busca" class="form-control" id="busca" type="text" placeholder="Nome, e-mail ou cidade">
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
        @foreach($pacientes as $paciente)
        <div class="row col-xs-12 col-md-8 justify-content-center">
            <div class="card border-primary col-xs-12 col-md-8 m-1 p-0">
                <div id="cardheard{{$paciente->id}}" class="card-header border-primary bg-primary text-white col-md-12 p-1">
                    <h5 class="pb-0 mb-0"><strong>{{ $paciente->nome }}</strong></h5>
                    <p class="ml-4 m-0 p-0">  {{ $paciente->email }}</p>
                </div>
    
                <div id="cardbody{{$paciente->id}}" class="card-body">
                    <p class="mb-0"><em>Informações básicas</em></p>
                    <div class="card p-0 mb-2 p-1 border-info">
                        <p class="mb-0">Data de nasc.: {{ date('d/m/Y',strtotime($paciente->data_nascimento)) }}</p>
                        @if (isset($paciente->end_res_cidade))
                             <p class="mb-0">{{ $paciente->end_res_cidade . '/' . $paciente->end_res_uf }}</p>
                        @endif

                        <br>

                        @if (isset($paciente->fone_celular))
                        <p class="mb-0">{{ $paciente->fone_celular }}</p>
                        @endif
                    </div>

                    <div class="col-xs-6 col-md-12">
                        <div class="form-inline justify-content-center">
                            <span class="input-group-btn m-1">
                                <a class="btn btn-info btn-xs" href="{{action('PacienteController@show', $paciente->id)}}" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Evoluções">
                                    <span class="fa fa-file"></span>
                                </a>
                            </span>
                        
                            <span class="input-group-btn m-1">
                                <a class="btn btn-success btn-xs" href="{{action('PacienteController@share', $paciente->id)}}" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Compartilhar">
                                    <span class="fa fa-share"></span>
                                </a>
                            </span>
                        
                            <span class="input-group-btn m-1">
                                <a class="btn btn-warning btn-xs" href="{{action('PacienteController@edit', $paciente->id)}}" style="color:white; max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Alterar">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </span>
                        
                            <span class="input-group-btn m-1">
                                <form action="{{action('PacienteController@destroy', $paciente->id)}}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-xs" style="color:white;max-width: 38px" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                        <span class="fa fa-trash-alt"></span>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        @endforeach
    </div>        
</div>
@endsection