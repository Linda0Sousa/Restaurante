<?php

session_start();

if($_SESSION['perfil'] != 2 ){
    echo "Tu não podes fazer encomendas";
    header("Location: ../web/paginasWeb/pratos.php");
    exit;
}

if (isset($_SESSION['carrinho'][$_GET['id']])) {
    $_SESSION['carrinho'][$_GET['id']]++;
} else {
    $_SESSION['carrinho'][$_GET['id']] = 1;
} 

header('Location: ../web/paginasWeb/Pratos.php');
exit;
?>
