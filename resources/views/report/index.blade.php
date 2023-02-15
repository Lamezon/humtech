@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <h1 style="font-size: 30px"><strong>RELATÓRIO DE VENDAS NO ACESSO</strong></h1><br><br>
        <table class="table" style="width:100%"> 
           <tr> 
              <th>Nome</th> 
              <th>Quantidade vendida</th> 

           </tr>
           <tbody>
            <?php
                foreach ($products as $row)  
                {?>
                <tr> 
                    <td><?= $row['name']?></td>
                    <td><?= $row['sold_amount_access']?></td>               
                </tr>  
                <?php } ?>
           </tbody>
        </table>
        <form method="POST" action="{{ route('logout') }}">
         @csrf
           <button class="btn btn-danger" :href="route('logout')"
               onclick="event.preventDefault();
                             this.closest('form').submit();">
             {{ __('Log Out Confirm') }}
           </button>
         </form>
        @endauth
@endsection