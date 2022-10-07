@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <span class="page-title">Relatório</span>

            <br>
            <a href="/reports/sellers">
                <span class="page-main">Vendedores</span>         
            </a><br>
            <a href="/reports/products">
                <span class="page-main">Produtos</span>
            </a>

        @endauth
@endsection