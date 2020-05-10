<?php

require_once('src/db/conexao.php');

if (isset($_POST['register'])) {

    $msg = [];

    $nome = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    if ($password === $confirm_password) {

        $sql = "INSERT INTO login (nome, email, senha) VALUES (?, ?, ?);";

        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);

        $params = [
            $nome,
            $email,
            $password,
        ];

        $stmt->bind_param('sss', ...$params);

        if ($stmt->execute()) {
            unset($_POST['register']);
            $msg[] = '<div class="alert alert-primary my-1" role="alert">Usuário cadastrado com sucesso!</div>';
        } else {
            $msg[] = '<div class="alert alert-danger my-1" role="alert">Erro usuário não cadastrado!</div>';
        }
    } else {
        $msg[] = '<div class="alert alert-danger my-1" role="alert">Senhas não conferem!</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/assets/css/template_css/insert_user.css">
    <link rel="stylesheet" href="src/assets/css/icofont.min.css">
    <title>Call System</title>
</head>

<body>
    <form action="#" method="post">
        <div class="login-card card">
            <div class="card-header d-flex justify-content-flexstart">
                <img src="src/assets/images/phone.png" alt="phone" width="auto" height="32">
                Cadastrar usuário
            </div>
            <div class="card-body">
                <?= $msg[0]; ?>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" placeholder="Digite o seu nome" class="form-control" 
                    value="<?= $_POST['name']?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" class="form-control" 
                    value="<?= $_POST['email']?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite o sua senha" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirme sua senha</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme sua senha" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="btn-cadastrar">
                        <button class=" btn btn-primary help" name="register">Cadastrar</button>
                        <a class=" btn btn-primary help" name="register">Voltar a página de login</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</body>

</html>