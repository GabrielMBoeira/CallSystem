<?php

function existPlacaDB($placaDB) {
    $sql = "SELECT * FROM veiculos WHERE placa = '$placaDB';";
    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    $current = null;

    if ($resultado->num_rows > 0) {
        $current = $resultado;
    } else {
         $current = null;
    }
   return $current;
} 
