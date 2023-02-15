@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Caixa</span>
        <form method="post" action="">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <?php
        foreach ($earn as $row)  
        {?>
         <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="total" value="<?=$row['total']?>" placeholder="Total" required="required" autofocus>
            <label for="total">Total em Caixa</label>
            @if ($errors->has('total'))
                <span class="text-danger text-left">{{ $errors->first('total') }}</span>
            @endif
        </div>
        <?php } ?>
       

        <button class="w-100 btn btn-lg form-send" type="submit">Confirmar</button>
    </form>
        @endauth
</div>
    @endsection