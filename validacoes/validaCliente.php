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

if(empty($_POST['rua']) || empty($_POST['codigoPostal'])){
    echo "codigo Postal ou rua invalida";
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


try {
    $morada = new Morada($_POST['pais'], $_POST['localidade'], $_POST['codigoPostal'], $_POST['porta'], $_POST['rua']);
    $morada->save();
} catch(ERROR $e) {
    echo "Ocorreu um erro ao validar a sua morada ";
    exit;
} catch (mysqli_sql_exception $e){
    echo "erro ao criar a morada";
    exit;
}

try {
$utilizador = new Utilizador($_POST['email'], $palavraPasse, $_POST['nome'], 2, 1);
$utilizador->save(); 
} catch(ERROR $e) {
    echo "Ocorreu um erro ao validar a o seu email ";
    exit;
} catch (mysqli_sql_exception $e){
    echo "Ocorreu um erro ao adicionar o cliente provavelmete é o email ";
    $ligacao->query('delete  from utilizador where utilizador.id = ' . $utilizador->getId());
    $ligacao->query('delete  from morada where morada.id = ' . $morada->getId());
    exit;
}

try{
$cliente = new Cliente($morada->getId(), $_POST['nif'], $_POST['tlm'], $utilizador->getId());
$cliente->save();
} catch(ERROR $e) {
    echo "Ocorreu um erro ao adicionar o cliente provavelmete é o nif ";
    $ligacao->query('delete  from utilizador where utilizador.id = ' . $utilizador->getId());
    exit;
} catch (mysqli_sql_exception $e){
    echo "Ocorreu um erro ao adicionar o cliente provavelmete é o nif ";
    $ligacao->query('delete  from utilizador where utilizador.id = ' . $utilizador->getId());
    $ligacao->query('delete  from morada where morada.id = ' . $morada->getId());
    exit;
}
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
    <div style="margin-top: 5%">
    <p>Feito!</p>
    <img src="../web/icons/completo.svg" alt="feito!" style= "width: 20%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>