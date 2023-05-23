<?php


require_once "../classes/Perfil.php";
require_once "../classes/Utilizador.php";
require_once "../classes/Estado.php";
require_once "../classes/Clientes.php";
require_once "../classes/Morada.php";
require_once '../classes/MyConnect.php';

$ligacao= MyConnect::getInstance();
$ligacao->query('use restaurante');

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

if(strlen($_POST['nif']) != 9){
    echo "nif invalido";
    exit;
}

$EncontraNif = Cliente::search([
    ['coluna' => 'nif', 'operador' => '=', 'valor' => $_POST['nif']]
]);

$EncontraEmail = Utilizador::search([
    ['coluna' => 'email', 'operador' => '=', 'valor' => $_POST['email']]
]);

if ((count($EncontraNif) != 0) || (count($EncontraEmail) !=0)) {
    echo "Já existe um utilizador com este email/nif. <br> Experimente fazer " ?><a href="../web/paginasWeb/login.php </br>">Login</a> <?php ;
    exit;
}

$palavraPasse = password_hash($_POST['password'], PASSWORD_DEFAULT);

$morada = new Morada($_POST['pais'], $_POST['localidade'], $_POST['codigoPostal'], $_POST['porta'], $_POST['rua']);
$morada->save();

$utilizador = new Utilizador($_POST['email'], $palavraPasse, $_POST['nome'], 1, 1);
$utilizador->save();

$cliente = new Cliente($morada->getId(), $_POST['nif'], $_POST['tlm'], $utilizador->getId());
$cliente->save();