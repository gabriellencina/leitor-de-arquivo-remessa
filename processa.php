<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("connection.php");

// Recebe os dados do formulário
$arquivo_tmp= $_FILES['arquivo']['tmp_name']; //

$dados = file($arquivo_tmp);

$num_sequencial_arquivo = substr($dados[0],115,2);

for($i = 0; $i <= count($dados) -1;$i++ ){
    
    $primeiro_caracter = substr($dados[$i],0,1);
   
    if($primeiro_caracter == '1'){

        $pega_negocio_parcela_id = substr($dados[$i],38,6);

        $sql = "UPDATE negocio_parcelas SET numero_registro_e = $i, num_sequencial_arquivo_debito = $num_sequencial_arquivo WHERE id = $pega_negocio_parcela_id";
        $resultado = $connection->query($sql);
        
    }
}
