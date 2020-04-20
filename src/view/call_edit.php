<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once "src/db/conexao.php";

// if (count($_POST) > 0) {
//     $dados = $_POST;

//     $erros = [];


//     if (trim($dados['ocorrencia']) === "") {
//         $erros['ocorrencia'] = 'Ocorrência é obrigatória';
//     }

//     //Alterando ocorrencia
//     if (!count($erros)) {

//         $sql = "UPDATE chamados SET ocorrencia = ? WHERE id = ?;";

//         $conexao = novaConexao();
//         $stmt = $conexao->prepare($sql);

//         $params = [
//             $dados['ocorrencia'],
//             $id = $_GET['id']
//         ];

//         $stmt->bind_param("si", ...$params);

//         if ($stmt->execute()) {
//             unset($dados); //Depois de inserir limpar os dados
//         }
//         $conexao->close();
//     }
// }

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
            <form action="#" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" name="nota-fiscal" id="nota-fiscal" placeholder="Nota fiscal" class="form-control" value="<?= $registros['nota_fiscal'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" id="nota-fiscal" placeholder="Placa" class="form-control" value="<?= $registros['placa'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="nota-fiscal" placeholder="Status" class="form-control" value="<?= $registros['status'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="atuante">Atuante</label>
                        <input type="text" name="atuante" id="nota-fiscal" placeholder="Atuante" class="form-control" value="<?= $registros['atuante'] ?>" disabled>
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