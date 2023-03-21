@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Data</th>
                    <th>Detalhes</th>
                    <th>Imprimir</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                $total = 0;
                foreach ($sales as $sale_row)  
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
                    <td><?= $sale_row['payment']?></td>   
                    <td><?= date_format($sale_row['created_at'], 'd-m-Y H:m')?></td>
                    <td><a href="/sale-view/<?=$sale_row['id']?>"><button class="btn btn-block btn-edit"><i class="fa-solid fa-eye"></i></button></a></td> 
                    <td><a target="_blank" href="/sale-print/<?=$sale_row['id']?>"><button class="btn btn-block"><i class="fa-solid fa-print"></i></button></a></td>     
                    <?php $total+=$sale_row['total']; ?>
                </tr>  
                <?php } ?>
                </tbody>

            </table>
            <hr><br>
            <strong><h1 style="color:green; font-size: 20px">Valor Total das Vendas Selecionadas: R$<?=$total?></h1></strong>
        @endauth
@endsection