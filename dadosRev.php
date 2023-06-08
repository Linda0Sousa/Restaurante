<?php
// Conexão com o banco de dados
session_start();
require_once "classes/MyConnect.php";
require_once "classes/Restaurante.php";

$conexao = MyConnect::getInstance();

$restaurante = $conexao->query('select id from restaurante where restaurante.utilizador_id = ' . $_SESSION['utilizador']);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_errno) {
    echo "Falha ao conectar ao MySQL: " . $conexao->connect_error;
    exit();
}

// Consulta ao banco de dados
$aux = [];
while($linha = $restaurante->fetch_assoc()){
    $aux = $linha['id'];
}


$query = "SELECT montante FROM restaurante.encomenda where restaurante_id = $aux;";

$result = $conexao->query($query);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    $data = array(); // Array para armazenar os dados

    // Loop através dos resultados
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['montante']; // Adiciona apenas o valor do campo 'montante' ao array
    }

    // Cria um objeto com a chave 'data' contendo o array de valores
    $jsonObject = array('data' => $data);

    // Converte o objeto para JSON
    $json = json_encode($jsonObject);

    // Retorna o JSON como resposta
    header('Content-Type: application/json');
    echo $json;
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

