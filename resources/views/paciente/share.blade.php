@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Compartilhar informações do paciente</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paciente.shareStore',$paciente->id) }}">
                        @csrf                       
                        <p class="text-info text-center">Digite o e-mail do médico com o qual deseja compartilhar as informações do paciente</p>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">e-mail</label>
                
                            <div class="col-md-6">
                                <input id="email_medico" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email_medico" value=""
                                    required> 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                               

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-2 m-1">
                                <button type="submit" class="btn btn-primary">Compartilhar</button>
                            </div>                            
                        
                            <div class="col-md-2 m-1">
                                <a type="link" class="btn btn-info" href="{{ route('paciente.index')}}">Voltar</a>
                            </div>           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection