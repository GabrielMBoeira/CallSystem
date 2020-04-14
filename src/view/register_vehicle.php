<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_vehicle.css">

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

if (count($_POST) > 0) {
    $dados = $_POST;
    $erros = [];

        if (trim($dados['placa']) === "") {
            $erros['placa'] = 'placa é obrigatório';
        }

        if (trim($dados['nome']) === "") {
            $erros['nome'] = 'nome é obrigatório';
        }

        if (trim($dados['telefone']) === "") {
            $erros['telefone'] = 'telefone é obrigatório';
        }


    if (!count($erros)) {
        require_once "src/db/conexao.php";

        $sql = "INSERT INTO veiculo (placa, motorista, telefone) VALUES (?, ?, ?)";

        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);

        $params = [
            $dados['placa'],
            $dados['motorista'],
            $dados['telefone'],
        ];

        $stmt->bind_param("sss", ...$params);

        if ($stmt->execute()) {
            unset($dados); //Depois de inserir limpar os dados
        }
        $conexao->close();
    }
}

?>

<main class="main">

    <div class="content mb-5">
        <div class="content-title">
            <i class="icon icofont-truck-alt mr-3 my-5"></i>
            <div>
                <h1>Cadastrar Veículo</h1>
            </div>
        </div>
        <div class="card">
            <form action="#" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control" 
                        style="text-transform: uppercase" value="<?= $dados['placa'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="motorista">Motorista</label>
                        <input type="text" name="motorista" id="motorista" class="form-control" 
                        style="text-transform: uppercase" value="<?= $dados['motorista'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Fone (Celular)</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" 
                        value="<?= $dados['telefone'] ?>">
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

    //Mascara Telefone
    $("#telefone").mask("(00) 00000-0000");
</script>


<?php
require_once('src/view/template_view/footer.php');
?>