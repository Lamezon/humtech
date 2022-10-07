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
                    <th scope="col">Quantidade de Vendas</th>         
                    <th scope="col">Total de Vendas</th>
                    <th>Lista</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($product as $row)  
                {?>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['name']?></td>
                    <td><?= $row['price']?></td>
                    <td><?= $row['sold_amount']?></td>              
                    <td><a href="product-edit/<?=$row['id']?>"><button style="width:100%" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
                    <form method="POST" action="/product-delete/<?=$row['id']?>">
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