<?php 

//esta pagina disponibiliza os pratos
session_start();
if($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1){
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
       <img src="../icons/gatinho.jpg" alt="check" style= "width: 25%">
       <p>Sorry</p>
       </div>
   </body>
   </html> 
   <?php
exit;}

include "../includes/header.php"; 

require_once "../../classes/Model.php";
require_once "../../classes/MyConnect.php";
require_once "../../classes/Restaurante.php";

$conexao = MyConnect::getInstance();

if($_SESSION['perfil'] != 1){
$restaurante = Restaurante::search([ ['coluna' => 'utilizador_id', 'operador' => '=', 'valor' => $_SESSION['utilizador']]]);

$pratos = $conexao->query("select * from ementa where ementa.restaurante.id = " . $restaurante[0]->getId());
} else {
  $pratos = $conexao->query("select * from ementa");
}

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
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Descrição</th>
                  <th style="padding: 1rem">Preço</th>
                  <th style="padding: 1rem">Alterar</th>
                </tr>
              </thead>
              <tbody>
              <?php while($prato = $pratos->fetch_assoc()){ ?>
              <tr>
                  <td style="padding: 1rem"><?php echo $prato['nome'];?></td>
                  <td style="padding: 1rem"><?php echo $prato['descricao']; ?></td>
                  <td style="padding: 1rem"><?php echo $prato['preco'];?></td>
                  <?php if($prato['estado_id'] == 1){ ?>
                  <td style="padding: 1rem"><a href=<?php echo "../../validacoes/pratoEstado.php?estado=2&id=". $prato['id'] ?>>Desactivar</a></td> <?php } 
                  elseif($prato['estado_id'] == 2) { ?>
                  <td style="padding: 1rem"> <a href =<?php echo"../../validacoes/pratoEstado.php?estado=1&id=". $prato['id'] ?>>Activar</a></td> <?php }
                  elseif($prato['estado_id'] == 3) { ?>
                  <td style="padding: 1rem"> <a href =<?php echo"../../validacoes/pratoEstado.php?id=". $prato['id'] ?>>Negar</a></td> <?php }?>
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