<?php

function existPlacaDB($placa) {
    $sql = "SELECT * FROM veiculos WHERE placa = $placa";
    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $placa = "Placa existe no banco de dados";
    } 

    $conexao->close();
    return $placa;
} //APLICAR VALIDAÇÕES NO REGISTER_VEHICLE
