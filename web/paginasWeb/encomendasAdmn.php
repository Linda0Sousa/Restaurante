<?php
include "../includes/header.php";
require_once "../../classes/MyConnect.php";
require_once "../../classes/Restaurante.php";

$conexao = MyConnect::getInstance();
//ver todas as ementas 


if ($_SESSION['perfil'] != 1) {
  header("Location: pratos.php");
}


$sql = ("select * from encomenda");



$resultados = $conexao->query($sql);


?>

<body style="background-color: black;">

  <div class="table-responsive" style="background-color: white; margin: 5% 5%">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th style="padding: 1rem">Telemóvel</th>
          <th style="padding: 1rem">Nome da ementa</th>
          <th style="padding: 1rem">Preço</th>
          <th style="padding: 1rem">Estado</th>
          <th style="padding: 1rem">Cancelar</th>
          <th style="padding: 1rem">Confirmar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($encomendas = $resultados->fetch_assoc()) {
          
            $cliente = $conexao->query("select * from cliente where id = " . $encomendas['cliente_id']);
            $ementas = $conexao->query("select * from ementa where id = " . $encomendas['ementa_id']);
        ?>
              <tr>
              <?php while ($nome = $cliente->fetch_assoc()) { ?>
                <td style="padding: 1rem"><?php echo $nome['tlm']; } ?></td>

                <?php while ($ementa = $ementas->fetch_assoc()) { ?>
                  <td style="padding: 1rem"><?php echo $ementa['nome']; ?></td> <?php } ?>
                  <td style="padding: 1rem"><?php echo $encomendas['montante']; ?></td>

                  <!-- vai buscar o estado da encomenda -->
                  <?php if ($encomendas['estado_id'] == 5) { ?>
                  <td style="padding: 1rem"><?php echo "enviado"; ?></td>
                  <?php } elseif ($encomendas['estado_id'] == 3) { ?>
                  <td style="padding: 1rem"><?php echo "pendente"; ?></td> 
                  <?php } else { ?>
                  <td style="padding: 1rem"><?php echo "confirmado"; ?></td> 
                  
                  <!--verifica o estado para retirar caso esteja pendente ou confirmado-->
                  <?php } if ($encomendas['estado_id'] == 3 || $encomendas['estado_id'] == 4) { ?>
                  <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=retirar&id=" . $encomendas['id']; ?>">Cancelar</a></td> <?php } else { ?>
                  <td style="padding: 1rem">Enviado</td>  <?php } ?> 

                 <!--permite confirmar a encomenda caso esteja no estado pendente -->
                  <?php if ($encomendas['estado_id'] == 3) { ?>
                  <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=confirmar&id=" . $encomendas['id']; ?>">Confirmar</a></td> 
                  <?php } elseif ($encomendas['estado_id'] == 4) { ?>
                    <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=enviar&id=" . $encomendas['id']; ?>">Enviar</a></td>  <?php } else { ?>  
                  <td style="padding: 1rem">Enviado</td>  <?php }} ?>                              
              </tr>
          <?php 
        ?>
      </tbody>
    </table>
  </div>

  <button></button>

</body>