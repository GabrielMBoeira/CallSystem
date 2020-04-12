
<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/attendance.css">

<main class="main">
    <div class="content mb-5">
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
                            <th>Status</th>
                            <th>Atuante</th>
                            <th>Tempo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>123</th>
                            <th>123456</th>
                            <td>QHG4147</td>
                            <td>aberto</td>
                            <td>comercial</td>
                            <td>00:00:00</td>
                            <td><a href="" class="btn rounded-circle"><i class="icofont-edit-alt"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
require_once('src/view/template_view/footer.php');
?>

