<?php


require_once "../classes/MyConnect.php";
require_once "../classes/Utilizador.php";
require_once "../classes/Model.php";

$utilizadores = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if (count($utilizadores) != 1) {
    echo "utilizador ou palavra-passe invalida";
}

$utilizador = $utilizadores[0];

if (password_verify($_POST['password'], $utilizador->getPassword())) {
    echo "tudo bem, mandas para nao sei onde";
} else {
    echo "utilizador ou palavra-passe invalida"; 
}