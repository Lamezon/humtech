@extends('layouts.app-master')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#cidade").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#cidade").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);                           
                                $("#cidade").val(dados.localidade);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Edição de Cliente</h1>
        <form action="<?=$cliente->id?>" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nome" value="<?=$cliente->nome?>" placeholder="Nome do Cliente" required="required" autofocus>
            <label for="floatingEmail">Nome do Cliente</label>
            @if ($errors->has('nome'))
                <span class="text-danger text-left">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cpf"  value="<?=$cliente->cpf?>" placeholder="XXXXXXXXXXX ou XXXXXXXX/0001-XX" required="required">
            <label for="floatingCPF">CPF ou CNPJ</label>
            @if ($errors->has('cpf'))
                <span class="text-danger text-left">{{ $errors->first('cpf') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="inscricao"  value="<?=$cliente->inscricao?>" placeholder="XXXXXXXXX" required="required">
            <label for="inscricao">Inscrição Estadual</label>
            @if ($errors->has('inscricao'))
                <span class="text-danger text-left">{{ $errors->first('inscricao') }}</span>
            @endif
        </div>
        

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="telefone"  value="<?=$cliente->telefone?>" placeholder="Telefone do Cliente" required="required">
            <label for="floatingTelefone">Telefone</label>
            @if ($errors->has('telefone'))
                <span class="text-danger text-left">{{ $errors->first('telefone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="telefone2"  value="<?=$cliente->telefone2?>" placeholder="Outros Telefones" required="required">
            <label for="floatingTelefone2">Outros Telefones</label>
            @if ($errors->has('telefone2'))
                <span class="text-danger text-left">{{ $errors->first('telefone2') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" id="cep" name="cep"  value="<?=$cliente->cep?>" placeholder="CEP do Cliente" required="required">
            <label for="floatingCep">CEP</label>
            @if ($errors->has('cep'))
                <span class="text-danger text-left">{{ $errors->first('cep') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" id="rua" name="endereco" value="<?=$cliente->endereco?>" placeholder="Nome do Endereço do Cliente" required="required">
            <label for="floatingEndereco">Endereço</label>
            @if ($errors->has('Endereco'))
                <span class="text-danger text-left">{{ $errors->first('Endereco') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" id="cidade" name="cidade"  value="<?=$cliente->cidade?>" placeholder="Cidade do Cliente" required="required">
            <label for="floatingCidade">Cidade</label>
            @if ($errors->has('Cidade'))
                <span class="text-danger text-left">{{ $errors->first('Cidade') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" value="<?=$cliente->email?>" placeholder="Email do Cliente" required="required">
            <label for="floatingEmail">E-Mail</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email_secundario" value="<?=$cliente->email_secundario?>" placeholder="Outros Emails" required="required">
            <label for="floatingEmail">Outros Emails</label>
            @if ($errors->has('email_secundario'))
                <span class="text-danger text-left">{{ $errors->first('email_secundario') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Atualizar</button>
        
       
    </form>

    <form method="post" action="/apagar-cliente/<?=$cliente->id?>">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="mt-5 btn btn-block btn-dark">Excluir Cliente</button>
    </form>
    @include('auth.partials.copy')
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection