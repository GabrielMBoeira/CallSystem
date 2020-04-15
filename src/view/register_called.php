<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

// if (count($_POST) > 0) {
//     $dados = $_POST;
//     $erros = [];

//     if (trim($dados['chamado']) === "") {
//         $erros['chamado'] = 'Chamado é obrigatório';
//     }

//     if (trim($dados['nota-fiscal']) === "") {
//         $erros['nota-fiscal'] = 'Nota fiscal é obrigatória';
//     }

//     if (trim($dados['placa']) === "") {
//         $erros['placa'] = 'Placa é obrigatória';
//     }

//     if (trim($dados['status']) === "") {
//         $erros['status'] = 'Status é obrigatório';
//     }

//     if (trim($dados['atuante']) === "") {
//         $erros['atuante'] = 'Atuante é obrigatório';
//     }

//     if (trim($dados['ocorrencia']) === "") {
//         $erros['ocorrencia'] = 'Ocorrência é obrigatória';
//     }

//     // if (!count($erros)) {
//     //     require_once "src/db/conexao.php";

//     //     $sql = "INSERT INTO veiculos (placa, motorista, telefone) VALUES (?, ?, ?)";

//     //     $conexao = novaConexao();
//     //     $stmt = $conexao->prepare($sql);

//     //     $params = [
//     //         $dados['placa'],
//     //         $dados['motorista'],
//     //         $dados['telefone'],
//     //     ];

//     //     $stmt->bind_param("sss", ...$params);

//     //     if ($stmt->execute()) {
//     //         unset($dados); //Depois de inserir limpar os dados
//     //     }
//     //     $conexao->close();
//     // }
// }

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
                    <div class="form-group col-md-4">
                        <label for="chamado">Chamado</label>
                        <input type="text" name="chamado" id="chamado" placeholder="Núm. chamado" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" name="nota-fiscal" id="nota-fiscal" placeholder="Nota fiscal" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <select class="form-control" name="placa">
                            <?php
                            
                            require_once('src/db/conexao.php');

                            $sql = "SELECT placa FROM veiculos";

                            $conexao = novaConexao();
                            $resultado = $conexao->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_array()) {
                                    $placas = $row['placa'];
                                    echo "<option value='$placas'>$placas</option>";
                                }
                            } elseif ($conexao->error) {
                                echo "Erro: " . $conexao->error;
                            }

                            $conexao->close();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="ativo">Ativo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="atuante">Atuante</label>
                        <select class="form-control" name="atuante" id="atuante">
                            <option value="selecione" selected>Selecione</option>
                            <option value="setor1">Setor 1</option>
                            <option value="setor2">Setor 2</option>
                            <option value="setor3">Setor 3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ocorrencia">Ocorrência</label>
                    <textarea class="form-control" name="ocorrencia" id="ocorrencia" rows="3"></textarea>
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