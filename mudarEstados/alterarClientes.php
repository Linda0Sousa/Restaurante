<?php

require_once "../classes/MyConnect.php";

$conexao = MyConnect::getInstance();

$conexao->query("update utilizador set utilizador.situacao_id = " . $_GET['situacao'] . " where id = " . $_GET['id']);

header('location: ../web/paginasWeb/listaClientes.php');