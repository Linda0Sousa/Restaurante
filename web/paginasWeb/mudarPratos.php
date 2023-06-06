<?php require "../includes/header.php";

require_once "../../classes/MyConnect.php";

//isto vai mudar os pratos

$conexao = MyConnect::getInstance();

$ementas = $conexao->query("select * from ementa");



?>

<body style="background-color: black; ">

          <div class="table-responsive" style="background-color: white; margin: 5% 5%">
            <table class="table table-striped table-sm" style="text-align: center;">
              <thead>
                <tr>
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Descrição</th>
                  <th style="padding: 1rem">Preço</th>
                  <th style="padding: 1rem">Imagem</th>
                  <th style="padding: 1rem">Mudar</th>
                </tr>
              </thead>
              <tbody>
              <?php  
              while($ementa = $ementas->fetch_assoc()){
               ?>
              <tr>
                  <td style="padding: 1rem"><?php echo $ementa['nome'];?></a></td>
                  <td style="padding: 1rem"><?php echo $ementa['descricao'];?></a></td>
                  <td style ="padding 1rem"><?php echo $ementa['preco'];?></a></td>
                  <td style="padding: 1rem"><?php echo $ementa['imagem'];?></a></td>
                  <td style="padding: 1rem"><a href="mudarEmenta.php?id=<?php echo $ementa['id']?>">Alterar</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
  </div>

  <button></button>

</body>

  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

  <?php

include "../includes/footer.php";
?>
