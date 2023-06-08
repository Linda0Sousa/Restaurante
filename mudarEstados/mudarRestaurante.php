<?php

require_once "../classes/Restaurante.php";
require_once "../classes/MyConnect.php";

$restaurante = Restaurante::find($_GET['id']);
$morada = $restaurante->getMoradaId();
$conexao = MyConnect::getInstance();

function update($tabela, $conexao, $coluna, $valor, $id){
    $conexao->query('UPDATE ' . $tabela . ' SET ' . $coluna . ' = " ' . $valor . ' " WHERE id = " ' . $id . ' "');
};

try{
if(isset($_POST['nome'])){
    update('restaurante', $conexao, 'restaurante.nome', $_POST['nome'], $_GET['id']);
}

if(isset($_POST['tlm'])){
    update('restaurante', $conexao, 'restaurante.tlm', $_POST['tlm'], $_GET['id']);
}

if(isset($_POST['tlf'])){
    update('restaurante', $conexao, 'restaurante.tlf', $_POST['tlf'], $_GET['id']);
}

if(isset($_POST['tlmResponsavel'])){
    update('restaurante', $conexao, 'restaurante.tlmResponsavel', $_POST['tlm'], $_GET['id']);
}

if(isset($_POST['designacao'])){
    update('restaurante', $conexao, 'restaurante.designacao', $_POST['designacao'], $_GET['id']);
}

if(isset($_POST['rua'])){
    update('morada', $conexao, 'morada.rua', $_POST['rua'], $morada);
}

if(isset($_POST['porta'])){
    update('morada', $conexao, 'morada.numPorta', $_POST['porta'], $morada);
}

if(isset($_POST['pais'])){
    update('morada', $conexao, 'morada.pais', $_POST['pais'], $morada);
}

if(isset($_POST['localidade'])){
    update('morada', $conexao, 'morada.localidade', $_POST['porta'], $morada);
}

if(isset($_POST['codigoPostal'])){
    update('morada', $conexao, 'morada.codigoPostal', $_POST['codigoPostal'], $morada);
}

if(isset($_POST['webpage'])){
    update('restaurante', $conexao, 'restaurante.webpage', $_POST['webpage'], $_GET['id']);
}

if(isset($_POST['responsavel'])){
    update('restaurante', $conexao, 'restaurante.nomeResponsavel', $_POST['responsavel'], $_GET['id']);
}

if(isset($_POST['Habertura'])){
    update('restaurante', $conexao, 'restaurante.horaAbertura', $_POST['Habertura'], $_GET['id']);
}

if(isset($_POST['Horafecho'])){
    update('restaurante', $conexao, 'restaurante.Horafecho', $_POST['Horafecho'], $_GET['id']);
}

if(isset($_POST['segunda'])){
    update('restaurante', $conexao, 'restaurante.segunda', empty($_POST['segunda']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['terca'])){
    update('restaurante', $conexao, 'restaurante.terca', empty($_POST['terca']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['quarta'])){
    update('restaurante', $conexao, 'restaurante.quarta', empty($_POST['quarta']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['quinta'])){
    update('restaurante', $conexao, 'restaurante.quinta', empty($_POST['quinta']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['sexta'])){
    update('restaurante', $conexao, 'restaurante.sexta',  empty($_POST['sexta']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['sabado'])){
    update('restaurante', $conexao, 'restaurante.sabado',  empty($_POST['sabado']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['domingo'])){
    update('restaurante', $conexao, 'restaurante.domingo',  empty($_POST['domingo']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['Mbway'])){
    update('restaurante', $conexao, 'restaurante.Mbway',  empty($_POST['Mbway']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['visa'])){
    update('restaurante', $conexao, 'restaurante.visa',  empty($_POST['Mbway']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['multibanco'])){
    update('restaurante', $conexao, 'restaurante.multibanco',  empty($_POST['multibanco']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['numerario'])){
    update('restaurante', $conexao, 'restaurante.multibanco',  empty($_POST['numerario']) ? 0 : 1, $_GET['id']);
}

if(isset($_POST['numerario'])){
    update('restaurante', $conexao, 'restaurante.multibanco',  empty($_POST['cheque']) ? 0 : 1, $_GET['id']);
}
} catch (mysqli_sql_exception $e){
 echo "ocorreu um erro";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=../web/paginasWeb/Pratos.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A alterar</title>
</head>
<body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
    <div style="margin-top: 10%">
    <p>Tudo concluido!</p>
    <img src="../web/icons/food.svg" alt="check" style= "width: 25%">
    <p>Está ser redirecionado...</p>
    </div>
</body>
</html>