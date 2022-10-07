@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Relatório de Produtos</span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Número de Vendas</th>         
                    <th scope="col">Valor de Vendas</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($products as $row)  
                {?>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['name']?></td>
                    <td><?= $row['price']?></td>               
                    <td><?= $row['sold_amount']?></td>
                    <td>R$<?= $row['profit']?></td>   
                </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>
        @endauth
@endsection