@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Lista de Vendedores<a href="/seller-register"><button style="float:right;" class="btn btn-success"><i class="fa-solid fa-plus"></i></button></a></span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Setor</th>         
                    <th scope="col">Idade</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
                </thead>
                <tbody>
              
                <?php
                foreach ($sellers as $row)  
                {?>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['name']?></td>
                    <td><?= $row['role']?></td>
                    <td><?= $row['age']?></td>              
                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <form method="POST" action="/seller-delete/<?=$row['id']?>">
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