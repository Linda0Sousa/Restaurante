<?php 

include "../web/includes/header.php"; 

require_once "../classes/Model.php";
require_once "../classes/MyConnect.php";
require_once "../classes/Ementas.php";

$prato = Ementas::find($_GET['id']);

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
            
              <tr>
                  <td style="padding: 1rem"><?php echo $prato->getNome();?></td>
                  <td style="padding: 1rem"><?php echo $prato->getDescricao(); ?></td>
                  <td style="padding: 1rem"><?php echo $prato->getPreco();?></td>
                  <?php if($prato->getEstado() == 1){ ?>
                  <td style="padding: 1rem"><a href=<?php echo "../../validacoes/mudado.php?estado=2&id=". $prato->getId() ?>>Desactivar</a></td> <?php } else { ?>
                  <td style="padding: 1rem"> <a href =<?php echo"../../validacoes/mudado.php?estado=1&id=". $prato->getId() ?>>Activar</a></td> <?php }?>
                </tr>
              </tbody>
            </table>
          </div>
  </div>

    
</body>
</html>

<?php

include_once "../web/includes/footer.php"; ?>