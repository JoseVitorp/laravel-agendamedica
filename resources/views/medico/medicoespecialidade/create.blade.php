@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Especialidades médicas</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medico.especialidade.store',$medico_id) }}">
                        @csrf                     

                        <div class="form-group row">
                            <label for="especialidade_id" class="col-md-4 col-form-label text-md-right">Especialidade</label>
                        
                            <div class="col-md-6">
                                <select name="especialidade_id" class="form-control{{ $errors->has('especialidade_id') ? ' is-invalid' : '' }}" name="especialidade_id" value="{{ old('especialidade_id') }}"
                                    required autofocus> 
                                
                                    @foreach ($especialidades as $especialidade)
                                        <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                                    @endforeach                              
                                </select> 
                                @if ($errors->has('especialidade_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('especialidade_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-1 m-1">
                                <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>
                        
                            <span class="col-md-1 m-0"></span>

                            <div class="col-md-1 m-1">
                                <a type="link" class="btn btn-info" href="{{ route('medico.especialidade.index',$medico_id)}}">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection