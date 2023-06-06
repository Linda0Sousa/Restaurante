<?php

require_once "../classes/MyConnect.php";
require_once "../classes/Utilizador.php";

$conexao = MyConnect::getInstance();


//isto vai bloquear/activar restaurantes, no caso do restaurante estar pendente, pode o apagar
if($_GET['situacao'] == 1 || $_GET['situacao'] == 2){
    $sql= "UPDATE restaurante SET situacao_id = " . $_GET['situacao'] . " WHERE id = " . $_GET['id'] . ";";
    $conexao->query("update utilizador set situacao_id =" . $_GET['situacao']) . "where id =" . $_GET['utilizador'];
} else {
    $sql = "delete from restaurante where id= " . $_GET['id'] . " ;";
    $conexao->query("delete  from utilizador where id=" . $_GET['id'] . ";");
}

$conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=../web/paginasWeb/Pratos.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A alterar</title>
</head>
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
    <div style="margin-top: 10%">
    <p>Feito!</p>
    <img src="../web/icons/food.svg" alt="check" style= "width: 25%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>