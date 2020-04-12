<?php
require_once('src/view/template_view/header.php');
require_once('src/view/template_view/aside.php');
?>

<link rel="stylesheet" href="src/assets/css/template_css/template.css">
<link rel="stylesheet" href="src/assets/css/template_css/register_vehicle.css">

<script src="src/assets/js/jquery.3.5.0.min.js"></script>
<script src="src/assets/js/jquery.mask.min.js"></script>

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
                        <input type="text" id="placa" class="form-control" style="text-transform: uppercase">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="motorista">Motorista</label>
                        <input type="text" id="motorista" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Fone (Celular)</label>
                        <input type="text" id="telefone" class="form-control">
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