<?php
require_once "src/db/conexao.php";

if (isset($_POST['btn-salvar'])) {

    $id_chamado = $_POST['chamado'];
    $nota_fiscal = $_POST['nota-fiscal'];
    $placa = $_POST['placa'];
    $id_placa = $_POST['id_placa'];
    $status = $_POST['status'];
    $atuante = $_POST['atuante'];
    $ocorrencia = $_POST['ocorrencia'];

    $sql = "INSERT INTO chamados (id, nota_fiscal, placa, status, atuante, ocorrencia, id_placa) VALUES (?, ?, ?, ?, ?, ?, ?);";

    $conexao = novaConexao();
    $stmt = $conexao->prepare($sql);

    $params = [
        $id_chamado,
        $nota_fiscal,
        $placa,
        $status,
        $atuante,
        $ocorrencia,
        $id_placa
    ];

    $stmt->bind_param('isssssi', ...$params);
    
    if($stmt->execute()){
        unset($_POST);
        header('Location: call_edit.php');
    }
    $conexao->close();
}