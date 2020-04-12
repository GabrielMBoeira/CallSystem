<?php
require_once "src/db/conexao.php";


$sql = "INSERT INTO veiculo (placa, motorista, telefone) VALUES ('abc1234', 'Gabriel', '47123456')";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();