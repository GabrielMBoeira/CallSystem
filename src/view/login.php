<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/assets/css/template_css/login.css">
    <title>Call System</title>
</head>

<body>
    <form action="attendance.php" method="post">
        <div class="login-card card">
            <div class="card-header d-flex justify-content-flexstart">
                <img src="src/assets/images/phone.png" alt="phone" width="auto" height="32">
                Login
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha" class="form-control" required><br>
                    <div class="group-confirm">
                        <a href="" class="forgot">Esqueci a senha</a>
                        <button class=" btn btn-primary help">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>