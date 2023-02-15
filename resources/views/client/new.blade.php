@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Registrar Cliente</span>
        <form method="post" action="{{ route('client-register') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Cliente" required="required" autofocus>
            <label for="name">Nome do Cliente</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cpf" placeholder="CPF" required="required" autofocus>
            <label for="name">CPF do Cliente</label>
            @if ($errors->has('cpf'))
                <span class="text-danger text-left">{{ $errors->first('cpf') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" placeholder="Endereço" autofocus>
            <label for="address">Endereço do Cliente</label>
            @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Telefone" required="required" autofocus>
            <label for="name">Telefone do Cliente</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg form-send" type="submit">Registrar</button>
    </form>
        @endauth
</div>
    @endsection