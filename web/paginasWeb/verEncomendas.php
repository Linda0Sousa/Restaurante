<?php

//ver as ementas relativas aquele restaurante
session_start();

if($_SESSION['perfil'] != 3){
    header("Location: pratos.php");
}

include "../includes/header.php";

$sql = ("select * from encomenda where restaurante_id =" . $_SESSION['utilizador']);

require_once "../../classes/MyConnect.php";

$conexao= MyConnect::getInstance();

$resultados = $conexao->query($sql);


?>
<body style="background-color: black;">

          <div class="table-responsive" style="background-color: white; margin: 5% 5%">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Nome da ementa</th>
                  <th style="padding: 1rem">Preço</th>
                  <th style="padding: 1rem">Confirmar</th>
                  <th style="padding: 1rem">Remover</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              while ($encomendas = $resultados->fetch_assoc()) {
                if($encomendas['estado_id'] = 4){
                $cliente = $conexao->query("select * from cliente where id = " . $encomendas['cliente']);
                $ementas = $conexao->query("select * from ementa where id = " . $encomendas['encomenda_id']);
                while($nome = $cliente->fetch_assoc()){
              ?>
              <tr>
                  <td style="padding: 1rem"><?php echo $nome['nome'];} ?></td>
                  <?php while($Ementa = $ementas->fetch_assoc()){?>
                  <td style="padding: 1rem"><?php echo $Ementa['nome']; ?></td>
                  <td style="padding: 1rem"><?php echo $encomendas['montante']; ?></td>
                  <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=retirar&id=".$Ementa['id'];}?>">Cancelar</a></td>
                </tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
  </div>

  <button></button>

</body>