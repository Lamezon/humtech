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
                    <td><a href="seller-edit/<?=$row['id']?>"><button style="width:100%" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
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