@extends('layouts.app')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Editar Cliente</h1>
        <form action="<?=$client->id?>" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="<?=$client->name?>"  required="required" autofocus>
            <label for="floatingEmail">Nome do Cliente</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cpf" value="<?=$client->cpf?>"  required="required" autofocus>
            <label for="floatingEmail">CPF do Cliente</label>
            @if ($errors->has('cpf'))
                <span class="text-danger text-left">{{ $errors->first('cpf') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="phone" value="<?=$client->phone?>"  required="required" autofocus>
            <label for="floatingEmail">Telefone do Cliente</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" value="<?=$client->address?>"  required="required" autofocus>
            <label for="floatingEmail">Endereço do Cliente</label>
            @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg form-send" type="submit">Atualizar</button>
        
        @include('auth.partials.copy')
    </form>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection