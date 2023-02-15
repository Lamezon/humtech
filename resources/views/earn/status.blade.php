@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <?php  foreach ($earn as $row) {
            if($row['status']==false){
                ?> <form method="post" action="/abrir-caixa">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
                        <button style="color: black" class="btn btn-block btn-success" type="submit">Abrir Caixa</button>
                    </form> <?php
            } else {
                ?> <form method="post" action="/fechar-caixa">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
                        <button class="btn btn-block btn-warning" type="submit">Fechar Caixa</button>
                    </form> <?php
            }
        }
        ?>
        @endauth
</div>
    @endsection