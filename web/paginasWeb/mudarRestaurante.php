<?php

session_start();

if ($_SESSION['perfil'] != 3) {
  header("Location: pratos.php");
  exit;
}

require_once "../includes/header.php";
include_once "../../classes/Restaurante.php";

$restaurantes = Restaurante::search([['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $_SESSION['utilizador']]]);

?>

<body style="background-color: black;">

<div class="table-responsive" style="background-color: white; margin: 5% 5%">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nome</th>
        <th style="padding: 1rem">Email</th>
        <th style="padding: 1rem">Telemovel do responsavel</th>
        <th style="padding: 1rem">responsavel</th>
        <th style="padding: 1rem">Hora de abertura</th>
        <th style="padding: 1rem">Webpage</th>
        <th style="padding: 1rem">Designacao</th>
      </tr>
    </thead>
    <tbody>
  
    <?php foreach($restaurantes as $restaurante){ ?>
    <tr>   
        <td style="padding: 1rem"><?php echo $restaurante->getNome();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getEmail();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getTlmResponsavel();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getNomeResponsavel();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getHoraAbertura();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getWebpage();?></td>
        <td style="padding: 1rem"><?php echo $restaurante->getDesignacao();?></td>
        <td style="padding: 1rem"><a href="alterarRestaurante.php?id=<?php echo $restaurante->getId();?>">Alterar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>


</body>

<?php require_once "../includes/footer.php"; ?>