<?php
//login e senha
//https://www.youtube.com/watch?v=6FdguCuauEI = ver este
//https://www.youtube.com/watch?v=GAGRrVVD3js
require_once('src/db/conexao.php');

session_start();

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);

$sql = "SELECT count(*) as total FROM login WHERE email = '$email';";

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] > 0) {
    $_SESSION['usuario_existe'];
    header('Location: login.php');
    exit;
}

$passwordCript = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO login (email, senha) VALUES ('$email', '$passwordCript');";

if ($conexao->query($sql)) {
    $_SESSION['status_cadastro'];
}

$conexao->close();

header('Location: login.php');
exit;
