<?php

session_start();
include "../includes/header.php";

//neste site o utilizador tem acesso a todas as suas encomendas, mesmo as que foram apagadas. 
//O utilizador so pode cancelar os pratos que não forma confirmados pelo restaurante.


require_once("../../classes/MyConnect.php");
require_once("../../classes/Model.php");
require_once("../../classes/Ementas.php");

$conexao= MyConnect::getInstance();

//encomendas que o cliente (nota que o id do login é do utilizador e não do cliente) pediu:
$encomendas_utilizador = "select encomenda.id, encomenda.cliente_id, encomenda.ementa_id, encomenda.estado_id
 from encomenda inner join cliente on cliente.id = encomenda.cliente_id where cliente.id = " .
 $_SESSION['utilizador'];

$encomendas_resultados = $conexao->query($encomendas_utilizador);

?>
<body style="background-color: black;">

<div class="table-responsive" style="background-color: white; margin: 5% 5%">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nome</th>
        <th style="padding: 1rem">Descrição</th>
        <th style="padding: 1rem">Preço</th>
        <th style="padding: 1rem">Cancelar</th>
      </tr>
    </thead>
    <tbody>
  
    <?php while($encomenda = $encomendas_resultados->fetch_assoc()){ 
      //pratos que foram encomendados
      $pratos_encomendas = $conexao->query("select * from ementa where ementa.id = " . $encomenda['ementa_id']);
      while($prato = $pratos_encomendas->fetch_assoc()){?>
    <tr>   
        <td style="padding: 1rem"><?php echo $prato['nome'] . $encomenda['id'];?></td>
        <td style="padding: 1rem"><?php echo $prato['descricao']; ?></td>
        <td style="padding: 1rem"><?php echo $prato['preco'];?></td>
        <?php if($encomenda['estado_id'] == 3){?>
        <td style="padding: 1rem"><a href="../../mudarEstados/estadocarrinho.php?estado=retirar&php&id=<?php echo $encomenda['id'];?>">Cancelar</a></td> <?php }
        elseif($encomenda['estado_id'] == 4){ ?>
        <td style="padding: 1rem">Confirmado</td> <?php } else {?>
        <td style="padding: 1rem">Operção ancelado</td> <?php } ?>
      </tr>
      <?php }} ?>
    </tbody>
  </table>
</div>
</div>


</body>


<?php 
include "../includes/footer.php"; ?>