@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Registrar Venda</span>
        <form method="post" action="<?=$sale->id?>">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        
        <div class="form-group form-floating mb-3">
            <select data-placeholder="Selecione um vendedor" required id="seller_id" name="seller_id" autofocus class="form-control">
                <option disabled>Selecione um Vendedor</option>
                <?php 
                foreach ($seller as $row)  
                { 
                if($sale->seller_id==$row['id']){
                    ?>  <option seleted value=<?=$row['id']?>><?=$row['name']?></option>
                    <?php }else{ ?>
                    <option value=<?=$row['id']?>><?=$row['name']?></option>
                <?php }
            } ?>
            </select>
        </div>

        <div class="form-group form-floating mb-3">
            <select data-placeholder="Selecione um produto" required id="product_id" name="product_id" class="form-control">
                <option data-price="0" disabled>Selecione um Produto</option>
                <?php 
                foreach ($product as $row)  
                { 
                if($sale->product_id==$row['id']){
                    ?> <option selected data-price="<?=$row['price']?>" value=<?=$row['id']?>><?=$row['name']?></option><?php
                }else{
                    ?>
                    <option data-price="<?=$row['price']?>" value=<?=$row['id']?>><?=$row['name']?></option>
                <?php }
            } ?>
            </select>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" min="1" value="<?=$sale->quantity?>" id="quantity" name="quantity" min="0" placeholder="Quantia Vendida" required="required">
            <label for="quantity">Quantia Vendida</label>
            @if ($errors->has('quantity'))
                <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input readonly type="text" class="form-control" id="total" value="<?=$sale->total?>" name="total" placeholder="0" required="required">
            <label for="total">Total(R$)</label>
            @if ($errors->has('total'))
                <span class="text-danger text-left">{{ $errors->first('total') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg form-send" type="submit">Registrar</button>
    </form>
    <script>
        $('#product_id').on('change', function() {
            var product_price = $('#product_id').children('option:selected').data('price');
            var quantity = $('#quantity').val();
            $('#total').val(product_price*quantity);        
        });
        $('#quantity').on('change', function() {
            var product_price = $('#product_id').children('option:selected').data('price');
            var quantity = $('#quantity').val();
            $('#total').val(product_price*quantity);
        });
        
    </script>
        @endauth
</div>
    @endsection