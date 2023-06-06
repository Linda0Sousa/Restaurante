<?php include "../includes/header.php"; 

//esta pagina vai listar os clientes, vai buscar as suas moradas e conta de utilizador


if($_SESSION['perfil'] != 1){
  ?>
  <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="refresh" content="2;url=Pratos.php">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Negado</title>
   </head>
   <body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
       <div style="margin-top: 10%">
       <img src="../icons/You_Shall_Not_Pass!_0-1_screenshot.jpg" alt="check" style= "width: 25%">
       </div>
   </body>
   </html> 
   <?php
exit;}

require_once "../../classes/MyConnect.php";

$conexao = MyConnect::getInstance();

$clientes = $conexao->query('select * from cliente');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body style="background-color: black;">

          <div class="table-responsive" style="background-color: white; margin: 5% 5%">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="padding: 1rem">Rua</th>
                  <th style="padding: 1rem">Numero de Porta</th>
                  <th style="padding: 1rem">Codigo Postal</th>
                  <th style="padding: 1rem">Localidade</th>
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Email</th>
                  <th style="padding: 1rem">Estado do cliente</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($cliente = $clientes->fetch_assoc()) {
  $utilizadores = $conexao->query('SELECT * FROM utilizador WHERE id = ' . $cliente['utilizador_id']);
  $moradas = $conexao->query('SELECT * FROM morada WHERE id = ' . $cliente['morada_id']);
?>
  <tr>
    <?php while ($morada = $moradas->fetch_assoc()) { ?>
      <td style="padding: 1rem"><?php echo $morada['rua']; ?></td>
      <td style="padding: 1rem"><?php echo $morada['numPorta']; ?></td>
      <td style="padding: 1rem"><?php echo $morada['codigoPostal']; ?></td>
      <td style="padding: 1rem"><?php echo $morada['localidade']; ?></td>
    <?php } ?>
  
    <?php while ($utilizador = $utilizadores->fetch_assoc()) { ?>
      <td style="padding: 1rem"><?php echo $utilizador['nome']; ?></td>
      <td style="padding: 1rem"><?php echo $utilizador['email']; ?></td>
  
      <?php if ($utilizador['situacao_id'] == 2) { ?>
        <td style="padding: 1rem"><a href="../../mudarEstados/alterarClientes.php?situacao=1&id=<?php echo $utilizador['id'];?>">Ativar</a></td>
      <?php } elseif ($utilizador['situacao_id'] == 1) { ?>
        <td style="padding: 1rem"><a href="../../mudarEstados/alterarClientes.php?situacao=2&id=<?php echo $utilizador['id'];?>">Bloquear</a></td>
      <?php } ?>
    <?php } ?>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

    
</body>
</html>

<?php

include_once "../includes/footer.php"; ?>
