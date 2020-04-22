<?php

require_once('src/db/conexao.php');


function getLastChaveAdd1() {

    $conexao = novaConexao();
    $sql = "SELECT MAX(chave) FROM chamados;";
    $resultado = $conexao->query($sql);
    
    $registros = [];
    
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros = $row;
        }
    } else {
        $registros['MAX(chave)'] = 1; 
    }
    
    return $registros['MAX(chave)'] + 1;

}
