<?php
session_start();

require_once "../classes/MyConnect.php";

if($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1){
    ?>
    <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="refresh" content="2;url=../web/paginasWeb/pratos.php">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Negado</title>
     </head>
     <body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
         <div style="margin-top: 10%">
         <img src="../web/icons/download.jpg" alt="check" style= "width: 25%">
         <p>Caiste de paraquedas?</p>
         </div>
     </body>
     </html> 
     <?php
  exit;}

//isto altera o estado de pendente do id do prato e do id do estado. se não existir um estado ele apagará o prato
//apagar o prato so acontece no momento em que este está pendente, caso contrario, se ele fazer parte de uma encomenda será dificil o apagar

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
    <meta http-equiv="refresh" content="2;url=../web/paginasWeb/listaEmentas.php">
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