@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Editar Vendedor</span>
        <form method="post" action="<?=$seller->id?>">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="<?=$seller->name?>" placeholder="Vendedor" required="required" autofocus>
            <label for="name">Nome do Vendedor</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>


        
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="role" value="<?=$seller->role?>" placeholder="Setor" required="required" autofocus>
            <label for="role">Setor</label>
            @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="age" min="1" value="<?=$seller->age?>" placeholder="Idade" required="required" autofocus>
            <label for="age">Idade</label>
            @if ($errors->has('age'))
                <span class="text-danger text-left">{{ $errors->first('age') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg form-send" type="submit">Confirmar</button>
    </form>
        @endauth
</div>
    @endsection