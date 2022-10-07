@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Lista de Vendas<a href="/sale-register"><button style="float:right;" class="btn btn-success"><i class="fa-solid fa-plus"></i></button></a></span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Produto</th>         
                    <th scope="col">Quantidade</th>
                    <th scope="col">Total</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($sale as $sale_row)  
                {?>
                    <td><?= $sale_row['id']?></td> 
                    <?php
                        foreach($seller as $seller_row){
                            if($seller_row['id']==$sale_row['seller_id']){
                                ?>
                                <td><?=$seller_row['name']?></td> 
                                <?php
                            }
                        }
                    ?> 
                   <?php
                        foreach($product as $product_row){
                            if($product_row['id']==$sale_row['product_id']){
                                ?>
                                <td><?=$product_row['name']?></td> 
                                <?php
                            }
                        }
                    ?> 
                    <td><?= $sale_row['quantity']?></td>
                    <td>R$<?= $sale_row['total']?></td>            
                    <td><a href="sale-edit/<?=$sale_row['id']?>"><button style="width:100%" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
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