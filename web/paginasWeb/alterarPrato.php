<?php

//isto aqui lista os pratos/ activa e desactivar

session_start();


require_once "../includes/header.php";

require_once "../../classes/MyConnect.php";

$conexao = MyConnect::getInstance();

$idRestaurante = $conexao->query('select restaurante.id from restaurante where restaurante.utilizador_id = ' . $_SESSION['utilizador']);
$id = $idRestaurante->fetch_assoc();

$pratos = $conexao->query("select * from ementa where ementa.restaurante_id = " . $id['id']);

?>

<body style="background-color: black;">


<div class="table-responsive" style="background-color: white; margin: 5% 5%;">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nome do Prato</th>
        <th style="padding: 1rem">Descrição</th>
        <th style="padding: 1rem">Preço</th>
        <th style="padding: 1rem">Estado</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      while($prato = $pratos->fetch_assoc()){
    ?>

    <tr>
        <?php if($prato['estado_id'] != 3){ ?>
        <td style="padding: 1rem"><?php echo $prato['nome'];?></td>         
        <td style="padding: 1rem"><?php echo $prato['descricao'];?></td>
        <td style="padding: 1rem"><?php echo $prato['preco'] . "€"; ?></td>
        <?php if($prato['estado_id'] == 1){?>
        <td style="padding: 1rem"><a href="">Desactivar</a>
        <?php } elseif($prato['estado_id'] == 2){ ?>
        <td style="padding: 1rem"><a href="">Activar</a>
      </td>
      <?php }} ?>
    </tr> <?php } ?>
    </tbody>
  </table>
</div>
</form>
    
<?php
include_once "../includes/footer.php";
?>