@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro do paciente</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paciente.update',$paciente->id) }}">
                        @csrf
                        @method('PUT')

                        
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>
                
                            <div class="col-md-6">
                            <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ $paciente->nome}}"
                                    required autofocus> @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('nome') }}</strong>
                                                    </span> @endif
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                
                            <div class="col-md-4">
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" value="{{ $paciente->sexo }}"
                                    required autofocus>
                                        <option value="F" {{ old('sexo',$paciente->sexo) == 'F' ? 'selected' : '' }}>Feminino</option>
                                        <option value="M" {{ old('sexo',$paciente->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>                                	
                                </select> 
                                @if ($errors->has('sexo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">Data de nascimento</label>
                
                            <div class="col-md-4">
                                <input id="data_nascimento" type="date" class="form-control{{ $errors->has('data_nascimento') ? ' is-invalid' : '' }}" name="data_nascimento"
                                    value="{{ $paciente->data_nascimento }}" required autofocus> 
                                @if ($errors->has('data_nascimento'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('data_nascimento') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">e-mail</label>
                
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $paciente->email }}"
                                    required> 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fone_celular" class="col-md-4 col-form-label text-md-right">Fone celular</label>
                
                            <div class="col-md-4">
                                <input id="fone_celular" type="text" class="form-control{{ $errors->has('fone_celular') ? ' is-invalid' : '' }}" name="fone_celular"
                                    value="{{ $paciente->fone_celular }}" required autofocus> 
                                @if ($errors->has('fone_celular'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('fone_celular') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="fone_residencial" class="col-md-4 col-form-label text-md-right">Fone residencial</label>
                
                            <div class="col-md-4">
                                <input id="fone_residencial" type="text" class="form-control" name="fone_residencial" value="{{ $paciente->fone_residencial }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
                
                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ $paciente->cpf }}"
                                    required autofocus> 
                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group row">
                
                            <label for="rg" class="col-md-4 col-form-label text-md-right">RG</label>
                
                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" value="{{ $paciente->rg }}"
                                    required autofocus> 
                                @if ($errors->has('rg'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="end_res_logradouro" class="col-md-4 col-form-label text-md-right">Logradouro (rua, av. etc.)</label>
                
                            <div class="col-md-6">
                                <input id="end_res_logradouro" type="text" class="form-control" name="end_res_logradouro" value="{{ $paciente->end_res_logradouro }}">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="end_res_numero" class="col-md-4 col-form-label text-md-right">Número</label>
                
                            <div class="col-md-2">
                                <input id="end_res_numero" type="text" class="form-control" name="end_res_numero" value="{{ $paciente->end_res_numero }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="end_res_complemento" class="col-md-4 col-form-label text-md-right">Complemento</label>
                
                            <div class="col-md-3">
                                <input id="end_res_complemento" type="text" class="form-control" name="end_res_complemento" value="{{ $paciente->end_res_complemento }}">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="end_res_bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
                
                            <div class="col-md-6">
                                <input id="end_res_bairro" type="text" class="form-control" name="end_res_bairro" value="{{ $paciente->end_res_bairro }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="end_res_cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
                
                            <div class="col-md-6">
                                <input id="end_res_cidade" type="text" class="form-control" name="end_res_cidade" value="{{ $paciente->end_res_cidade }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="end_res_uf" class="col-md-4 col-form-label text-md-right">UF</label>
                
                            <div class="col-md-4">
                                <select name="end_res_uf" class="form-control{{ $errors->has('end_res_uf') ? ' is-invalid' : '' }}" name="end_res_uf" value="{{ $paciente->end_res_uf }}"
                                    required autofocus> 
                                                    <option value="AC" {{ old('end_res_uf',$paciente->end_res_uf) == 'AC' ? 'selected' : '' }} >Acre</option>
                                                    <option value="AL" {{ old('end_res_uf',$paciente->end_res_uf) == 'AL' ? 'selected' : '' }} >Alagoas</option>
                                                    <option value="AP" {{ old('end_res_uf',$paciente->end_res_uf) == 'AP' ? 'selected' : '' }} >Amapá</option>
                                                    <option value="AM" {{ old('end_res_uf',$paciente->end_res_uf) == 'AM' ? 'selected' : '' }} >Amazonas</option>
                                                    <option value="BA" {{ old('end_res_uf',$paciente->end_res_uf) == 'BA' ? 'selected' : '' }} >Bahia</option>
                                                    <option value="CE" {{ old('end_res_uf',$paciente->end_res_uf) == 'CE' ? 'selected' : '' }} >Ceará</option>
                                                    <option value="DF" {{ old('end_res_uf',$paciente->end_res_uf) == 'DF' ? 'selected' : '' }} >Distrito Federal</option>
                                                    <option value="ES" {{ old('end_res_uf',$paciente->end_res_uf) == 'ES' ? 'selected' : '' }} >Espírito Santo</option>
                                                    <option value="GO" {{ old('end_res_uf',$paciente->end_res_uf) == 'GO' ? 'selected' : '' }} >Goiás</option>
                                                    <option value="MA" {{ old('end_res_uf',$paciente->end_res_uf) == 'MA' ? 'selected' : '' }} >Maranhão</option>
                                                    <option value="MT" {{ old('end_res_uf',$paciente->end_res_uf) == 'MT' ? 'selected' : '' }} >Mato Grosso</option>
                                                    <option value="MS" {{ old('end_res_uf',$paciente->end_res_uf) == 'MS' ? 'selected' : '' }} >Mato Grosso do Sul</option>
                                                    <option value="MG" {{ old('end_res_uf',$paciente->end_res_uf) == 'MG' ? 'selected' : '' }} >Minas Gerais</option>
                                                    <option value="PA" {{ old('end_res_uf',$paciente->end_res_uf) == 'PA' ? 'selected' : '' }} >Pará</option>
                                                    <option value="PB" {{ old('end_res_uf',$paciente->end_res_uf) == 'PB' ? 'selected' : '' }} >Paraíba</option>
                                                    <option value="PR" {{ old('end_res_uf',$paciente->end_res_uf) == 'PR' ? 'selected' : '' }} >Paraná</option>
                                                    <option value="PE" {{ old('end_res_uf',$paciente->end_res_uf) == 'PE' ? 'selected' : '' }} >Pernambuco</option>
                                                    <option value="PI" {{ old('end_res_uf',$paciente->end_res_uf) == 'PI' ? 'selected' : '' }} >Piauí</option>
                                                    <option value="RJ" {{ old('end_res_uf',$paciente->end_res_uf) == 'RJ' ? 'selected' : '' }} >Rio de Janeiro</option>
                                                    <option value="RN" {{ old('end_res_uf',$paciente->end_res_uf) == 'RN' ? 'selected' : '' }} >Rio Grande do Norte</option>
                                                    <option value="RS" {{ old('end_res_uf',$paciente->end_res_uf) == 'RS' ? 'selected' : '' }} >Rio Grande do Sul</option>
                                                    <option value="RO" {{ old('end_res_uf',$paciente->end_res_uf) == 'RO' ? 'selected' : '' }} >Rondônia</option>
                                                    <option value="RR" {{ old('end_res_uf',$paciente->end_res_uf) == 'RR' ? 'selected' : '' }} >Roraima</option>
                                                    <option value="SC" {{ old('end_res_uf',$paciente->end_res_uf) == 'SC' ? 'selected' : '' }} >Santa Catarina</option>
                                                    <option value="SP" {{ old('end_res_uf',$paciente->end_res_uf) == 'SP' ? 'selected' : '' }} >São Paulo</option>
                                                    <option value="SE" {{ old('end_res_uf',$paciente->end_res_uf) == 'SE' ? 'selected' : '' }} >Sergipe</option>
                                                    <option value="TO" {{ old('end_res_uf',$paciente->end_res_uf) == 'TO' ? 'selected' : '' }} >Tocantins</option>
                                                    </select> 
                                @if ($errors->has('end_res_uf'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_res_uf') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="end_res_cep" class="col-md-4 col-form-label text-md-right">CEP</label>
                
                            <div class="col-md-3">
                                <input id="end_res_cep" type="text" class="form-control" name="end_res_cep" value="{{ $paciente->end_res_cep }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gera_senha" name="gera_senha" unchecked>
                                    <label class="form-check-label" for="gera_senha">Gerar nova senha para o paciente</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-2 m-1">
                                <button type="submit" class="btn btn-primary">Gravar</button>
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