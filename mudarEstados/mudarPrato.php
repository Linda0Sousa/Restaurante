<?php

require_once "../classes/Model.php";
require_once "../classes/Ementas.php";
require_once "../classes/MyConnect.php";
require_once "../classes/Tipo.php";

$conexao = MyConnect::getInstance();

$prato = Ementas::find($_GET['id']);

if(isset($_POST['nome'])){
    $conexao->query("update ementa set ementa.nome = '" . $_POST['nome'] . "' where id = " . $_GET['id']);
}

if(isset($_POST['descricao'])){
    $conexao->query("update ementa set ementa.descricao = '" . $_POST['descricao'] . "' where id = " . $_GET['id']);
}

if(isset($_POST['preco'])){
    $conexao->query("update ementa set ementa.preco = " . $_POST['preco'] . " where id = " . $_GET['id']);
}

$tipos = Tipo::search([
    ['coluna' => 'tipo', 'operador' => '=', 'valor' => $_POST['tipo']]
]);

$tipo = $tipos[0];

if(isset($_POST['tipo'])){
    $conexao->query("update ementa set ementa.tipo_id = '" . $tipo->getId() . "' where id = " . $_GET['id']);
}

if (!empty($_FILES) && $_FILES['image']['size'] != 0) {
    
    if (file_exists($_FILES['image']['tmp_name'])) {
        copy($_FILES['image']['tmp_name'], '../web/pratos/img/' . $_FILES['image']['name']);
    }
}

if(isset($_POST['imagem'])){
    $conexao->query("update ementa set ementa.imagem = '" . $_FILES['imagem']['name'] . "' where id = " . $_GET['id']);
}