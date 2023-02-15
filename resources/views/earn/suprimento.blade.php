@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Adicionar ao Caixa</span>

        <form method="post" action="">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <?php
        foreach ($earn as $row)  
        {?>
        <h1>Valor Atual: <?=$row['atual']?></h1>
         <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="suprimento" value="0" placeholder="Quantidade a ser removida" required="required" autofocus>
            <label for="total">Suprimento (R$)</label>
            @if ($errors->has('suprimento'))
                <span class="text-danger text-left">{{ $errors->first('suprimento') }}</span>
            @endif
        </div>
        <?php } ?>
       

        <button class="w-100 btn btn-lg form-send" type="submit">Confirmar</button>
    </form>
        @endauth
</div>
    @endsection