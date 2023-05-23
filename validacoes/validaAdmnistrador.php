<?php

require_once "../classes/Utilizador.php";

$utilizadores = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if (count($utilizadores) != 0) {
    echo "Já existe um utilizador com este email/nif. <br> Experimente fazer " ?><a href="../web/paginasWeb/login.php </br>">Login</a> <?php ;
    exit;
}

$utilizador = new Utilizador($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['nome'], 2, 1);
$utilizador->save();
