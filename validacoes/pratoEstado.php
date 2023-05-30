<?php

require_once "../classes/MyConnect.php";

//isto altera o estado dependente do id do prato e do id do estado. se não existir um estado ele apagará o prato

if(isset($_GET['estado']) || isset($_GET['estado']) == 1){
$sql = "update ementa set estado_id = " . $_GET['estado'] . " where id = " . $_GET['id'] . " ;";
} else {
    $sql = "delete from ementa where id =" . $_GET['id'];
}

$conexao = MyConnect::getInstance();
$conexao->query($sql); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=../web/paginasWeb/Pratos.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ateração Feita</title>
</head>
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
    <div style="margin-top: 5%">
    <p>Alterado!</p>
    <img src="../web/icons/mudar.svg" alt="feito!" style= "width: 20%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>