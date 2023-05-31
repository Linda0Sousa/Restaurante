<?php 

include "../includes/header.php";

require_once "../../classes/Model.php";
require_once "../../classes/MyConnect.php";
require_once "../../classes/Ementas.php";

//Alterar o estado dos Restaurantes

$sql = ("select * from restaurante");
$conexao = MyConnect::getInstance();
$resultados = $conexao->query($sql);

?>
<body style="background-color: black;">

<div class="table-responsive" style="background-color: white; margin: 5% 5%">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nome Restaurante</th>
        <th style="padding: 1rem">Designação</th>
        <th style="padding: 1rem">Telemovél do responsavél</th>
        <th style="padding: 1rem">webpage</th>
        <th style="padding: 1rem">NIF</th>
        <th style="padding: 1rem">Nome Responsavél</th>
        <th style="padding: 1rem">Gerir estado</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      while($restaurantes = $resultados->fetch_assoc()){
    ?>
    <tr>
        <td style="padding: 1rem"><?php echo $restaurantes['nome']; ?></td>
        <td style="padding: 1rem"><?php echo $restaurantes['designacao']; ?></td>
        <td style="padding: 1rem"><?php echo $restaurantes['tlmResponsavel']; ?></td>
        <td style="padding: 1rem"><?php echo $restaurantes['webpage']; ?></td>
        <td style="padding: 1rem"><?php echo $restaurantes['nif']; ?></td>
        <td style="padding: 1rem"><?php echo $restaurantes['nomeResponsavel']; ?></td>  
        <?php if($restaurantes['situacao_id'] == 3){  ?>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=1&id=".$restaurantes['id'];?>">Confirmar</a></td>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=anular&id=".$restaurantes['id'];?>">Anular</a></td>
        <?php }; ?>
      <?php if ($restaurantes['situacao_id'] == 2){  ?>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=1&id=".$restaurantes['id'];?>">Activar</a></td>
      <?php }
      if ($restaurantes['situacao_id'] == 1){  ?>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=2&id=".$restaurantes['id'];?>">Bloquear</a></td>
        <?php } ?>
    </tr> <?php } ?>
    </tbody>
  </table>
</div>
</div>

<button></button>

</body>


<?php

include_once "../includes/footer.php"; ?>