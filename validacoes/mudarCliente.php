<?php

session_start();

require_once "../classes/MyConnect.php";
include_once "../classes/Clientes.php";
require_once "../classes/Utilizador.php";

$conexao = MyConnect::getInstance();

//o cliente é obetido pela session, isto vai permitir obter a morada_id
$utilizador = Utilizador::find($_SESSION['utilizador']);

$cliente = Cliente::search([
    ['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $_SESSION['utilizador']]
]);


//isto apenas vai fazer update à base de dados (clientes, utilizadores e moradas)

try{
function update($conexao, $tabela, $coluna, $valor, $condicao1, $condicao){
    $conexao->query("UPDATE $tabela SET $coluna = '$valor' WHERE $condicao1 = '$condicao'");
}

if(isset($_POST['nome']))
{
    $conexao->query('update utilizador set utilizador.nome = "' . $_POST['nome'] . '" where id = ' . $_SESSION['utilizador']);
}

if(isset($_POST['tlm']))
{
    update($conexao, 'cliente', 'cliente.tlm', $_POST['tlm'], 'utilizador_id', $utilizador->getId());
}

if(isset($_POST['rua']))
{
    update($conexao, 'morada', 'rua', $_POST['rua'], 'id', $cliente[0]->getMoradaId());
}

if(isset($_POST['porta']))
{
    update( $conexao, 'morada', 'numPorta', $_POST['porta'], 'id', $cliente[0]->getMoradaId());
}

if(isset($_POST['pais']))
{
    update($conexao, 'morada', 'pais', $_POST['pais'], 'id', $cliente[0]->getMoradaId());
}

if(isset($_POST['localidade']))
{
    update($conexao, 'morada', 'localidade', $_POST['localidade'], 'id', $cliente[0]->getMoradaId());
}

if(isset($_POST['codigoPostal']))
{
    update($conexao, 'morada', 'codigoPostal', $_POST['codigoPostal'], 'id', $cliente[0]->getMoradaId());
}} catch (mysqli_sql_exception $e){
    echo "erro ao fazer as alterações";
    exit;
}

header('Location: ../web/paginasWeb/pratos.php');