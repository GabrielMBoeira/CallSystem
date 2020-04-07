<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="src/assets/css/template/index.css">
    <link rel="stylesheet" href="src/assets/css/icofont.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CallSystem</title>
</head>

<body>
    <header class="header">
        <img src="src/assets/images/phone.png" class="phone" width="auto" height="100" alt="">
        <div class="title-group">
            <h1 class="title">Call System</h1>
            <h2 class="subtitle">Atendimento de chamados</h2>
        </div>
        <div class="dropdown mr-5">
            <div class="dropdown-button">
                <span>Login: Gabriel Boeira</span>
                <i class="icofont-simple-down"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="nav-link" href="">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <aside class="aside">
        <form class="form-inline mt-4">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar NF-e" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="icofont-search-1"></i></button>
        </form> 
        <button class="btn btn-aside mt-4">
            <div class="icofont-live-support icon-menu mr-2"></div>
            <a href="">Chamados em aberto</a>
        </button>
        <button class="btn btn-aside mt-2">
            <div class="icofont-database icon-menu mr-2"></div>
            <a href="">Pesquisar chamados</a>
        </button>
        <button class="btn btn-aside mt-2">
            <div class="icofont-list icon-menu mr-2"></div>
            <a href="">Cadastrar nota fiscal</a>
        </button>
        <button class="btn btn-aside mt-2">
            <div class="icofont-truck-alt icon-menu mr-2"></div>
            <a href="">Cadastrar veículo</a>
        </button>
    </aside>

    <main class="main"></main>
    <footer class="footer"></footer>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>