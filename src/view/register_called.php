<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

<main class="main">
    <div class="content mb-5">
        <div class="content-title">
            <i class="icon icofont-ui-call mr-3 my-5"></i>
            <div>
                <h1>Registrar chamado</h1>
            </div>
        </div>
        <div class="card">
            <form action="#" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="chamado">Chamado</label>
                        <input type="text" id="chamado" placeholder="Núm.chamado" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" id="placa" placeholder="Nota fiscal" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" id="placa" placeholder="Núm.placa" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <input type="text" id="chamado" placeholder="Núm.chamado" class="form-control">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="atuante">Atuate</label>
                        <input type="text" id="atuante" placeholder="Atuante" class="form-control">
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

<?php
require_once('src/view/template_view/footer.php');
?>