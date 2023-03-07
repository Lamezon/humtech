@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <h1 style="font-size: 30px"><strong>RELATÓRIO DE VENDAS TOTAIS</strong></h1><br><br>
        <table class="table" style="width:100%"> 
           <tr> 
              <th>Nome</th> 
              <th>Quantidade vendida</th>
              <th>Total em Vendas (R$)</th>

           </tr>
           <tbody>
            <?php
                foreach ($products as $row)  
                {?>
                <tr> 
                    <td><?= $row['name']?></td>
                    <td><?= $row['sold_amount']?></td>
                    <td>R$<?= ($row['sold_amount']*$row['price']) ?></td>             
                </tr>  
                <?php } ?>
           </tbody>
        </table>
        @endauth
@endsection