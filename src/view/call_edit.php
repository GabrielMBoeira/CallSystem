<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

//Retornando chamados do banco de dados
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM chamados WHERE id = '$id';";

    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    $registros = [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros = $row;
        }
    } elseif ($conexao->error) {
        echo "Erro: " . $conexao->error;
    }

    $conexao->close();
}

?>

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

<main class="main">

    <div class="content mb-5">
        <div class="content-title">
            <i class="icon icofont-ui-call mr-3 my-5"></i>
            <div>
                <h1>Editar chamado</h1>
            </div>
        </div>
        <div class="card">
            <form action="src/db/update_call.php" method="post">
            <input type="hidden" name="id_placa" value="<?= $registros['id_placa']; ?>">
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="chamado">Chamado</label>
                        <input type="text" name="chamado" id="chamado" placeholder="Chamado" class="form-control" value="<?= $registros['id'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" name="nota-fiscal" id="nota-fiscal" placeholder="Nota fiscal" class="form-control" value="<?= $registros['nota_fiscal'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" value="<?= $registros['placa'] ?>" disabled>
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
                <div class="description" name="description">
                <?= $registros['ocorrencia']; ?>
                </div>
                <div class="form-group">
                    <label for="ocorrencia">Ocorrência</label>
                    <textarea class="form-control <?= $erros['ocorrencia'] ? 'is-invalid' : '' ?>" name="ocorrencia" id="ocorrencia" rows="3" value="<?= $registros['ocorrencia'] ?>"></textarea>
                    <div class="invalid-feedback">
                        <?= $erros['ocorrencia'] ?>
                    </div>
                </div>
                <div class="form-row btn-save  mt-3">
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