@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Especialidades médicas</li>
                </ol>
            </nav>

            <div class="col-md-8 p-0">
                <h2>Especialidades médicas</h2>
            </div>
        
            <hr />

            <div class="col-md-8 pl-0">
                <a href="{{action('MedicoEspecialidadeController@create',$medico_id)}}" class="btn btn-primary pull-right h2">Nova especialidade</a>
            </div>        
            
            <div class="card-deck justify-content-center">                
                <div class="row col-12">
                @foreach($especialidades as $especialidade)
                    <div class="row col-xs-12 col-md-8 p-1">
                        <div class="card border-primary col-xs-12 col-md-10 p-0">

                            <div class="row card-body align-itens-bottom col-xs-12 col-md-12">
                            
                                <div class="col-xs-10 col-md-10">
                                    <h5>{{ $especialidade->nome }}</h5>
                                </div>

                                <div class="col-xs-2 col-md-2 p-0 float-right">                                                                    
                                    <span class="input-group-btn m-0 float-right">
                                        <form action="{{action('MedicoEspecialidadeController@destroy',[$medico_id, $especialidade->id])}}" method="POST">
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
                @endforeach
                </div>
            </div>               
        </div>
    </div>
</div>
@endsection