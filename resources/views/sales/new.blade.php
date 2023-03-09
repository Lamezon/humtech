@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
        @auth
        <span class="page-title">Registrar Venda</span>
      
        <form method="post" action="{{ route('sale-register') }}">

          <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        
        <span class="page-subtitle">Vendedor</span><br>
        <input type="text" id="seller_name" name="seller_name" readonly style="text-align: center" value="{{auth()->user()->name}}">
        <br><br>
        
        
        <div class="form-group">
          <label for="client_id">Cliente</label>
          <select class="form-control" id="client_id" name="client_id" style="text-align: center">
            <option value=1 selected>Cliente Padrão</option>
           <?php  foreach ($clients as $row) {
            ?><option value="<?=$row['id']?>"><?=$row['name']?></option>           
            <?php } ?>
          </select>
        </div>
        <br><br>
        <div class="form-group">
          <label for="payment">Forma de Pagamento</label>
          <select class="form-control" id="payment" name="payment" style="text-align: center">
            
            <option selected value="Dinheiro" >Dinheiro</option>
            <option  value="Cartão" >Cartão</option>
            <option value="PIX" >PIX</option>
          
          </select>
          <br><br>
        </div>
        <div class="form-group">
          <label for="sale_code">Senha do Pedido</label>
          <input class="form-control" id="sale_code" value="<?=$code?>" type="text" required name="sale_code" style="text-align: center">         
        </div>
        <br><br>
        <br><span class="page-subtitle">Produtos</span><br>
        <table id="product-table" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço (R$)</th>
               {{--  <th scope="col">Quantidade</th> --}}
                <th scope="col">Adicionar</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($products as $row)  
              { ?>
                <tr>
                  <th class="product-id" scope="row"><?=$row['id']?></th>
                  <td class="product-name"><?=$row['name']?></td>
                  <td class="product-price"><?=$row['price']?></td>
                  {{-- <td><input type="number" class="product-quantity" min="1" value="1"></td> --}}
                  <td><button type="button" style="color: green" class="add-button btn btn-block btn-success">+</button></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <span class="page-subtitle">Lista de Compras</span><br>
         
          <table name="cart-table" id="cart-table" class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                {{-- <th>Quantidade</th> --}}
                <th>Preço</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
     
          <input type="hidden" type="number" step="0.01" name="total-sell" id="total-sell" />  
          <input type="hidden" type="text" name="ids-products" id="ids-products">
        <button class="w-100 btn btn-lg form-send" id="sendButton" type="submit">Registrar</button>
    </form>
    <script>
      /* Chat GPT */
      let total = 0;
const addButtons = document.querySelectorAll('.add-button');
const cartTable = document.querySelector('#cart-table');
const sendButton = document.querySelector('#sendButton');

const totalRow = document.createElement('tr');

if (cartTable.rows.length > 1) {
            sendButton.disabled = false;
          } else {
            sendButton.disabled = true;
          }


totalRow.classList.add('black-background');
totalRow.innerHTML = `<td style="background-color:black; color:white">Total</td><td></td><td id="total-value"></td><td></td>`;
cartTable.appendChild(totalRow);

addButtons.forEach(button => {
    button.addEventListener('click', event => {
        // pegar a linha da tabela de produtos que contém as informações do produto
        const productRow = event.target.parentNode.parentNode;
        const productId = productRow.querySelector('.product-id').textContent;
        const productName = productRow.querySelector('.product-name').textContent;
        const productPrice = parseFloat(productRow.querySelector('.product-price').textContent.replace(',', '.'));
         /* Verifica se tem item GPT */
         if (cartTable.rows.length > 1) {
            sendButton.disabled = false;
          } else {
            sendButton.disabled = true;
          }
      /*  */
       /*  const quantity = productRow.querySelector('.product-quantity').value; */
        total += productPrice;

 
            // criar uma nova linha na tabela de carrinho com as informações do produto
            const newRow = document.createElement('tr');
            totalProduct = productPrice;
            newRow.innerHTML = `
                <td>${productId}</td>
                <td>${productName}</td>
                
                <td>${totalProduct}</td>
                <td><button type="button" class="btn-danger remove-button">Remover</button></td>
            `;
            const removeButtons = document.querySelectorAll('.remove-button');
            removeButtons.forEach(button => {
                button.addEventListener('click', event => {
                    const productRow = event.target.parentNode.parentNode;
                    cartTable.removeChild(productRow);
                    total -= parseFloat(productRow.querySelectorAll('td')[2].textContent.replace(',', '.'));
                    document.querySelector('#total-value').textContent = total.toFixed(2).replace('.', ',');
                    changeTotal();
                });
            });
            // adicionar a nova linha à tabela de carrinho
            cartTable.appendChild(newRow);
            // Get the table cell
            
          
        document.querySelector('#total-value').textContent = total.toFixed(2).replace('.', ',');

    });
});
      /* END */


const buttonChange = document.querySelectorAll('.add-button');
buttonChange.forEach(button => {
    button.addEventListener('click', event => {      
      changeTotal();
    });
});
     


  


      function changeTotal() {
        var celula = document.getElementById("total-value");
    
        var valor = celula.innerHTML.trim();
        
        var input = document.getElementById("total-sell");
        // Set the value of the input field to the value of the table cell
        input.value = valor;

        let carttable = document.querySelector('#cart-table');
        const columnIndex = 0; //index of the column you want to select
        let columnValues = [];

        //loop through all rows in the table
        for (let i = 0; i < carttable.rows.length; i++) {
            //add the value of the cell in the column to the array
            columnValues.push(carttable.rows[i].cells[columnIndex].innerHTML);
        }

        //join all values in the array into a single string, separated by commas
        const columnValuesString = columnValues.join(',');
        const newString = columnValuesString.substring(columnValuesString.indexOf(',') + 7);

        /* console.log(newString); */
        // Selecionando o elemento input pelo nome
        const input_product_id = document.getElementById("ids-products");

        // Atribuindo um valor ao input
        input_product_id.value = newString;
      }

      
    </script>
    <style>
      .black-background{
        color: white;
        background-color: black;
      }
      .remove-button{
        color: black;
      }
    </style>
        @endauth
</div>
    @endsection