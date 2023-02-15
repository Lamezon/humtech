@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Editar Produto</h1>
        <form action="<?=$produto->id?>" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nome" value="<?=$produto->nome?>"  required="required" autofocus>
            <label for="floatingEmail">Nome do Produto</label>
            @if ($errors->has('nome'))
                <span class="text-danger text-left">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="descricao" value="<?=$produto->descricao?>" required="required" placeholder="Descrição do Produto">
            <label for="floatingDescription">Descrição do Produto</label>
            @if ($errors->has('descricao'))
                <span class="text-danger text-left">{{ $errors->first('descricao') }}</span>
            @endif
        </div>

        <div class="form-group row form-floating mb-3">
            <label style="text-align: right;" class="col-xs-2 col-form-label" for="floatingValue">R$</label>
            <div class="col-xs-10">
                <input type="number" class="form-control" name="valor" step="0.01" value="<?=$produto->valor?>" placeholder="1.50" required="required">
            
                <label for="floatingValue">Valor do Produto</label>
                @if ($errors->has('valor'))
                    <span class="text-danger text-left">{{ $errors->first('valor') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row form-floating mb-3">
            <label style="text-align: right;" class="col-xs-2 col-form-label" for="floatingTax">R$</label>
            <div class="col-xs-10">
                <input type="number" class="form-control" name="taxa" step="0.01" value="<?=$produto->taxa?>" placeholder="0.50" required="required">
            
                <label for="floatingTax">Valor da Taxa</label>
                @if ($errors->has('taxa'))
                    <span class="text-danger text-left">{{ $errors->first('taxa') }}</span>
                @endif
            </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Atualizar</button>
        
        @include('auth.partials.copy')
    </form>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection