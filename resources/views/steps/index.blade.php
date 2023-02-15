@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Registrar Progressos</span>
        <form method="post" action="{{ route('seller-register') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Vendedor" required="required" autofocus>
            <label for="name">Nome do Processo</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg form-send" type="submit">Registrar</button>
    </form>
        @endauth
</div>
    @endsection