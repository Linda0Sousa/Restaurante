<?php

session_start();
require_once "../classes/Ementas.php";
require_once "../classes/Tipo.php";
require_once "../classes/MyConnect.php";

if($_SESSION['perfil'] != 3){
   ?> <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2;url=../web/paginasWeb/Pratos.php">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Negado</title>
    </head>
    <body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
        <div style="margin-top: 10%">
        <p>Nah</p>
        <img src="../web/icons/nao.png" alt="check" style= "width: 25%">
        <p>O poder do não</p>
        </div>
    </body>
    </html> <?php
}


$tipos = Tipo::search([
    ['coluna' => 'tipo', 'operador' => '=', 'valor' => $_POST['tipo']]
]);

$tipo = $tipos[0];


if (!empty($_FILES) && $_FILES['image']['size'] != 0) {
    
    if (file_exists($_FILES['image']['tmp_name'])) {
        copy($_FILES['image']['tmp_name'], '../web/pratos/img/' . $_FILES['image']['name']);
    }
}

//sql para encontrar o restaurante
$restaurante = ("select * from restaurante where utilizador_id = " . $_SESSION['utilizador']);
$conexao = MyConnect::getInstance();
$resultado = $conexao->query($restaurante);
$id = $resultado->fetch_assoc();

$ementa = new Ementas($_POST['descricao'], $_POST['nome'], $_POST['preco'], 2, $tipo->getId(),
"../pratos/img/" . $_FILES['image']['name'], $id['id']);



$ementa->save(); 

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
    <img src="../web/icons/undraw_check_boxes_re_v40f.svg" alt="check" style= "width: 25%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>