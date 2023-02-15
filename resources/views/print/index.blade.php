@extends('layouts.app-print')
@section('content')
    
        @auth
        <div class="container data">
        <div class="infos row">
                <div class="col-4">
                        <img class="mb-4" src="{!! url('assets/images/logo.png') !!}" alt="" height="250px">
                </div>
                <div class="col-8">
                        <div class="row">
                                <div class="col-8">
                                        <span class="small-subtitle">G.W. COM. DE CONTAINER - EIRELI<br></span>
                                        
                                        R. NELSON R. MARCONDES, 120, BRCAO, 02<br>
                                        26.453.836/0001-35<br>
                                        (42)3624-3675
                                </div>
                                <div class="col-4">
                                        <span class="small-subtitle">Fatura de Locação</span><br>
                                        Nº <?=$fatura->id?><br>
                                        Emissão: <?=$fatura->data_emissao?>
                                </div>
                        </div>
                </div>
        </div>
        
        <div class="container">
                <span class="subtitle" style="text-align:left">Destinatário</span>
                <h4><strong>Razão Social / Nome Cliente: </strong><?=$cliente->nome?></h4>
                <h4><strong>CNPJ/CPF: </strong><?=$cliente->cpf?></h4>
                <h4><strong>Endereço: </strong><?=$cliente->endereco?></h4>
                <h4><strong>Cidade: </strong><?=$cliente->cidade?></h4>
                <h4><strong>Telefone: </strong><?=$cliente->telefone?></h4>
                <h4><strong>Inscrição Estadual: </strong><?=$cliente->inscricao?></h4>               
                
        </div>
        
        <div class="container" style="margin-top: 5px;">
                <span class="subtitle">Dados da Locação</span>
                <h4><strong>Status:</strong>
                 <?php switch ($fatura->status) {

                        case 1:
                                echo "Emitido";
                                break;
                        case 2:
                                echo "Faturado";
                                break;
                        case 3:
                                echo "Cancelado";
                                break;
                        default:
                                echo "Deletada";
                }?>
                </h4>
                <h4 class="data" style="padding: 15px; text-align: center"><strong>Descrição<br></strong>
                <?php $linha_descricao = explode(",", $fatura->descricao) ?>
              
                <table class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col"></th>
                    
                </tr>
                </thead>
                <div class="row">
                <?php
                 foreach ($linha_descricao as $index) {
                        
                
                        $linha = explode(",",$index);
                        
                        
                      
                        echo '<div class="col-sm-6" style="border-color:lightgray; border-style:solid; border-width:1px;">';
                               echo ''. $linha[0] .'';
                        echo '</div>';
                       
                }
                ?>
                </div>
                </table>
              
                <h4 style="text-align:center"><strong>Valor Total da Fatura:</strong> R$<?=$fatura->valor?></h4>

        </div>
        <div class="container data">
        <?php if($fatura->observacao!=NULL){?><h4 class="centerinfo"><strong>Observação:</strong> <br><?=$fatura->observacao?></h4><?php }?>
        <div class="row">
                <div class="col-6">
                        <h4 class="centerinfo"><strong>Data da Criação da Emissão:</strong> <br><?=$fatura->data_emissao?></h4>
                </div>

                <div class="col-6">
                        <h4 class="centerinfo"><strong>Data de Emissão:</strong> <br><?=$fatura->data_emitido?></h4>
                </div>

                <div class="col-6">
                        <h4 class="centerinfo"><strong>Forma de Pagamento:</strong> <br><?=$fatura->forma_pagamento?></h4>
                </div>

                <div class="col-6">
                        <h4 class="centerinfo"><strong>Data de Vencimento:</strong> <br><?=$fatura->data_vencimento?></h4>
                </div>


        </div>
        
        <div class="row">
                        <div class="col-6">
                                <br>
                                <div class="container data descpag">UNIPRIME COOPERATIVA CENTRAL 1031
                                        <br>BANCO 099<br>
                                        AG 4402-4<br>
                                        C/C 75.883-3<br>
                                        CNPJ 26.453.836/0001-35 (PIX)<br>
                                        G. W. COMERCIO DE CONTAINER EIRELI

                                </div>
                        </div>
                        <div class="col-6">
                               
                        </div>
                </div>
        </div>
        <br>
        <div class="container data">
                <i><h5 style="text-align:center">"Operação não sujeita a emissão de documento fiscal de serviço nos termos da LC 116/2003 que exclui a locação de bens móveis da lista de serviços"</h5></i>
        </div>
        
        </div>

        <style>
        .descpag{
                text-align:left;
                font-weight:bold;
                font-size: 14px;
        }
        .data{
                
                
        }
        .titles{
                font-size: 70px;
        }
        .centerinfo{
                text-align:center;
        }
        .subtitle{
                text-align:left;
                font-size: 35px;
                font-weight: bold;
        }
        .small-subtitle{
                font-size: 25px;
                font-weight:bold;
        }
        h4{
                font-size: 25px;
        }
       

        </style>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    
@endsection