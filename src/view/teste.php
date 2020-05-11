<?php
require_once "src/db/validation.php";
require_once "src/db/conexao.php";

// $data = '2020-03-10 13:00:02';

// echo $dataFormatada = strtotime($data);
// echo '<br>';
// // echo date('d/m/y H:i:s', $dataFormatada);

$email = 'gboeira777@gmail.com';
$senha = '123456';

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// echo $senhaHash;



