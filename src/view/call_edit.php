<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/call_edit.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

//Retornando chamados do banco de dados e populando formulário
if (isset($_GET['num_chamado'])) {

    $num_chamado = $_GET['num_chamado'];

    $sql = "SELECT * FROM chamados WHERE num_chamado = '$num_chamado' AND status = 'ativo';";
    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    $registros = [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_array()) {
            $registros = $row;
        }
    } elseif ($conexao->error) {
        echo "Erro: " . $conexao->error;
    }
    $conexao->close();
}


if (isset($_POST['btn-salvar'])) {

    $chave = $_POST['chave'];
    $num_chamado = $_POST['num_chamado'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $placa = $_POST['placa'];
    $ocorrencia = $_POST['ocorrencia'];
    $status = $_POST['status'];
    $atuante = $_POST['atuante'];
    $id_placa = $_POST['id_placa'];
    

    $sql = "INSERT INTO chamados (chave, num_chamado, nota_fiscal, placa, status, atuante, ocorrencia, id_placa) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $conexao = novaConexao();
    $stmt = $conexao->prepare($sql);

    $params = [
        $chave,
        $num_chamado,
        $nota_fiscal,
        $placa,
        $status,
        $atuante,
        $ocorrencia,
        $id_placa
    ];

    $stmt->bind_param('issssssi', ...$params);

    if ($stmt->execute()) {
        unset($_POST);
    }
    $conexao->close();
}

?>

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

<main class="main">

    <div class="content">
        <div class="content-title">
            <i class="icon icofont-ui-call mr-3 my-5"></i>
            <div>
                <h1>Editar chamado</h1>
            </div>
        </div>
        <div class="card">
            <form action="#" method="post">
                <input type="hidden" name="chave" value="<?= $registros['chave']; ?>">
                <input type="hidden" name="id_placa" value="<?= $registros['id_placa']; ?>">
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="num_chamado">Chamado</label>
                        <input type="text" name="num_chamado" id="num_chamado" placeholder="num_chamado" class="form-control" value="<?= $registros['num_chamado'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nota_fiscal">Nota fiscal</label>
                        <input type="text" name="nota_fiscal" id="nota_fiscal" placeholder="Nota fiscal" class="form-control" value="<?= $registros['nota_fiscal'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" value="<?= $registros['placa'] ?>" disabled>
                    </div>
                </div>

                <?php
                if (isset($_GET['num_chamado'])) {

                    $num_chamado = $_GET['num_chamado'];

                    $sql = "SELECT * FROM chamados WHERE num_chamado = $num_chamado AND status = 'ativo';";
                    $conexao = novaConexao();
                    $resultado = $conexao->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_array()) {
                            $atuante = $row['atuante'];
                            $data = $row['data'];
                            $ocorrencia = $row['ocorrencia'];
                            $dataFormatada = strtotime($data);
                            $dataFormat =  date('d/m/Y - H:i:s', $dataFormatada);

                            echo "<div class='description'>
                                    <span class='up'>$atuante - $dataFormat</span>
                                    <div class='text'>$ocorrencia</div>
                                  </div>";
                        }
                    } elseif ($conexao->error) {
                        echo "Erro: " . $conexao->error;
                    }
                    $conexao->close();
                }
                ?>
                <div class="form-group">
                    <label for="ocorrencia">Ocorrência</label>
                    <textarea class="form-control <?= $erros['ocorrencia'] ? 'is-invalid' : '' ?>" name="ocorrencia" id="ocorrencia" rows="3" value="<?= $registros['ocorrencia'] ?>" autofocus></textarea>
                    <div class="invalid-feedback">
                        <?= $erros['ocorrencia'] ?>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="selecione" selected>Selecione o status</option>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="atuante">Atuante</label>
                        <select class="form-control" name="atuante" id="atuante">
                            <option value="selecione" selected>Selecione o atuante</option>
                            <option value="setor1">Setor 1</option>
                            <option value="setor2">Setor 2</option>
                            <option value="setor3">Setor 3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row btn-save  m-3">
                    <button class="btn btn-lg btn-primary mt-3" name="btn-salvar">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript">
    //Transformanto input placa em uppercase
    $("#placa").change(function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>

<?php
require_once('src/view/template_view/footer.php');
?>