@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Relatório de Vendedores</span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Quantidade de Vendas</th>         
                    <th scope="col">Total de Vendas</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($sellers as $row)  
                {?>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['name']?></td>
                    <td><?= $row['role']?></td>               
                    <td><?= $row['sales_quantity']?></td>
                    <td>R$<?= $row['sales_total']?></td>   
                </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>
        @endauth
@endsection