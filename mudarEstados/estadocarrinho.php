<?php

//esta parte trata da session do cliente e das encomendas
use Carbon\Carbon;
require_once "../classes/MyConnect.php";
require_once "../classes/Encomenda.php";
require_once "../classes/Ementas.php";
require_once "../classes/Model.php";
require_once "../email/email.php";
require_once "../classes/Restaurante.php";
require_once "../classes/Morada.php";
require_once "../classes/Clientes.php";
require_once "../classes/Utilizador.php";
require_once "../classes/Encomenda.php";

session_start();

$data = Carbon::parse();
$conexao = MyConnect::getInstance();

//estou a procurar o prato para que possa aceder á informação da encomenda;
$prato = Ementas::find($_GET['id']);

//Codigo MySQL que vai ser usado mais em baixo
$deletar = "delete from encomenda where id = " . $_GET['id'] . " ; ";
$confirmar = "update encomenda set estado_id = 4 where id= " . $_GET['id'] . " ;";
$enviar = "update encomenda set estado_id = 5 where id= " . $_GET['id'] . " ;";

//Esta parte vai mudar o estado da encomenda ou apagar ela.
if(isset($_GET['estado']) && $_GET['estado'] == "retirar"){

    //notificar o cancelamento, buscar o cliente atraves da encomenda
    $encomenda= Encomenda::find($_GET['id']);
    $cliente = Cliente::search([['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $encomenda->getClienteId()]]);
    $utilizador = Utilizador::find($cliente[0]->getUtilizadorId());

    sendEmail('sousalinda522@gmail.com', 'Um dos seus pedidos foi cancelado', "Veja qual pedido foi cancelado");

    $conexao->query($deletar);

} elseif (isset($_GET['estado']) && $_GET['estado'] == "confirmar") {

    $encomenda= Encomenda::find($_GET['id']);
    $cliente = Cliente::search([['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $encomenda->getClienteId()]]);
    $utilizador = Utilizador::find($cliente[0]->getUtilizadorId());
    
    //$utilizador->getEmail();
    $conexao->query($confirmar);

    sendEmail('sousalinda522@gmail.com', 'Um dos seus pedidos foi aceite', "veja o estado na aplicação");

} elseif(isset($_GET['estado']) && $_GET['estado'] == "enviar") {
    $conexao->query($enviar);
    sendEmail('sousalinda522@gmail.com', 'O seu pedido esta a ser entregue', "nome: " . $prato->getNome() . "preço: " . $prato->getPreco());
}
else{
    //Esta parte vai salvar as encomendas que estão no session e depois apaga ela do session (parte do cliente)
$encomenda = new Encomenda($data, $prato->getPreco(), $_SESSION['utilizador'], $prato->getRestauranteId(), 3, $_GET['id']);
for($i = 0; $i < $_GET['quantidade'] ; $i++){
$encomenda->save();

}

//procura o email do restaurante
$restaurante = Restaurante::find($prato->getRestauranteId());
//buscar a morada do cliente
$cliente = Cliente::search([['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $_SESSION['utilizador']]]);
$morada = Morada::find($cliente[0]->getMoradaId());

//aqui se substitui o email pelo email real do restaurante $restaurante->getId();
sendEmail("sousalinda522@gmail.com", "Uma nova encomenda!", "Veja as encomendas pela app: nome prato: " . $prato->getNome() . 
" localidade: " . $morada->getLocalidade() . " rua: " . $morada->getRua() . " numero Porta: " . $morada->getNumPorta() . 
" quantidade: " . $_GET['quantidade']);


unset($_SESSION['carrinho'][$_GET['id']]);


}


header("Location:../web/paginasWeb/verEncomendas.php");