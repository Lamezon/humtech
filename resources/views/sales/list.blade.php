@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth


        <div class="row">
            <div class="col"><h2 style="color:green">Abertura do Caixa: <strong>R$<?=($total[0]['total']); ?></strong></h2></div>
            <div class="col"><h2 style="color:blue">Caixa Atual: <strong>R$<?=($total[0]['atual']); ?></strong></h2></div>
        </div>

        <div class="row">
          
            
          </div>
        <span class="page-title">Lista de Vendas<a href="/sale-register"><button style="float:right;" class="btn btn-success"><i class="fa-solid fa-plus"></i></button></a></span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Total</th>
                    <th>Detalhes</th>
                    <th>Imprimir</th>
                    <th>Deletar</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($sale as $sale_row)  
                {?>
                    <td><?= $sale_row['id']?></td>
                    <td><?= $sale_row['code']?></td>
                    <?php
                        foreach($users as $user_row){
                            if($user_row['id']==$sale_row['seller_id']){
                                ?>
                                <td><?=$user_row['name']?></td> 
                                <?php
                            }
                        }
                    ?> 
                    <td>R$<?= $sale_row['total']?></td>      
                    <td><a href="/sale-view/<?=$sale_row['id']?>"><button class="btn btn-block btn-edit"><i class="fa-solid fa-eye"></i></button></a></td> 
                    <td><a target="_blank" href="/sale-print/<?=$sale_row['id']?>"><button class="btn btn-block"><i class="fa-solid fa-print"></i></button></a></td>     
                    <form method="POST" action="/sale-delete/<?=$sale_row['id']?>">
                    {{ csrf_field() }}
                        <td><a><button class="btn btn-block btn-danger"><i class="fa-solid fa-trash-can"></i></button></a></td>
                    </form>    
                </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>
        @endauth
@endsection