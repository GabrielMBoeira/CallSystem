<?php

function existVehicleDB($placaDB)
{
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
    $conexao->close();
}

function existEmail($email) {

    $sql = "SELECT * FROM login WHERE email = '$email';";
    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    $dados = null;

    if($resultado->num_rows > 0 ) {
        $dados = $resultado->fetch_assoc();
    } else {
        $dados = null;
    }

    return $dados;
    $conexao->close();
   
}



