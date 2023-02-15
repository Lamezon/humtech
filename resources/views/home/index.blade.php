@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Lista de Faturas</h1>
        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Status</th>
                    <th scope="col">Imprimir</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($faturas as $row)  
                {  
                    ?><tr>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['nome']?></td>  
                    <td><?= $row['observacao']?></td>  
                    <td><a href="/fatura/<?=$row['id']?>"><?php 
                     switch ($row['status']) {
                        case '1':
                            ?>
                            <button type="button" class="btn btn-primary btn-block" aria-pressed="false" autocomplete="off">Salvo</button><?php
                            break;
                        case '2':
                            ?>
                            <button type="button" class="btn btn-success btn-block" aria-pressed="false" autocomplete="off">Faturado</button><?php
                            break;
                        case '3':
                            ?>
                            <button type="button" class="btn btn-danger btn-block" aria-pressed="false" autocomplete="off">Cancelado</button><?php
                            break;
                    }      $row['status']
                    ?></a></td>
                    <td style="text-align:center"><a target="_blank" href="/imprimir/<?=$row['id']?>"><i class="fas fa-2x fa-print"></i></a></td>
                    <td style="text-align:center"><a style="padding-left:10px" href="mailto:<?=$row['email']?>"><i class="fas fa-2x fa-envelope"></i></a></td>
                        
                </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>

    
        @endauth

        @guest
        <h1>Bem Vindo</h1>
        <img class="mb-4" src="{!! url('assets/images/logo.png') !!}" alt="" height="300px" style="margin:auto; display:block">
        @endguest
    </div>
@endsection