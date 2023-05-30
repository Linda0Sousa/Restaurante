<?php

require_once "../classes/Utilizador.php";

if (empty($_POST['nome']) || empty($_POST['password']) || empty($_POST['email'])) {
    echo "Todos os campos são de preenchimento obrigatório";
    exit;
}

if (strlen($_POST['password']) < 8) {
    echo "A palava-passe tem que ter no minimo 8 caracteres!";
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "O email tem que ser um endereço válido!";
    exit;
}

$utilizadores = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if (count($utilizadores) != 0) {
    echo "Já existe um utilizador com este email. Experimente fazer " ?> <a href="../web/paginasWeb/login.php </br>">Login</a><?php ;
    exit;
}

$utilizador = new Utilizador($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['nome'], 1, 1);
$utilizador->save();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=../web/paginasWeb/Pratos.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionado</title>
</head>
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #FAFAFA">
    <div style="margin-top: 5%">
    <p>Feito!</p>
    <img src="../web/icons/admin.svg" alt="feito!" style= "width: 20%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>