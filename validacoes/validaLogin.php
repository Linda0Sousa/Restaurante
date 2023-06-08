<?php

require_once "../classes/MyConnect.php";
require_once "../classes/Utilizador.php";
require_once "../classes/Model.php";

$utilizadores = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if (count($utilizadores) != 1) {
    echo "utilizador ou palavra-passe invalida";
    exit;
}

$utilizador = $utilizadores[0];

if (password_verify($_POST['password'], $utilizador->getPassword())) {
    if($utilizador->getSituacaoId() != 1){
        echo "Utilizador não está activo";
        exit;
    }
    session_start();

    $_SESSION["perfil"] = $utilizador->getPerfilId();
    $_SESSION["utilizador"] = $utilizador->getId();
    $_SESSION["carrinho"] = [];
    ?> 


    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;url=../web/paginasWeb/Pratos.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
    <div style="margin-top: 10%">
    <p>Bem-vindo!</p>
    <img src="../web/icons/seguranca.svg" alt="check" style= "width: 25%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>

<?php
} else {
    echo "utilizador ou palavra-passe invalida";
    exit; 
} ?>
