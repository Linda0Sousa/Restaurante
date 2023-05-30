<?php
include "../includes/header.php";

require_once("../../classes/MyConnect.php");
require_once("../../classes/Model.php");
require_once("../../classes/Ementas.php");

//encomendas do utilizador
$conexao= MyConnect::getInstance();

$nomePrato = ("select ementa.id, ementa.nome, ementa.preco, ementa.descricao from ementa
inner join encomenda_prato on encomenda_prato.ementa_id = ementa.id
inner join encomenda on encomenda.id = encomenda_prato.ementa_id
where encomenda.cliente_id =" . $_SESSION['utilizador'] . " 
and encomenda.situacao_id = 9;");

$resultado = $conexao->query($nomePrato);

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
  
    <?php while($linha = $resultado->fetch_assoc()){ ?>
    <tr>
        <td style="padding: 1rem"><?php echo $linha['nome']?></td>
        <td style="padding: 1rem"><?php echo $linha['descricao']; ?></td>
        <td style="padding: 1rem"><?php echo $linha['preco'];?></td>
        <td style="padding: 1rem"><a href="../../validacoes/mudado.php?id=<?php echo $linha['id'];?>">Cancelar</a></td> <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</div>


</body>


<?php 
include "../includes/footer.php"; ?>