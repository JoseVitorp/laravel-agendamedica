@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro do paciente</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paciente.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}"
                                    required autofocus> @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span> @endif
                            </div>       
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                        
                            <div class="col-md-4">
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" value="{{ old('sexo') }}"
                                    required autofocus> 
                                                                            	<option value="F" selected>Feminino</option>
                                                                            	<option value="M">Masculino</option>                                	
                                                                            </select> @if ($errors->has('sexo'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('sexo') }}</strong>
                                                                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">Data de nascimento</label>
                        
                            <div class="col-md-4">
                                <input id="data_nascimento" type="date" class="form-control{{ $errors->has('data_nascimento') ? ' is-invalid' : '' }}" name="data_nascimento"
                                    value="{{ old('data_nascimento') }}" required autofocus> @if ($errors->has('data_nascimento'))
                                <span class="invalid-feedback">
                                                                                <strong>{{ $errors->first('data_nascimento') }}</strong>
                                                                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">e-mail</label>
                        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required> @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fone_celular" class="col-md-4 col-form-label text-md-right">Fone celular</label>
                        
                            <div class="col-md-4">
                                <input id="fone_celular" type="text" class="form-control{{ $errors->has('fone_celular') ? ' is-invalid' : '' }}" name="fone_celular"
                                    value="{{ old('fone_celular') }}" required autofocus> @if ($errors->has('fone_celular'))
                                <span class="invalid-feedback">
                                                                                <strong>{{ $errors->first('fone_celular') }}</strong>
                                                                            </span> @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fone_residencial" class="col-md-4 col-form-label text-md-right">Fone residencial</label>
                        
                            <div class="col-md-4">
                                <input id="fone_residencial" type="text" class="form-control" name="fone_residencial" value="{{ old('fone_residencial') }}">
                            </div>
                        </div>                       

                        <div class="form-group row">
                        <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>
                    
                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}"
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
                            <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" value="{{ old('rg') }}"
                                required autofocus> 
                                @if ($errors->has('crm_uf'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span> 
                                @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="end_res_logradouro" class="col-md-4 col-form-label text-md-right">Logradouro (rua, av. etc.)</label>
                    
                        <div class="col-md-6">
                            <input id="end_res_logradouro" type="text" class="form-control" name="end_res_logradouro" value="{{ old('end_res_logradouro') }}">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="end_res_numero" class="col-md-4 col-form-label text-md-right">Número</label>
                    
                        <div class="col-md-2">
                            <input id="end_res_numero" type="text" class="form-control" name="end_res_numero" value="{{ old('end_res_numero') }}">
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_res_complemento" class="col-md-4 col-form-label text-md-right">Complemento</label>
                        
                            <div class="col-md-3">
                                <input id="end_res_complemento" type="text" class="form-control" name="end_res_complemento" value="{{ old('end_res_complemento') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_res_bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
                        
                            <div class="col-md-6">
                                <input id="end_res_bairro" type="text" class="form-control" name="end_res_bairro" value="{{ old('end_res_bairro') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_res_cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
                        
                            <div class="col-md-6">
                                <input id="end_res_cidade" type="text" class="form-control" name="end_res_cidade" value="{{ old('end_res_cidade') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_res_uf" class="col-md-4 col-form-label text-md-right">UF</label>
                        
                            <div class="col-md-4">
                                <select name="end_res_uf" class="form-control{{ $errors->has('end_res_uf') ? ' is-invalid' : '' }}" name="end_res_uf" value="{{ old('end_res_uf') }}"
                                    required autofocus> 
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS" selected>Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
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
                                <input id="end_res_cep" type="text" class="form-control" name="end_res_cep" value="{{ old('end_res_cep') }}">
                            </div>
                        </div>

                        <div class="form-inline m-0 justify-content-center">
                            <div class="col-md-1 m-1">
                                <button type="submit" class="btn btn-primary">Criar</button>
                            </div>
                        
                            <div class="col-md-1 m-1">
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