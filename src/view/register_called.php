<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

if (count($_POST) > 0) {
    $dados = $_POST;
    $erros = [];

    if (trim($dados['nota-fiscal']) === "") {
        $erros['nota-fiscal'] = 'Nota fiscal é obrigatória';
    }

    if (trim($dados['placa']) === "selecione") {
        $erros['placa'] = 'Placa é obrigatória';
    }

    if (trim($dados['status']) === "selecione") {
        $erros['status'] = 'Status é obrigatório';
    }

    if (trim($dados['atuante']) === "selecione") {
        $erros['atuante'] = 'Atuante é obrigatório';
    }

    if (trim($dados['ocorrencia']) === "") {
        $erros['ocorrencia'] = 'Ocorrência é obrigatória';
    }

    if (!count($erros)) {

        $sql = "INSERT INTO chamados (nota_fiscal, placa, status, atuante, ocorrencia, id_placa) VALUES (?, ?, ?, ?, ?, ?)";

        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);

        $optionsPlacas = explode('|', $dados['placa']);

        $params = [
            $dados['nota-fiscal'],
            $optionsPlacas[1],
            $dados['status'],
            $dados['atuante'],
            $dados['ocorrencia'],
            $optionsPlacas[0]
        ];

        $stmt->bind_param("sssssi", ...$params);

        if ($stmt->execute()) {
            unset($dados); //Depois de inserir limpar os dados
        }
        $conexao->close();
    }
}
?>

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

<main class="main">
    <div class="content mb-5">
        <div class="content-title">
            <i class="icon icofont-ui-call mr-3 my-5"></i>
            <div>
                <h1>Cadastrar chamados</h1>
            </div>
        </div>
        <div class="card">
            <form action="#" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" name="nota-fiscal" id="nota-fiscal" placeholder="Nota fiscal" class="form-control <?= $erros['nota-fiscal'] ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $erros['nota-fiscal'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="placa">Placa</label>
                        <select class="form-control <?= $erros['placa'] ? 'is-invalid' : '' ?>" name="placa">
                            <option value="selecione">Selecione a placa</option>

                            <?php
                            //Buscando placas cadastradas no banco de dados 
                            $sql = "SELECT * FROM veiculos ORDER BY placa;";
                            $conexao = novaConexao();
                            $resultado = $conexao->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_array()) {
                                    $placa = $row['placa'];
                                    $id_placa = $row['id'];
                                    echo "<option value='$id_placa|$placa'>$placa</option>";
                                }
                            } elseif ($conexao->error) {
                                echo "Erro: " . $conexao->error;
                            }
                            $conexao->close();
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $erros['placa'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="form-control <?= $erros['status'] ? 'is-invalid' : '' ?>" name="status" id="status">
                            <option value="selecione" selected>Selecione o status</option>
                            <option value="ativo">Ativo</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $erros['status'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="atuante">Atuante</label>
                        <select class="form-control <?= $erros['atuante'] ? 'is-invalid' : '' ?>" name="atuante" id="atuante">
                            <option value="selecione" selected>Selecione o atuante</option>
                            <option value="setor1">Setor 1</option>
                            <option value="setor2">Setor 2</option>
                            <option value="setor3">Setor 3</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $erros['atuante'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ocorrencia">Ocorrência</label>
                    <textarea class="form-control <?= $erros['ocorrencia'] ? 'is-invalid' : '' ?>" name="ocorrencia" id="ocorrencia" rows="3"></textarea>
                    <div class="invalid-feedback">
                        <?= $erros['ocorrencia'] ?>
                    </div>
                </div>
                <div class="form-row btn-save  mt-3">
                    <button class="btn btn-lg btn-primary mt-3">
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