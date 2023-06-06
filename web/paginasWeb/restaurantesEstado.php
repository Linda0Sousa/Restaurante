<?php 

session_start();

if($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1){
  ?>
  <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="refresh" content="2;url=pratos.php">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Negado</title>
   </head>
   <body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
       <div style="margin-top: 10%">
       <img src="../icons/it-humor-memes-5.jpg" alt="check" style= "width: 40%">
       </div>
   </body>
   </html> 
   <?php
exit;}

include "../includes/header.php";

require_once "../../classes/Model.php";
require_once "../../classes/MyConnect.php";
require_once "../../classes/Ementas.php";

//Ver o estado dos restaurantes tanto pendentes como confirmados ou bloqueados. As verificações são feitas em baixo

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
        <!-- Vai passar para o url o id do restaurante e do seu utilizador como tambem o seu estado-->  
        <!--para estado Pendente -->
        <?php if($restaurantes['situacao_id'] == 3){  ?> 
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=1&id=".$restaurantes['id'];?>&utilizador=<?php
        echo $restaurantes['utilizador_id'];?>">Confirmar</a></td>
        <?php }; ?>

        <!--para estado bloqueado -->
      <?php if ($restaurantes['situacao_id'] == 2){  ?>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=1&id=".$restaurantes['id'];?>&utilizador=<?php
        echo $restaurantes['utilizador_id'];?>">Activar</a></td>

        <!--para estado activo -->
      <?php }
      if ($restaurantes['situacao_id'] == 1){  ?>
        <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadoRestaurante.php?situacao=2&id=".$restaurantes['id'];?>&utilizador=<?php
        echo $restaurantes['utilizador_id'];?>">Bloquear</a></td>
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