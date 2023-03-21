@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
            <a href="report"><button class="btn btn-info">Relatório de Vendas</button></a>
            <a href="reports/clients"><button class="btn btn-success">Relatório de Clientes</button></a>
                
        @endauth
@endsection