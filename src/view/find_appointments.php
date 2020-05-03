<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
require_once('src/db/conexao.php');

if (isset($_POST)) {

    $dados = $_POST;
    
}

?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/find_appointments.css">

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>


<main class="main">
    <div class="content mb-5">
        <div class="content-title">
            <i class="icon icofont-search-folder mr-3 my-5"></i>
            <div>
                <h1>Pesquisar chamados</h1>
                <?php print_r($dados) ?>
            </div>
        </div>
        <div class="card">
            <form action="search_nf.php" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-3">
                        <label for="data-inicial">Data inicial</label>
                        <input type="date" class="form-control" name="data_inicial" id="data_inicial">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data-final">Data final</label>
                        <input type="date" class="form-control" name="data_final" id="data_final">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num_chamado">Chamado</label>
                        <input type="text" class="form-control" name="num_chamado" placeholder="Núm. chamado" id="chamado">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text"class="form-control" name="nota_fiscal" placeholder="Nota fiscal" id="nota-fiscal">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" class="form-control" name="placa" placeholder="Placa" id="placa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="atuante">Atuante</label>
                        <select class="form-control" name="atuante" id="atuante">
                            <option value="">Selecione</option>
                            <option value="setor1">Setor 1</option>
                            <option value="setor2">Setor 2</option>
                            <option value="setor3">Setor 3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row btn-save  mt-3">
                    <button class="btn btn-lg btn-primary mt-3">
                        Pesquisar
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