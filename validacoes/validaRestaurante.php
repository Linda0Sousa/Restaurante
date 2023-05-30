<?php

use Carbon\Carbon;

require_once "../classes/Restaurante.php";
require_once "../classes/Utilizador.php";
require_once "../classes/Morada.php";


$EncontraEmail = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if ((count($EncontraEmail) !=0)) {
    echo "Já existe um restaurante com este email. <br> Experimente fazer " ?><a href="../web/paginasWeb/login.php </br>">Login</a> <?php ;
    exit;
}

$morada = new Morada($_POST['pais'], $_POST['localidade'], $_POST['codigoPostal'], $_POST['porta'], $_POST['rua']);
$morada->save();

$horaAbertura = carbon::parse($_POST['Habertura']);
$horaFecho = Carbon::parse($_POST['Horafecho']);

$utilizador = new Utilizador($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['nome'], 3, 3);
$utilizador->save();

$restaurante = new Restaurante($_POST['nome'], $_POST['nif'], $_POST['designacao'], $horaAbertura, $horaFecho,
$_POST['tlm'], $_POST['tlf'], $_POST['webpage'], $_POST["responsavel"], $_POST['tlmResponsavel'], $morada->getId(), $_POST['email'], 3, 
$utilizador->getId(), password_hash($_POST['password'], PASSWORD_DEFAULT), empty($_POST['segunda']) ? 0 : 1, empty($_POST['terca']) ? 0 : 1,
empty($_POST['quarta']) ? 0 : 1, empty($_POST['quinta']) ? 0 : 1, empty($_POST['sexta']) ? 0 : 1, empty($_POST['sabado']) ? 0 : 1,
empty($_POST['domingo']) ? 0 : 1, empty($_POST['Mbway']) ? 0 : 1, empty($_POST['visa']) ? 0 : 1, empty($_POST['multibanco']) ? 0 : 1, 
empty($_POST['numerario']) ? 0 : 1, empty($_POST['cheque']) ? 0 : 1);

$restaurante->save();

require_once "../classes/MyConnect.php";

$ligacao = MyConnect::getInstance();


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
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
    <div style="margin-top: 10%">
    <p>Feito!</p>
    <img src="../web/icons/food.svg" alt="check" style= "width: 25%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>