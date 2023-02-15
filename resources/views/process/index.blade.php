@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Lista de Processos<a href="/sale-register"><button style="float:right;" class="btn btn-success"><i class="fa-solid fa-plus"></i></button></a></span>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Veículo</th>         
                    <th scope="col">Data de Chegada</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>ABC-1234</td>
                    <td>Volkswagen Gol</td>
                    <td>1/1/2022</td>
                    <td><a href="process-list/exemplo"><button style="width:100%" class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
                    <td><a><button class="btn btn-block btn-danger"><i class="fa-solid fa-trash-can"></i></button></a></td>         
                </tr>  
                </tbody>

            </table>
        </div>
        @endauth
@endsection