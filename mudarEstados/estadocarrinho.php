<?php

use Carbon\Carbon;
require_once "../classes/MyConnect.php";

session_start();

$conexao = MyConnect::getInstance();

$utilizador = "select * from encomenda where encomenda.id = " . $_GET['id'] . " and encomenda.cliente_id = " . $_SESSION['utilizador'] . " ;";
$resultado = $conexao->query($utilizador);

if ($resultado !== null && $resultado->fetch_assoc() == 0) {
    echo "NÃO!"; 
    sleep(2);
    header("Location: ../web/paginasWeb/pratos.php");
}


$deletar = "delete from encomenda_prato where id = " . $_GET['id'] . " ; ";
$confirmar = "update encomenda set situacao_id = 9 where id= " . $_GET['id'] . " ;";

// $horaDeSubmissao= Carbon::now();

if($_GET['estado'] == "retirar"){
    $conexao->query($deletar);
} elseif ($_GET['estado'] == "confirmar") {
    $conexao->query($confirmar);
}

?>