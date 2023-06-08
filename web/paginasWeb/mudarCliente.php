<?php

session_start();

if ($_SESSION['perfil'] != 2) {
  header("Location: pratos.php");
  exit;
}

require_once "../includes/header.php";
include_once "../../classes/Clientes.php";

$clientes = Cliente::search([['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $_SESSION['utilizador']]]);

?>

<body style="background-color: black;">

<div class="table-responsive" style="background-color: white; margin: 5% 5%">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th style="padding: 1rem">Nif</th>
        <th style="padding: 1rem">Tlm</th>
        <th style="padding: 1rem">Alterar informações</th>
      </tr>
    </thead>
    <tbody>
  
    <?php foreach($clientes as $cliente){ ?>
    <tr>   
        <td style="padding: 1rem"><?php echo $cliente->getNif();?></td>
        <td style="padding: 1rem"><?php echo $cliente->getTlm();?></td>
        <td style="padding: 1rem"><a href="alterarClientes.php?id="<?php echo $cliente->getId();?>>Alterar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>


</body>

<?php require_once "../includes/footer.php"; ?>