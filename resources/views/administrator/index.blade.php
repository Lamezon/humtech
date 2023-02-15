@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Informações da Loja</h1>
        <form method="post" action="{{ route('administrator.create') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="GuaraContainer" required="required" autofocus>
            <label for="floatingNome">Nome da Empresa</label>
            @if ($errors->has('nome'))
                <span class="text-danger text-left">{{ $errors->first('nome') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" placeholder="Avenida XV de Setembro" required="required" autofocus>
            <label for="floatingEndereco">Endereço da Empresa</label>
            @if ($errors->has('endereco'))
                <span class="text-danger text-left">{{ $errors->first('endereco') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}" placeholder="00.000.000/0000-00" required="required" autofocus>
            <label for="floatingCnpj">CNPJ</label>
            @if ($errors->has('cnpj'))
                <span class="text-danger text-left">{{ $errors->first('cnpj') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="(42)00000-0000" required="required" autofocus>
            <label for="floatingEmail">Telefone</label>
            @if ($errors->has('telefone'))
                <span class="text-danger text-left">{{ $errors->first('telefone') }}</span>
            @endif
        </div>

        

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
        
        @include('auth.partials.copy')
    </form>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection