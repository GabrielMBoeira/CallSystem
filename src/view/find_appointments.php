<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
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
            </div>
        </div>
        <div class="card">
            <form action="#" method="post">
                <div class="form-row mt-3">
                    <div class="form-group col-md-3">
                        <label for="data-inicial">Data inicial</label>
                        <input class="form-control" type="date" value="" id="data-inicial">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data-final">Data final</label>
                        <input class="form-control" type="date" value="" id="data-final">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="chamado">Chamado</label>
                        <input type="text" id="chamado" placeholder="Núm. chamado" class="form-control">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" id="nota-fiscal" placeholder="Nota fiscal" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <input type="text" class="form-control" placeholder="Placa" id="placa" name="placa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="atuante">Atuante</label>
                        <select class="form-control" id="atuante">
                            <option value="selecione" selected>Selecione</option>
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
    //Adicionando mascara no input placa
    $("#placa").mask("SSS0000");

    //Transformanto input placa em uppercase
    $("#placa").change(function() {
        $(this).val($(this).val().toUpperCase());
    });

    //data
    $('.input-daterange input').each(function() {
        $(this).datepicker('clearDates');
    });
</script>

<?php
require_once('src/view/template_view/footer.php');
?>