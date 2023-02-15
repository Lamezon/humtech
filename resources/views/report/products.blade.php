@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
       
        <div class="container"> 
            <h1 class="text-center mt-5">Relatório de Vendas</h1> 
            <table class="table mt-5"> 
               <thead> 
                  <tr> 
                     <th>Nome</th> 
                     <th>Quantidade vendida</th> 
                     <th>Horário da venda</th> 
                  </tr> 
               </thead> 
               <tbody> 
                  <tr> 
                     <td>Produto 1</td> 
                     <td>10</td> 
                     <td>10:00</td> 
                  </tr> 
                  <tr> 
                     <td>Produto 2</td> 
                     <td>5</td> 
                     <td>11:00</td> 
                  </tr> 
                  <tr> 
                     <td>Produto 3</td> 
                     <td>15</td> 
                     <td>12:00</td> 
                  </tr> 
               </tbody> 
            </table> 
         </div> 
        @endauth
@endsection