<?php

//esta parte trata da session do cliente e das encomendas
use Carbon\Carbon;
require_once "../classes/MyConnect.php";
require_once "../classes/Encomenda.php";
require_once "../classes/Ementas.php";
require_once "../classes/Model.php";

session_start();

$data = Carbon::parse();
$conexao = MyConnect::getInstance();

//estou a procurar o prato para que seja salvado o id na encomenda;
$prato = Ementas::find($_GET['id']);

//Codigo MySQL que vai ser usado mais em baixo
$deletar = "delete from encomenda where id = " . $_GET['id'] . " ; ";
$confirmar = "update encomenda set estado_id = 4 where id= " . $_GET['id'] . " ;";
$enviar = "update encomenda set estado_id = 5 where id= " . $_GET['id'] . " ;";

//Esta parte vai mudar o estado da encomenda ou apagar ela.
if(isset($_GET['estado']) && $_GET['estado'] == "retirar"){
    $conexao->query($deletar);
} elseif (isset($_GET['estado']) && $_GET['estado'] == "confirmar") {
    $conexao->query($confirmar);
} elseif(isset($_GET['estado']) && $_GET['estado'] == "enviar") {
    $conexao->query($enviar);
}
else{
    //Esta parte vai salvar as encomendas que estão no session e depois apaga ela do session
$encomenda = new Encomenda($data, $prato->getPreco(), $_SESSION['utilizador'], $prato->getRestauranteId(), 3, $_GET['id']);
for($i = 0; $i < $_GET['quantidade'] ; $i++){
$encomenda->save();
}
unset($_SESSION['carrinho'][$_GET['id']]);
}

header("Location: ../web/paginasWeb/verEncomendas.php");
?>