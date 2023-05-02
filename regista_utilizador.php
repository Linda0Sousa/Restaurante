<?php

if (empty($_POST['nome']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['confirmacao'])) {
    echo "Todos os campos são de preenchimento obrigatório";
    exit;
}

if ($_POST['password'] != $_POST['confirmacao']) {
    echo "A palava-passe e a confirmação tem que ser iguais!";
    exit;
}

if (strlen($_POST['password']) < 8) {
    echo "A palava-passe tem que ter no minimo 8 caracteres!";
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "O email tem que ser um endereço válido!";
    exit;
}

require_once 'MyConnect.php';
try {
    $ligacao = MyConnect::getInstance();

    $sql = "insert into utilizadores (nome, email, password, perfil_id)
        values ('" 
        . $_POST['nome'] . "', '" 
        . $_POST['email'] . "', '" 
        . password_hash($_POST['password'], PASSWORD_DEFAULT) ."', 2);";


    $resultado = $ligacao->query($sql);
} catch(Exception $e) {
    echo "Ocorreu um erro a criar o utilizador. " . $e->getMessage();
    exit;
}

echo "Utilizador criado com sucesso";