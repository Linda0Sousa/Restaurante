<?php 

include "../includes/header.php";

require_once "../../classes/Model.php";
require_once "../../classes/MyConnect.php";
require_once "../../classes/Ementas.php";

//Alterar o estado dos Restaurantes

$sql = ("select * from restaurante");
$conexao = MyConnect::getInstance();
$resultados = $conexao->query($sql);

print_r($resultados);
?>
<body style="background-color: black;">

<div class="table-responsive" style="background-color: white; margin: 5% 5%">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nome Restaurante</th>
        <th style="padding: 1rem">Designação</th>
        <th style="padding: 1rem">Morada</th>
        <th style="padding: 1rem">Nif</th>
        <th style="padding: 1rem">Telemovel</th>
        <th style="padding: 1rem">Nome Responsavél</th>
        <th style="padding: 1rem">Telemovel Responsavél</th>
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


<?php

include_once "../web/includes/footer.php"; ?>