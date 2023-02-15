@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Detalhes da Venda</span>
      

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  

        <table class="table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                foreach ($codes as &$code) {
                  foreach($products as $item) {
                 
                    if($item['id']==(int)$code){
                      ?> <tr>
                            <td><?=$item['name'];?></td><td><?=$item['price']?></td>
                         </tr><?php
                    }
                  }
                }
                /* foreach($products as $item) {
                        if (in_array($item['id'], $codes)) {
                                echo "<tr><td>". $item['name'] . "</td><td>".$item['price']."</td></tr>";
                        }
                } */ ?>
                </tbody>
              </table>
        @endauth
</div>
    @endsection