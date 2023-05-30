<?php

require_once "../classes/Encomenda.php";
require_once "../classes/Model.php";
require_once "../classes/Ementas.php";
require_once "../classes/MyConnect.php";

session_start();

if($_SESSION['perfil'] != 1 ){
    echo "Tu não podes fazer encomendas";
    header("Location: ../web/paginasWeb/pratos.php");
}


$novoItem = Ementas::find($_GET['id']);

$carrinho = new Encomenda(null, $novoItem->getPreco(), $_SESSION['utilizador'], $novoItem->getRestauranteId(), 2);
$carrinho->save();

// $conexao = MyConnect::getInstance();
// $sql = "insert into encomenda_prato (ementa_id, encomenda_id) values (" . $_GET['id'] . " , " . $carrinho->getId() . " );";

// $conexao->query($sql);

header('Location: ../web/paginasWeb/verCarrinho.php');
exit;
?>
