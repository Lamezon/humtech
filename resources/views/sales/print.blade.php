@extends('layouts.app-print')



<div style="text-align: center;">
        @auth
        <hr>
        <span style="font-size:25px" class="page-title"><strong>Pedido - <?=$sale->code?></strong></span>
        <hr>
        <?php $date = date_create($sale->created_at) ?>
        <span class="page-title"><strong>Data do Pedido</strong><br><?= date_format($date, 'd-m-Y')?></span><hr>
        <span class="page-title"><strong>Hora do Pedido</strong><br> <?= date_format($date, 'H:i:s')?></span>
        <hr>



        <table class="table" style="width:100%">
            <hr>
            <span class="page-title"><strong>Produtos Vendidos</strong></span>

                <tbody style="text-align: center">
                  <?php

                foreach ($codes as &$code) {
                  foreach($products as $item) {
                 
                    if($item['id']==(int)$code){
                      ?> <tr style="text-align: center; width:100%">
                            <td> <strong><i><?=$item['name']?></i> - R$<?=$item['price']?></strong></td>
                         </tr><?php
                    }
                  }
                } ?>
                </tbody>

              </table><br>
              <span><strong>Total: R$<?=$sale->total?></strong></span><br><br> <hr>
              <span style="font-size: 12px">*** ESTE TICKET NÃO É UM DOCUMENTO FISCAL ***</span><br>
              <span style="font-size: 10px">OBRIGADO E VOLTE SEMPRE</span>
        @endauth
</div>
