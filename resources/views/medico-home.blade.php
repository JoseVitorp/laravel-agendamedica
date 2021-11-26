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
                <div class="card-header">Dashboard</div>
                <div class="card-body ">
                    <div class="row p-0 justify-content-center">

                        <div class="card-group justify-content-center">

                            <div class="card text-white bg-success m-4 col-sm-10 col-md-5">
                                <div class="card-header"><strong>Agendas</strong></div>
                                <div class="card-body">
                                    <h5 class="card-title">Visualize as agendas</h5>
                                    <p class="card-text">Acesse aqui para criar e gerenciar todas as suas agendas.</p>                                    
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('agenda.index') }}" class="btn btn-light">Acesse</a>
                                </div>
                            </div>

                            <div class="card text-white bg-info m-4 col-sm-10 col-md-5">
                                <div class="card-header"><strong>Pacientes</strong></div>
                                <div class="card-body">
                                    <h5 class="card-title">Cadastro de pacientes</h5>
                                    <p class="card-text">Cadastre e consulte o histórico dos seus pacientes por está opção.</p>
                                    
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('paciente.index') }}" class="btn btn-light">Acesse</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection