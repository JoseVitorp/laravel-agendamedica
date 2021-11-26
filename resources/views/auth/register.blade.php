@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro do médico</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    required autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confime a senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="crm_numero" class="col-md-4 col-form-label text-md-right">CRM</label>

                            <div class="col-md-4">
                                <input id="crm_numero" type="text" class="form-control{{ $errors->has('crm_numero') ? ' is-invalid' : '' }}" name="crm_numero" value="{{ old('crm_numero') }}"
                                    required autofocus> @if ($errors->has('crm_numero'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('crm_numero') }}</strong>
                                </span> @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="crm_uf" class="col-md-4 col-form-label text-md-right">CRM UF</label>

                            <div class="col-md-4">
                                <select name="crm_uf" class="form-control{{ $errors->has('crm_uf') ? ' is-invalid' : '' }}" name="crm_uf" value="{{ old('crm_uf') }}" required autofocus> 
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
                                @if ($errors->has('crm_uf'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('crm_uf') }}</strong>
                                </span> @endif                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}"
                                    required autofocus> @if ($errors->has('cpf'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="rg" class="col-md-4 col-form-label text-md-right">RG</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" value="{{ old('rg') }}"
                                    required autofocus> @if ($errors->has('crm_uf'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('rg') }}</strong>
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
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                        
                            <div class="col-md-4">
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" value="{{ old('sexo') }}" required autofocus> 
                                	<option value="F" selected>Feminino</option>
                                	<option value="M">Masculino</option>                                	
                                </select> @if ($errors->has('sexo'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('sexo') }}</strong>
                                </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_pessoal" class="col-md-4 col-form-label text-md-right">e-mail pessoal</label>

                            <div class="col-md-6">
                                <input id="email_pessoal" type="email" class="form-control" name="email_pessoal"
                                    value="{{ old('email_pessoal') }}">                                      
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fone_comercial" class="col-md-4 col-form-label text-md-right">Fone profissional</label>
                        
                            <div class="col-md-4">
                                <input id="fone_comercial" type="text" class="form-control{{ $errors->has('fone_comercial') ? ' is-invalid' : '' }}" name="fone_comercial"
                                    value="{{ old('fone_comercial') }}" required autofocus> @if ($errors->has('fone_comercial'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('fone_comercial') }}</strong>
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
                                <input id="fone_residencial" type="text" class="form-control" name="fone_residencial"
                                    value="{{ old('fone_residencial') }}">                                 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_logradouro" class="col-md-4 col-form-label text-md-right">Logradouro (rua, av. etc.)</label>
                        
                            <div class="col-md-6">
                                <input id="end_com_logradouro" type="text" class="form-control"
                                    name="end_com_logradouro" value="{{ old('end_com_logradouro') }}">                                 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_numero" class="col-md-4 col-form-label text-md-right">Número</label>
                        
                            <div class="col-md-2">
                                <input id="end_com_numero" type="text" class="form-control" name="end_com_numero" value="{{ old('end_com_numero') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_complemento" class="col-md-4 col-form-label text-md-right">Complemento</label>
                        
                            <div class="col-md-3">
                                <input id="end_com_complemento" type="text" class="form-control" name="end_com_complemento" value="{{ old('end_com_complemento') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_bairro" class="col-md-4 col-form-label text-md-right">Bairro</label>
                        
                            <div class="col-md-6">
                                <input id="end_com_bairro" type="text" class="form-control" name="end_com_bairro" value="{{ old('end_com_bairro') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
                        
                            <div class="col-md-6">
                                <input id="end_com_cidade" type="text" class="form-control" name="end_com_cidade" value="{{ old('end_com_cidade') }}">
                            </div>
                        </div>                       

                        <div class="form-group row">
                            <label for="end_com_uf" class="col-md-4 col-form-label text-md-right">UF</label>
                        
                            <div class="col-md-4">
                                <select name="end_com_uf" class="form-control{{ $errors->has('end_com_uf') ? ' is-invalid' : '' }}" name="end_com_uf" value="{{ old('end_com_uf') }}"
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
                                @if ($errors->has('end_com_uf'))<span class="invalid-feedback"><strong>{{ $errors->first('end_com_uf') }}</strong></span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_pais" class="col-md-4 col-form-label text-md-right">País</label>
                        
                            <div class="col-md-4">
                                <input id="end_com_pais" type="text" class="form-control" name="end_com_pais" value="{{ old('end_com_pais') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_com_cep" class="col-md-4 col-form-label text-md-right">CEP</label>
                        
                            <div class="col-md-3">
                                <input id="end_com_cep" type="text" class="form-control" name="end_com_cep" value="{{ old('end_com_cep') }}">
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection