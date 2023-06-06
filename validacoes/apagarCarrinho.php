<?php 

session_start();

if ($_SESSION['carrinho'][$_GET['id']] == 1) {
    unset($_SESSION['carrinho'][$_GET['id']]);
} else {
    $_SESSION['carrinho'][$_GET['id']]--;
}

header('Location: ../web/paginasWeb/verCarrinho.php');
exit;