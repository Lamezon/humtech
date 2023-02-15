@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Cadastro de Produto</h1>
        <form method="post" action="{{ route('product.create') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome do Produto" required="required" autofocus>
            <label for="floatingEmail">Nome do Produto</label>
            @if ($errors->has('nome'))
                <span class="text-danger text-left">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required="required" placeholder="Descrição do Produto">
            <label for="floatingDescription">Descrição do Produto</label>
            @if ($errors->has('descricao'))
                <span class="text-danger text-left">{{ $errors->first('descricao') }}</span>
            @endif
        </div>

        <div class="form-group row form-floating mb-3">
            <label style="text-align: right;" class="col-xs-2 col-form-label" for="floatingValue">R$</label>
            <div class="col-xs-10">
                <input type="number" class="form-control" name="valor" step="0.01" value="{{ old('valor') }}" placeholder="1.50" required="required">
            
                <label for="floatingValue">Valor do Produto</label>
                @if ($errors->has('valor'))
                    <span class="text-danger text-left">{{ $errors->first('valor') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row form-floating mb-3">
            <label style="text-align: right;" class="col-xs-2 col-form-label" for="floatingTax">R$</label>
            <div class="col-xs-10">
                <input type="number" class="form-control" name="taxa" step="0.01" value="0" placeholder="0.50" required="required">
            
                <label for="floatingTax">Valor da Taxa</label>
                @if ($errors->has('taxa'))
                    <span class="text-danger text-left">{{ $errors->first('taxa') }}</span>
                @endif
            </div>
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