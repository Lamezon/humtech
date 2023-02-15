@extends('layouts.app-master')
@section('content')
    <div class="bg-light p-5 rounded">
        
        @auth
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">

        <h1 style="text-align: center;">Emitir Fatura</h1>
        <div class="table-responsive">
        <form method="post" action="{{ route('teste.create') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h4 style="text-align: center;">Cliente</h4>
            <select data-placeholder="Selecione um cliente" required id="id_cliente" name="id_cliente" class="form-select chosen-select" style="width:100%">
                <option disabled selected>Selecione o Cliente</option>
                <?php 
                foreach ($clientes as $row)  
                { ?>
                    <option value=<?=$row['id']?>>#<?=$row['id']?> - <?=$row['nome']?> - <?=$row['cpf']?></option>
            <?php } ?>
            </select>
            
            <br><br><h4 style="text-align: center;">Produto - Valor (R$)</h4>
<?php $valueProd=0?>
<?php $nomeProd=''?>
        <div class="row">
            <div class="col-12">
            <select data-placeholder="Selecione um produto" style="width:100%; height:100%" required id="produtoSelect" name="" class="form-select chosen-select">
             <option disabled selected>Selecione o Produto</option>
                <?php 
                foreach ($produtos as $row)  
                { ?>
                    <option class="opcao" regex="^[^,]+$" value="<?=$row['valor']?>"><?=$row['nome']?></option>
                   
            <?php } ?>
            </select>
            </div>
            <div class="col-12">
                <input type="text" id="nomeProduto" value="" class="form-control" />
            
            </div>
            <div class="col-12">
            
                <input type="number" id="valorProduto" onkeypress='validate(event)' value="<?=$valueProd?>" min="0" step="0.1" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" />
            
            </div>
        </div>
        <button type="button" onclick=addItem() class="btn btn-block btn-success">Adicionar</button>
        <div style="margin-top: 60px"></div>
        <div class="table-responsive">
            <table id="table-list" class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>          
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Valor (R$)</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="lista" name="lista">
                </tbody>
            </table>
        </div>
      

        <button type="button" class="btn btn-info btn-block" onclick=test()>Gerar Descrição</button>    

        <div class="form-group">
            <label for="total">Total (R$)</label><br>
            <input readonly style="width:100%;" type="text" id="total" name="total">
        </div>
        <div class="form-group">
            <label for="observacao">Descrição da Fatura (Descrição - Quantidade)</label><br>
            <input readonly style="height:100px; width:100%;" type="text" placeholder="" id="descricao" name="descricao">
        </div>

        <div class="form-group">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
        </div>
        
        
        <div class="form-group">
            <label for="forma_pagamento">Forma de Pagamento</label>
            <select class="form-control" name="forma_pagamento" id="forma_pagamento">
                <option value="PIX">PIX</option>
                <option value="Cartão de Crédito">Cartão de Crédito</option>
                <option value="Cartão de Debito">Cartão de Debito</option>
                <option value="Boleto">Boleto</option>
                <option value="Dinheiro">Dinheiro</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="data_vencimento">Data de Vencimento</label>
            <input type="date" id="data_vencimento" name="data_vencimento"
                   class="form-control"/>
        </div>
        <button class="btn btn-block btn-info">GERAR FATURA</button>
        </form>
        </div>
    <script>
    
    function test(){
        var myTableArray = [];
        var total = 0;
        $("#table-list tr").each(function() {
            var arrayOfThisRow = [];
            var tableData = $(this).find('td');
            console.log(tableData[0]);
            if (tableData.length > 0) {
                tableData.each(function() { arrayOfThisRow.push($(this).text());
                 });
                arrayOfThisRow.pop();
                myTableArray.push(arrayOfThisRow);
                var valor = arrayOfThisRow.slice(1);
                total += parseInt(valor[0]);
            }
        });
        document.getElementById("total").value = total;
        document.getElementById("descricao").value = myTableArray;
    }







    function addItem(){
        var item = $('#nomeProduto').val();
        var valor = $('#valorProduto').val();
        $('#lista').append( '<tr><td>' + item + '</td><td>' + valor + '</td><td><button class="btn btn-block btn-danger" id="DeleteButton">Remover</button></td></tr>' );
    }
    $("#table-list").on("click", "#DeleteButton", function() {
        $(this).closest("tr").remove();
    });
          $(".chosen-select").chosen();
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
        $("#produtoSelect").change(function() {
        $("#valorProduto").val($(this).val());
    });
    $("#produtoSelect").change(function() {
        $("#nomeProduto").val($('#produtoSelect option:selected').text());
    });
    
    </script>
    <style>
        .chosen-container{

        }
    </style>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection