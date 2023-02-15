<?php
$file="produtos.xlsx";
$table = "";
foreach($produtos as $row){
    $table .= "<tr><td>".$row['id']."</td>
    <td>".$row['nome']."</td>
    <td>".$row['descricao']."</td>
    <td>".$row['valor']."</td>
    <td>".$row['taxa']."</td></tr>";
       
}
$test="<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Taxa</th>
            </tr>
            <tr>
                ".$table."
            </tr>
        </table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;
?>
