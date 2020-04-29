<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/search_nf.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

date_default_timezone_set('America/Sao_Paulo');

if (count($_POST) > 0) {
    $dados = $_POST;
    $erros = [];
    $msg = [];
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
            <div class="register">
                <div class="up">
                    <div class="up-content">
                        Número do chamado: 9999999999999
                    </div>
                    <div class="up-content">
                        Nota fiscal: 123456
                    </div>
                    <div class="up-content">
                        Placa: QHG3907
                    </div>
                    <a class="btn btn-outline-primary my-2" type="submit" href=""><i class="icofont-ui-edit"></i></a>
                </div>
                <div class="down">
                    <div class="down-content">
                        Ocorrência: Testando ocorrencia
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once('src/view/template_view/footer.php');
?>