<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_called.css">

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
                        <input type="text" id="chamado" placeholder="Núm. chamado" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nota-fiscal">Nota fiscal</label>
                        <input type="text" id="nota-fiscal" placeholder="Nota fiscal" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa">Placa</label>
                        <select class="form-control">
                            <option value="selecione">Selecione</option>
                            <option value="QHG4147">QHG4147</option>
                            <option value="AWH4163">AWH4163</option>
                            <option value="ATC8539">ATC8539</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option value="ativo">Ativo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="atuante">Atuante</label>
                        <select class="form-control" id="atuante">
                            <option value="selecione" selected>Selecione</option>
                            <option value="setor1">Setor 1</option>
                            <option value="setor2">Setor 2</option>
                            <option value="setor3">Setor 3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ocorrencia">Ocorrência</label>
                    <textarea class="form-control" id="ocorrencia" rows="3"></textarea>
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