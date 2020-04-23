<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');

require_once('src/db/conexao.php');

$sql = "SELECT c.id, c.num_chamado, c.nota_fiscal, v.placa, v.motorista, v.telefone, c.status, c.atuante, data FROM chamados AS c 
INNER JOIN veiculos AS v
ON c.id_placa = v.id WHERE c.status = 'ativo';";

$conexao = novaConexao();
$stmt = $conexao->prepare($sql);

$resultado = $conexao->query($sql);

$registros = [];

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif ($conexao->error) {
    echo "Erro: " . $conexao->error;
}

$conexao->close();

?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/attendance.css">

<main class="main">
    <div class="content">
        <div class="content-title">
            <i class="icon icofont-network mr-3 my-5"></i>
            <div>
                <h1>Chamados ativos</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Chamado</th>
                            <th>Nota fiscal</th>
                            <th>Placa</th>
                            <th>Motorista</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th>Atuante</th>
                            <th>Tempo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>
                            <tr>
                                <th><?= $registro['num_chamado']; ?></th>
                                <th><?= $registro['nota_fiscal']; ?></th>
                                <td><?= $registro['placa']; ?></td>
                                <td><?= $registro['motorista']; ?></td>
                                <td><?= $registro['telefone']; ?></td>
                                <td><?= $registro['status']; ?></td>
                                <td><?= $registro['atuante']; ?></td>
                                <td><?php
                                        //Convertendo data
                                        $data = $registro['data'];
                                        $dataFormatada = strtotime($data);
                                        $dataFormat =  date('d/m/Y - H:i:s' , $dataFormatada);
                                        echo $dataFormat;
                                    ?></td>
                                <td><a href="call_edit.php?id=<?= $registro['id'] ?>" class="btn rounded-circle"><i class="icofont-edit-alt"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
require_once('src/view/template_view/footer.php');
?>