<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/search_nf.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

date_default_timezone_set('America/Sao_Paulo');

//Dados vindos do formulário 'find_appointments.php'
if(isset($_POST['data_inicial'])) $data_inicial = $_POST['data_inicial'];
if(isset($_POST['data_final'])) $data_final = $_POST['data_final'];
if(isset($_POST['num_chamado'])) $num_chamado = $_POST['num_chamado'];
if(isset($_POST['nota_fiscal'])) $nota_fiscal = $_POST['nota_fiscal'];
if(isset($_POST['placa'])) $placa = $_POST['placa'];
if(isset($_POST['atuante'])) $atuante = $_POST['atuante'];

if ($num_chamado || $nota_fiscal || $placa || $atuante) {

    $conexao = novaConexao();
    $sql = "SELECT * FROM chamados 
    WHERE (nota_fiscal = '$nota_fiscal'
    OR num_chamado = '$num_chamado' 
    OR placa = '$placa' 
    OR atuante = '$atuante')
    AND status = 'fechado';";
    $resultado = $conexao->query($sql);
    
    $registros= [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_array()) {
            $registros[] = $row;
        }
    }
    $conexao->close();
} else {
    echo 'Erro: Algum campo não foi setado';
}

//Dados vindos do formulário 'Pesquisar NF-e' = aside.
if(isset($_POST['search_nf'])) {
 
    $search_nf = $_POST['search_nf'];

    $conexao = novaConexao();
    $sql = "SELECT * FROM chamados WHERE nota_fiscal = '$search_nf' AND status = 'aberto' OR status = 'fechado';";
    $resultado = $conexao->query($sql);
    
    $registros= [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_array()) {
            $registros[] = $row;
        }
    }
    $conexao->close();
}
?>

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

<main class="main">
    <div class="content">
        <div class="content-title">
            <i class="icon icofont-database mr-3 my-5"></i>
            <div>
                <h1>Registros</h1>
            </div>
        </div>
        <div class="card">
            <?php foreach ($registros as $registro): ?>
            <div class="register my-2">
                <div class="up">
                    <div class="up-content">
                        Número do chamado: <?= $registro['num_chamado']; ?>
                    </div>
                    <div class="up-content">
                        Nota fiscal: <?= $registro['nota_fiscal']; ?>
                    </div>
                    <div class="up-content">
                        Placa: <?= $registro['placa']; ?>
                    </div>
                    <div class="up-content">
                        Status: <?= $registro['status']; ?>
                    </div>
                    <a class="btn btn-outline-secondary my-2" type="submit" href="call_edit.php?num_chamado=<?= $registro['num_chamado'] ?>"><i class="icofont-ui-edit"></i></a>
                </div>
                <div class="down">
                    <div class="down-content">
                        Ocorrência: <?= $registro['ocorrencia']; ?>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</main>

<?php
require_once('src/view/template_view/footer.php');
?>